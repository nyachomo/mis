<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DepartmentsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DepartmentsImport;
use App\Models\Department;
use Barryvdh\DomPDF\Facade\PDF;
class DepartmentController extends Controller
{
    //

    public function adminShowDepartments(){


         // Initialize arrays to collect data
            $totalDepartmentsArray = [];
            $archivedDepartmentsArray = [];
            $activeDepartmentsArray = [];
    
    // Process total departments in chunks
    Department::chunk(100, function ($chunk) use (&$totalDepartmentsArray) {
        foreach ($chunk as $department) {
            $totalDepartmentsArray[] = $department;
        }
    });

    // Process archived departments in chunks
    Department::where('department_status', 'Archived')->chunk(100, function ($chunk) use (&$archivedDepartmentsArray) {
        foreach ($chunk as $department) {
            $archivedDepartmentsArray[] = $department;
        }
    });

    // Process active departments in chunks
    Department::where('department_status', 'Active')->chunk(100, function ($chunk) use (&$activeDepartmentsArray) {
        foreach ($chunk as $department) {
            $activeDepartmentsArray[] = $department;
        }
    });

    // Convert arrays to collections
    $totaldepartments = collect($totalDepartmentsArray);
    $archiveddepartments = collect($archivedDepartmentsArray);
    $departments = collect($activeDepartmentsArray);


      
       /*
        $totaldepartments=Department::paginate(15);
        $archiveddepartments=Department::where('department_status','Archived')->get();
        $departments=Department::where('department_status','Active')->get();
        */
         return view('admin.departments.showDepartments',compact(['departments','archiveddepartments','totaldepartments']))->render();
    }

    public function adminAddDepartments(Request $request){
        $save=Department::create($request->all());
        if($save){
            alert()->success('success','Data saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
   }

   public function adminUpdateDepartments(Request $request){
        $id=$request->id;
        $update=Department::find($id)->update($request->all());
        if($update){
            alert()->success('success','Data update succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }


    public function adminArchiveDepartments(Request $request){
        $id=$request->id;
        $delete=Department::find($id)->update(['department_status'=>'Archived']);
        if($delete){
            alert()->success('success','Data archived succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not archived');
            return redirect()->back();
        }
    }

    public function adminRecoverDepartments(Request $request){
        $id=$request->id;
        $delete=Department::find($id)->update(['department_status'=>'Active']);
        if($delete){
            alert()->success('success','Data Recoverd succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could recover archived');
            return redirect()->back();
        }
    }

    public function adminExportExcelDepartments(){
        return Excel::download(new DepartmentsExport,'Departments.xlsx');
    }



    public function adminImportExcelDepartments(Request $request)
    {
        $request->validate([
            'department_file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('department_file');
        
        // Import the data
        Excel::import(new DepartmentsImport, $file);

        return redirect()->back()->with('success', 'Departments imported successfully!');
    }




    public function adminExportDepartmentsAsPdf()
    {
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Fetch data from the database
        $departments = Department::all();

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', [
            'departments' => $departments,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'portrait')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('departments.pdf');
    }


    


}
