<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/returnBackUrl',function (){return redirect()->back();})->name('returnBackUrl');
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userLogin',[App\Http\Controllers\CompanySettingController::class, 'login2'])->name('login2');

//REGISTERING NEW STUDENT FROM THE WEBSITE
Route::post('/updateRegRefNo',[App\Http\Controllers\UserController::class,'updateRegRefNo'])->name('updateRegRefNo');

//COMPANY SETTINGS
Route::get('/settings',[App\Http\Controllers\CompanySettingController::class,'showcompanySettings'])->name('showcompanySettings');
Route::post('/add/settings',[App\Http\Controllers\CompanySettingController::class,'addcompanySettings'])->name('addcompanySettings');
Route::post('/update/settings/logo',[App\Http\Controllers\CompanySettingController::class,'updatecompanySettingsLogo'])->name('updatecompanySettingsLogo');
Route::post('/update/settings/info',[App\Http\Controllers\CompanySettingController::class,'updatecompanySettingsInfo'])->name('updatecompanySettingsInfo');
Route::post('/delete/settings',[App\Http\Controllers\CompanySettingController::class,'deletecompanySettings'])->name('deletecompanySettings');

//MANAGING SUBJECTS
Route::get('/admin/showSubjects',[App\Http\Controllers\SubjectController::class,'adminShowSubjects'])->name('adminShowSubjects');
Route::post('/admin/addSubject',[App\Http\Controllers\SubjectController::class,'adminAddSubject'])->name('adminAddSubject');
Route::post('/admin/archiveSubject',[App\Http\Controllers\SubjectController::class,'adminArchiveSubject'])->name('adminArchiveSubject');
Route::post('/admin/recoverSubject',[App\Http\Controllers\SubjectController::class,'adminRecoverSubject'])->name('adminRecoverSubject');
Route::post('/admin/updateSubject',[App\Http\Controllers\SubjectController::class,'adminUpdateSubject'])->name('adminUpdateSubject');

//MANAGING TOPICS
Route::get('/admin/showTopics',[App\Http\Controllers\TopicController::class,'adminShowTopics'])->name('adminShowTopics');
Route::post('/admin/addTopic',[App\Http\Controllers\TopicController::class,'adminAddTopic'])->name('adminAddTopic');
Route::post('/admin/updateTopic',[App\Http\Controllers\TopicController::class,'adminUpdateTopic'])->name('adminUpdateTopic');
Route::post('/admin/deleteTopic',[App\Http\Controllers\TopicController::class,'adminDeleteTopic'])->name('adminDeleteTopic');

Route::get('/testeditor',[App\Http\Controllers\TopicController::class,'testEditor'])->name('testeditor');

//TEST EDIOT


//STUDENT ASSIGNMENT
Route::get('/adminShowStudentAssignments',[App\Http\Controllers\StudentAssignmentController::class,'adminShowStudentAssignments'])->name('adminShowStudentAssignments');
Route::post('/adminAddStudentAssignments',[App\Http\Controllers\StudentAssignmentController::class,'adminAddStudentAssignments'])->name('adminAddStudentAssignments');
Route::post('/adminUpdateStudentAssignments',[App\Http\Controllers\StudentAssignmentController::class,'adminUpdateStudentAssignments'])->name('adminUpdateStudentAssignments');
Route::post('/adminArchiveStudentAssignments',[App\Http\Controllers\StudentAssignmentController::class,'adminArchiveStudentAssignments'])->name('adminArchiveStudentAssignments');
Route::post('/adminPublishedStudentAssignments',[App\Http\Controllers\StudentAssignmentController::class,'adminPublishedStudentAssignments'])->name('adminPublishedStudentAssignments');
Route::post('/adminRecoverStudentAssignments',[App\Http\Controllers\StudentAssignmentController::class,'adminRecoverStudentAssignments'])->name('adminRecoverStudentAssignments');
Route::get('/adminExportStudentAssignmentsAsPdf',[App\Http\Controllers\StudentAssignmentController::class,'adminExportStudentAssignmentsAsPdf'])->name('adminExportStudentAssignmentsAsPdf');

