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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//COMPANY SETTINGS
Route::get('/settings',[App\Http\Controllers\CompanySettingController::class,'showcompanySettings'])->name('showcompanySettings');
Route::post('/add/settings',[App\Http\Controllers\CompanySettingController::class,'addcompanySettings'])->name('addcompanySettings');
Route::post('/update/settings/logo',[App\Http\Controllers\CompanySettingController::class,'updatecompanySettingsLogo'])->name('updatecompanySettingsLogo');
Route::post('/update/settings/info',[App\Http\Controllers\CompanySettingController::class,'updatecompanySettingsInfo'])->name('updatecompanySettingsInfo');
Route::post('/delete/settings',[App\Http\Controllers\CompanySettingController::class,'deletecompanySettings'])->name('deletecompanySettings');


//Courses
Route::get('/courses',[App\Http\Controllers\CourseController::class, 'index'])->name('courses');
Route::post('/add-courses', [App\Http\Controllers\CourseController::class, 'addCourse'])->name('add.course');
Route::get('/fetch-courses', [App\Http\Controllers\CourseController::class, 'fetchcourses'])->name('fetchcourses');

Route::GET('/edit-course/{id}', [App\Http\Controllers\CourseController::class, 'editcourse'])->name('admin.editcourse');
Route::PUT('/update-course/{id}', [App\Http\Controllers\CourseController::class, 'updatecourse'])->name('admin.updatecourse');
Route::GET('/delete-course/{id}', [App\Http\Controllers\CourseController::class, 'deletecourse'])->name('admin.deletecourse');

//search course
Route::get('/search-course', [App\Http\Controllers\CourseController::class, 'searchcourse'])->name('admin.searchcourse');
Route::get('/filter-course', [App\Http\Controllers\CourseController::class, 'filtercourse'])->name('admin.filtercourse');
Route::get('/show-course', [App\Http\Controllers\CourseController::class, 'showcourse'])->name('admin.showcourse');

//MANAGING SUBJECTS
Route::get('/admin/showSubjects',[App\Http\Controllers\SubjectController::class,'adminShowSubjects'])->name('adminShowSubjects');
Route::post('/admin/addSubject',[App\Http\Controllers\SubjectController::class,'adminAddSubject'])->name('adminAddSubject');
Route::post('/admin/deleteSubject',[App\Http\Controllers\SubjectController::class,'adminDeleteSubject'])->name('adminDeleteSubject');
Route::post('/admin/updateSubject',[App\Http\Controllers\SubjectController::class,'adminUpdateSubject'])->name('adminUpdateSubject');

//MANAGING TOPICS
Route::get('/admin/showTopics',[App\Http\Controllers\TopicController::class,'adminShowTopics'])->name('adminShowTopics');
Route::post('/admin/addTopic',[App\Http\Controllers\TopicController::class,'adminAddTopic'])->name('adminAddTopic');
Route::post('/admin/updateTopic',[App\Http\Controllers\TopicController::class,'adminUpdateTopic'])->name('adminUpdateTopic');
Route::post('/admin/deleteTopic',[App\Http\Controllers\TopicController::class,'adminDeleteTopic'])->name('adminDeleteTopic');

Route::get('/testeditor',[App\Http\Controllers\TopicController::class,'testEditor'])->name('testeditor');

//TEST EDIOT

//MANAGING EXAMS
Route::get('/admin/showExams',[App\Http\Controllers\ExamController::class,'adminShowExams'])->name('adminShowExams');
Route::post('/admin/addExams',[App\Http\Controllers\ExamController::class,'adminAddExams'])->name('adminAddExams');
Route::post('/admin/updateExams',[App\Http\Controllers\ExamController::class,'adminUpdateExams'])->name('adminUpdateExams');
Route::post('/admin/archiveExams',[App\Http\Controllers\ExamController::class,'adminArchiveExams'])->name('adminArchiveExams');
Route::post('/admin/publishExams',[App\Http\Controllers\ExamController::class,'adminPublishExams'])->name('adminPublishExams');
//END OF MANAGE EXAM


//MANAGE QUESTION
Route::get('/admin/ShowQuestions/{id}',[App\Http\Controllers\QuestionController::class,'adminShowQuestions'])->name('adminShowQuestions');
Route::post('/admin/AddQuestions',[App\Http\Controllers\QuestionController::class,'adminAddQuestions'])->name('adminAddQuestions');
Route::post('/admin/UpdateQuestions',[App\Http\Controllers\QuestionController::class,'adminUpdateQuestions'])->name('adminUpdateQuestions');
Route::post('/admin/DeleteQuestions',[App\Http\Controllers\QuestionController::class,'adminDeleteQuestions'])->name('adminDeleteQuestions');
//END OF MANAGE QUESTION

