<?php


use Illuminate\Support\Facades\Route;

//'namespace' => 'Admin'
Route::group(['middleware' => ['auth:web'], 'as' => 'admin.', 'prefix' => 'admin',], function () {
    Route::get('/home', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
    Route::resource('/contacts', App\Http\Controllers\Admin\ContactController::class);
    Route::resource('/blog', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('/post', \App\Http\Controllers\Admin\PostController::class);
//    Route::resource('/article', \App\Http\Controllers\Admin\ArticleController::class);

    Route::resource('/article', '\App\Http\Controllers\Admin\ArticleController', array('before' => 'hasAccess:article'));
    Route::get('/article/{id}/delete', array('as' => 'article.delete','uses' => '\App\Http\Controllers\Admin\ArticleController@confirmDestroy', ))->where('id', '\d+');
//    Route::get('/article', array('as' => 'dashboard.article', 'uses' => '\App\Http\Controllers\Admin\ArticleController@index'));
//    Route::get('/article/{slug}', array('as' => 'dashboard.article.show', 'uses' => '\App\Http\Controllers\Admin\ArticleController@show'));


    Route::resource('/interactive_services', \App\Http\Controllers\Admin\InteractiveServiceController::class);
    Route::resource('/interactive', \App\Http\Controllers\Admin\InteractiveController::class);

    /*        Route::get('/article', array('as' => 'dashboard.article', 'uses' => 'ArticleController@index'));
            Route::get('/article/{slug}', array('as' => 'dashboard.article.show', 'uses' => 'ArticleController@show'));*/
    Route::resource('/members', App\Http\Controllers\Admin\MemberController::class);
    Route::resource('/galereya', App\Http\Controllers\Admin\GalereyaController::class);
    Route::resource('/event', App\Http\Controllers\Admin\EventController::class);
    Route::resource('/page', App\Http\Controllers\Admin\PageController::class);
    Route::resource('/setting', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('/usefullink', App\Http\Controllers\Admin\UsefullinkController::class);
    Route::resource('/category', App\Http\Controllers\Admin\MemberController::class);


//        Route::group(['prefix'=>'menus'], function() {
    Route::post('menus/save', [App\Http\Controllers\Admin\MenuController::class, 'save'])->name('menus.save');
    Route::post('menus/{id}/toggle-publish', [App\Http\Controllers\Admin\MenuController::class, 'togglePublish'])->name('admin.menus.toggle-publish')->where('id', '[0-9]+');
    Route::resource('/menus', App\Http\Controllers\Admin\MenuController::class);
//        });

//        Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('login');
    Route::get('/register', [App\Http\Controllers\Admin\LoginController::class, 'register'])->name('register');
    Route::post('/register-user', [App\Http\Controllers\Admin\LoginController::class, 'store'])->name('create_user');
    Route::get('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => '/users', ['middleware' => 'can:manage_user']], function () {
        Route::get('/', [App\Http\Controllers\Admin\UsersController::class, 'index']);
        Route::get('get-list', [App\Http\Controllers\Admin\UsersController::class, 'getUserList'])->name('get-list');
        Route::get('/create', [App\Http\Controllers\Admin\UsersController::class, 'create']);
        Route::post('/create', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('create-user');
        Route::get('/user/{id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);
        Route::post('/update', [App\Http\Controllers\Admin\UsersController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\UsersController::class, 'delete']);
    });
//        'middleware' => 'can:manage_role|manage_user'
    Route::group(['prefix' => '/roles'], function () {
        Route::get('/', [App\Http\Controllers\Admin\RolesController::class, 'index']);
        Route::get('/get-list', [App\Http\Controllers\Admin\RolesController::class, 'getRoleList']);
        Route::post('/create', [App\Http\Controllers\Admin\RolesController::class, 'create']);
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\RolesController::class, 'edit']);
        Route::post('/update', [App\Http\Controllers\Admin\RolesController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\RolesController::class, 'delete']);
    });
//        ,'middleware' => 'can:manage_permission|manage_user'
    Route::group(['prefix' => '/permission'], function () {
        Route::get('/', [App\Http\Controllers\Admin\PermissionController::class, 'index']);
        Route::get('/get-list', [App\Http\Controllers\Admin\PermissionController::class, 'getPermissionList']);
        Route::post('/create', [App\Http\Controllers\Admin\PermissionController::class, 'create']);
        Route::get('/update', [App\Http\Controllers\Admin\PermissionController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\PermissionController::class, 'delete']);
    });


});

?>