Route::get('/adminShowStudentCats',[App\Http\Controllers\StudentAssignmentController::class,'adminShowStudentCats'])->name('adminShowStudentCats');
Route::get('/adminShowStudentFinalExam',[App\Http\Controllers\StudentAssignmentController::class,'adminShowStudentFinalExam'])->name('adminShowStudentFinalExam');


Route::get('/traineeViewAssignments',[App\Http\Controllers\StudentAssignmentController::class,'traineeViewAssignments'])->name('traineeViewAssignments');
Route::get('/traineeViewCats',[App\Http\Controllers\StudentAssignmentController::class,'traineeViewCats'])->name('traineeViewCats');
Route::get('/traineeViewFinalExam',[App\Http\Controllers\StudentAssignmentController::class,'traineeViewFinalExam'])->name('traineeViewFinalExam');
Route::get('/traineeViewQuestions/{id}',[App\Http\Controllers\StudentAssignmentController::class,'traineeViewQuestions'])->name('traineeViewQuestions');

Route::post('/traineeAnswerQuestions',[App\Http\Controllers\StudentAssignmentController::class,'traineeAnserQuestions'])->name('traineeAnswerQuestions');
Route::post('/traineeUpdateAnswer',[App\Http\Controllers\StudentAssignmentController::class,'traineeUpdateAnswer'])->name('traineeUpdateAnswer');

//AWARD TRAINEE MARKS
Route::post('/adminAwardTraineeMark',[App\Http\Controllers\StudentAssignmentController::class,'adminAwardTraineeMark'])->name('adminAwardTraineeMark');


//STUDENT CAT QUESTIONS
Route::get('/adminShowAssignmentQuestions/{id}',[App\Http\Controllers\StudentAssignmentQuestionController::class,'adminShowAssignmentQuestions'])->name('adminShowAssignmentQuestions');
Route::post('/adminAddAssignmentQuestions',[App\Http\Controllers\StudentAssignmentQuestionController::class,'adminAddAssignmentQuestions'])->name('adminAddAssignmentQuestions');
Route::post('/adminUpdateAssignmentQuestions',[App\Http\Controllers\StudentAssignmentQuestionController::class,'adminUpdateAssignmentQuestions'])->name('adminUpdateAssignmentQuestions');
Route::post('/adminArchivedAssignmentQuestions',[App\Http\Controllers\StudentAssignmentQuestionController::class,'adminArchivedAssignmentQuestions'])->name('adminArchivedAssignmentQuestions');
Route::post('/adminRecoverAssignmentQuestions',[App\Http\Controllers\StudentAssignmentQuestionController::class,'adminRecoverAssignmentQuestions'])->name('adminRecoverAssignmentQuestions');
Route::post('/adminExportAssignmentQuestionsAsPdf',[App\Http\Controllers\StudentAssignmentQuestionController::class,'adminExportAssignmentQuestionsAsPdf'])->name('adminExportAssignmentQuestionsAsPdf');
Route::get('/adminViewAssignmentAttemps/{id}',[App\Http\Controllers\StudentAssignmentController::class,'adminViewAssignmentAttempts'])->name('adminViewAssignmentAttempts');
Route::get('/adminViewStudentAnswers/{id}',[App\Http\Controllers\StudentAssignmentController::class,'adminViewStudentAnswers'])->name('adminViewStudentAnswers');

//TRAINEE VIEWING THEIR EXAM


//MANAGING COURSE
Route::get('/adminShowCourses',[App\Http\Controllers\CourseController::class, 'adminShowCourses'])->name('adminShowCourses');
Route::post('/adminAddCourses',[App\Http\Controllers\CourseController::class, 'adminAddCourses'])->name('adminAddCourses');
Route::post('/adminUpdateCourses',[App\Http\Controllers\CourseController::class, 'adminUpdateCourses'])->name('adminUpdateCourses');
Route::post('/adminArchiveCourses',[App\Http\Controllers\CourseController::class, 'adminArchiveCourses'])->name('adminArchiveCourses');
Route::post('/adminRecoverArchiveCourses',[App\Http\Controllers\CourseController::class, 'adminRecoverArchiveCourses'])->name('adminRecoverArchiveCourses');
Route::post('/adminImportCourses',[App\Http\Controllers\CourseController::class, 'adminImportCourses'])->name('adminImportCourses');
Route::get('/adminExportCoursesAsPdf',[App\Http\Controllers\CourseController::class, 'adminExportCoursesAsPdf'])->name('adminExportCoursesAsPdf');
Route::get('/adminExportCoursesAsExcel',[App\Http\Controllers\CourseController::class, 'adminExportCoursesAsExcel'])->name('adminExportCoursesAsExcel');
Route::post('/updateCourseImage',[App\Http\Controllers\CourseController::class, 'updateCourseImage'])->name('updateCourseImage');


