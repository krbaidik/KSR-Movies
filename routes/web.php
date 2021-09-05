<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendHomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\NoticeController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\CourseTypeController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\CompanyProfileController;

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

Auth::routes();

Route::get('/', [FrontendHomeController::class, 'index'])->name('index');
Route::get('/services', [FrontendHomeController::class, 'service'])->name('frontend.service');
Route::get('/services/{slug}', [FrontendHomeController::class, 'serviceDetail'])->name('frontend.servicedetail');

Route::get('/projects', [FrontendHomeController::class, 'project'])->name('frontend.project');
Route::get('/projects/{slug}', [FrontendHomeController::class, 'projectDetail'])->name('frontend.projectdetail');
Route::get('/upcoming-projects', [FrontendHomeController::class, 'upcomingProject'])->name('frontend.upcoming_project');

Route::get('/courses', [FrontendHomeController::class, 'course'])->name('frontend.course');
Route::get('/course/{id}', [FrontendHomeController::class, 'courseType'])->name('frontend.course_type');
Route::get('/courses/{slug}', [FrontendHomeController::class, 'courseDetail'])->name('frontend.coursedetail');

Route::get('/notice', [FrontendHomeController::class, 'notice'])->name('frontend.notice');
Route::get('/notice/{slug}', [FrontendHomeController::class, 'noticeDetail'])->name('frontend.noticedetail');   

Route::get('/youtube-videos', [FrontendHomeController::class, 'youtubeVideo']);

Route::post('/msgsubmit', [FrontendHomeController::class, 'msgSubmit']);


Route::group(['middleware'=>['auth']],
    function () {

		Route::get('/backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');

        Route::get('backend/error/{code}', ['as' => 'backend.error', 'uses' => 'Backend\DashboardController@error']);

        // user route
        Route::get('/backend/users', [UserController::class, 'index'])->name('backend.users.index');
        Route::get('/backend/users/create', [UserController::class, 'create'])->name('backend.users.create');
        Route::post('/backend/users/store', [UserController::class, 'store'])->name('backend.users.store');
        Route::get('/backend/user/{id}/edit', [UserController::class, 'edit'])->name('backend.users.edit');
        Route::put('/backend/user/{id}/update', [UserController::class, 'update'])->name('backend.users.update');
        Route::get('/backend/user/{id}/destroy', [UserController::class, 'destroy'])->name('backend.users.destroy');

        // Company Profile
        Route::resource('backend/company-profile', CompanyProfileController::class)->names('backend.company_profile');

        
        //project route

        Route::resource('backend/projects', ProjectController::class)->names('backend.projects');
        Route::post('/ckeditor/image_upload', [ProjectController::class,'ckupload'])->name('projects.ckupload');

        // service route
        Route::resource('backend/services', ServiceController::class)->names('backend.services');
        Route::post('/ckeditor/service_image_upload', [ServiceController::class,'ckupload'])->name('services.ckupload');

        // team route
        Route::resource('backend/teams', TeamController::class)->names('backend.teams');

        // slider route
        Route::resource('backend/sliders', SliderController::class)->names('backend.sliders');

        // course route
        Route::resource('backend/courses', CourseController::class)->names('backend.courses');
        Route::post('/ckeditor/course_image_upload', [CourseController::class,'ckupload'])->name('courses.ckupload');

        // video route
        Route::resource('backend/videos', VideoController::class)->names('backend.videos');

        // notice route
        Route::resource('backend/notices', NoticeController::class)->names('backend.notices');
        Route::post('/ckeditor/notice_image_upload', [NoticeController::class,'ckupload'])->name('notices.ckupload');

        // course-type route
        Route::resource('backend/course-type', CourseTypeController::class)->names('backend.course_type');

        // messages
        Route::get('backend/messages',[UserController::class,'getMessages']);
        Route::get('/delmsg/{id}',[UserController::class,'delMsg'])->name('backend.message.destroy');
    });