//ADMIN MANAGING STUDENT
Route::get('/showStudents',[App\Http\Controllers\StudentController::class, 'showStudents'])->name('showStudents');
Route::post('/addStudent',[App\Http\Controllers\StudentController::class, 'addStudent'])->name('addStudent');
Route::post('/updateStudent',[App\Http\Controllers\StudentController::class, 'updateStudent'])->name('updateStudent');
Route::post('/enrolStudentToAcourse',[App\Http\Controllers\StudentController::class, 'enrolStudentToAcourse'])->name('enrolStudentToAcourse');
Route::post('/unenrolCourseFromStudent',[App\Http\Controllers\StudentController::class, 'unenrolCourseFromStudent'])->name('unenrolCourseFromStudent');
Route::post('/urchiveStudent',[App\Http\Controllers\StudentController::class, 'urchiveStudent'])->name('urchiveStudent');
Route::post('/unarchivedStudent',[App\Http\Controllers\StudentController::class, 'unarchivedStudent'])->name('unarchivedStudent');
Route::post('/suspendStudent',[App\Http\Controllers\StudentController::class, 'suspendStudent'])->name('suspendStudent');
Route::post('/activateStudent',[App\Http\Controllers\StudentController::class, 'activateStudent'])->name('activateStudent');

Route::get('/showCourses',[App\Http\Controllers\StudentController::class, 'studentShowCourses'])->name('studentShowCourses');
Route::get('/showSubjects/{id}',[App\Http\Controllers\StudentController::class, 'studentShowSubjects'])->name('studentShowSubjects');
Route::get('/showTopics/{id}',[App\Http\Controllers\StudentController::class, 'studentShowTopics'])->name('studentShowTopics');
Route::get('/showAssignments',[App\Http\Controllers\StudentController::class, 'studentShowAssignments'])->name('studentShowAssignments');
Route::get('/showCats',[App\Http\Controllers\StudentController::class, 'studentShowCats'])->name('studentShowCats');
Route::get('/showFinalExam',[App\Http\Controllers\StudentController::class, 'studentShowFinalExam'])->name('studentShowFinalExam');
Route::get('/showExamQuestions/{id}',[App\Http\Controllers\StudentController::class, 'studentShowExamQuestions'])->name('studentShowExamQuestions');





Route::get('/admin-schools-index', [App\Http\Controllers\SchoolController::class, 'index'])->name('admin.school.index');

Route::get('/admin-students', [App\Http\Controllers\StudentController::class, 'index'])->name('admin.student.index');
Route::post('/students', [App\Http\Controllers\StudentController::class, 'store'])->name('admin.student.store');
Route::GET('/fetch-students', [App\Http\Controllers\StudentController::class, 'fetchstudent'])->name('admin.student.fetchstudent');
Route::GET('/edit-student/{id}', [App\Http\Controllers\StudentController::class, 'editstudent'])->name('admin.student.editstudent');
Route::PUT('/update-student/{id}', [App\Http\Controllers\StudentController::class, 'updatestudent'])->name('admin.student.updatestudent');


//MANAGE ADMISSION NUMBERS
Route::get('/showAdmissionNumbers',[App\Http\Controllers\AdmNumberController::class, 'showadmissionNumbers'])->name('showadmissionNumbers');
Route::post('/addAdmissionNumbers',[App\Http\Controllers\AdmNumberController::class, 'addAdmissionNumbers'])->name('addAdmissionNumbers');
Route::post('/updateAdmissionNumbers',[App\Http\Controllers\AdmNumberController::class, 'updateAdmissionNumbers'])->name('updateAdmissionNumbers');
//END OF MANAGE ADMISSION NUMBER

//SEARCH STUDENTS

Route::get('/search-students', [App\Http\Controllers\StudentController::class, 'searchstudent'])->name('admin.student.searchstudent');
Route::get('/show-students', [App\Http\Controllers\StudentController::class, 'showstudent'])->name('admin.student.showstudent');
Route::get('/filter-students', [App\Http\Controllers\StudentController::class, 'filterstudent'])->name('admin.student.filterstudent');

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

//Route::get('/fetch-educationExperience',[App\Http\Controllers\StudentController::class, 'fetchEducationExperience'])->name('student.fetchEducationExperience');
//Route::GET('/edit-educationExperience/{id}', [App\Http\Controllers\StudentController::class, 'editEducationExperience'])->name('student.editEducationExperience');
//Route::POST('/student/updateEducationExperience',[App\Http\Controllers\StudentController::class, 'updateEducationExperience'])->name('student.updateEducationExperience');
//Route::POST('/student/deleteEducationExperience',[App\Http\Controllers\StudentController::class, 'deleteEducationExperience'])->name('student.deleteEducationExperience');