/*
Route::get('/showAdmissionNumbers',[App\Http\Controllers\AdmNumberController::class, 'showadmissionNumbers'])->name('showadmissionNumbers');
Route::post('/addAdmissionNumbers',[App\Http\Controllers\AdmNumberController::class, 'addAdmissionNumbers'])->name('addAdmissionNumbers');
Route::post('/updateAdmissionNumbers',[App\Http\Controllers\AdmNumberController::class, 'updateAdmissionNumbers'])->name('updateAdmissionNumbers');
*/


//STUDENTS PROFILE
Route::get('/student/profile',[App\Http\Controllers\StudentController::class, 'profile'])->name('student.profile');
Route::get('/student/potfolio',[App\Http\Controllers\StudentController::class, 'potfolio'])->name('student.potfolio');
Route::post('/student/profile/update',[App\Http\Controllers\StudentController::class, 'studentUpdateProfile'])->name('student.updateprofile');
Route::post('/student/update/password',[App\Http\Controllers\StudentController::class, 'studentUpdatePassword'])->name('student.updatepassword');
Route::post('/student/update/profileImage',[App\Http\Controllers\StudentController::class, 'studentUpdateProfileImage'])->name('student.updateprofileimage');

//STUDENT EDUCATION EXPERIENCE
Route::get('/student/education',[App\Http\Controllers\EducationExperienceController::class, 'showStudentEducationExperience'])->name('studenteducation');

Route::post('/student/addEducationExperience',[App\Http\Controllers\EducationExperienceController::class, 'addEducationExperience'])->name('student.addEducationExperience');
Route::post('/student/updateEducationExperience',[App\Http\Controllers\EducationExperienceController::class, 'updateEducationExperience'])->name('student.updateEducationExperience');
Route::post('/student/deleteEducationExperience',[App\Http\Controllers\EducationExperienceController::class, 'deleteEducationExperience'])->name('student.deleteEducationExperience');

//EDUCATION ACHIVEMENT
Route::post('/student/education/add/achivement',[App\Http\Controllers\EducationExperienceController::class, 'addAchivement'])->name('addAchivement');
Route::post('/student/education/update/achivement',[App\Http\Controllers\EducationExperienceController::class, 'updateAchivement'])->name('updateAchivement');
Route::post('/student/education/delete/achivement',[App\Http\Controllers\EducationExperienceController::class, 'deleteAchivement'])->name('deleteAchivement');


//STUDENT WORK EXPERIENCE
Route::get('/student/workExperience',[App\Http\Controllers\WorkExperienceController::class,'studentWorkExperience'])->name('student.workexperience');
Route::post('/student/addWorkExperience',[App\Http\Controllers\WorkExperienceController::class,'addWorkExperience'])->name('student.addWorkExperience');
Route::get('/fetch/student/addWorkExperience',[App\Http\Controllers\WorkExperienceController::class,'fetchWorkExperience'])->name('student.fetchWorkExperience');
Route::GET('/student/edit-workExperience/{id}', [App\Http\Controllers\WorkExperienceController::class, 'editWorkExperience'])->name('student.editWorkExperience');
Route::post('/student/update-workExperience', [App\Http\Controllers\WorkExperienceController::class, 'updateWorkExperience'])->name('student.updateWorkExperience');
Route::post('/student/delete-workExperience', [App\Http\Controllers\WorkExperienceController::class, 'deleteWorkExperience'])->name('student.deleteWorkExperience');
//STUDENTS WORK ACHIEVEMENTS
Route::post('/student/addAWorkchivement', [App\Http\Controllers\WorkExperienceController::class, 'addAchivement'])->name('student.addWorkAchivement');
Route::post('/student/updateWorkAchivement', [App\Http\Controllers\WorkExperienceController::class, 'deleteWorkAchivement'])->name('student.updateWorkAchivement');
Route::post('/student/deleteWorkAchivement', [App\Http\Controllers\WorkExperienceController::class, 'deleteWorkAchivement'])->name('student.deleteWorkAchivement');

