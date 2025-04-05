<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CretoficateController;
use App\Http\Controllers\EducationRecordController;
use App\Http\Controllers\ElectronicCoursesController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\TrackSessionController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\UniversityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('store_student',[StudentController::class,'store']);
Route::post('update_student/{uuid}',[StudentController::class,'update']);
Route::get('destore_student/{uuid}',[StudentController::class,'destore']);
Route::get('index_student',[StudentController::class,'index']);

Route::post('store_university',[UniversityController::class,'store']);
Route::post('update_university/{uuid}',[UniversityController::class,'update']);
Route::get('destore_university/{uuid}',[UniversityController::class,'destore']);
Route::get('index_university',[UniversityController::class,'index']);

Route::post('store_Specialization',[SpecializationController::class,'store']);
Route::post('update_Specialization/{uuid}',[SpecializationController::class,'update']);
Route::get('destore_Specialization/{uuid}',[SpecializationController::class,'destore']);
Route::get('index_Specialization',[SpecializationController::class,'index']);

Route::post('store_education_record',[EducationRecordController::class,'store']);
Route::post('update_education_record/{uuid}',[EducationRecordController::class,'update']);
Route::get('destore_education_record/{uuid}',[EducationRecordController::class,'destore']);
Route::get('index_education_record',[EducationRecordController::class,'index']);

Route::post('store_trainer',[TrainerController::class,'store']);
Route::post('update_trainer/{uuid}',[TrainerController::class,'update']);
Route::get('destore_trainer/{uuid}',[TrainerController::class,'destore']);
Route::get('index_trainer',[TrainerController::class,'index']);

Route::post('store_track',[TrackController::class,'store']);
Route::post('update_track/{uuid}',[TrackController::class,'update']);
Route::get('destore_track/{uuid}',[TrackController::class,'destore']);
Route::get('index_track',[TrackController::class,'index']);

Route::post('store_track_session',[TrackSessionController::class,'store']);
Route::post('update_track_session/{uuid}',[TrackSessionController::class,'update']);
Route::get('destore_track_session/{uuid}',[TrackSessionController::class,'destore']);
Route::get('index_track_session',[TrackSessionController::class,'index']);

Route::post('store_course',[CourseController::class,'store']);
Route::post('update_course/{uuid}',[CourseController::class,'update']);
Route::get('destore_course/{uuid}',[CourseController::class,'destore']);
Route::get('index_course',[CourseController::class,'index']);

Route::post('store_electronic_courses',[ElectronicCoursesController::class,'store']);
Route::post('update_electronic_courses/{uuid}',[ElectronicCoursesController::class,'update']);
Route::get('destore_electronic_courses/{uuid}',[ElectronicCoursesController::class,'destore']);
Route::get('index_electronic_courses',[ElectronicCoursesController::class,'index']);

Route::post('store_cretoficate',[CretoficateController::class,'store']);
Route::post('update_cretoficate/{uuid}',[CretoficateController::class,'update']);
Route::get('destore_cretoficate/{uuid}',[CretoficateController::class,'destore']);
Route::get('index_cretoficate',[CretoficateController::class,'index']);








