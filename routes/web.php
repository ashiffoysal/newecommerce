<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['prefix' => 'forget/password', 'namespace'=> 'Auth'], function () {
    Route::get('verification/code/{remember_token}','ForgotPasswordController@forgetPassVerificationCodeFrom')->name('forget.password.verify.code.form');
    Route::post('verification/code/','ForgotPasswordController@checkForgetPassVerificationCode')->name('user.check.verification.code');
    Route::get('reset/{remember_token}','ForgotPasswordController@forgetResetPasswordForm')->name('forget.reset.password');
    Route::post('forget/reset/password/submit','ForgotPasswordController@forgetResetPasswordSubmit')->name('forget.reset.password.submit');
    Route::post('resend/verification/code/mail/{remember_token}','ForgotPasswordController@forgetResendVerificationCodeMail')->name('resend.verification.code');
});

Route::group(['prefix' => 'user/login/', 'namespace' => 'Auth'], function () {
    Route::post('modal', 'LoginController@modalLogin')->name('modal.login');
    Route::get('login/google', 'LoginController@redirectToProviderGoogle')->name('google.login');
    Route::get('google/callback', 'LoginController@handleProviderGoogleCallback');
    Route::get('login/facebook', 'LoginController@redirectToProviderFacebook')->name('facebook.login');
    Route::get('facebook/callback', 'LoginController@handleProviderFacebookCallback');
});

