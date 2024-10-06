<?php
//STUDENT FINAL EXAMS
Route::get('/adminShowStudentFinalExam',[App\Http\Controllers\StudentFinalExamController::class,'adminShowStudentFinalExam'])->name('adminShowStudentFinalExam');
Route::post('/adminAddStudentFinalExam',[App\Http\Controllers\StudentFinalExamController::class,'adminAddStudentFinalExam'])->name('adminAddStudentFinalExam');
Route::post('/adminUpdateStudentFinalExam',[App\Http\Controllers\StudentFinalExamController::class,'adminUpdateStudentFinalExam'])->name('adminUpdateStudentFinalExam');
Route::post('/adminArchiveStudentFinalExam',[App\Http\Controllers\StudentFinalExamController::class,'adminArchiveStudentFinalExam'])->name('adminArchiveStudentFinalExam');
Route::post('/adminPublishStudentFinalExam',[App\Http\Controllers\StudentFinalExamController::class,'adminPublishStudentFinalExam'])->name('adminPublishStudentFinalExam');
Route::post('/adminRecoverStudentFinalExam',[App\Http\Controllers\StudentFinalExamController::class,'adminRecoverStudentFinalExam'])->name('adminRecoverStudentFinalExam');
Route::get('/adminExportStudentFinalExamAsPdf',[App\Http\Controllers\StudentFinalExamController::class,'adminExportStudentFinalExamAsPdf'])->name('adminExportStudentFinalExamAsPdf');

//STUDENT FINAL EXAMS QUESTIONS
Route::get('/adminShowStudentFinalExamQuestions/{id}',[App\Http\Controllers\StudentFinalExamQuestionController::class,'adminShowStudentFinalExamQuestions'])->name('adminShowStudentFinalExamQuestions');
Route::post('/adminAddStudentFinalExamQuestions',[App\Http\Controllers\StudentFinalExamQuestionController::class,'adminAddStudentFinalExamQuestions'])->name('adminAddStudentFinalExamQuestions');
Route::post('/adminUpdateStudentFinalExamQuestions',[App\Http\Controllers\StudentFinalExamQuestionController::class,'adminUpdateStudentFinalExamQuestions'])->name('adminUpdateStudentFinalExamQuestions');
Route::post('/adminArchiveStudentFinalExamQuestions',[App\Http\Controllers\StudentFinalExamQuestionController::class,'adminArchiveStudentFinalExamQuestions'])->name('adminArchiveStudentFinalExamQuestions');
Route::post('/adminRecoverStudentFinalExamQuestions',[App\Http\Controllers\StudentFinalExamQuestionController::class,'adminRecoverStudentFinalExamQuestions'])->name('adminRecoverStudentFinalExamQuestions');
Route::post('/adminExportStudentFinalExamQuestionsAsPdf',[App\Http\Controllers\StudentFinalExamQuestionController::class,'adminExportStudentFinalExamQuestionsAsPdf'])->name('adminExportStudentFinalExamQuestionsAsPdf');


?>