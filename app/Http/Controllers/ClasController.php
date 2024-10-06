<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Clas;
use App\Models\Course;
use App\Exports\ClasExport;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;

class ClasController extends Controller
{
    //

    public function adminShowClas(){
        $totalclasses=Clas::all();
        $archivedclases=Clas::with(['department'])->where('clas_status','Archived')->get();
        $activeclases=Clas::with(['department'])->where('clas_status','Active')->get();
        $departments=Department::where('department_status','Active')->get();
        $courses=Course::where('course_status','Published')->get();
        return view('admin.clas.adminShowClas',compact(['activeclases','archivedclases','totalclasses','departments','courses']))->render();
    }

    public function adminAddClases(Request $request){
        $save=Clas::create($request->all());
        if($save){
            alert()->success('success','Data saved succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not saved');
            return redirect()->back();
        }
    }

    public function adminUpdateClases(Request $request){
        $id=$request->id;
        $update=Clas::find($id)->update($request->all());
        if($update){
            alert()->success('success','Data update succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not update');
            return redirect()->back();
        }
    }

    public function adminArchiveClases(Request $request){
        $id=$request->id;
        $archive=Clas::find($id)->update(['clas_status'=>'Archived']);
        if($archive){
            alert()->success('success','Data archived succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could not archived');
            return redirect()->back();
        }
    }

    public function adminRecoverClases(Request $request){
        $id=$request->id;
        $recover=Clas::find($id)->update(['clas_status'=>'Active']);
        if($recover){
            alert()->success('success','Data Recoverd succesfully');
                return redirect()->back();
        }else{
            alert()->error('Failed','Could recover archived');
            return redirect()->back();
        }
    }

    public function adminExportExcelClas(){
        return Excel::download(new ClasExport,'Clas.xlsx');
    }


    public function adminExportClasAsPdf()
    {
        $imagePath = public_path('logo/logo.jpeg');
        $imageData = base64_encode(file_get_contents($imagePath));
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        // Fetch data from the database
        $activeclases=Clas::with(['department'])->where('clas_status','Active')->get();

        // Load the view and pass data to it
        //$pdf = PDF::loadView('admin.departments.adminExportDepartmentsPdf', ['imageSrc' => $imageSrc] ,compact('departments'));
        $pdf = PDF::loadView('admin.clas.adminExportClasesAsPdf', [
            'activeclases' =>$activeclases,
            'imageSrc' => $imageSrc
        ])->setPaper('A4', 'portrait')  // Set paper size and orientation
        ->setOption('isHtml5ParserEnabled', true)  // Enable HTML5 parsing
        ->setOption('isPhpEnabled', true); // Enable PHP (use cautiously)
       
        // Download the PDF
        return $pdf->download('clases.pdf');
    }


}
