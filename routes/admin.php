<?php

Route::get('/', 'AdminController@index')->name('index');

Route::get('admin', ['middleware' => 'admin', function () {
    //
}]);

Route::resource('products', 'ProductsController');

?>
