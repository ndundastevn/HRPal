<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PersonalinfoController;
use App\Http\Controllers\ContactinfoController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\KinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UserController;
use App\Models\Application as ModelsApplication;
use App\Models\Contactinfo;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Experience;
use App\Models\Job;
use App\Models\Kin;
use App\Models\Personalinfo;
use App\Models\Referee;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Career', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/hdashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('hdashboard');

// dashboard
Route::get('/dashboard', function () {
    $id = Auth::User()->id;
    $application = ModelsApplication::where('user_id', $id)->first();
    //dd($application);
    if(!empty($application)){
        $applied_job = $application;
    }else{
        $applied_job = '';
    }
    return Inertia::render('Portal/Dashboard', [
        'jobs' => Job::get(),
        'applied_job' => $applied_job,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
// summary
Route::get('/summary', [SummaryController::class, 'index'])->middleware(['auth', 'verified'])->name('summary');
//about
Route::get('/about', function () {
    return Inertia::render('About');
})->middleware(['auth', 'verified'])->name('about');

Route::get('/home', function () {
    return Inertia::render('Crs/Home');
})->middleware(['auth', 'verified'])->name('home');

//job portal
Route::get('/apply', [ApplicationController::class, 'home'])->middleware(['auth', 'verified'])->name('apply');
//personal info
Route::get('/personal', function () {
    return Inertia::render('Portal/Personal', [
        'info' => Personalinfo::where('user_id', Auth::User()->id)->first()
    ]);
})->middleware(['auth', 'verified'])->name('personal');

//contact info
Route::get('/contact', function () {
    return Inertia::render('Portal/Contact', [
        'email' => Auth::User()->email,
        'contact' => Contactinfo::where('user_id', Auth::User()->id)->first(),
    ]);
})->middleware(['auth', 'verified'])->name('contact');
//education
Route::get('/education', function () {
    return Inertia::render('Portal/Education',[
        'educations' => Education::where('user_id', Auth::User()->id)->get()
    ]);
})->middleware(['auth', 'verified'])->name('education');
//update
Route::put('education/{education}', [EducationController::class, 'update'])
		->name('education.update')
		->middleware('auth');
//employment
Route::get('/employment', function () {
    return Inertia::render('Portal/Employment', [
        'data' => Employment::where('user_id', Auth::User()->id)->first()
    ]);
})->middleware(['auth', 'verified'])->name('employment');
//work history
Route::get('/history', function () {
    return Inertia::render('Portal/History', [
        'datas' => Experience::where('user_id', Auth::User()->id)->get()
    ]);
})->middleware(['auth', 'verified'])->name('history');

//kin
Route::get('/kin', function () {
    return Inertia::render('Portal/Kin', [
        'kin' => Kin::where('user_id', Auth::User()->id)->first(),
    ]);
})->middleware(['auth', 'verified'])->name('kin');

//referee
Route::get('/referee', function () {
    return Inertia::render('Portal/Referee', [
        'referees' => Referee::where('user_id', Auth::User()->id)->get()
    ]
);
})->middleware(['auth', 'verified'])->name('referee');

//save personal info data
Route::post('/personalinfosave', [PersonalinfoController::class, 'store'])->name('personalinfosave');
//save contact info data
Route::post('/contactsave', [ContactinfoController::class, 'store'])->name('contactsave');
//save kin info data
Route::post('/kinsave', [KinController::class, 'store'])->name('kin.save');
//save education info data
Route::post('/edusave', [EducationController::class, 'store'])->name('edusave');
//edit education info data
Route::patch('/education/edit', [EducationController::class, 'update'])->name('education.edit');
//delete education info data
Route::delete('/education/{education}', [EducationController::class, 'destroy'])->name('education.destroy');
//save employment info data
Route::post('/empsave', [EmploymentController::class, 'store'])->name('empsave');
//save referee info data
Route::post('/refereesave', [RefereeController::class, 'store'])->name('refereesave');
//save experince info data
Route::post('/historysave', [ExperienceController::class, 'store'])->name('historysave');
//save Application
Route::post('/apply/save', [ApplicationController::class, 'store'])->name('apply.save');
//edit history
Route::patch('/history/update', [ExperienceController::class, 'update'])->name('history.update');
//edit referee
Route::patch('/referee/update', [RefereeController::class, 'update'])->name('referee.update');
//delete experince info data
Route::delete('/historydelete/{id}', [ExperienceController::class, 'destroy'])->name('history.delete');
//delete referee
Route::delete('/refereedelete/{id}', [RefereeController::class, 'destroy'])->name('referee.delete');

Route::get('/application', function () {
    return Inertia::render('Crs/Applications');
})->middleware(['auth', 'verified'])->name('application');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Page
Route::resource('Admin/Users', UserController::class);

Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->middleware(['auth', 'verified'])->name('admin/dashboard');

//return jobs available to AdminLayout
Route::get('admin/get/jobs', function () {
    $jobs = Job::get();
    return $jobs;
})->middleware(['auth', 'verified'])->name('get.jobs');

// user
Route::get('/admin/user', [AdminUserController::class, 'index'])->middleware(['auth', 'verified'])->name('admin/user');
Route::post('/usersave', [AdminUserController::class, 'store'])->name('usersave');
Route::patch('/user/update', [AdminUserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [AdminUserController::class, 'destroy'])->name('user.destroy');

//job route list
use App\Http\Controllers\Admin\JobController;
Route::get('/admin/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

require __DIR__.'/auth.php';
//post route list
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//product route list
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::patch('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
