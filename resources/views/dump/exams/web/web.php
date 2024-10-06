<?php
//MANAGING EXAMS
Route::get('/admin/showExams',[App\Http\Controllers\ExamController::class,'adminShowExams'])->name('adminShowExams');
Route::post('/admin/addExams',[App\Http\Controllers\ExamController::class,'adminAddExams'])->name('adminAddExams');
Route::post('/admin/updateExams',[App\Http\Controllers\ExamController::class,'adminUpdateExams'])->name('adminUpdateExams');
Route::post('/admin/archiveExams',[App\Http\Controllers\ExamController::class,'adminArchiveExams'])->name('adminArchiveExams');
Route::post('/admin/publishExams',[App\Http\Controllers\ExamController::class,'adminPublishExams'])->name('adminPublishExams');
Route::post('/admin/recoverExam',[App\Http\Controllers\ExamController::class,'adminRecoverExams'])->name('adminRecoverExams');
//END OF MANAGE EXAM


//MANAGE QUESTION
Route::get('/admin/ShowQuestions/{id}',[App\Http\Controllers\QuestionController::class,'adminShowQuestions'])->name('adminShowQuestions');
Route::post('/admin/AddQuestions',[App\Http\Controllers\QuestionController::class,'adminAddQuestions'])->name('adminAddQuestions');
Route::post('/admin/UpdateQuestions',[App\Http\Controllers\QuestionController::class,'adminUpdateQuestions'])->name('adminUpdateQuestions');
Route::post('/admin/DeleteQuestions',[App\Http\Controllers\QuestionController::class,'adminDeleteQuestions'])->name('adminDeleteQuestions');
//END OF MANAGE QUESTION
?>