<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('website.pages.index');
});

Auth::routes();

Route::get('/', 'Website\WebsiteController@index')->name('front.index');
Route::get('/category/{slug}', 'Website\WebsiteController@categoryproduct')->name('category_product');
Route::get('/sub-category/{slug}', 'Website\WebsiteController@subcategoryproduct')->name('sub_category_product');
Route::get('/child-category/{slug}', 'Website\WebsiteController@childcategoryproduct')->name('child_category_product');
Route::get('/product/{slug}', 'Website\WebsiteController@productdetails')->name('product_details');
// Route::get('/cart', 'Website\WebsiteController@cart')->name('cart');

Route::get('/cart','website\CartController@showcart')->name('product_cart');
Route::get('cart/product/view/{id}','website\CartController@ViewProduct');
Route::get('/checkout','website\CartController@checkout')->name('product_checkout');
Route::post('/apply/coupon','website\CartController@applycoupon')->name('apply.coupon');
Route::get('/remove/coupon','website\CartController@removecoupon')->name('coupon.remove');
Route::get('/cart/remove/{id}','website\CartController@cartremove')->name('product_cart_remove');
Route::post('/cart/update','website\CartController@UpdateCart')->name('product_cart_update');
Route::post('insert/into/cart/','website\CartController@InsertCart')->name('insert.into.cart');




Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\LoginController@showlogin')->name('admin.login');
Route::post('admin/', 'Admin\LoginController@login');
Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
Route::get('admin/logout', 'Admin\AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('users', 'Admin\AdminController@index')->name('users');
    Route::get('user/add', 'Admin\AdminController@add')->name('user.add');
    Route::post('user/insert', 'Admin\AdminController@insert')->name('user.insert');
    Route::get('user/edit/{id}', 'Admin\AdminController@edit')->name('user.edit');
    Route::post('user/update', 'Admin\AdminController@update')->name('user.update');
    Route::get('user/view/{id}','Admin\AdminController@view')->name('user.view');
    Route::post('user/softdelete', 'Admin\AdminController@softdelete')->name('user.softdelete');
    Route::post('user/delete/', 'Admin\AdminController@delete')->name('user.delete');
    Route::post('user/restore/', 'Admin\AdminController@restore')->name('user.restore');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('banners', 'Admin\BannerController@index')->name('banners');
    Route::get('banner/add', 'Admin\BannerController@add')->name('banner.add');
    Route::post('banner/insert', 'Admin\BannerController@insert')->name('banner.insert');
    Route::get('banner/edit/{id}', 'Admin\BannerController@edit')->name('banner.edit');
    Route::post('banner/update', 'Admin\BannerController@update')->name('banner.update');
    Route::get('banner/view/{id}','Admin\BannerController@view')->name('banner.view');
    Route::post('banner/softdelete', 'Admin\BannerController@softdelete')->name('banner.softdelete');
    Route::post('banner/delete/', 'Admin\BannerController@delete')->name('banner.delete');
    Route::post('banner/restore/', 'Admin\BannerController@restore')->name('banner.restore');
    Route::post('banner/publish', 'Admin\BannerController@publish')->name('banner.publish');
    Route::post('banner/unpublish', 'Admin\BannerController@unpublish')->name('banner.unpublish');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('settings', 'Admin\SettingController@index')->name('settings');
    Route::post('setting/update', 'Admin\SettingController@update')->name('setting.update');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('gallery-categories', 'Admin\GalleryCategoryController@index')->name('gallery-categories');
    Route::get('gallery-category/add', 'Admin\GalleryCategoryController@add')->name('gallerycategory.add');
    Route::post('gallery-category/insert', 'Admin\GalleryCategoryController@insert')->name('gallerycategory.insert');
    Route::get('gallery-category/edit/{id}', 'Admin\GalleryCategoryController@edit')->name('gallerycategory.edit');
    Route::post('gallery-category/update', 'Admin\GalleryCategoryController@update')->name('gallerycategory.update');
    Route::get('gallery-category/view/{id}','Admin\GalleryCategoryController@view')->name('gallerycategory.view');
    Route::post('gallery-category/softdelete', 'Admin\GalleryCategoryController@softdelete')->name('gallerycategory.softdelete');
    Route::post('gallery-category/delete/', 'Admin\GalleryCategoryController@delete')->name('gallerycategory.delete');
    Route::post('gallery-category/restore/', 'Admin\GalleryCategoryController@restore')->name('gallerycategory.restore');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('galleries', 'Admin\GalleryController@index')->name('galleries');
    Route::get('gallery/add', 'Admin\GalleryController@add')->name('gallery.add');
    Route::post('gallery/insert', 'Admin\GalleryController@insert')->name('gallery.insert');
    Route::get('gallery/edit/{id}', 'Admin\GalleryController@edit')->name('gallery.edit');
    Route::post('gallery/update', 'Admin\GalleryController@update')->name('gallery.update');
    Route::get('gallery/view/{id}','Admin\GalleryController@view')->name('gallery.view');
    Route::post('gallery/softdelete', 'Admin\GalleryController@softdelete')->name('gallery.softdelete');
    Route::post('gallery/delete/', 'Admin\GalleryController@delete')->name('gallery.delete');
    Route::post('gallery/restore/', 'Admin\GalleryController@restore')->name('gallery.restore');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('blogcategories', 'Admin\BlogCategoryController@index')->name('blogcategories');
    Route::get('blog-category/add', 'Admin\BlogCategoryController@add')->name('blogcategory.add');
    Route::post('blog-category/insert', 'Admin\BlogCategoryController@insert')->name('blogcategory.insert');
    Route::get('blog-category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('blogcategory.edit');
    Route::post('blog-category/update', 'Admin\BlogCategoryController@update')->name('blogcategory.update');
    Route::get('blog-category/view/{id}','Admin\BlogCategoryController@view')->name('blogcategory.view');
    Route::post('blog-category/softdelete', 'Admin\BlogCategoryController@softdelete')->name('blogcategory.softdelete');
    Route::post('blog-category/delete/', 'Admin\BlogCategoryController@delete')->name('blogcategory.delete');
    Route::post('blog-category/restore/', 'Admin\BlogCategoryController@restore')->name('blogcategory.restore');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('blogposts', 'Admin\BlogPostController@index')->name('blogposts');
    Route::get('blog-post/add', 'Admin\BlogPostController@add')->name('blogpost.add');
    Route::post('blog-post/insert', 'Admin\BlogPostController@insert')->name('blogpost.insert');
    Route::get('blog-post/edit/{id}', 'Admin\BlogPostController@edit')->name('blogpost.edit');
    Route::post('blog-post/update', 'Admin\BlogPostController@update')->name('blogpost.update');
    Route::get('blog-post/view/{id}','Admin\BlogPostController@view')->name('blogpost.view');
    Route::post('blog-post/softdelete', 'Admin\BlogPostController@softdelete')->name('blogpost.softdelete');
    Route::post('blog-post/delete/', 'Admin\BlogPostController@delete')->name('blogpost.delete');
    Route::post('blog-post/restore/', 'Admin\BlogPostController@restore')->name('blogpost.restore');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('teams', 'Admin\TeamController@index')->name('teams');
    Route::get('team/add', 'Admin\TeamController@add')->name('team.add');
    Route::post('team/insert', 'Admin\TeamController@insert')->name('team.insert');
    Route::get('team/edit/{id}', 'Admin\TeamController@edit')->name('team.edit');
    Route::post('team/update', 'Admin\TeamController@update')->name('team.update');
    Route::get('team/view/{id}','Admin\TeamController@view')->name('team.view');
    Route::post('team/softdelete', 'Admin\TeamController@softdelete')->name('team.softdelete');
    Route::post('team/delete/', 'Admin\TeamController@delete')->name('team.delete');
    Route::post('team/restore/', 'Admin\TeamController@restore')->name('team.restore');
    Route::post('team/publish', 'Admin\TeamController@publish')->name('team.publish');
    Route::post('team/unpublish', 'Admin\TeamController@unpublish')->name('team.unpublish');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('partners', 'Admin\PartnerController@index')->name('partners');
    Route::get('partner/add', 'Admin\PartnerController@add')->name('parnert.add');
    Route::post('partner/insert', 'Admin\PartnerController@insert')->name('parnert.insert');
    Route::get('partner/edit/{id}', 'Admin\PartnerController@edit')->name('parnert.edit');
    Route::post('partner/update', 'Admin\PartnerController@update')->name('parnert.update');
    Route::get('partner/view/{id}','Admin\PartnerController@view')->name('parnert.view');
    Route::post('partner/softdelete', 'Admin\PartnerController@softdelete')->name('parnert.softdelete');
    Route::post('partner/delete/', 'Admin\PartnerController@delete')->name('parnert.delete');
    Route::post('partner/restore/', 'Admin\PartnerController@restore')->name('parnert.restore');
    Route::post('partner/publish', 'Admin\PartnerController@publish')->name('parnert.publish');
    Route::post('partner/unpublish', 'Admin\PartnerController@unpublish')->name('parnert.unpublish');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('testimonials', 'Admin\TestimonialController@index')->name('testimonials');
    Route::get('testimonial/add', 'Admin\TestimonialController@add')->name('testimonial.add');
    Route::post('testimonial/insert', 'Admin\TestimonialController@insert')->name('testimonial.insert');
    Route::get('testimonial/edit/{id}', 'Admin\TestimonialController@edit')->name('testimonial.edit');
    Route::post('testimonial/update', 'Admin\TestimonialController@update')->name('testimonial.update');
    Route::get('testimonial/view/{id}','Admin\TestimonialController@view')->name('testimonial.view');
    Route::post('testimonial/softdelete', 'Admin\TestimonialController@softdelete')->name('testimonial.softdelete');
    Route::post('testimonial/delete/', 'Admin\TestimonialController@delete')->name('testimonial.delete');
    Route::post('testimonial/restore/', 'Admin\TestimonialController@restore')->name('testimonial.restore');
    Route::post('testimonial/publish', 'Admin\TestimonialController@publish')->name('testimonial.publish');
    Route::post('testimonial/unpublish', 'Admin\TestimonialController@unpublish')->name('testimonial.unpublish');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('newsletters', 'Admin\NewsletterController@index')->name('newsletters');
    Route::post('newsletter/softdelete', 'Admin\NewsletterController@softdelete')->name('newsletter.softdelete');
    Route::post('newsletter/delete/', 'Admin\NewsletterController@delete')->name('newsletter.delete');
    Route::post('newsletter/restore/', 'Admin\NewsletterController@restore')->name('newsletter.restore');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('contacts', 'Admin\ContactController@index')->name('contacts');
    Route::post('contact/softdelete', 'Admin\ContactController@softdelete')->name('contact.softdelete');
    Route::post('contact/delete/', 'Admin\ContactController@delete')->name('contact.delete');
    Route::post('contact/restore/', 'Admin\ContactController@restore')->name('contact.restore');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('recyclebins', 'Admin\RecyclebinController@index')->name('recyclebins');
    Route::get('recycle/user', 'Admin\RecyclebinController@user')->name('recycle.user');
    Route::get('recycle/banner', 'Admin\RecyclebinController@banner')->name('recycle.banner');
    Route::get('recycle/contact', 'Admin\RecyclebinController@contact')->name('recycle.contact');
    Route::get('recycle/gallery', 'Admin\RecyclebinController@gallery')->name('recycle.gallery');
    Route::get('recycle/gallery-category', 'Admin\RecyclebinController@gallerycategory')->name('recycle.gallerycategory');
    Route::get('recycle/team', 'Admin\RecyclebinController@team')->name('recycle.team');
    Route::get('recycle/testimonial', 'Admin\RecyclebinController@testimonial')->name('recycle.testimonial');
    Route::get('recycle/post', 'Admin\RecyclebinController@post')->name('recycle.post');
    Route::get('recycle/partner', 'Admin\RecyclebinController@partner')->name('recycle.partner');
    Route::get('recycle/blog-category', 'Admin\RecyclebinController@blogcategory')->name('recycle.blogcategory');
    Route::get('recycle/tag', 'Admin\RecyclebinController@tag')->name('recycle.tag');
    Route::get('recycle/comment', 'Admin\RecyclebinController@comment')->name('recycle.comment');
    Route::get('recycle/newsletter', 'Admin\RecyclebinController@newsletter')->name('recycle.newsletter');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('roles', 'Admin\PermissionController@roles')->name('roles');
    Route::get('role/add', 'Admin\PermissionController@add')->name('role.add');
    Route::post('role/insert', 'Admin\PermissionController@insert')->name('role.insert');
    Route::get('role/eidt/{id}', 'Admin\PermissionController@edit')->name('role.edit');
    Route::post('role/update', 'Admin\PermissionController@update')->name('role.update');
    Route::post('permission/update', 'Admin\PermissionController@permissonupdate')->name('permission.update');

});