Route::get('/home', 'HomeController@index')->name('home');
//admin routes
   Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
   Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
   Route::post('admin/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   Route::get('admin/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   Route::post('admin/password/reset', 'Auth\AdminResetPasswordController@reset');
   Route::get('admin/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
   Route::get('/admin', 'AdminController@index')->name('admin.dashboard'); //admin dashboard
         //admin setting section
   Route::get('admin/profile', 'AdminController@AdminProfile')->name('admin.profile');
   Route::get('admin/edit/profile', 'AdminController@AdminEditProfile')->name('admin.edit.profile');
   Route::post('admin/update/profile', 'AdminController@AdminUpdateProfile')->name('admin.update.profile');
   Route::get('admin/password/change', 'AdminController@AdminPasswordChange')->name('admin.password.change');
   Route::post('admin/password/update', 'AdminController@AdminPasswordUpdate')->name('admin.password.update');
   Route::get('admin/profile/lock', 'AdminController@AdminLockScreen')->name('admin.lock.screen');
   Route::post('/admin/unlock/screen','AdminController@UnlockScreen')->name('admin.unlock.screen');
   Route::get('admin/log/out', 'AdminController@AdminLogOut')->name('admin.logout');

        //seo setting
Route::get('admin/seo/setting', 'Admin\SeoController@Seo')->name('admin.seo.setting');
Route::post('admin/seo/update', 'Admin\SeoController@SeoUpdate')->name('admin.seo.update');
Route::get('admin/social/setting', 'Admin\SeoController@Social')->name('admin.social.setting');
Route::post('admin/social/update', 'Admin\SeoController@SocialUpdate')->name('admin.social.update');
Route::get('admin/logo/setting', 'Admin\SeoController@LogoSetting')->name('admin.logo.setting');
Route::post('admin/panel/logo/update', 'Admin\SeoController@AdminLogoUpdate')->name('admin.panel.logo');
Route::post('admin/frontlogo/update', 'Admin\SeoController@AdminFrontLogoUpdate')->name('admin.front.logo');
     //mail setting
Route::get('admin/mail/setting', 'Admin\SeoController@MailSetting')->name('admin.mail.setting');
Route::post('admin/smtp/update', 'Admin\SeoController@smtpUpdate')->name('admin.smtp.update');
Route::post('admin/mailgun/update', 'Admin\SeoController@mailgunUpdate')->name('admin.mailgun.update');
   //payment gateway
Route::get('admin/payment/gateway', 'Admin\GatewayController@PaymentGateway')->name('admin.payment.gateway');
Route::post('admin/stripe/gateway', 'Admin\GatewayController@StripeUpdate')->name('admin.stripe.update');
Route::post('admin/paypal/gateway', 'Admin\GatewayController@PaypalUpdate')->name('admin.paypal.update');
Route::post('admin/twocheckout/gateway', 'Admin\GatewayController@twocheckoutUpdate')->name('admin.twocheckout.update');
Route::post('admin/mollie/gateway', 'Admin\GatewayController@MollieUpdate')->name('admin.mollie.update');


// category
Route::get(md5('admin/category/add'), 'Admin\CategoryController@add')->name('admin.category.add');
Route::get(md5('admin/category/all'), 'Admin\CategoryController@index')->name('admin.category.all');
Route::post(md5('admin/category/insert'), 'Admin\CategoryController@insert')->name('admin.category.insert');

Route::get('admin/category/edit/{cate_id}', 'Admin\CategoryController@edit');

Route::post(md5('admin/category/update'), 'Admin\CategoryController@update')->name('admin.category.update');
Route::get('admin/category/softdelete/{id}', 'Admin\CategoryController@softdelete');
Route::post('admin/category/multiplesoftdelete', 'Admin\CategoryController@multiplesoftdelete');
Route::get('admin/category/deactive/{id}', 'Admin\CategoryController@deactive');
Route::get('admin/category/active/{id}', 'Admin\CategoryController@active');
Route::get('admin/category/delete/{id}', 'Admin\CategoryController@delete');
Route::get('admin/category/restore/{id}', 'Admin\CategoryController@restore');
// subcategory
Route::get(md5('admin/subcategory/all'), 'Admin\SubCategoryController@index')->name('admin.subcategory.all');
Route::post(md5('admin/subcategory/insert'), 'Admin\SubCategoryController@insert')->name('admin.subcategory.insert');
Route::get('/get/subcategory/edit/{subcate_id}', 'Admin\SubCategoryController@edit');
Route::post('admin/subcategory/update', 'Admin\SubCategoryController@update')->name('admin.subcategory.update');
Route::get('admin/subcategory/active/{id}', 'Admin\SubCategoryController@active');
Route::get('admin/subcategory/deactive/{id}', 'Admin\SubCategoryController@deactive');
Route::get('admin/subcategory/softdelete/{id}', 'Admin\SubCategoryController@softdelete');
Route::get('admin/subcategory/restore/{id}', 'Admin\SubCategoryController@restore');
Route::post('admin/subcategory/multiplesoftdelete', 'Admin\SubCategoryController@multiplesoftdelete');
Route::get('admin/subcategory/delete/{id}', 'Admin\SubCategoryController@delete');
// resubcategory
Route::get(md5('admin/resubcategory/all'), 'Admin\ReSubCategoryController@index')->name('admin.resubcategory.all');
Route::get('/get/subcategory/all/{cate_id}', 'Admin\ReSubCategoryController@subcate');
Route::post('admin/resubcategory/insert', 'Admin\ReSubCategoryController@insert')->name('admin.resubcategory.insert');
Route::get('admin/resubcategory/deactive/{id}', 'Admin\ReSubCategoryController@deactive');
Route::get('admin/resubcategory/active/{id}', 'Admin\ReSubCategoryController@active');
Route::get('admin/resubcategory/softdelete/{id}', 'Admin\ReSubCategoryController@softdelete');
Route::post('admin/resubcategory/multisoftdelete', 'Admin\ReSubCategoryController@multisoftdel')->name('');
Route::get('/get/resubcategory/edit/{resubcate_id}', 'Admin\ReSubCategoryController@edit')->name('');
Route::post('admin/resubcategory/update', 'Admin\ReSubCategoryController@update')->name('admin.resubcategory.update');
Route::get('admin/resubcategory/restore/{id}', 'Admin\ReSubCategoryController@restore');
// color
Route::get(md5('admin/color/all'), 'Admin\ColorController@index')->name('admin.color.all');
Route::post(md5('admin/color/insert'), 'Admin\ColorController@insert')->name('admin.color.insert');
Route::get('admin/color/active/{id}', 'Admin\ColorController@active');
Route::get('admin/color/deactive/{id}', 'Admin\ColorController@deactive');
Route::get('admin/color/softdelete/{id}', 'Admin\ColorController@softdelete');
Route::get('admin/color/recover/{id}', 'Admin\ColorController@recover');
Route::post('admin/color/multisoftdelete', 'Admin\ColorController@multisoftdel');
Route::get('admin/color/delete/{id}', 'Admin\ColorController@delete');
Route::get('/get/color/edit/{color_id}', 'Admin\ColorController@edit');
Route::post(md5('admin/color/update'), 'Admin\ColorController@update')->name('admin.color.update');
// theme color setup
Route::get(md5('admin/themecolor/all'), 'Admin\ThemeColorController@index')->name('admin.themecolor.all');
Route::post(md5('admin/themecolor/insert'), 'Admin\ThemeColorController@insert')->name('admin.themcolor.insert');
Route::post(md5('admin/themecolor/update'), 'Admin\ThemeColorController@update')->name('admin.themecolor.update');
Route::get('/get/admin/themecolor/{id}', 'Admin\ThemeColorController@edit');
Route::get('admin/themecolor/softDelete/{id}', 'Admin\ThemeColorController@softDelete');
Route::get('admin/themecolor/active/{id}', 'Admin\ThemeColorController@active');

// brand controller
Route::get(md5('admin/brand/all'), 'Admin\BrandController@index')->name('admin.brand.all');
Route::post('admin/brand/insert', 'Admin\BrandController@insert')->name('admin.brand.insert');
Route::get('admin/brand/active/{id}', 'Admin\BrandController@active');
Route::get('admin/brand/deactive/{id}', 'Admin\BrandController@deactive');
Route::get('admin/brand/softdelete/{id}', 'Admin\BrandController@softdelete');
Route::get('admin/brand/recover/{id}', 'Admin\BrandController@recover');
Route::post('admin/brand/multipledelete', 'Admin\BrandController@multidel');
Route::get('admin/brand/delete/{id}', 'Admin\BrandController@delete');
Route::get('/get/brand/edit/{brand_id}', 'Admin\BrandController@edit');
Route::post('admin/brand/update', 'Admin\BrandController@update')->name('admin.brand.update');
// measurement
Route::get(md5('admin/measurement/all'), 'Admin\MeasurementController@index')->name('admin.measurement.all');
Route::post('admin/measurement/insert', 'Admin\MeasurementController@insert')->name('admin.measurement.insert');
Route::post('admin/measurement/update', 'Admin\MeasurementController@update')->name('admin.measurement.update');
Route::get('admin/measurement/actve/{id}', 'Admin\MeasurementController@active');
Route::get('/get/measurement/edit/{m_id}', 'Admin\MeasurementController@edit');
Route::get('admin/measurement/deactve/{id}', 'Admin\MeasurementController@deactive');
Route::get('admin/measurement/softdelete/{id}', 'Admin\MeasurementController@softdelete');
Route::get('admin/measurement/recover/{id}', 'Admin\MeasurementController@recover');
Route::get('admin/measurement/delete/{id}', 'Admin\MeasurementController@delete');
Route::post('admin/measurement/multisoftdelete', 'Admin\MeasurementController@multisoftdelete');
// cupon controller
Route::get(md5('admin/cupon/all'), 'Admin\CuponController@index')->name('admin.cupon.all');
Route::get(md5('admin/cupon/add'), 'Admin\CuponController@add')->name('admin.cupon.add');
Route::post(md5('admin/cupon/insert'), 'Admin\CuponController@insert')->name('admin.cupon.insert');
Route::get('admin/cupon/deactive/{id}', 'Admin\CuponController@deactive');
Route::get('admin/cupon/active/{id}', 'Admin\CuponController@active');
Route::get('admin/cupon/softdelete/{id}', 'Admin\CuponController@softdelete');
Route::get('admin/cupon/edit/{id}', 'Admin\CuponController@edit');
Route::post('admin/cupon/update', 'Admin\CuponController@update')->name('admin.cupon.update');
Route::post('admin/cupon/multiplesoftdelete', 'Admin\CuponController@multiplesoftdelete');
Route::get('admin/cupon/restore/{id}', 'Admin\CuponController@restore');
Route::get('admin/cupon/delete/{id}', 'Admin\CuponController@delete');

// product controller
Route::get(md5('admin/product/producttype'), 'Admin\ProductController@producttype')->name('admin.product.producttype');
Route::get(md5('admin/product/add'), 'Admin\ProductController@add')->name('admin.product.add');
Route::get(md5('admin/product/digital/add'), 'Admin\ProductController@digital')->name('admin.product.digital');
Route::get(md5('admin/product/affiliate/add'), 'Admin\ProductController@affiliate')->name('admin.product.affiliate');
Route::get(md5('admin/product/digital/license'), 'Admin\ProductController@license')->name('admin.product.license');
Route::get(md5('admin/product/all'), 'Admin\ProductController@index')->name('admin.product.all');
Route::post(md5('admin/product/insert'), 'Admin\ProductController@insert')->name('admin.product.insert');
Route::post('admin/product/update/{id}', 'Admin\ProductController@update')->name('admin.product.update');
Route::get('admin/product/combination', 'Admin\ProductController@sku_combination')->name('products.sku_combination');
Route::get('admin/product/combination/edit', 'Admin\ProductController@sku_combination_edit')->name('products.sku_combination_edit');
Route::get('/get/resubcategory/all/{subcate_id}', 'Admin\ProductController@resub');
Route::post('/get/admin/todays_deal', 'Admin\ProductController@updatetodaydeal')->name('products.todays_deal');
Route::post('/get/admin/published', 'Admin\ProductController@updatepublished')->name('products.published');
Route::get('admin/product/view/{id}', 'Admin\ProductController@view');

Route::post('admin/product/multisoftdelete', 'Admin\ProductController@productmultisoftdelete');
Route::get('admin/product/restore/{id}', 'Admin\ProductController@prorecover');
Route::get('admin/product/lincencepro/{id}', 'Admin\ProductController@licencepro')->name('admin.licencepro.delete');
Route::get('admin/product/softdelete/{id}', 'Admin\ProductController@softdelete');
Route::get('admin/product/hearddelete/{id}', 'Admin\ProductController@hearddelete');




// product type physical edit
Route::get('admin/product/edittypeone/{id}', 'Admin\ProductController@producteditone');
// product type digital  edit
Route::get('admin/product/productedittwo/{id}', 'Admin\ProductController@productedittwo');
// product type lincence edit
Route::get('admin/product/producteditthree/{id}', 'Admin\ProductController@producteditthree');
// product type affiliate edit
Route::get('admin/product/producteditfour/{id}', 'Admin\ProductController@producteditfour');

// general setting


Route::get(md5('admin/forntendsetup/aboutus'), 'Admin\ForntendSetupController@aboutus')->name('admin.aboutus');
Route::post('admin/forntendsetup/aboutus/update', 'Admin\ForntendSetupController@aboutusupdate')->name('admin.aboutus.update');
Route::get(md5('admin/forntendsetup/termscondition'), 'Admin\ForntendSetupController@termsandcondition')->name('admin.termscondition');
Route::post(md5('admin/forntendsetup/termsconditionupdate'),'Admin\ForntendSetupController@termsandconditionupdate')->name('admin.termsandcondition.update');
Route::get(md5('admin/forntendsetup/faq/add'), 'Admin\ForntendSetupController@faq')->name('admin.faq');

Route::post(md5('admin/forntendsetup/faq/insert'), 'Admin\ForntendSetupController@faqinsert')->name('admin.faq.insert');
Route::get(md5('admin/forntendsetup/faq/all'), 'Admin\ForntendSetupController@allfaq')->name('admin.faq.all');

Route::get('admin/faq/deactive/{id}', 'Admin\ForntendSetupController@faqdeactive');
Route::get('admin/faq/active/{id}', 'Admin\ForntendSetupController@faqactive');
Route::get('/get/faq/edit/{faqid}', 'Admin\ForntendSetupController@faqedit');
Route::post('admin/faq/update', 'Admin\ForntendSetupController@faqupdate')->name('admin.faq.update');
Route::get('admin/faq/softdelete/{id}', 'Admin\ForntendSetupController@faqsoftdelete');
Route::post('admin/faq/multisoftdelete', 'Admin\ForntendSetupController@faqmultidelete');
Route::get('admin/faq/recover/{id}', 'Admin\ForntendSetupController@faqrecover');
Route::get('admin/faq/faqhearddelete/{id}', 'Admin\ForntendSetupController@faqhearddelete');
//page controller
Route::get(md5('admin/page/all'), 'Admin\PageController@index')->name('admin.page.all');
Route::post(md5('admin/page/insert'), 'Admin\PageController@insert')->name('admin.page.insert');
Route::get('admin/page/deactive/{id}', 'Admin\PageController@deactive');
Route::get('admin/page/active/{id}', 'Admin\PageController@active');
Route::get('admin/page/softdelete/{id}', 'Admin\PageController@pagesoftdel');
Route::get('/get/page/edit/{page_id}', 'Admin\PageController@edit');
Route::post('admin/page/update', 'Admin\PageController@update')->name('admin.page.update');
Route::post('admin/page/multisoftdelete', 'Admin\PageController@pagemultidel')->name('admin.page.multisoftdelete');
Route::get('admin/page/recover/{id}','Admin\PageController@recover');
Route::get('admin/page/hearddelete/{id}','Admin\PageController@hearddelete');
// banner
Route::get(md5('admin/banner/all'),'Admin\BannerController@index')->name('admin.banner.all');
Route::post(md5('admin/banner/insert'),'Admin\BannerController@insert')->name('admin.banner.insert');

Route::get('admin/banner/active/{id}','Admin\BannerController@active');
Route::get('admin/banner/restore/{id}','Admin\BannerController@restore');
Route::get('admin/banner/deactive/{id}','Admin\BannerController@deactive');
Route::get('admin/banner/softdelete/{id}','Admin\BannerController@softdelete');

Route::get('admin/banner/multihearddelete/{id}','Admin\BannerController@multihearddelete');

Route::post('admin/banner/multisoftdelete','Admin\BannerController@multisoftdelete')->name('admin.banner.multisoftdelete');
Route::get('/get/admin/banner/edit/{ban_id}','Admin\BannerController@edit');
Route::post('admin/banner/update','Admin\BannerController@update')->name('admin.banner.update');






// trash controller
Route::get(md5('admin/trash/category'), 'Admin\TrashController@category')->name('admin.trash.category');
Route::post('admin/trash/category/multipledelete', 'Admin\TrashController@hearddeletecategory');
Route::get(md5('admin/trash/subcategory'), 'Admin\TrashController@subcategory')->name('admin.trash.subcategory');
Route::post('admin/trash/subcategory/multipledelete', 'Admin\TrashController@hearddelsubcate')->name('admin.trash.hearddel');
Route::get(md5('admin/trash/resubcategory'), 'Admin\TrashController@resubcategory')->name('admin.trash.resubcategory');
Route::post('admin/trash/resubcategory/multipledelete', 'Admin\TrashController@resubmultidel');
Route::post('admin/trash/color/multiplehdelete', 'Admin\TrashController@multicolordel')->name('admin.trash.color.delete');
Route::get(md5('admin/trash/color'), 'Admin\TrashController@color')->name('admin.trash.color');

Route::get(md5('admin/trash/brand'), 'Admin\TrashController@brand')->name('admin.trash.brand');
Route::get(md5('admin/trash/measurement'), 'Admin\TrashController@measurement')->name('admin.trash.measurement');
Route::post('admin/trash/brand/delete', 'Admin\TrashController@brandhearddelete')->name('admin.trash.brand.delete');
Route::post('admin/trash/measurement/delete', 'Admin\TrashController@measurementhearddelete')->name('admin.trash.measurement.delete');
Route::get(md5('admin/trash/product'), 'Admin\TrashController@product')->name('admin.trash.product');
Route::post(md5('admin/trash/product/hearddelete'), 'Admin\TrashController@producthearddel')->name('admin.trash.producthearddel');


Route::get(md5('admin/trash/banner'), 'Admin\TrashController@banner')->name('admin.trash.banner');
Route::post(md5('admin/trash/banmultidel'), 'Admin\TrashController@banmultidel')->name('admin.trash.multidelban');
Route::get(md5('admin/trash/allorder'), 'admin\trashcontroller@alldeleteorder')->name('admin.trash.allorder');
Route::post(md5('admin/trash/allorder/multidel'), 'admin\trashcontroller@ordermultdel')->name('admin.trash.ordermultdel');
// Warranty trash
Route::get(md5('admin/trash/warrantytrash'), 'admin\trashcontroller@warrantytrash')->name('admin.trash.warrantytrash');
Route::post(md5('admin/trash/warranty/multidelete'), 'admin\trashcontroller@warrantytrashdelete')->name('admin.warranty.multidelete');
// support
Route::get(md5('admin/trash/support'), 'admin\trashcontroller@support')->name('admin.trash.support');
Route::post(md5('admin/trash/support/multidelete'), 'admin\trashcontroller@supportnnmultidel')->name('admin.support.multidelete');


// footer option area start
Route::get(md5('admin/footer/option'), 'Admin\FooterController@footerShow')->name('admin.footer.option');
Route::post('admin/footer/option/update', 'Admin\FooterController@footerupdate')->name('admin.footer.option.update');
// warranty controller index
Route::get(md5('admin/warranty/all'), 'Admin\WarrantyController@index')->name('admin.warranty.all');
Route::post(md5('admin/warranty/insert'), 'Admin\WarrantyController@insert')->name('admin.warranty.insert');
Route::post('admin/warranty/update', 'Admin\WarrantyController@update')->name('admin.warranty.update');
Route::post(md5('admin/warranty/multipleSoftDelete'), 'Admin\WarrantyController@multipleSoftDelete')->name('admin.warranty.multiplesoftdelete');
Route::get('admin/warranty/active/{id}', 'Admin\WarrantyController@active');
Route::get('admin/warranty/deactive/{id}', 'Admin\WarrantyController@deactive');
Route::get('admin/warranty/softDelete/{id}', 'Admin\WarrantyController@softDelete');
Route::get('admin/warranty/restore/{id}', 'Admin\WarrantyController@restore');
Route::get('admin/warranty/delete/{id}', 'Admin\WarrantyController@delete');
Route::get('get/admin/warranty/edit/{id}', 'Admin\WarrantyController@edit');
// support controller
Route::get(md5('admin/support/all'), 'Admin\SupportController@index')->name('admin.support.all');
Route::post(md5('admin/support/insert'), 'Admin\SupportController@insert')->name('admin.support.insert');
Route::post(md5('admin/warranty/update'), 'Admin\SupportController@update')->name('admin.support.update');
Route::get('admin/support/active/{id}', 'Admin\SupportController@active');
Route::get('admin/support/deactive/{id}', 'Admin\SupportController@deactive');
Route::get('admin/support/softDelete/{id}', 'Admin\SupportController@softDelete');
Route::get('admin/support/restore/{id}', 'Admin\SupportController@restore');
Route::get('admin/support/delete/{id}', 'Admin\SupportController@delete');
Route::post(md5('admin/support/multipleSoftDelete'), 'Admin\SupportController@multipleSoftDelete')->name('admin.support.multiplesoftdelete');
Route::get('get/admin/support/edit/{id}', 'Admin\SupportController@edit');




//  Frontend route start from here ============================================ //

// front end controller

Route::get('/', 'Frontend\FrontendController@index');
Route::get('/about-us', 'Frontend\FrontendController@aboutus')->name('about.us');
// category
Route::get('product/page/{slug}', 'Frontend\FrontendController@cateproduct');
// subcategory
Route::get('subacete/{cate_slug}/{subacet_slug}', 'Frontend\FrontendController@subcateproduct');
// resubcate
Route::get('resubacete/{cate_slug}/{subacet_slug}/{resub_slug}', 'Frontend\FrontendController@resubcateproduct');

Route::get('product/{slug}/{id}', 'Frontend\FrontendController@productDetails')->name('product.details');

Route::get('flash_deal_products', 'Frontend\FrontendController@flashDealProducts')->name('hot.deal.products');


// product add to cart in front end

Route::get(md5('/product/cart/page'), 'Frontend\FrontendController@cart')->name('product.cart.add');

Route::get(md5('/product/checkout/page'), 'Frontend\FrontendController@checkout')->name('product.checkout');


Route::get('details/{id}', 'Frontend\FrontendController@productmodal');

// Route::get(md5('/customer/login'), 'Frontend\FrontendController@customerLogin')->name('customer.login');

// Route::get(md5('/customer/register'), 'Frontend\FrontendController@customerRegister')->name('customer.register');
// wish list

Route::get('/product/wishlist', 'Frontend\WishlistController@index')->name('product.wishlist');
Route::get('/product/add/wishlist/{id}', 'Frontend\WishlistController@insert');
Route::get('/wishlist/delete/{id}', 'Frontend\WishlistController@delete');
Route::get('/allproduct/wishlist', 'Frontend\WishlistController@getproduct');



Route::get(md5('/customer/login'), 'Frontend\FrontendController@customerLogin')->name('customer.login');
Route::get(md5('/customer/register'), 'Frontend\FrontendController@customerRegister')->name('customer.register');



Route::get('/product/compare/page', 'Frontend\CompareProductController@productCompare')->name('product.compare');
Route::get('/product/compare/{com_id}', 'Frontend\CompareProductController@necompare');
Route::get('/compare/delete/{id}', 'Frontend\CompareProductController@delete');
// wish list end


Route::group(['prefix' => 'dashboard', 'namespace'=> 'Frontend',], function () {
    Route::get('customer/account', 'CustomerController@customerAccount')->name('customer.account');
    Route::post('customer/account/update', 'CustomerController@customerAccountUpdate')->name('customer.account.update');
});

Route::get('/customer/order', 'Frontend\FrontendController@customerOrder')->name('customer.order');
Route::get('/customer/order/info/{id}', 'Frontend\FrontendController@customerOrderInfo')->name('customer.order.info');
Route::get(md5('/customer/order/return'), 'Frontend\FrontendController@customerOrderReturn')->name('customer.order.return');
Route::get(md5('/customer/gift/voucher'), 'Frontend\FrontendController@customerGiftVoucher')->name('customer.gift.voucher');

Route::get('/product/detailssearch/', 'Frontend\FrontendController@searchcate')->name('products.search.cate');

// traking
Route::get('/tracking', 'Frontend\FrontendController@tracking');
Route::get('tracking/order', 'Frontend\FrontendController@ordertracking');
// faq
Route::get('/faq', 'Frontend\FrontendController@faqpage');
Route::get('/support', 'Frontend\FrontendController@supportpage');
Route::get('/warranty', 'Frontend\FrontendController@warrantypage');
Route::post('product/review', 'Frontend\FrontendController@productreview');
// Route Created By Harrison


Route::get('admin/product/varient', 'Frontend\FrontendController@provarient')->name('products.variant_price');



//Route::get('category/details/{slug}', 'Frontend\FrontendController@categorydetails');




Route::group(['prefix' => 'subscriber', 'namespace' => 'Frontend'], function () {

    Route::get('add', 'SubscribeController@insert')->name('frontend.subscriber.insert');

});

Route::group(['prefix' => 'contract_us', 'namespace' => 'Frontend'], function () {

    Route::get('/', 'ContractUsController@index')->name('frontend.contract.us.index');
    Route::post('send/message', 'ContractUsController@sendMessage')->name('frontend.contract.us.send.message');

});

Route::group(['prefix' => 'authentication', 'namespace' => 'Auth'], function () {

    Route::get('users/registred/success/{email}', 'RegisterController@userRegistrationSuccess')->name('user.auth.registration.success');
    Route::get('users/email/verification/{token}', 'RegisterController@emailVerification')->name('user.auth.verification');


});

// Route Created By Harrison Ended

// Theme Selector area start

Route::get(md5('admin/theme/selector/show'), 'Admin\ThemeOptionController@themeSelectorPageShow')->name('theme.selector.show');
Route::post('admin/theme/selector/change', 'Admin\ThemeOptionController@themeSelectorPageChange')->name('admin.theme.option.change');


Route::get('admin/product/modal/show', 'Admin\ThemeOptionController@productModal');



// add to cart area start

Route::get('add/to/cart', 'Frontend\AddToCartController@addToCart')->name('product.add.cart');
Route::get('get/cart/data', 'Frontend\AddToCartController@getCartData')->name('get.cart.data');


Route::post('add/to/cart/show', 'Frontend\AddToCartController@addToCartShow')->name('add.cart.show');
Route::post('add/to/cart/delete', 'Frontend\AddToCartController@addToCartDelete')->name('add.cart.delete');


// Product view cart
Route::get(md5('/product/cart/page'), 'Frontend\AddToCartController@productViewCart')->name('product.cart.add');
Route::post('/product/cart/update', 'Frontend\AddToCartController@viewCartUpdate')->name('product.cart.update');
Route::post('/product/cart/delete', 'Frontend\AddToCartController@viewCartDelete')->name('product.cart.delete');


// checkout route start here
Route::get(md5('/checkout/page/show'), 'Frontend\CheckoutController@checkoutshow')->name('checkout.page.show');
Route::get(md5('/checkout/customer/login'), 'Frontend\CheckoutController@CustomerLogin')->name('checkout.login.show');
Route::post(md5('/checkout/customer/login'), 'Frontend\CheckoutController@authenticate')->name('checkout.login');
Route::get(md5('/checkout/order/data'), 'Frontend\CheckoutController@orderData')->name('get.order.data');
Route::post(md5('/order/data/update'), 'Frontend\CheckoutController@orderDataUpdate')->name('product.order.update');
Route::post(md5('/order/data/delete'), 'Frontend\CheckoutController@orderDataDelete')->name('product.order.delete');

//  Add Ajax route for getting courier by upazila ID !
// Created By Harrison
Route::get('get/courier/by/upazila/id/{upazilaId}', 'Frontend\CheckoutController@getCourierByUpazila');
Route::get('check/courier/cash_on_deliviry/{upazila_id}/{courier_id}', 'Frontend\CheckoutController@checkCourierCashOnDeliviry');

// cart all product show


Route::post('add/to/cart/show', 'Frontend\AddToCartController@addToCartShow')->name('add.cart.show');
Route::post('cart/data/delete', 'Frontend\AddToCartController@cartDataDelete')->name('cart.data.delete');
Route::post('add/to/cart/delete', 'Frontend\AddToCartController@addToCartDelete')->name('add.cart.delete');

Route::get('addtocart/test/', 'Frontend\AddToCartController@adtest')->name('addtest.cart');

// used cupon area start

Route::post('customer/used/cupon', 'Frontend\CheckoutController@usedCupon')->name('customer.used.cupon');

Route::post('customer/apply/cupon', 'Frontend\CheckoutController@applyCupon')->name('customer.apply.cupon');
Route::get('get/cupon/value/{oderid}', 'Frontend\CheckoutController@applyCuponValue');

// place order area start

Route::post('place/order/submit', 'Frontend\CheckoutController@orderSubmit')->name('place.order.submit');
Route::get('/user/division/name/{id}', 'Frontend\CheckoutController@userCountrySubmit');
Route::get('/user/district/name/{id}', 'Frontend\CheckoutController@userDivisionSubmit');
Route::get('/user/upazila/name/{id}', 'Frontend\CheckoutController@userUpazilaSubmit');


Route::get('/pay-with-paypal', 'Frontend\CheckoutController@paywithpaypal')->name('payment.paypal');
Route::get('/payment/success', 'Frontend\CheckoutController@paymentsuccess');
Route::get('/text', 'Frontend\CheckoutController@text');

// user controller
route::get(md5('admin/user/add'),'admin\UserController@add')->name('admin.user.add');
route::get(md5('admin/user/all'),'admin\UserController@index')->name('admin.user.all');
route::get('admin/user/edit/{id}','admin\UserController@edit');
route::post(md5('admin/user/insert'),'admin\UserController@insert')->name('admin.userlist.insert');
route::post(md5('admin/user/update'),'admin\UserController@update')->name('admin.userlist.update');
route::get('admin/user/delete/{id}','admin\UserController@delete');
// custommer

route::get(md5('admin/custommer/all'),'admin\UserController@customer')->name('admin.custommer.all');
route::get('admin/customer/delete/{id}','admin\UserController@customerdelete');




// site banner
route::get(md5('admin/sitebanner/all'),'admin\SiteBannerController@sitebanner')->name('admin.sitebanner.all');
Route::get('admin/sitebanner/deactive/{id}','Admin\SiteBannerController@sitebannerdeactive');
Route::get('admin/sitebanner/active/{id}','Admin\SiteBannerController@sitebanneractive');
Route::get('admin/sitebanner/softdelete/{id}','Admin\SiteBannerController@sitebabnsoftdelete');
Route::get('/get/admin/sitebanner/edit/{id}','Admin\SiteBannerController@sitebabnsoftedit');
Route::get('admin/sitebanner/restore/{id}','Admin\SiteBannerController@sitebanrestore');
Route::get('admin/sitebanner/hearddelete/{id}','Admin\SiteBannerController@sitebahearddel');
route::post(md5('admin/sitebanner/insert'),'admin\sitebannercontroller@sitebannerinsert')->name('admin.sitebanner.insert');
route::post(md5('admin/sitebanner/update'),'admin\sitebannercontroller@sitebannerupdate')->name('admin.sitebanner.update');
route::post(md5('admin/sitebanner/multisoftdelete'),'admin\sitebannercontroller@sitebanmultisoft')->name('admin.sitebanner.multisoftdelete');




// cupon
Route::get(md5('admin/trash/cupon'), 'Admin\TrashController@cupon')->name('admin.trash.cupon');
Route::post('admin/trash/cupon/multipledelete', 'Admin\TrashController@cuponmultidelete')->name('admin.trash.cupondelete');
Route::get(md5('admin/trash/faq'), 'Admin\TrashController@faqtrash')->name('admin.trash.faq');
Route::post('admin/trash/multihearddelfaq', 'Admin\TrashController@multihearddelfaq')->name('');

// page trash
Route::get(md5('admin/trash/page'), 'Admin\TrashController@page')->name('admin.trash.page');
Route::post(md5('admin/trash/multidelpage'), 'Admin\TrashController@pagemultdel')->name('admin.trash.pagemultidel');
Route::get(md5('admin/trash/sitebanner'), 'admin\trashcontroller@sitebanner')->name('admin.trash.sitebanner');
Route::post(md5('admin/trash/sitebanner/multipledelete'), 'admin\trashcontroller@sitebanmultidel')->name('admin.trash.sitebannerdel');



// order Controller



Route::get(md5('admin/product/order'), 'admin\ordercontroller@index')->name('admin.productorder');
Route::get(md5('admin/product/process'), 'admin\ordercontroller@processproduct')->name('admin.productprocess');

Route::get(md5('admin/product/ondelevery'), 'admin\ordercontroller@ondelevery')->name('admin.ondevelery');
Route::get(md5('admin/product/complateorder'), 'admin\ordercontroller@complateorder')->name('admin.complateorder');
Route::post('admin/delevary/status', 'Admin\OrderController@deleverystatus');

Route::get('admin/delevary/rejecteorder', 'Admin\OrderController@rejecteorder')->name('admin.rejecteorder');


// Blog route start from here
Route::get('admin/blog/page', 'Admin\BlogController@blogpage')->name('admin.blog.page');


//
Route::get('admin/product/order/pendingsoftdelete/{id}', 'Admin\OrderController@pendingsoftdelete');
Route::get('admin/product/order/invoice/{id}', 'Admin\OrderController@invoice');
Route::get('admin/product/order/restore/{id}', 'Admin\OrderController@orderrestore');
Route::post('admin/product/order/multideletepending', 'admin\ordercontroller@multideletepending')->name('admin.pendingsoftdelete');
Route::any('admin/product/status/paymentorder', 'admin\ordercontroller@paymentorder')->name('products.orderpayment');
Route::get('admin/product/order/hearddelete/{id}', 'Admin\OrderController@orderhearddelete');

// Report controller

Route::get(md5('admin/product/stockreport'),'admin\reportcontroller@productstockreport')->name('admin.product.stock');
Route::get('/get/admin/report/category/filter','Admin\ReportController@categoryreport');
Route::get(md5('admin/product/wishlist'),'admin\reportcontroller@wishproduct')->name('admin.product.wishlistpro');
Route::get(md5('admin/product/bestsell'),'admin\reportcontroller@bestsell')->name('admin.bestsell');


//Harrison start
Route::group(['prefix' => 'admin/flash/deal', 'middleware' => 'auth:admin', 'namespace'=> 'Admin'], function(){

    Route::get('/', 'FlashDealController@index')->name('admin.flash.deal.index');
    Route::get('create', 'FlashDealController@create')->name('admin.flash.deal.create');
    Route::post('store', 'FlashDealController@insert')->name('admin.flash.deal.insert');
    Route::get('change/status/{flashDealId}', 'FlashDealController@changeStatus')->name('admin.flash.deal.change.status');
    Route::get('edit/{flashDealId}', 'FlashDealController@edit')->name('admin.flash.deal.edit');
    Route::post('update/{flashDealId}', 'FlashDealController@update')->name('admin.flash.deal.update');
    Route::get('soft/delete/{flashDealId}', 'FlashDealController@softDelete')->name('admin.flash.deal.soft.delete');
    Route::post('multiple.soft.delete', 'FlashDealController@multipleSoftDelete')->name('admin.flash.deal.multiple.soft.delete');
    Route::get('all/trash/view', 'FlashDealController@allFlashDealTrashView')->name('admin.flash.deal.trash.view');

    Route::get('single/refactor/{flashDealId}', 'FlashDealController@singleRefactor')->name('admin.flash.deal.single.refactor');
    Route::get('single/force/delete/{flashDealId}', 'FlashDealController@singleForceDelete')->name('admin.flash.deal.single.force.delete');
    Route::post('multiple/force/delete', 'FlashDealController@multipleForceDelete')->name('admin.flash.deal.multiple.force.delete');
    Route::get('deactive/all', 'FlashDealController@inactiveAll')->name('admin.flash.deal.all.decative');
    // Ajax call route
    Route::get('get/selected/products/by/ajax', 'FlashDealController@getProductsByAjax');
    Route::get('get/selected/previous/and/new/products/by/ajax', 'FlashDealController@getProductsPreviousAndNewByAjax');
    // Ajax call route end

});



Route::group(['prefix' => 'admin/subscriber/mail', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::get('send/section', 'SubscriberController@mailSendSection')->name('admin.subscriber.send.section');
    Route::get('mail/details/{mailId}', 'SubscriberController@mailDetails')->name('admin.subscriber.mail.details');
    Route::get('/compose', 'SubscriberController@mailComposeSection')->name('admin.subscriber.mail.compose');
    Route::post('send', 'SubscriberController@mailSend')->name('admin.subscriber.send.mail');
    Route::post('multiple/delete', 'SubscriberController@multipleDelete')->name('contract.multiple.delete');
    Route::get('reply/{mailId}', 'SubscriberController@replyMail')->name('admin.contract.reply.mail');
    Route::post('reply/or/draft/{mailId}', 'SubscriberController@mailReplyOrDraft')->name('admin.mail.reply.or.draft');
    Route::get('all/draft', 'SubscriberController@allDraftMails')->name('admin.mail.all.draft');
    Route::post('delete/draft', 'SubscriberController@deleteDraft')->name('admin.delete.draft.mail');
    Route::get('trash', 'SubscriberController@trashMails')->name('admin.trash.mail');
    Route::post('force/delete/or/restore', 'SubscriberController@forceDeleteOrRestore')->name('admin.mail.delete.or.restore');
    Route::get('send/draft/mail/{draftId}', 'SubscriberController@sendDraftMailSection')->name('admin.send.draft.mail');
    Route::post('reply/or/draft/from/draft/mail{draftId}', 'SubscriberController@replyOrDraft')->name('admin.mail.reply.or.draft.from.draft');

});
//Harrison start ended


Route::group(['prefix' => 'admin/courier', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('selected/show', 'couriercontroller@index')->name('courier.index');
    Route::get('sync', 'couriercontroller@couriersyncview')->name('courier.sync.view');
    Route::post('sync/insert', 'couriercontroller@couriersyncinsert')->name('courier.sync.insert');
    Route::get('sync/edit/{subDistrictId}', 'couriercontroller@couriersyncedit')->name('courier.sync.edit');
    Route::post('sync/sync/update/{subDistrictId}', 'couriercontroller@couriersyncupdate')->name('courier.sync.update');
    Route::get('sync/sync/delete/{subDistrictId}', 'couriercontroller@couriersyncdelete')->name('courier.sync.delete');
    Route::post('store', 'couriercontroller@courierstore')->name('courier.store');

    // Ajax Route
    Route::get('get/district/by/division/id/{divisionId}', 'CourierController@getDistrictByAjax');
    Route::get('get/sub_district/by/district/id/{districtId}', 'CourierController@getSubDistrictByAjax');
    Route::get('get/couriers/by/courier_id', 'CourierController@getCouriersByAjax');
    Route::get('get/courier/for/update', 'CourierController@getCouriersForUpdateByAjax');
    // Ajax Route Ended
    });


    // Search Route Created By Harrison

Route::get('search/product/by/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductByAjax');
Route::get('search/product/by/main/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductByMainCatByAjax');
Route::get('search/product/by/sub/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductBySubCatByAjax');
Route::get('search/product/by/re_sub/category/{categoryId}/{productName}', 'Frontend\SearchController@searchProductByResubCatByAjax');


// Search Route Created By Harrison Ended


// Payment Route Created By Harrison

Route::group(['prefix' => 'payment', 'namespace' => 'Frontend'], function () {
    Route::get('stripe/{payment_secure_id}', 'PaymentController@index')->name('stripe.index');
    Route::post('stripe/submit/{payment_secure_id}', 'PaymentController@stripeSubmit')->name('payment.stripe.submit');
    Route::get('stripe/success/payment', 'PaymentController@successStripePaymentView')->name('payment.stripe.success.view');
    //SSL COMMERCEZ

    Route::post('ssl_commercez/success', 'PaymentController@sslSuccess');
    Route::post('ssl_commercez/fail', 'PaymentController@sslFail');
    Route::post('ssl_commercez/cancel', 'PaymentController@sslCancel');
    // 2checkout
    Route::get('2checkout/redirect', 'PaymentController@redirectToCheckout');
});

// Payment Route Created By Harrison Ended
