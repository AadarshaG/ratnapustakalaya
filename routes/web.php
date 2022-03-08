<?php

use Illuminate\Support\Facades\Route;

//all frontend
Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index']);
//about us
Route::get('/about-us',[App\Http\Controllers\Frontend\PageController::class,'about']);
//events
Route::get('/events',[App\Http\Controllers\Frontend\PageController::class,'events']);
Route::get('/event/{slug}',[App\Http\Controllers\Frontend\PageController::class,'singleEvent']);
//contact us page
Route::get('/contact-us',[App\Http\Controllers\Frontend\ContactController::class,'contact']);
Route::post('/send',[App\Http\Controllers\Frontend\ContactController::class,'send']);
//become member
Route::get('/membership',[App\Http\Controllers\Frontend\ContactController::class,'membership']);
Route::post('/membership',[App\Http\Controllers\Frontend\ContactController::class,'membershipForm']);
//make enquiry
Route::get('/enquiry',[App\Http\Controllers\Frontend\ContactController::class,'enquiry']);
//donate now
Route::get('/donate-now',[App\Http\Controllers\Frontend\PageController::class,'donate']);
//gallery images
Route::get('/gallery-images',[App\Http\Controllers\Frontend\PageController::class,'gallery']);
//committee members
Route::any('/committee-members',[App\Http\Controllers\Frontend\PageController::class,'committee'])->name('committeeMember');
//upcoming events
Route::get('/upcoming-events',[App\Http\Controllers\Frontend\PageController::class,'upcoming']);


Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function() {
//    require __DIR__.'/admin.php';
//});

/****admin auth section ***/
Route::group(['prefix'=>'admin'],function(){
    Route::get('/register',[App\Http\Controllers\Auth\Admin\RegisterController::class,'showRegisterForm'])->name('admin.register');
    Route::post('/register',[App\Http\Controllers\Auth\Admin\RegisterController::class,'register'])->name('admin.register.post');

    Route::get('/login',[App\Http\Controllers\Auth\Admin\LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login',[App\Http\Controllers\Auth\Admin\LoginController::class,'login'])->name('admin.login.post');
    Route::get('/logout',[App\Http\Controllers\Auth\Admin\LoginController::class,'logout'])->name('admin.logout');

    Route::get('/reset',[App\Http\Controllers\Auth\Admin\ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.request');
    Route::post('/email',[App\Http\Controllers\Auth\Admin\ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.email');

    Route::post('/reset',[App\Http\Controllers\Auth\Admin\ResetPasswordController::class,'reset'])->name('admin.password.update');
    Route::get('/reset/{token}',[App\Http\Controllers\Auth\Admin\ResetPasswordController::class,'showResetForm'])->name('admin.reset');
});

/* dashboard all route */
Route::group(['prefix'=>'ratnapustakalaya','middleware' => ['admin']], function() {
    /* dashboard */
    Route::get('/back-end', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    //about us
    Route::get('abouts',[App\Http\Controllers\Admin\AboutController::class,'index']);
    Route::get('about/create',[App\Http\Controllers\Admin\AboutController::class,'create']);
    Route::post('about/store',[App\Http\Controllers\Admin\AboutController::class,'store']);
    Route::get('about/edit/{id}',[App\Http\Controllers\Admin\AboutController::class,'edit']);
    Route::post('about/update/{id}',[App\Http\Controllers\Admin\AboutController::class,'update']);
    Route::get('about/delete/{id}',[App\Http\Controllers\Admin\AboutController::class,'destroy']);
    Route::get('about/show/{id}',[App\Http\Controllers\Admin\AboutController::class,'show']);

    //sliders
    Route::get('sliders',[App\Http\Controllers\Admin\SliderController::class,'index']);
    Route::get('slider/create',[App\Http\Controllers\Admin\SliderController::class,'create']);
    Route::post('slider/store',[App\Http\Controllers\Admin\SliderController::class,'store']);
    Route::get('slider/edit/{id}',[App\Http\Controllers\Admin\SliderController::class,'edit']);
    Route::post('slider/update/{id}',[App\Http\Controllers\Admin\SliderController::class,'update']);
    Route::get('slider/delete/{id}',[App\Http\Controllers\Admin\SliderController::class,'destroy']);
    Route::get('slider/enable/{id}',[App\Http\Controllers\Admin\SliderController::class,'enableSLider']);
    Route::get('slider/disable/{id}',[App\Http\Controllers\Admin\SliderController::class,'disableSlider']);

    //Blogs
    Route::get('blogs',[App\Http\Controllers\Admin\BlogController::class,'index']);
    Route::get('blog/create',[App\Http\Controllers\Admin\BlogController::class,'create']);
    Route::post('blog/store',[App\Http\Controllers\Admin\BlogController::class,'store']);
    Route::get('blog/edit/{id}',[App\Http\Controllers\Admin\BlogController::class,'edit']);
    Route::post('blog/update/{id}',[App\Http\Controllers\Admin\BlogController::class,'update']);
    Route::get('blog/delete/{id}',[App\Http\Controllers\Admin\BlogController::class,'destroy']);
    Route::get('blog/show/{id}',[App\Http\Controllers\Admin\BlogController::class,'show']);

    //contact info
    Route::get('contacts',[App\Http\Controllers\Admin\ContactController::class,'index']);
    Route::get('contact/create',[App\Http\Controllers\Admin\ContactController::class,'create']);
    Route::post('contact/store',[App\Http\Controllers\Admin\ContactController::class,'store']);
    Route::get('contact/edit/{id}',[App\Http\Controllers\Admin\ContactController::class,'edit']);
    Route::post('contact/update/{id}',[App\Http\Controllers\Admin\ContactController::class,'update']);

    //social links
    Route::get('socials',[App\Http\Controllers\Admin\SocialController::class,'index']);
    Route::get('social/create',[App\Http\Controllers\Admin\SocialController::class,'create']);
    Route::post('social/store',[App\Http\Controllers\Admin\SocialController::class,'store']);
    Route::get('social/edit/{id}',[App\Http\Controllers\Admin\SocialController::class,'edit']);
    Route::post('social/update/{id}',[App\Http\Controllers\Admin\SocialController::class,'update']);
    Route::get('social/delete/{id}',[App\Http\Controllers\Admin\SocialController::class,'destroy']);

    //logo image
    Route::get('logos',[App\Http\Controllers\Admin\LogoController::class,'index']);
    Route::get('logo/create',[App\Http\Controllers\Admin\LogoController::class,'create']);
    Route::post('logo/store',[App\Http\Controllers\Admin\LogoController::class,'store']);
    Route::get('logo/edit/{id}',[App\Http\Controllers\Admin\LogoController::class,'edit']);
    Route::post('logo/update/{id}',[App\Http\Controllers\Admin\LogoController::class,'update']);

    //vlogs
    Route::get('vlogs',[App\Http\Controllers\Admin\VlogController::class,'index']);
    Route::get('vlog/create',[App\Http\Controllers\Admin\VlogController::class,'create']);
    Route::post('vlog/store',[App\Http\Controllers\Admin\VlogController::class,'store']);
    Route::get('vlog/edit/{id}',[App\Http\Controllers\Admin\VlogController::class,'edit']);
    Route::post('vlog/update/{id}',[App\Http\Controllers\Admin\VlogController::class,'update']);
    Route::get('vlog/delete/{id}',[App\Http\Controllers\Admin\VlogController::class,'destroy']);

    //featured image
    Route::get('featureds',[App\Http\Controllers\Admin\FeaturedController::class,'index']);
    Route::get('featured/create',[App\Http\Controllers\Admin\FeaturedController::class,'create']);
    Route::post('featured/store',[App\Http\Controllers\Admin\FeaturedController::class,'store']);
    Route::get('featured/edit/{id}',[App\Http\Controllers\Admin\FeaturedController::class,'edit']);
    Route::post('featured/update/{id}',[App\Http\Controllers\Admin\FeaturedController::class,'update']);

    //informations
    Route::get('informations',[App\Http\Controllers\Admin\InformationController::class,'index']);
    Route::get('information/create',[App\Http\Controllers\Admin\InformationController::class,'create']);
    Route::post('information/store',[App\Http\Controllers\Admin\InformationController::class,'store']);
    Route::get('information/edit/{id}',[App\Http\Controllers\Admin\InformationController::class,'edit']);
    Route::post('information/update/{id}',[App\Http\Controllers\Admin\InformationController::class,'update']);

    //highlighted books
    Route::get('books',[App\Http\Controllers\Admin\BookController::class,'index']);
    Route::get('book/create',[App\Http\Controllers\Admin\BookController::class,'create']);
    Route::post('book/store',[App\Http\Controllers\Admin\BookController::class,'store']);
    Route::get('book/edit/{id}',[App\Http\Controllers\Admin\BookController::class,'edit']);
    Route::post('book/update/{id}',[App\Http\Controllers\Admin\BookController::class,'update']);
    Route::get('book/delete/{id}',[App\Http\Controllers\Admin\BookController::class,'destroy']);
    Route::get('book/enable/{id}',[App\Http\Controllers\Admin\BookController::class,'enableBook']);
    Route::get('book/disable/{id}',[App\Http\Controllers\Admin\BookController::class,'disableBook']);

    //enquiry messages
    Route::get('enquirys',[App\Http\Controllers\Admin\EnquiryController::class,'index']);
    Route::get('enquiry/show/{id}',[App\Http\Controllers\Admin\EnquiryController::class,'show']);
    Route::get('enquiry/enable/{id}',[App\Http\Controllers\Admin\EnquiryController::class,'enableEnquiry']);
    Route::get('enquiry/disable/{id}',[App\Http\Controllers\Admin\EnquiryController::class,'disableEnquiry']);

    //membership messages
    Route::get('members',[App\Http\Controllers\Admin\MemberController::class,'index']);
    Route::get('member/enable/{id}',[App\Http\Controllers\Admin\MemberController::class,'enableMember']);
    Route::get('member/disable/{id}',[App\Http\Controllers\Admin\MemberController::class,'disableMember']);

    //payment methods
    Route::get('payments',[App\Http\Controllers\Admin\PaymentController::class,'index']);
    Route::get('payment/create',[App\Http\Controllers\Admin\PaymentController::class,'create']);
    Route::post('payment/store',[App\Http\Controllers\Admin\PaymentController::class,'store']);
    Route::get('payment/edit/{id}',[App\Http\Controllers\Admin\PaymentController::class,'edit']);
    Route::post('payment/update/{id}',[App\Http\Controllers\Admin\PaymentController::class,'update']);
    Route::get('payment/delete/{id}',[App\Http\Controllers\Admin\PaymentController::class,'destroy']);

    //Qr methods
    Route::get('qrcodes',[App\Http\Controllers\Admin\QrController::class,'index']);
    Route::get('qrcode/create',[App\Http\Controllers\Admin\QrController::class,'create']);
    Route::post('qrcode/store',[App\Http\Controllers\Admin\QrController::class,'store']);
    Route::get('qrcode/edit/{id}',[App\Http\Controllers\Admin\QrController::class,'edit']);
    Route::post('qrcode/update/{id}',[App\Http\Controllers\Admin\QrController::class,'update']);
    Route::get('qrcode/delete/{id}',[App\Http\Controllers\Admin\QrController::class,'destroy']);

    //gallery images
    Route::get('gallerys',[App\Http\Controllers\Admin\GalleryController::class,'index']);
    Route::get('gallery/create',[App\Http\Controllers\Admin\GalleryController::class,'create']);
    Route::post('gallery/store',[App\Http\Controllers\Admin\GalleryController::class,'store']);
    Route::get('gallery/edit/{id}',[App\Http\Controllers\Admin\GalleryController::class,'edit']);
    Route::post('gallery/update/{id}',[App\Http\Controllers\Admin\GalleryController::class,'update']);
    Route::get('gallery/delete/{id}',[App\Http\Controllers\Admin\GalleryController::class,'destroy']);

    //committee category
    Route::get('categorys',[App\Http\Controllers\Admin\CategoryController::class,'index']);
    Route::get('category/create',[App\Http\Controllers\Admin\CategoryController::class,'create']);
    Route::post('category/store',[App\Http\Controllers\Admin\CategoryController::class,'store']);
    Route::get('category/edit/{id}',[App\Http\Controllers\Admin\CategoryController::class,'edit']);
    Route::post('category/update/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update']);
    Route::get('category/delete/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy']);

    //committee members
    Route::get('committees',[App\Http\Controllers\Admin\CommitteeController::class,'index']);
    Route::get('committee/create',[App\Http\Controllers\Admin\CommitteeController::class,'create']);
    Route::post('committee/store',[App\Http\Controllers\Admin\CommitteeController::class,'store']);
    Route::get('committee/edit/{id}',[App\Http\Controllers\Admin\CommitteeController::class,'edit']);
    Route::post('committee/update/{id}',[App\Http\Controllers\Admin\CommitteeController::class,'update']);
    Route::get('committee/delete/{id}',[App\Http\Controllers\Admin\CommitteeController::class,'destroy']);
});
