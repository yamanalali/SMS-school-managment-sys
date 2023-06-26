<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
use App\Http\Controllers\Setting;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;

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

/** for side bar menu active */
function set_active( $route ) {
    if( is_array( $route ) ){
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', function()
	{
		return View::make('auth.login');
	});

	Route::get('test',function(){
		return View::make('test');
	});







Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------login ------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('change/password', 'changePassword')->name('change/password');
});

// ----------------------------- register -------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
    Route::get('user/profile/page', 'userProfile')->middleware('auth')->name('user/profile/page');
    Route::get('teacher/dashboard', 'teacherDashboardIndex')->middleware('auth')->name('teacher/dashboard');
    Route::get('student/dashboard', 'studentDashboardIndex')->middleware('auth')->name('student/dashboard');
});

// ----------------------------- user controller -------------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('list/users', 'index')->middleware('auth')->name('list/users');
    Route::post('change/password', 'changePassword')->name('change/password');
    Route::get('view/user/edit/{id}', 'userView')->middleware('auth');
    Route::post('user/update', 'userUpdate')->name('user/update');
    Route::post('user/delete', 'userDelete')->name('user/delete');
});

// ------------------------ setting -------------------------------//
Route::controller(Setting::class)->group(function () {
    Route::get('setting/page', 'index')->middleware('auth')->name('setting/page');
});

// ------------------------ student -------------------------------//
Route::controller(StudentController::class)->group(function () {
    Route::get('student/list', 'student')->middleware('auth')->name('student/list'); // list student
    Route::get('student/grid', 'studentGrid')->middleware('auth')->name('student/grid'); // grid student
    Route::get('student/add/page', 'studentAdd')->middleware('auth')->name('student/add/page'); // page student
    Route::post('student/add/save', 'studentSave')->name('student/add/save'); // save record student
    Route::get('student/edit/{id}', 'studentEdit'); // view for edit
    Route::post('student/update', 'studentUpdate')->name('student/update'); // update record student
    Route::post('student/delete', 'studentDelete')->name('student/delete'); // delete record student
    Route::get('student/profile/{id}', 'studentProfile')->middleware('auth'); // profile student
});

// ------------------------ teacher -------------------------------//
Route::controller(TeacherController::class)->group(function () {
    Route::get('teacher/add/page', 'teacherAdd')->middleware('auth')->name('teacher/add/page'); // page teacher
    Route::get('teacher/list/page', 'teacherList')->middleware('auth')->name('teacher/list/page'); // page teacher
    Route::get('teacher/grid/page', 'teacherGrid')->middleware('auth')->name('teacher/grid/page'); // page grid teacher
    Route::post('teacher/save', 'saveRecord')->middleware('auth')->name('teacher/save'); // save record
    Route::get('teacher/edit/{id}', 'editRecord'); // view teacher record
    Route::post('teacher/update', 'updateRecordTeacher')->middleware('auth')->name('teacher/update'); // update record
    Route::post('teacher/delete', 'teacherDelete')->name('teacher/delete'); // delete record teacher
});

// ----------------------- department -----------------------------//
Route::controller(DepartmentController::class)->group(function () {
    Route::get('department/add/page', 'indexDepartment')->middleware('auth')->name('department/add/page'); // page add department
    Route::get('department/edit/page', 'editDepartment')->middleware('auth')->name('department/edit/page'); // page edit department
    Route::get('department/list/page', 'listDepartment')->middleware('auth')->name('department/list/page'); // page list department
    Route::get('department/edit/{id}', 'editDepartment')->middleware('auth')->name('department/edit/{id}'); // page edit department
    Route::post('department/update', 'updateRecordDepartment')->middleware('auth')->name('department/update'); // update record
    Route::post('department/save/page', 'saveRecord')->middleware('auth')->name('department/save/page'); // save record
    Route::post('department/delete', 'departmentDelete')->name('department/delete'); // delete record teacher


});




// ----------------------- Subject -----------------------------//
Route::controller(SubjectController::class)->group(function () {
    Route::get('subject/list', 'index')->middleware('auth')->name('subject.list');

   // Route::get('subject/list', 'index')->middleware('auth')->name('subject/list'); // list student
    Route::get('subject/add/page', 'create')->middleware('auth')->name('subject/add/page'); // page student
    Route::post('subject/store', 'store')->middleware('auth')->name('subject/store'); // page student
    Route::post('subject/add/save', 'subjectSave')->name('subject/add/save'); // save record student
    Route::get('subject/edit/{id}', 'edit'); // view for edit
    Route::get('subject/details/{id}', 'show')->middleware('auth')->name('subject/details');
    Route::post('subject/delete', 'subjectDelete')->name('subject/delete'); // delete record student
});
Route::controller(ExamController::class)->group(function () {
    Route::get('exam/add/page', 'create')->middleware('auth')->name('exam/add/page'); // page add department
    Route::get('exam/edit/page', 'editDepartment')->middleware('auth')->name('exam/edit/page'); // page edit department
    Route::get('exam/list', 'index')->middleware('auth')->name('exam/list'); // page list department
    Route::get('exam/edit/{id}', 'editDepartment')->middleware('auth')->name('exam/edit/{id}'); // page edit department
    Route::post('exam/update', 'updateRecordDepartment')->middleware('auth')->name('exam/update'); // update record
    Route::post('exam/save/page', 'store')->middleware('auth')->name('exam/save/page'); // save record
    Route::post('exam/delete', 'departmentDelete')->middleware('auth')->name('exam/delete'); // delete record teacher

});


});