//WORK ACHIVEMENTS
Route::get('/traineeViewAssesment',[App\Http\Controllers\UserController::class, 'traineeViewAssesment'])->name('traineeViewAssesment');

//STUDENT REFEREE
Route::get('/student/show/referee',[App\Http\Controllers\RefereeController::class, 'studentShowReferee'])->name('student.showReferee');
Route::post('/student/add/referee',[App\Http\Controllers\RefereeController::class, 'studentAddReferee'])->name('student.addReferee');
Route::post('/student/update/referee',[App\Http\Controllers\RefereeController::class, 'studentUpdateReferee'])->name('student.updateReferee');
Route::post('/student/delete/referee',[App\Http\Controllers\RefereeController::class, 'studentDeleteReferee'])->name('student.deleteReferee');

//STUDENT PROFILE DOCUMENT
Route::get('/student/show/profileDocuments',[App\Http\Controllers\StudentProfileDocumentController::class, 'showStudentProfileDocument'])->name('showStudentProfileDocument');
Route::post('/student/add/profileDocuments',[App\Http\Controllers\StudentProfileDocumentController::class, 'addStudentProfileDocument'])->name('addStudentProfileDocument');
Route::post('/student/update/profileDocuments',[App\Http\Controllers\StudentProfileDocumentController::class, 'updateStudentProfileDocument'])->name('updateStudentProfileDocument');
Route::post('/student/delete/profileDocuments',[App\Http\Controllers\StudentProfileDocumentController::class, 'deleteStudentProfileDocument'])->name('deleteStudentProfileDocument');

//STUDENT PROFESSIONAL SUMMARY
Route::post('/student/add/professionalSummary',[App\Http\Controllers\ProfessionalSummaryController::class, 'addStudentProfessionalSummary'])->name('addStudentProfessionalSummary');
Route::post('/student/update/professionalSummary',[App\Http\Controllers\ProfessionalSummaryController::class, 'updateStudentProfessionalSummary'])->name('updateStudentProfessionalSummary');
Route::post('/student/delete/professionalSummary',[App\Http\Controllers\ProfessionalSummaryController::class, 'deleteStudentProfessionalSummary'])->name('deleteStudentProfessionalSummary');
//STUDENT SKILLS

Route::post('/student/add/skill',[App\Http\Controllers\StudentSkillController::class, 'studentAddSkill'])->name('studentAddSkill');
Route::post('/student/update/skill',[App\Http\Controllers\StudentSkillController::class, 'studentUpdateSkill'])->name('studentUpdateSkill');
Route::post('/student/delete/skill',[App\Http\Controllers\StudentSkillController::class, 'studentDeleteSkill'])->name('studentDeleteSkill');


//STUDENT PROFILE SUMMARY
Route::get('/student/show/profileSummary',[App\Http\Controllers\StudentProfileSummaryController::class, 'showStudentProfileSummary'])->name('showStudentProfileSummary');


//MANAGE USERS
Route::get('/adminShowUsers',[App\Http\Controllers\UserController::class, 'adminShowUsers'])->name('adminShowUsers');
Route::post('/adminAddUsers',[App\Http\Controllers\UserController::class, 'adminAddUsers'])->name('adminAddUsers');
Route::post('/adminUpdateUsers',[App\Http\Controllers\UserController::class, 'adminUpdateUsers'])->name('adminUpdateUsers');
Route::post('/adminUpdateUserPassword',[App\Http\Controllers\UserController::class, 'adminUpdateUserPassword'])->name('adminUpdateUserPassword');
Route::post('/adminUpdateUserPicture',[App\Http\Controllers\UserController::class, 'adminUpdateUserPicture'])->name('adminUpdateUserPicture');
Route::post('/adminArchiveUsers',[App\Http\Controllers\UserController::class, 'adminArchiveUsers'])->name('adminArchiveUsers');
Route::post('/adminRecoverArchiveUsers',[App\Http\Controllers\UserController::class, 'adminRecoverArchiveUsers'])->name('adminRecoverArchiveUsers');
Route::get('/adminExportUsers',[App\Http\Controllers\UserController::class, 'exportUser'])->name('exportUser');
Route::get('/adminExportUsersAsPdf',[App\Http\Controllers\UserController::class, 'adminExportUsersAsPdf'])->name('adminExportUsersAsPdf');
Route::post('/adminImportUsersDataAsFromexcel',[App\Http\Controllers\UserController::class, 'adminImportUsersDataAsFromexcel'])->name('adminImportUsersDataAsFromexcel');
Route::post('/adminRevokeUsersRoles',[App\Http\Controllers\UserController::class, 'adminRevokeUsersRoles'])->name('adminRevokeUsersRoles');
Route::post('/adminAddUsersRoles',[App\Http\Controllers\UserController::class, 'adminAddUsersRoles'])->name('adminAddUsersRoles');
Route::post('/adminSuspendUser',[App\Http\Controllers\UserController::class, 'adminSuspendUser'])->name('adminSuspendUser');
Route::get('/showUserProfile',[App\Http\Controllers\UserController::class, 'showUserProfile'])->name('showUserProfile');