Route::group(['prefix' => 'admin'], function () {
    Route::get('categories/', 'Admin\CategoryController@index')->name('categories');
    Route::get('category/add', 'Admin\CategoryController@add')->name('category.add');
    Route::post('category/insert', 'Admin\CategoryController@insert')->name('category.insert');
    Route::get('category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
    Route::post('category/update', 'Admin\CategoryController@update')->name('category.update');
    Route::post('category/softdelete', 'Admin\CategoryController@softdelete')->name('category.softdelete');
    Route::post('category/delete', 'Admin\CategoryController@delete')->name('category.delete');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('category-banners', 'Admin\CategoryBannerController@index')->name('category.banners');
    Route::get('category-banner/add', 'Admin\CategoryBannerController@add')->name('category.banner.add');
    Route::post('category-banner/insert', 'Admin\CategoryBannerController@insert')->name('category.banner.insert');
    Route::get('category-banner/edit/{id}', 'Admin\CategoryBannerController@edit')->name('category.banner.edit');
    Route::post('category-banner/update', 'Admin\CategoryBannerController@update')->name('category.banner.update');
    Route::get('category-banner/view/{id}','Admin\CategoryBannerController@view')->name('category.banner.view');
    Route::post('category-banner/softdelete', 'Admin\CategoryBannerController@softdelete')->name('category.banner.softdelete');
    Route::post('category-banner/delete/', 'Admin\CategoryBannerController@delete')->name('category.banner.delete');
    Route::post('category-banner/restore/', 'Admin\CategoryBannerController@restore')->name('category.banner.restore');
    Route::post('category-banner/publish', 'Admin\CategoryBannerController@publish')->name('category.banner.publish');
    Route::post('category-banner/unpublish', 'Admin\CategoryBannerController@unpublish')->name('category.banner.unpublish');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/cat-ads','Admin\AdvertisementController@index')->name('categoryads');
    Route::get('/create/cat-ads','Admin\AdvertisementController@add')->name('category.ads.add');
    Route::post('/store/cat-ads','Admin\AdvertisementController@insert')->name('category.ads.insert');
    Route::get('/view/cat-ads/{id}','Admin\AdvertisementController@view')->name('category.ads.view');
    Route::get('/edit/cat-ads/{id}','Admin\AdvertisementController@edit')->name('category.ads.edit');
    Route::post('/update/cat-ads','Admin\AdvertisementController@update')->name('category.ads.update');
    Route::get('/delete/cat-ads/{id}','Admin\AdvertisementController@delete')->name('category.ads.delete');
  });


Route::group(['prefix' => 'admin'], function () {
    Route::get('products', 'Admin\ProductController@index')->name('products');
    Route::get('product/type', 'Admin\ProductController@type')->name('product.type');
    Route::get('product/physical/add', 'Admin\ProductController@physicaladd')->name('product.physical.add');
    Route::get('product/digital/add', 'Admin\ProductController@digitaladd')->name('product.digital.add');
    Route::get('product/license/add', 'Admin\ProductController@licenseadd')->name('product.license.add');

    Route::post('product/insert', 'Admin\ProductController@insert')->name('product.insert');
    // Route::post('product/digital/insert', 'Admin\ProductController@digitalinsert')->name('product.digital.insert');
    // Route::post('product/license/insert', 'Admin\ProductController@licenseinsert')->name('product.license.insert');

    Route::get('product/edit/{id}', 'Admin\ProductController@edit')->name('product.edit');

    Route::post('product/information/update', 'Admin\ProductController@update')->name('product.update');
    Route::post('product/image/update', 'Admin\ProductController@imageupdate')->name('product.image.update');
    Route::post('product/sale/update', 'Admin\ProductController@saleupdate')->name('product.sale.update');
    Route::post('product/color/update', 'Admin\ProductController@colorupdate')->name('product.color.update');
    Route::post('product/size/update', 'Admin\ProductController@sizeupdate')->name('product.size.update');
    Route::post('product/feature_tag/update', 'Admin\ProductController@featureupdate')->name('product.feature.update');
    Route::post('product/license/update', 'Admin\ProductController@licenseupdate')->name('product.license.update');

    Route::get('product/view/{id}', 'Admin\ProductController@view')->name('product.view');

    Route::post('product/softdelete', 'Admin\ProductController@softdelete')->name('product.softdelete');
    Route::post('product/delete/', 'Admin\ProductController@delete')->name('product.delete');
    Route::post('product/restore/', 'Admin\ProductController@restore')->name('product.restore');
    Route::post('product/publish', 'Admin\ProductController@publish')->name('product.publish');
    Route::post('product/unpublish', 'Admin\ProductController@unpublish')->name('product.unpublish');
});
