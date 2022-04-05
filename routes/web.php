<?php

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
    return view('index');
});
// Route::get('/{id}', function () {
//     return view('welcome');
// });
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::view('students', 'students.index')->name('students.index');
    Route::view('studentsubjects', 'students.subjects')->name('student.subjects');
    Route::view('subjects', 'subjects.index')->name('subjects.index');
    Route::view('grades', 'grades.index')->name('grades.index');
    Route::view('marks', 'marks.index')->name('marks.index');
    Route::view('results', 'results.studentList')->name('results.studentList');
    Route::view('class', 'class.index')->name('class.index');
    Route::view('term', 'class.term')->name('term');
    Route::view('teachers', 'teacher.index')->name('teachers.index');
    Route::view('subject_commment', 'subject_commment')->name('sub');



    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'HomeController@logout')->name('logout');
    // loggin student
    Route::get('/dashboard', 'StudentController@dashboard')->name('student.dashboard');
    Route::get('/teacher', 'TeacherController@dashboard')->name('teacher.dashboard');
    Route::get('hschool_students', 'StudentController@hschool')->name('hschool');
    Route::get('eschool_students', 'StudentController@eschool')->name('eschool');
    Route::get('yschool_students', 'StudentController@yschool')->name('yschool');
    Route::get('jhschool_students', 'StudentController@jhschool')->name('jhschool');
    //  Get Broad Sheet Ready
    Route::get('summative_test/{term}/class/{class}', 'StudentController@summative')->name('summative');

    Route::get('summative_test1/{term}/class/{class}', 'StudentController@summative_1')->name('summative1');
    Route::get('exam/{term}/class/{class}', 'StudentController@exam')->name('exam');
    Route::get('cat1s/{term}/class/{class}', 'StudentController@cat1s')->name('cat1s');
    Route::get('cat2s/{term}/class/{class}', 'StudentController@cat2s')->name('cat2s');
    Route::get('msc_sheet/{term}/class/{class}', 'StudentController@msc')->name('msc');
    Route::get('grand_total/{term}/class/{class}', 'StudentController@grandTotal')->name('gt');
    Route::get('tca/{term}/class/{class}', 'StudentController@tca')->name('tca');
    Route::get('stud_in_class', 'TeacherController@sub_class')->name('stud_in_class');

    Route::get('summative/stud/{student}/term/{term}/class/{class}', 'StudentController@summative_sheet')->name('sum');
    // route to summaive_test 1 and 2
    Route::get('summative1/stud/{student}/term/{term}/class/{class}', 'StudentController@summative_sheet1')->name('sum1');

    Route::get('cat/stud/{student}/term/{term}/class/{class}', 'StudentController@cat1')->name('cat1');
    Route::get('cat2/stud/{student}/term/{term}/class/{class}', 'StudentController@cat2')->name('cat2');
    // Route::get('msc/stud/{student}/term/{term}/class/{class}','StudentController@msc')->name('msc');
    Route::get('result/stud/{student}/term/{term}/class/{class}', 'StudentController@result_sheet')->name('result');
    Route::get('class_teacher/{teacher}', 'TeacherController@classt')->name('classt');
    // Route::view('high_sch', 'results.h_result')->name('res');
    Route::get('download_summative/{student}/term/{term}/class/{class}', 'StudentController@download_summative')->name('ds');
    Route::get('download_cat1/{student}/term/{term}/class/{class}', 'StudentController@download_cat1')->name('dcat1');
    Route::get('download_cat2/{student}/term/{term}/class/{class}', 'StudentController@download_cat2')->name('dcat2');
    
    Route::get('download_result/{student}/term/{term}/class/{class}', 'StudentController@download_result')->name('dr');
    // because of class teachers oooo
    Route::get('ct_summative_test/{term}/class/{class}', 'StudentController@summative_ct')->name('summative_ct');

    Route::get('ct_summative_test1/{term}/class/{class}', 'StudentController@summative1_ct')->name('summative_ct1');
    Route::get('ct_exam/{term}/class/{class}', 'StudentController@exam_ct')->name('exam_ct');
    Route::get('ct_cat1s/{term}/class/{class}', 'StudentController@cat1s_ct')->name('cat1s_ct');
    Route::get('ct_cat2s/{term}/class/{class}', 'StudentController@cat2s_ct')->name('cat2s_ct');
    Route::get('ct_msc_sheet/{term}/class/{class}', 'StudentController@msc_ct')->name('msc_ct');
    Route::get('ct_grand_total/{term}/class/{class}', 'StudentController@grandTotal_ct')->name('gt_ct');
    Route::get('ct_tca/{term}/class/{class}', 'StudentController@tca_ct')->name('tca_ct');
    //  students individual result
    Route::get('ct_summative/stud/{student}/term/{term}/class/{class}', 'StudentController@summative_sheet_ct')->name('sum_ct');
    Route::get('ct_summative1/stud/{student}/term/{term}/class/{class}', 'StudentController@summative_sheet1_ct')->name('sum_ct1');
    Route::get('ct_cat/stud/{student}/term/{term}/class/{class}', 'StudentController@cat1_ct')->name('cat1_ct');
    Route::get('ct_cat2/stud/{student}/term/{term}/class/{class}', 'StudentController@cat2_ct')->name('cat2_ct');
    // Route::get('msc/stud/{student}/term/{term}/class/{class}','StudentController@msc')->name('msc');
    Route::get('ct_result/stud/{student}/term/{term}/class/{class}', 'StudentController@result_sheet_ct')->name('result_ct');