//STUDENT SEND ENROLMENT REQUEST
Route::post('/sendEnrollmentRequest',[App\Http\Controllers\UserController::class, 'sendEnrollmentRequest'])->name('sendEnrollmentRequest');

//TRAINEE VIEW ALL COURSES

Route::get('/traineeViewAllCourses',[App\Http\Controllers\CourseController::class, 'traineeViewAllCourses'])->name('traineeViewAllCourses');
Route::get('/traineeViewMoreCourseInfo/{id}',[App\Http\Controllers\CourseController::class, 'traineeViewMoreCourseInfo'])->name('traineeViewMoreCourseInfo');
Route::get('/trainee_View_his_her_course',[App\Http\Controllers\CourseController::class, 'trainee_View_his_her_course'])->name('trainee_View_his_her_course');
//SHOW APPLICANTS
Route::get('/showApplicants',[App\Http\Controllers\UserController::class, 'showApplicants'])->name('showApplicants');
Route::post('/deleteApplicant',[App\Http\Controllers\UserController::class, 'deleteApplicant'])->name('deleteApplicant');


//MANAGEMENT
Route::get('/adminShowManagement',[App\Http\Controllers\UserController::class, 'adminShowManagement'])->name('adminShowManagement');

//TRAINERS
Route::get('/adminShowTrainers',[App\Http\Controllers\UserController::class, 'adminShowTrainers'])->name('adminShowTrainers');
Route::get('/download-trainer', function () {
    $filePath = public_path('imports/trainer.xlsx'); // Path to the file
    return Response::download($filePath);
})->name('downloadTrainerImportFile');


//HIGH SCHOOL TEACHERS
Route::get('/adminShowHighSchoolTeachers',[App\Http\Controllers\UserController::class, 'adminShowHighSchoolTeachers'])->name('adminShowHighSchoolTeachers');
//STUDENTS
Route::get('/adminShowTrainees',[App\Http\Controllers\UserController::class, 'adminShowTrainees'])->name('adminShowTrainees');
Route::get('/download-trainee', function () {
    $filePath = public_path('imports/trainee.xlsx'); // Path to the file
    return Response::download($filePath);
})->name('downloadTraineeImportFile');
Route::post('/adminImportTraineesFromExcel',[App\Http\Controllers\UserController::class, 'adminImportTraineesFromExcel'])->name('adminImportTraineesFromExcel');
//ENROL TRAINEE TO COURSE
Route::post('/enrolTraineeToCourse',[App\Http\Controllers\UserController::class, 'enrolTraineeToCourse'])->name('enrolTraineeToCourse');

//STUDENT FEE PAYMENTS
Route::get('/feePayments',[App\Http\Controllers\FeePaymentController::class, 'feePayments'])->name('feePayments');
Route::post('/addFeePayments',[App\Http\Controllers\FeePaymentController::class, 'addFeePayments'])->name('addFeePayments');

