<?php
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


?>