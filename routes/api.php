<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CretoficateController;
use App\Http\Controllers\UserController;
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
use App\Http\Controllers\Auth\AuthController;

Route::post('/login/{role}', [AuthController::class, 'login']);

Route::post('store_student',[StudentController::class,'store']);
Route::post('store_trainer',[TrainerController::class,'store']);
Route::post('store_user',[UserController::class,'store']);

Route::middleware('auth:api')->group(function(){   
     Route::post('/logout/{role}', [AuthController::class, 'logout']);
Route::middleware('auth:student')->group(function(){
    Route::get('index_track',[TrackController::class,'index']);
    Route::get('index_course',[CourseController::class,'index']);
});

Route::middleware('auth:trainer')->group(function(){
    Route::get('index_student',[StudentController::class,'index']);
    Route::get('index_track_session',[TrackSessionController::class,'index']);
    Route::post('store_electronic_courses',[ElectronicCoursesController::class,'store']);
    Route::put('update_electronic_courses/{uuid}',[ElectronicCoursesController::class,'update']);
    Route::delete('destore_electronic_courses/{uuid}',[ElectronicCoursesController::class,'destore']);
    Route::get('index_electronic_courses',[ElectronicCoursesController::class,'index']);

});

    Route::get('index_trainer',[TrainerController::class,'index']);
    Route::put('update_student/{uuid}',[StudentController::class,'update']);
    Route::delete('destore_student/{uuid}',[StudentController::class,'destore']);
    Route::post('store_university',[UniversityController::class,'store']);
    Route::put('update_university/{uuid}',[UniversityController::class,'update']);
    Route::delete('destore_university/{uuid}',[UniversityController::class,'destore']);
    Route::post('store_Specialization',[SpecializationController::class,'store']);
    Route::put('update_Specialization/{uuid}',[SpecializationController::class,'update']);
    Route::delete('destore_Specialization/{uuid}',[SpecializationController::class,'destore']);
    Route::get('index_Specialization',[SpecializationController::class,'index']);
    Route::post('store_education_record',[EducationRecordController::class,'store']);
    Route::put('update_education_record/{uuid}',[EducationRecordController::class,'update']);
    Route::delete('destore_education_record/{uuid}',[EducationRecordController::class,'destore']);
    Route::get('index_education_record',[EducationRecordController::class,'index']);
    Route::put('update_trainer/{uuid}',[TrainerController::class,'update']);
    Route::delete('destore_trainer/{uuid}',[TrainerController::class,'destore']);
    Route::post('store_track',[TrackController::class,'store']);
    Route::put('update_track/{uuid}',[TrackController::class,'update']);
    Route::delete('destore_track/{uuid}',[TrackController::class,'destore']);
    Route::post('store_track_session',[TrackSessionController::class,'store']);
    Route::put('update_track_session/{uuid}',[TrackSessionController::class,'update']);
    Route::delete('destore_track_session/{uuid}',[TrackSessionController::class,'destore']);
    Route::post('store_course',[CourseController::class,'store']);
    Route::put('update_course/{uuid}',[CourseController::class,'update']);
    Route::delete('destore_course/{uuid}',[CourseController::class,'destore']);
    Route::post('store_cretoficate',[CretoficateController::class,'store']);
    Route::put('update_cretoficate/{uuid}',[CretoficateController::class,'update']);
    Route::delete('destore_cretoficate/{uuid}',[CretoficateController::class,'destore']);
    Route::get('index_cretoficate',[CretoficateController::class,'index']);
    Route::put('update_user/{uuid}',[UserController::class,'update']);
    Route::delete('destore_user/{uuid}',[UserController::class,'destore']);
    Route::get('index_user',[UserController::class,'index']);

});


Route::get('searsh_user',[StudentController::class,'searsh']);