//MANAGE DEPARTMENTS
Route::get('/adminShowDepartments',[App\Http\Controllers\DepartmentController::class, 'adminShowDepartments'])->name('adminShowDepartments');
Route::post('/adminAddDepartments',[App\Http\Controllers\DepartmentController::class, 'adminAddDepartments'])->name('adminAddDepartments');
Route::post('/adminUpdateDepartments',[App\Http\Controllers\DepartmentController::class, 'adminUpdateDepartments'])->name('adminUpdateDepartments');
Route::post('/adminArchiveDepartments',[App\Http\Controllers\DepartmentController::class, 'adminArchiveDepartments'])->name('adminArchiveDepartments');
Route::post('/adminRecoverDepartments',[App\Http\Controllers\DepartmentController::class, 'adminRecoverDepartments'])->name('adminRecoverDepartments');
Route::get('/adminExportExcelDepartments',[App\Http\Controllers\DepartmentController::class, 'adminExportExcelDepartments'])->name('adminExportExcelDepartments');
Route::post('/adminImportExcelDepartments',[App\Http\Controllers\DepartmentController::class, 'adminImportExcelDepartments'])->name('adminImportExcelDepartments');
Route::get('/adminExportDepartmentsAsPdf',[App\Http\Controllers\DepartmentController::class, 'adminExportDepartmentsAsPdf'])->name('adminExportDepartmentsAsPdf');

//MANAGE CLASES
Route::get('/adminShowClas',[App\Http\Controllers\ClasController::class, 'adminShowClas'])->name('adminShowClas');
Route::post('/adminAddClases',[App\Http\Controllers\ClasController::class, 'adminAddClases'])->name('adminAddClases');
Route::post('/adminUpdateClases',[App\Http\Controllers\ClasController::class, 'adminUpdateClases'])->name('adminUpdateClases');
Route::post('/adminArchiveClases',[App\Http\Controllers\ClasController::class, 'adminArchiveClases'])->name('adminArchiveClases');
Route::post('/adminRecoverClases',[App\Http\Controllers\ClasController::class, 'adminRecoverClases'])->name('adminRecoverClases');
Route::get('/adminExportExcelClas',[App\Http\Controllers\ClasController::class, 'adminExportExcelClas'])->name('adminExportExcelClas');
Route::get('/adminExportClasAsPdf',[App\Http\Controllers\ClasController::class, 'adminExportClasAsPdf'])->name('adminExportClasAsPdf');

//MANAGING SCHOOLS

Route::get('/adminShowSchools',[App\Http\Controllers\SchoolController::class, 'adminShowSchools'])->name('adminShowSchools');
Route::post('/adminAddSchools',[App\Http\Controllers\SchoolController::class, 'adminAddSchools'])->name('adminAddSchools');



/*
Route::get('/admin-users',[App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
Route::post('/addUser',[App\Http\Controllers\UserController::class, 'adduser'])->name('admin.adduser');
Route::get('/fetchusers',[App\Http\Controllers\UserController::class, 'fetchusers'])->name('admin.fetchusers');

Route::GET('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edituser'])->name('admin.edituser');

Route::PUT('/update-user/{id}', [App\Http\Controllers\UserController::class, 'updateuser'])->name('admin.updateuser');
Route::get('/search-user', [App\Http\Controllers\UserController::class, 'searchuser'])->name('admin.searchuser');
*/

//LEEDS

Route::get('/leeds',[App\Http\Controllers\LeedController::class, 'showLeeds'])->name('showLeeds');
Route::post('/add/leed',[App\Http\Controllers\LeedController::class, 'addLeed'])->name('addLeed');
Route::post('/update/leed',[App\Http\Controllers\LeedController::class, 'updateLeed'])->name('updateLeed');
Route::get('/downloadStudentScholarshipLetter/{id}',[App\Http\Controllers\LeedController::class, 'downloadStudentScholarshipLetter'])->name('downloadStudentScholarshipLetter');

Route::get('/downloadStudentScholarshipLetterFormFour/{id}',[App\Http\Controllers\LeedController::class, 'downloadStudentScholarshipLetterFormFour'])->name('downloadStudentScholarshipLetterFormFour');



//WEBSITE CONTROLLER
Route::get('/about_us',[App\Http\Controllers\WebsiteController::class, 'about_us'])->name('about_us');
Route::get('/all_courses',[App\Http\Controllers\WebsiteController::class, 'all_courses'])->name('all_courses');
Route::get('/apply',[App\Http\Controllers\WebsiteController::class, 'apply'])->name('apply');