// Download All broad sheet
    Route::get('download_summative_test/{term}/class/{class}', 'StudentController@download_summative_sheet')->name('dsum');
    Route::get('download_summative_test2/{term}/class/{class}', 'StudentController@download_summative_sheet2')->name('dsum2');
    Route::get('download_cat1_broadsheet/term/{term}/class/{class}', 'StudentController@download_cat1_broadsheet')->name('dcat1_bs');
    Route::get('download_cat2_broadsheet/term/{term}/class/{class}', 'StudentController@download_cat2_broadsheet')->name('dcat2_bs');
    Route::get('download_exambroadsheet/term/{term}/class/{class}', 'StudentController@download_exambroadsheet')->name('dexam_bs');
    Route::get('download_GTbroadsheet/term/{term}/class/{class}', 'StudentController@download_GTbroadsheet')->name('dGT_bs');
    // Alll broadsheet 
    Route::get('cordinators_braodsheet/{teacher}', 'TeacherController@allbroadsheet')->name('broad');
    Route::get('finds_braodsheet/', 'TeacherController@allbroadsheet2')->name('broad2');

    Route::post('allbroadsheet', 'StudentController@allbroadsheet')->name('class_broad');
    Route::post('admin_allbroadsheet2', 'StudentController@broadsheet2')->name('class_broad2');
    Route::post('class_student', 'StudentController@class_student')->name('class_student');
    Route::post('import_student', 'StudentController@import_student')->name('import_student');
    Route::get('unlock_all_studensh', 'StudentController@unlockallh')->name('unlockh');
    Route::get('lock_all_studensh', 'StudentController@lockallh')->name('lockh');

    Route::get('unlock_all_studensy', 'StudentController@unlockally')->name('unlocky');
    Route::get('lock_all_studensy', 'StudentController@lockally')->name('locky');

    Route::get('unlock_all_studense', 'StudentController@unlockalle')->name('unlocke');
    Route::get('lock_all_studense', 'StudentController@lockalle')->name('locke');

    Route::get('no_result_yet', 'StudentController@no_result')->name('no_result');
    Route::get('individual_result', 'StudentController@i')->name('ind');
    Route::get('import_students', 'StudentController@import_')->name('import');
    // increase subject point

    Route::post('subject_point', 'StudentController@subject_point')->name('subject_point');
    Route::get('sub_point', 'StudentController@sub_point')->name('sub_point');
    //  comments
    Route::post('check_comments', 'StudentController@fetch_comment')->name('FC');
    Route::get('view_comments', 'StudentController@comments')->name('VC');
    Route::get('download_comment/{class}/term/{term}', 'StudentController@DC')->name('DC');
    // Alll broadsheet 
    Route::get('download_broadsheet/{class}/term/{term}', 'StudentController@DBGT')->name('DGT');
    //  Assignments
    Route::get('add-assignemnt', 'TeacherController@assignment')->name('ASS');
    Route::post('post-assignemnt', 'TeacherController@postAssignment')->name('ASSG');
    Route::get('get-my-assignemnt', 'TeacherController@myAssignments')->name('MA');
    Route::post('update-assignment/{id}', 'TeacherController@updateASSG')->name('updateASSG');
    Route::get('student-assignemnt','TeacherController@studentASS')->name('studAss');
    Route::post('student-assignemnt-fetch', 'TeacherController@viewAss')->name('VA');
    Route::get('download-assignemnt/{id}','TeacherController@downloadAss')->name('DA');
    Route::get('show-assignemnt/{id}', 'TeacherController@assSingle')->name('show');
    Route::get('admin-view', 'TeacherController@adminAss')->name('adm');
    Route::get('delete-assignment/{id}','TeacherController@destroyAss')->name('destroyAss');

 Route::get('user-details-login','StudentController@userDetails')->name('USD');
 Route::get('/comment_bank','StudentController@commentBank')->name('ComB');
 
  Route::get('/ue','StudentController@updateExam');
  Route::get('/reset-subject','StudentController@resetScore')->name('resetScore');

 
});