//STUDENT WORK EXPERIENCE
Route::get('/student/workExperience',[App\Http\Controllers\WorkExperienceController::class,'studentWorkExperience'])->name('student.workexperience');
Route::post('/student/addWorkExperience',[App\Http\Controllers\WorkExperienceController::class,'addWorkExperience'])->name('student.addWorkExperience');
Route::get('/fetch/student/addWorkExperience',[App\Http\Controllers\WorkExperienceController::class,'fetchWorkExperience'])->name('student.fetchWorkExperience');
Route::GET('/student/edit-workExperience/{id}', [App\Http\Controllers\WorkExperienceController::class, 'editWorkExperience'])->name('student.editWorkExperience');
Route::post('/student/update-workExperience', [App\Http\Controllers\WorkExperienceController::class, 'updateWorkExperience'])->name('student.updateWorkExperience');
Route::post('/student/delete-workExperience', [App\Http\Controllers\WorkExperienceController::class, 'deleteWorkExperience'])->name('student.deleteWorkExperience');
//STUDENTS WORK EXPERIENCE
Route::post('/student/addAWorkchivement', [App\Http\Controllers\WorkExperienceController::class, 'addAchivement'])->name('student.addWorkAchivement');
Route::post('/student/updateWorkAchivement', [App\Http\Controllers\WorkExperienceController::class, 'deleteWorkAchivement'])->name('student.updateWorkAchivement');
Route::post('/student/deleteWorkAchivement', [App\Http\Controllers\WorkExperienceController::class, 'deleteWorkAchivement'])->name('student.deleteWorkAchivement');

//WORK ACHIVEMENTS


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


//USERS
Route::get('/admin-users',[App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
Route::post('/addUser',[App\Http\Controllers\UserController::class, 'adduser'])->name('admin.adduser');
Route::get('/fetchusers',[App\Http\Controllers\UserController::class, 'fetchusers'])->name('admin.fetchusers');

Route::GET('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edituser'])->name('admin.edituser');

Route::PUT('/update-user/{id}', [App\Http\Controllers\UserController::class, 'updateuser'])->name('admin.updateuser');
Route::get('/search-user', [App\Http\Controllers\UserController::class, 'searchuser'])->name('admin.searchuser');


//companies
Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('admin.companies.index');
Route::post('/add-company', [App\Http\Controllers\CompanyController::class, 'addCompany'])->name('admin.add.company');
Route::GET('/fetch-company', [App\Http\Controllers\CompanyController::class, 'fetchcompany'])->name('admin.student.fetchcompany');
Route::GET('/edit-company/{id}', [App\Http\Controllers\CompanyController::class, 'editcompany'])->name('admin.company.editcompany');
Route::post('/update-company', [App\Http\Controllers\CompanyController::class, 'updateCompany'])->name('admin.update.company');
Route::post('/delete-company', [App\Http\Controllers\CompanyController::class, 'deleteCompany'])->name('admin.delete.company');
Route::get('/search-company', [App\Http\Controllers\CompanyController::class, 'searchCompany'])->name('admin.search.company');

Route::get('/filter-company', [App\Http\Controllers\CompanyController::class, 'filterCompany'])->name('admin.filter.company');
Route::get('/show-company', [App\Http\Controllers\CompanyController::class, 'showCompany'])->name('admin.show.company');


//COMMUNICATION
Route::get('/communications', [App\Http\Controllers\CommunicationController::class, 'index'])->name('admin.cummunications');
Route::post('/admin-send-communication', [App\Http\Controllers\CommunicationController::class, 'adminSend'])->name('admin.send.cummunication');
Route::get('/admin-fetch-communication', [App\Http\Controllers\CommunicationController::class, 'adminFetch'])->name('admin.fetch.cummunication');
Route::post('/admin-reply-communication', [App\Http\Controllers\CommunicationController::class, 'adminReply'])->name('admin.reply.cummunication');

//JOBS
Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index'])->name('admin.jobs');

//JOBS
Route::post('/admin.add.vacancy', [App\Http\Controllers\JobController::class, 'adminAddVacancy'])->name('admin.add.vacancy');
//JOBS
Route::get('/admin.fetch.vacancy', [App\Http\Controllers\JobController::class, 'adminFetchJobs'])->name('admin.fetch.vacancy');



Route::GET('/edit-job/{id}', [App\Http\Controllers\JobController::class, 'adminEditJob'])->name('admin.edit.job');





//LEEDS

Route::get('/leeds',[App\Http\Controllers\LeedController::class, 'showLeeds'])->name('showLeeds');
Route::post('/add/leed',[App\Http\Controllers\LeedController::class, 'addLeed'])->name('addLeed');
Route::post('/update/leed',[App\Http\Controllers\LeedController::class, 'updateLeed'])->name('updateLeed');