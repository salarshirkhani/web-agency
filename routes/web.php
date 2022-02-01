<?php


use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
        Route::get('',  'IndexController@get')->name('index');

        Route::prefix('admin')
            ->name('admin.')
            ->middleware(['user_type:admin'])
            ->namespace('Admin')
            ->group(function() {
                Route::get('',  'IndexController@get')->name('index');
                
                //PRODUCT CONTROLLER
                Route::post('product/create', ['uses' => 'ProductController@CreatePost','as' => 'product.create' ]);
                Route::get('product/create', ['uses' => 'ProductController@GetCreatePost','as' => 'product.create']); 
                Route::get('product/manage', 'ProductController@GetManagePost')->name('product.manage');
                Route::get('deleteproduct/{id}','ProductController@DeletePost')->name('product.deleteproduct');  
                Route::get('updateproduct/{id}','ProductController@GetEditPost')->name('product.updateproduct');
                Route::post('updateproduct/{id}','ProductController@UpdatePost')->name('product.updateproduct');      
                
                //License CONTROLLER
                Route::post('license/create', ['uses' => 'LicenseController@CreatePost','as' => 'license.create' ]);
                Route::get('license/create', ['uses' => 'LicenseController@GetCreatePost','as' => 'license.create']); 
                Route::get('license/manage', 'LicenseController@GetManagePost')->name('license.manage');
                Route::get('deletelicense/{id}','LicenseController@DeletePost')->name('license.deletelicense');  
                Route::get('updatelicense/{id}','LicenseController@GetEditPost')->name('license.updatelicense');
                Route::post('updatelicense/{id}','LicenseController@UpdatePost')->name('license.updatelicense');      
                
                //PANELS CONTROLLER
                Route::post('panel/create', ['uses' => 'PanelController@CreatePost','as' => 'panel.create' ]);
                Route::get('panel/create', ['uses' => 'PanelController@GetCreatePost','as' => 'panel.create']); 
                Route::get('panel/manage', 'PanelController@GetManagePost')->name('panel.manage');
                Route::get('deletepanel/{id}','PanelController@DeletePost')->name('panel.deletepanel');  
                Route::get('updatepanel/{id}','PanelController@GetEditPost')->name('panel.updatepanel');
                Route::post('updatepanel/{id}','PanelController@UpdatePost')->name('panel.updatepanel');      
                

            });
           
        Route::prefix('customer')
            ->name('customer.')
            ->middleware(['user_type:customer'])
            ->namespace('Customer')
            ->group(function() {
                Route::get('',  'IndexController@get')->name('index');
                //License CONTROLLER
                Route::post('license/create', ['uses' => 'IndexController@CreatePost','as' => 'license.create' ]);
                Route::get('license/create', ['uses' => 'IndexController@GetCreatePost','as' => 'license.create']); 
                Route::get('license/manage', 'IndexController@GetManagePost')->name('license.manage');


            });
        

});
