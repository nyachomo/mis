<?php
//STUDENTCAT
Route::get('/adminShowStudentCats',[App\Http\Controllers\StudentCatController::class,'adminShowStudentCats'])->name('adminShowStudentCats');
Route::post('/adminAddStudentCats',[App\Http\Controllers\StudentCatController::class,'adminAddStudentCats'])->name('adminAddStudentCats');
Route::post('/adminUpdateStudentCats',[App\Http\Controllers\StudentCatController::class,'adminUpdateStudentCats'])->name('adminUpdateStudentCats');
Route::post('/adminArchiveStudentCats',[App\Http\Controllers\StudentCatController::class,'adminArchiveStudentCats'])->name('adminArchiveStudentCats');
Route::post('/adminPublishedStudentCats',[App\Http\Controllers\StudentCatController::class,'adminPublishedStudentCats'])->name('adminPublishedStudentCats');
Route::post('/adminRecoverStudentCats',[App\Http\Controllers\StudentCatController::class,'adminRecoverStudentCats'])->name('adminRecoverStudentCats');
Route::get('/adminExportStudentCatsAsPdf',[App\Http\Controllers\StudentCatController::class,'adminExportStudentCatsAsPdf'])->name('adminExportStudentCatsAsPdf');

//STUDENT CAT QUESTIONS
Route::get('/adminShowCatQuestions/{id}',[App\Http\Controllers\StudentCatQuestionController::class,'adminShowCatQuestions'])->name('adminShowCatQuestions');
Route::post('/adminAddCatQuestions',[App\Http\Controllers\StudentCatQuestionController::class,'adminAddCatQuestions'])->name('adminAddCatQuestions');
Route::post('/adminUpdateCatQuestions',[App\Http\Controllers\StudentCatQuestionController::class,'adminUpdateCatQuestions'])->name('adminUpdateCatQuestions');
Route::post('/adminArchivedCatQuestions',[App\Http\Controllers\StudentCatQuestionController::class,'adminArchivedCatQuestions'])->name('adminArchivedCatQuestions');
Route::post('/adminRecoverCatQuestions',[App\Http\Controllers\StudentCatQuestionController::class,'adminRecoverCatQuestions'])->name('adminRecoverCatQuestions');
Route::get('/adminExportCatQuestionsAsPdf',[App\Http\Controllers\StudentCatQuestionController::class,'adminExportCatQuestionsAsPdf'])->name('adminExportCatQuestionsAsPdf');
?>