<?php



Route::get('/', 'Frontend\HomeController@index')->name('/');
Route::get('/detail', 'Frontend\HomeController@detail')->name('detail');
Route::get('/test', 'TestController@index');





Auth::routes();

Route::group(['middleware'=> 'auth', 'namespace'=>'Backend'] ,function(){
    Route::resource('profile', 'ProfileController');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('/category', 'CategoryController');
    Route::get('category/published/{id}', 'CategoryController@publishedCategory')->name('category.published');
    Route::get('category/unpublished/{id}', 'CategoryController@unpublishedCategory')->name('category.unpublished');
    Route::get('category/trash/{id}', 'CategoryController@deleteCategory')->name('category.trash');

    Route::resource('subCategory', 'SubCategoryController');
    Route::get('Subcategory/published/{id}', 'SubCategoryController@publishedSubCategory')->name('subCategory.published');
    Route::get('Subcategory/unpublished/{id}', 'SubCategoryController@unpublishedSubCategory')->name('subCategory.unpublished');
    Route::get('category/delete/{id}', 'SubCategoryController@deleteSubCategory')->name('subCategory.delete');

    Route::resource('carousel', 'CarouselController');
    Route::get('carousel/published', 'CarouselController@publishedCarousel')->name('carousel.published');
    Route::get('carousel/unpublished', 'CarouselController@unpublishedCarousel')->name('carousel.unpublished');
    Route::get('carousel/trash/{id}', 'CarouselController@deleteCarousel')->name('carousel.trash');

    Route::resource('blog', 'BlogController');
    Route::get('blog/published/{id}', 'BlogController@publishedBlog')->name('blog.published');
    Route::get('blog/unpublished/{id}', 'BlogController@unpublishedBlog')->name('blog.unpublished');
    Route::get('blog/delete/{id}', 'BlogController@deleteBlog')->name('blog.trash');

    Route::resource('photography', 'PhotographyController');
    Route::get('photo/published/{id}', 'PhotographyController@publishedPhoto')->name('photography.published');
    Route::get('photo/unpublished/{id}', 'PhotographyController@unpublishedPhoto')->name('photography.unpublished');
    Route::get('photo/delete/{id}', 'PhotographyController@deletePhoto')->name('photography.trash');

    Route::resource('admin', 'AdminController');
    Route::get('admin/published/{id}', 'AdminController@activeAdmin')->name('admin.active');
    Route::get('admin/unpublished/{id}', 'AdminController@deactiveAdmin')->name('admin.deactive');
    Route::get('admin/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');

    Route::resource('role', 'RoleController');
    Route::get('role/delete/{id}', 'RoleController@destroy')->name('role.destroy');

    Route::resource('permission', 'PermissionController');
    Route::get('permission/destroy/{id}', 'PermissionController@destroy')->name('permission.destroy');

    Route::resource('permission-for', 'PermissionForController');
    Route::get('permission-for/destroy/{id}', 'PermissionForController@destroy')->name('permission-for.destroy');
});




