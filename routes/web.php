<?php

use App\Http\Controllers\CashFlowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FeatureServiceController;
use App\Http\Controllers\BusinessController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use Illuminate\Support\Facades\Log;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';
//    Route::get('/{any}', function () {
//        return view('login');
//    })->where('any', '.*');

// Resource routes for managing permissions


Route::get('categories/{category}/subcategories', [CategoryController::class, 'getSubcategories'])
    ->name('categories.subcategories');
    //admin routes
    Route::group(['middleware' => ['auth']], function () {
        Route::resource('permissions', PermissionController::class)->names([
            'index' => 'permissions.index',
            'create' => 'permissions.create',
            'store' => 'permissions.store',
            'show' => 'permissions.show',
            'edit' => 'permissions.edit', // This line is important for generating the edit route
            'update' => 'permissions.update',
            'destroy' => 'permissions.destroy',
        ]);

        Route::resource('categories', CategoryController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('feature-services', FeatureServiceController::class);
        Route::resource('users', RegisteredUserController::class);



    });


Route::resource('customers', CustomerController::class)->middleware('auth');
Route::resource('cash-flows', CashFlowController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('sales', SalesController::class)->middleware('auth');
Route::resource('suppliers', SupplierController::class)->middleware('auth');
Route::post('/upload-media', [UploadController::class, 'upload'])->name('upload-media');
Route::delete('/delete-media/{media}', [UploadController::class, 'delete'])->name('delete-media');
Route::resource('/users', RegisteredUserController::class)->middleware('auth');
// Route::delete('/users/{id}/destroy', [RegisteredUserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
// Route::get('/users/{id}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit')->middleware('auth');
// Route::put('/users/{id}/update', [RegisteredUserController::class, 'update'])->name('users.update')->middleware('auth');

//// Define specific routes for data retrieval
Route::prefix('/api/')->group(function () {
    Route::get('customers', [CustomerController::class, 'indexJson'])->name('api.customers.index');
    Route::get('suppliers', [SupplierController::class, 'indexJson'])->name('api.suppliers.index');
    Route::get('cash-flows', [CashFlowController::class, 'indexJson'])->name('api.cash-flows.index');
    Route::get('products', [ProductController::class, 'indexJson'])->name('api.products.index');

    // Add more API routes as needed
});

Route::get('/admin/login', fn () => redirect('/login'));


Route::get('/home', fn () => view('index'))->name('home')->middleware('auth');
Route::get('/charts', fn () => view('charts'))->name('charts');
Route::get('/apps/calendar', fn () => view('apps.calender'))->name('apps.calendar');
Route::get('/apps/tickets', fn () => view('apps.tickets'))->name('apps.tickets');
Route::get('/apps/file-manager', fn () => view('apps.file-manager'))->name('apps.file-manager');
Route::get('/apps/kanban', fn () => view('apps.kanban'))->name('apps.kanban');
Route::get('/project/list', fn () => view('project.list'))->name('project.list');
Route::get('/project/detail', fn () => view('project.detail'))->name('project.detail');
Route::get('/project/create', fn () => view('project.create'))->name('project.create');
Route::get('/auth/login', fn () => view('auth.login'))->name('auth.login');
Route::get('/auth/register/step1', [RegisteredUserController::class, 'showStep1'])->name('register.step1');
Route::post('/auth/register/step1', [RegisteredUserController::class, 'postStep1'])->name('register.step1.post');

Route::get('/auth/register/step2', [RegisteredUserController::class, 'showStep2'])->name('register.step2');
Route::post('/auth/register/step2', [RegisteredUserController::class, 'postStep2'])->name('register.step2.post');

// Route::get('/auth/register', fn() => view('auth.register'))->name('auth.register');
Route::get('/auth/auth.recoverpw', fn () => view('auth.recoverpw'))->name('auth.recoverpw');
Route::get('/auth/lock-screen', fn () => view('auth.lock-screen'))->name('auth.lock-screen');
Route::get('/pages/starter', fn () => view('pages.starter'))->name('pages.starter');
Route::get('/pages/timeline', fn () => view('pages.timeline'))->name('pages.timeline');
Route::get('/pages/invoice', fn () => view('pages.invoice'))->name('pages.invoice');
Route::get('/pages/gallery', fn () => view('pages.gallery'))->name('pages.gallery');
Route::get('/pages/faqs', fn () => view('pages.faqs'))->name('pages.faqs');
Route::get('/pages/pricing', fn () => view('pages.pricing'))->name('pages.pricing');
Route::get('/pages/maintenance', fn () => view('pages.maintenance'))->name('pages.maintenance');
Route::get('/pages/coming-soon', fn () => view('pages.coming-soon'))->name('pages.coming-soon');
Route::get('/pages/404', fn () => view('pages.404'))->name('pages.404');
Route::get('/pages/404-alt', fn () => view('pages.404-alt'))->name('pages.404-alt');
Route::get('/pages/500', fn () => view('pages.500'))->name('pages.500');
Route::get('/layouts-eg/hover-view', fn () => view('layouts-eg.hover-view'))->name('layouts-eg.hover-view');
Route::get('/layouts-eg/icon-view', fn () => view('layouts-eg.icon-view'))->name('layouts-eg.icon-view');
Route::get('/layouts-eg/compact-view', fn () => view('layouts-eg.compact-view'))->name('layouts-eg.compact-view');
Route::get('/layouts-eg/mobile-view', fn () => view('layouts-eg.mobile-view'))->name('layouts-eg.mobile-view');
Route::get('/layouts-eg/hidden-view', fn () => view('layouts-eg.hidden-view'))->name('layouts-eg.hidden-view');
Route::get('/ui/accordions', fn () => view('ui.accordions'))->name('ui.accordions');
Route::get('/ui/alerts', fn () => view('ui.alerts'))->name('ui.alerts');
Route::get('/ui/avatars', fn () => view('ui.avatars'))->name('ui.avatars');
Route::get('/ui/buttons', fn () => view('ui.buttons'))->name('ui.buttons');
Route::get('/ui/badges', fn () => view('ui.badges'))->name('ui.badges');
Route::get('/ui/breadcrumbs', fn () => view('ui.badges'))->name('ui.breadcrumbs');
Route::get('/ui/cards', fn () => view('ui.cards'))->name('ui.cards');
Route::get('/ui/collapse', fn () => view('ui.collapse'))->name('ui.collapse');
Route::get('/ui/dismissible', fn () => view('ui.dismissible'))->name('ui.dismissible');
Route::get('/ui/dropdowns', fn () => view('ui.dropdowns'))->name('ui.dropdowns');
Route::get('/ui/progress', fn () => view('ui.progress'))->name('ui.progress');
Route::get('/ui/skeleton', fn () => view('ui.skeleton'))->name('ui.skeleton');
Route::get('/ui/spinners', fn () => view('ui.spinners'))->name('ui.spinners');
Route::get('/ui/list-group', fn () => view('ui.list-group'))->name('ui.list-group');
Route::get('/ui/ratio', fn () => view('ui.ratio'))->name('ui.ratio');
Route::get('/ui/tabs', fn () => view('ui.tabs'))->name('ui.tabs');
Route::get('/ui/modals', fn () => view('ui.modals'))->name('ui.modals');
Route::get('/ui/offcanvas', fn () => view('ui.offcanvas'))->name('ui.offcanvas');
Route::get('/ui/popovers', fn () => view('ui.popovers'))->name('ui.popovers');
Route::get('/ui/tooltips', fn () => view('ui.tooltips'))->name('ui.tooltips');
Route::get('/ui/typography', fn () => view('ui.typography'))->name('ui.typography');
Route::get('/extended/swiper', fn () => view('extended.swiper'))->name('extended.swiper');
Route::get('/extended/nestable', fn () => view('extended.nestable'))->name('extended.nestable');
Route::get('/extended/ratings', fn () => view('extended.ratings'))->name('extended.ratings');
Route::get('/extended/animation', fn () => view('extended.animation'))->name('extended.animation');
Route::get('/extended/player', fn () => view('extended.player'))->name('extended.player');
Route::get('/extended/scrollbar', fn () => view('extended.scrollbar'))->name('extended.scrollbar');
Route::get('/extended/sweet-alert', fn () => view('extended.sweet-alert'))->name('extended.sweet-alert');
Route::get('/extended/tour', fn () => view('extended.tour'))->name('extended.tour');
Route::get('/extended/tippy-tooltips', fn () => view('extended.tippy-tooltips'))->name('extended.tippy-tooltips');
Route::get('/extended/lightbox', fn () => view('extended.lightbox'))->name('extended.lightbox');
Route::get('/forms/elements', fn () => view('forms.elements'))->name('forms.elements');
Route::get('/forms/select', fn () => view('forms.select'))->name('forms.select');
Route::get('/forms/range', fn () => view('forms.range'))->name('forms.range');
Route::get('/forms/pickers', fn () => view('forms.pickers'))->name('forms.pickers');
Route::get('/forms/masks', fn () => view('forms.masks'))->name('forms.masks');
Route::get('/forms/editor', fn () => view('forms.editor'))->name('forms.editor');
Route::get('/forms/file-uploads', fn () => view('forms.file-uploads'))->name('forms.file-uploads');
Route::get('/forms/validation', fn () => view('forms.validation'))->name('forms.validation');
Route::get('/forms/layout', fn () => view('forms.layout'))->name('forms.layout');
Route::get('/tables/basic', fn () => view('tables.basic'))->name('tables.basic');
Route::get('/tables/datatables', fn () => view('tables.datatables'))->name('tables.datatables');
Route::get('/icons/mingcute', fn () => view('icons.mingcute'))->name('icons.mingcute');
Route::get('/icons/feather', fn () => view('icons.feather'))->name('icons.feather');
Route::get('/icons/material-symbols', fn () => view('icons.material-symbols'))->name('icons.material-symbols');
Route::get('/maps/google', fn () => view('maps.google'))->name('maps.google');

// Your other routes
//Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
//    Route::get('', [RoutingController::class, 'index'])->name('root');
//    Route::get('/home', fn() => view('index'))->name('home');
//    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
//    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
//    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
//});


Route::get('/', function () {
    return view('front.home');
});
// Route::get('/login', function () {
//     return view('front.login');
//});
Route::get('/register', function () {
    return view('front.register');
});
Route::get('/register-next', function () {
    return view('front.registerNext');
});
// Route::get('/forgot-password', function () {
//     return view('front.forgotPassword');
// });
Route::get('/add-business', [BusinessController::class, 'create'])->name('business.create');
Route::post('/add-business', [BusinessController::class, 'store'])->name('business.store');
Route::get('/business/{id}', [BusinessController::class, 'show'])->name('business.show')->middleware('auth');
Route::get('/business', [BusinessController::class, 'index'])->name('business.index')->middleware('auth');

Route::get('/show_business', function () {
    return view('front.add-property');
});
// Route::get('/services', function () {
//     return view('front.services');
// });
Route::get('/contact', function () {
    return view('front.contact-us');
});

Route::get('/price', function () {
    return view('front.price');
});



Route::get('/blogs', function () {
    return view('front.blog');
});

//Route::get('/getCategories', [CategoryController::class, 'getCategories']);



Route::get('/test-permissions', function () {
    $user = User::find(1); // Replace with the ID of the user you want to test
    
    // Check the user's roles and permissions
    $roles = $user->getRoleNames(); // Get all roles
    $permissions = $user->getAllPermissions(); // Get all permissions

    return response()->json([
        'roles' => $roles,
        'permissions' => $permissions,
    ]);
});
