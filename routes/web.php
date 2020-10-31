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
    return view('welcome');
});

Route::get('auth/logout', function () {
    Auth::logout();
    return back();
})->name('auth.logout');

Route::prefix('stores')->group(function () {
    Route::get('/', 'Store\StoreController@fc_')->name('stores');
    Route::prefix('add')->group(function () {
        Route::get('/', 'Store\StoreController@fc_')->name('stores.add');
        Route::post('/', 'Store\StoreController@add')->name('stores.add.request');
    });
    Route::prefix('{id}')->group(function () {
        Route::get('update', 'Store\StoreController@fc_')->name('stores.update');
        Route::post('update', 'Store\StoreController@update')->name('stores.update.request');
    });
});

Route::prefix('wholesalers')->group(function () {

    Route::get('/', function () {
        return view('wholesaler\wholesalers');
    })->name('wholesalers');

    Route::prefix('add')->group(function () {
        Route::get('/', 'Wholesaler\WholesalerController@addPage')->name('wholesalers.add');
        Route::post('/', 'Wholesaler\WholesalerController@add')->name('wholesalers.add.request');
    });
    Route::prefix('{id}')->group(function () {
        Route::get('update', 'Wholesaler\WholesalerController@updatePage')->name('wholesalers.update');
        Route::post('update', 'Wholesaler\WholesalerController@update')->name('wholesalers.update.request');
        Route::get('delete', 'Wholesaler\WholesalerController@delete')->name('wholesalers.delete.request');

        Route::prefix('products')->group(function () {
            Route::get('/', 'Wholesaler\WholesalerController@allProductsPage')->name('wholesalers.products');
            Route::get('add', 'Wholesaler\WholesalerController@addProductPage')->name('wholesalers.add.products');
            Route::post('add', 'Wholesaler\WholesalerController@addProduct')->name('wholesalers.add.products.request');
            Route::prefix('{pid}')->group(function () {
                Route::get('delete', 'Wholesaler\WholesalerController@deleteProduct')
                    ->name('wholesalers.delete.products.request');
                Route::prefix('image')->group(function () {
                    Route::get('/', 'Wholesaler\WholesalerController@deleteProduct')
                        ->name('wholesalers.delete.products.request');
                });
            });
        });
    });

});

Route::prefix('cpanel')->group(function () {
    
    Route::get('/', function () {
        return view('cpanel.home');
    })->name('cpanel.home');

    Route::prefix('s')->group(function () {

        Route::get('/', function () {
           return view('cpanel.store.home');
        })->name('cpanel.store.home');

        Route::get('/wholesalers', function () {
            return view('cpanel.store.wholesalers');
        })->name('cpanel.store.wholesalers');

        Route::get('/wholesalers/add', function () {
            return view('cpanel.store.add-wholesaler');
        })->name('cpanel.store.wholesalers.add');

        Route::get('/products', function () {
            return view('cpanel.store.products');
        })->name('cpanel.store.products');

        Route::get('/products/add', function () {
            return view('cpanel.store.add-products');
        })->name('cpanel.store.products.add');

        Route::get('/orders', function () {
            return view('cpanel.store.orders');
        })->name('cpanel.store.orders');

        Route::get('/orders/{id}/view', function ($id) {
            return view('cpanel.store.view-order', ['id'=>$id]);
        })->name('cpanel.store.orders.view');

        Route::get('/settings', function () {
            return view('cpanel.store.settings');
        })->name('cpanel.store.settings');

    });

    Route::prefix('w')->group(function () {
        
        Route::get('/', function () {
            return view('cpanel.wholesaler.home');
        })->name('cpanel.wholesaler.home');
        
        Route::get('/stores', function () {
            return view('cpanel.wholesaler.stores');
        })->name('cpanel.wholesaler.stores');

        Route::get('/stores/add', function () {
            return view('cpanel.wholesaler.add-stores');
        })->name('cpanel.wholesaler.stores.add');
        
        Route::get('/products', function () {
            return view('cpanel.wholesaler.products');
        })->name('cpanel.wholesaler.products');

        Route::get('/products/add', function () {
            return view('cpanel.wholesaler.add-products');
        })->name('cpanel.wholesaler.products.add');

        Route::get('/orders', function () {
            return view('cpanel.wholesaler.orders');
        })->name('cpanel.wholesaler.orders');

        Route::get('/orders/{id}/view', function ($id) {
            return view('cpanel.wholesaler.view-order', ['id'=>$id]);
        })->name('cpanel.wholesaler.orders.view');
        
        Route::get('/orders/completed', function () {
            return view('cpanel.wholesaler.completed-orders');
        })->name('cpanel.wholesaler.orders.completed');

        Route::get('/settings', function () {
            return view('cpanel.wholesaler.settings');
        })->name('cpanel.wholesaler.settings');
        
    });
    
});

Route::prefix('console')->group(function () {
    
    Route::get('/', function () {
        return view('console.home');
    })->name('console');
    
    Route::prefix('wholesalers')->group(function () {
        
        Route::get('/', function () {
            return view('console.wholesalers.wholesalers');
        })->name('console.wholesalers');
        
        Route::get('add', function () {
            return view('console.wholesalers.add');
        })->name('console.wholesalers.add');

        Route::get('{id}/update', function ($id) {
            return view('console.wholesalers.update', with(['id'=>$id]));
        })->name('console.wholesalers.update');

    });
    
    Route::prefix('stores')->group(function () {
        
        Route::get('/', function () {
            return view('console.stores.stores');
        })->name('console.stores');

        Route::get('add', function () {
            return view('console.stores.add');
        })->name('console.stores.add');

        Route::get('{id}/update', function ($id) {
            return view('console.stores.update', with(['id'=>$id]));
        })->name('console.stores.update');

    });

    Route::prefix('users')->group(function () {

        Route::get('/', function () {
            return view('console.users.users');
        })->name('console.users');

        Route::get('add', function () {
            return view('console.users.add');
        })->name('console.users.add');
        Route::post('add', 'UserController@add')->name('console.users.add.request');
        
        Route::get('{id}/update', function ($id) {
            return view('console.users.update', with(['id'=>$id]));
        })->name('console.users.update');
        Route::post('{id}/update', 'UserController@update')->name('console.users.update.request');
        
    });
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
