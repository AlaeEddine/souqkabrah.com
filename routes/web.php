<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::post('/check', [UserController::class, 'check'])->name('check');
Route::post('/traitement', [UserController::class, 'traitementnd'])->name('traitement.nd');

Route::get('/team', [GeneralController::class, 'team'])->name('team');

Route::get('/test', [FirebaseController::class, 'index']);
Route::post('/store-token', [FirebaseController::class, 'storeToken']);
Route::post('/send-notification', [FirebaseController::class, 'sendNotification']);



Route::get('/get/country/from/{ip}',[GeneralController::class, 'getcountryfromip'])->name('get.country.from.ip');
Route::get('/translate/{lang}',[GeneralController::class, 'translate'])->name('translate');
Route::get('/404', [GeneralController::class, 'error404'])->name('error404');
Route::get('/500', [GeneralController::class, 'error500'])->name('error500');
Route::get('/403', [GeneralController::class, 'error403'])->name('error403');
Route::get('/401', [GeneralController::class, 'error401'])->name('error401');
Route::get('/search', [GeneralController::class, 'search'])->name('not.found');
Route::get('/search/tag/{tag}', [GeneralController::class, 'searchtag'])->name('search.tag');
Route::post('/search', [GeneralController::class, 'search'])->name('search');
Route::get('/search/like/add/{id}', [GeneralController::class, 'searchlikeadd'])->name('search.like.add');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'contactsubmit'])->name('contact.submit');
Route::post('/ajax/areas', [GeneralController::class, 'areasfromcities'])->name('ajax.areas.select.from.cities');
Route::post('/ajax/cities', [GeneralController::class, 'citiesfromcountries'])->name('ajax.cities.select.from.countries');
Route::get('/ajax/villages/{city}', [GeneralController::class, 'villagesfromcities'])->name('ajax.villages.select.from.cities');
Route::post('/ajax/cities/selector', [GeneralController::class, 'ajaxselectstorecity'])->name('ajax.select.store.city');
Route::post('/ajax/rating', [GeneralController::class, 'rating'])->name('ajax.rating.insert');
Route::post('/ajax/subcategories', [GeneralController::class, 'subcategoriesfromcategories'])->name('ajax.subcategories.select.from.categories');
Route::post('/ajax/subsubcategories', [GeneralController::class, 'subsubcategoriesfromsubcategories'])->name('ajax.subsubcategories.select.from.subcategories');
Route::post('/ajax/category/from/id', [GeneralController::class, 'categoryfromid'])->name('ajax.get.categories.names.from.id');

/********************OTP START */
Route::get('/otp/validation/{what?}', [OtpController::class, 'otpshow'])->name('otp.validation');
Route::post('/otp/validation/{what?}', [OtpController::class, 'otpverification'])->name('otp.validation.submit');
Route::post('/otp/autovalidation/{code}', [OtpController::class, 'autovalidation'])->name('otp.auto.validation');
Route::get('/otp/sms/validation/{code}', [OtpController::class, 'otpfirebasecreateaccount'])->name('otp.sms.validation');

Route::get('/otp/resend/{what?}/{nd}', [OtpController::class, 'otpresend'])->name('otp.resend');
Route::get('/otp/send/{what?}/{nd}', [OtpController::class,'otpsend'])->name('otp.send');
/********************OTP END */
Route::get('/register/{what?}/{id}',[UserController::class, 'continueregister'])->name('register.user.continue');
Route::post('/register/{what?}/{id}',[UserController::class, 'continueregistersubmit'])->name('register.user.continue.submit');

Route::post('/show/nd/{id_ads}', [ChatController::class, 'shownd'])->name('show.nd');

Route::get('/city/select/{id}', [CountryController::class,'selectcity'])->name('city.select.id');

Route::get('/otp/firebase', [OtpController::class,'otpfirebase'])->name('otp.firebase');


Route::middleware('auth')->group(function () {

    //Route::get('/chat', [ChatController::class,'index'])->name('chat.index');
    Route::get('/chat/{id}', [ChatController::class,'chat'])->name('chat.start');
    Route::post('/chat/user/info', [ChatController::class,'userinfo'])->name('chat.user.info');
    Route::post('/chat/refresh', [ChatController::class,'userinfo'])->name('chat.refresh');
    Route::post('/chat/submit', [ChatController::class,'chatsubmit'])->name('chat.submit');
    Route::post('/chat/count', [ChatController::class,'chatcount'])->name('chat.count');
    Route::post('/notification/count', [NotificationController::class,'notificationcount'])->name('notification.count');


    Route::get('/premium',[GeneralController::class, 'premium'])->name('premium');
    Route::get('/premium/step/2',[GeneralController::class, 'premiumnext'])->name('premium.next');
    Route::get('/premium/step/3/plan/{pack}',[GeneralController::class, 'premiumsubmit'])->name('premium.submit');
    Route::post('/premium/step/4',[GeneralController::class, 'premiumpaymentselect'])->name('premium.payment.select');
    Route::get('/premium/step/4', [GeneralController::class, 'redirectToPremiumPage'])->name('paypal.not.found');


    Route::post('/premium/calculate/price/', [GeneralController::class, 'premiumcalculateprice'])->name('calculate.price.premium');
    Route::post('/paypal', [PayPalController::class, 'paypal'])->name('paypal');
    Route::get('/paypal', [GeneralController::class, 'redirectToPremiumPage'])->name('paypal.not.found');

    Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment.cancel');

    Route::get('/notification', [NotificationController::class, 'notifications'])->name('notification');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
   /* Route::get('/chat/send', [ChatController::class, 'chat.send'])->name('chat.send');*/
    Route::post('/chat/show/nd/{id_ads}', [ChatController::class, 'chatshownd'])->name('chat.show.nd');
    Route::get('/chat/ask/low/price/{id_ads}', [ChatController::class, 'chatasklowprice'])->name('chat.ask.low.price');
    Route::get('/chat/send/automessage/{id_ads}/{id_automessage}', [ChatController::class, 'chatsendautomessage'])->name('chat.send.automessage');
    Route::post('/chat/send/{id_ads}', [ChatController::class, 'chatsend'])->name('chat.send');
    Route::post('/chat/new/{id_ads}', [ChatController::class, 'chatnew'])->name('chat.new');
    Route::get('/account/ads', [AccountController::class, 'showads'])->name('account.ads');
    Route::get('/account/ads/draft', [AccountController::class, 'showdraftads'])->name('account.ads.draft');
    Route::get('/account/ads/likes', [AccountController::class, 'showlikesads'])->name('account.ads.likes');
    Route::get('/account/ads/likers', [AccountController::class, 'showlikersads'])->name('account.ads.likers');
    Route::get('/account/ads/seen', [AccountController::class, 'showseenads'])->name('account.ads.seen');
    Route::get('/account/ads/search/liked', [AccountController::class, 'showsearchlikedads'])->name('account.ads.search.liked');
    Route::get('/account/ads/search/history', [AccountController::class, 'showsearchhistoryads'])->name('account.ads.search.history');
    Route::post('/account/files/upload/{fn_id}', [AccountController::class, 'uploadfiles'])->name('account.files.upload');
    Route::post('/account/files/upload', [AccountController::class, 'uploadfilessubmit'])->name('account.files.upload.submit');
    Route::post('/account/profile/upload', [AccountController::class, 'uploadprofilesubmit'])->name('account.profile.upload.submit');
    Route::post('/ads/picture/upload', [AdController::class, 'uploadpicturesubmit'])->name('ads.picture.upload.submit');
    Route::post('/ads/video/upload', [AdController::class, 'uploadvideosubmit'])->name('ads.video.upload.submit');
    Route::post('/ads/cover/upload', [AdController::class, 'uploadcoversubmit'])->name('ads.cover.upload.submit');
    Route::post('/ads/pictures/upload', [AdController::class, 'uploadpicturessubmit'])->name('ads.pictures.upload.submit');

    Route::get('/payment/request/{ads_id}', [AdController::class, 'paymentrequest'])->name('payment.request');
    Route::get('/payment/ok', [AdController::class, 'paymentok'])->name('payment.ok');
    Route::get('/payment/ok/{ads_id}', [AdController::class, 'paymentok'])->name('payment.ok.with.id');
    Route::get('/payment/abort', [AdController::class, 'paymentabort'])->name('payment.abort');
    Route::get('/payment/abort/{ads_id}', [AdController::class, 'paymentabort'])->name('payment.abort.with.id');

    Route::get('/account/ads/job', [AccountController::class, 'showjobads'])->name('account.ads.job');
    Route::get('/notification/{id}', [NotificationController::class, 'read'])->name('notification.read');
    Route::get('/notification/delete/{id}', [NotificationController::class, 'delete'])->name('notification.delete');
    Route::get('/account', [ProfileController::class, 'show'])->name('account');
    Route::get('/account/tabs/{tab}', [ProfileController::class, 'show'])->name('account.tabs');
    Route::post('/account/tabs/account', [AccountController::class, 'submiteditaccount'])->name('account.update.submit');
    Route::get('/account/statistics', [ProfileController::class, 'statistics'])->name('account.statistics');
    Route::get('/account/cv', [AccountController::class, 'cv'])->name('account.cv');
    Route::post('/account/cv', [AccountController::class, 'cvsubmit'])->name('account.cv.submit');
    Route::get('/account/wallet', [AccountController::class, 'wallet'])->name('account.wallet');
    Route::get('/account/statistics', [ProfileController::class, 'statistics'])->name('account.statistics');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'submit'])->name('profile.submit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /*Route::get('/likes', [LikeController::class, 'likes'])->name('likes');*/
    Route::get('/likes/add/{id}', [LikeController::class, 'likesadd'])->name('likes.add');
    Route::get('/likers/add/{id}', [LikeController::class, 'likersadd'])->name('likers.add');

    Route::get('/privatemessages', [ProfileController::class, 'edit'])->name('privatemessages');
    Route::get('/privatemessages/new/{ads}', [ProfileController::class, 'edit'])->name('private.messages.create');
    Route::get('/notifications', [ProfileController::class, 'edit'])->name('notifications');
    Route::get('/services', [ProfileController::class, 'edit'])->name('services');
    Route::get('/invite', [ProfileController::class, 'edit'])->name('invite');

    Route::get('/ads/create',[AdController::class, 'createads'])->name('ads.create');
    Route::post('/ads/create',[AdController::class, 'createadssubmit'])->name('ads.create.submit');

});

Route::post('/تسجيل-الدخول',[UserController::class, 'login'])->name('login.user');
Route::post('/التسجيل',[UserController::class, 'register'])->name('register.user');

Route::get('/متاجر',[AdController::class, 'storesshow'])->name('stores.show');
Route::get('/ads/remove/{ads}',[AdController::class, 'adsremove'])->name('ads.remove');


Route::get('/',[UserController::class, 'home'])->name('/');
Route::post('/comments/create/{ads}',[AdController::class, 'commentscreatesubmit'])->name('comments.create.submit');
Route::get('/comments/create/{ads}',[AdController::class, 'redirecttoads'])->name('comments.create.redirect');
Route::get('/u/{link}', [AccountController::class, 'getprofilepage'])->name('account.profile.page');
Route::get('/share/{link}', [AccountController::class, 'friends'])->name('invite.friends');

Route::get('/report/ads/{id}',[AdController::class, 'reportads'])->name('report.ads');
Route::get('/report/ads/{ads}/comments/{id}',[AdController::class, 'reportcomments'])->name('report.comments');
Route::get('/report/users/{id}',[UserController::class, 'reportusers'])->name('report.users');

Route::get('/الصفحات/{url}',[PageController::class, 'pages'])->name('pages');
Route::get('/الإعلانات/{ads}',[AdController::class, 'show'])->name('ads');
Route::get('/الإعلانات/{ads}-{AdsTitle}',[AdController::class, 'show'])->name('ads.show');
Route::get('/الإعلانات/{Category}-{CategoryName}/{ads}',[AdController::class, 'show'])->name('ads.with.category');
Route::get('/الإعلانات/{Category}-{CategoryName}/{ads}-{AdsTitle}',[AdController::class, 'show'])->name('ads.with.category.show');
Route::get('/الإعلانات/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}/{ads}',[AdController::class, 'show'])->name('ads.with.subcategory');
Route::get('/الإعلانات/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}/{ads}-{AdsTitle}',[AdController::class, 'show'])->name('ads.with.subcategory.show');
Route::get('/الإعلانات/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}/{SubSubCategory}-{SubSubCategoryName}/{ads}',[AdController::class, 'show'])->name('ads.with.subsubcategory');
Route::get('/الإعلانات/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}/{SubSubCategory}-{SubSubCategoryName}/{ads}-{AdsTitle}',[AdController::class, 'show'])->name('ads.with.subsubcategory.show');

Route::get('/الشركات/{Brand}-{BrandName}',[SearchController::class, 'adsbybrand'])->name('ads.by.brand');
Route::get('/الشركات/{Brand}-{BrandName}/الفئات/{Model}-{ModelName}',[SearchController::class, 'adsbymodel'])->name('ads.by.model');
Route::get('/الشركات/{Brand}-{BrandName}/الفئات/{Model}-{ModelName}/السنة/{Year}',[SearchController::class, 'adsbyyear'])->name('ads.by.year');
Route::get('/البلد/{Country}-{CountryName}/المدينة/{City}-{CityName}/الشركات/{Brand}-{BrandName}/الفئات/{Model}-{ModelName}',[SearchController::class, 'adsbymodelandcity'])->name('ads.by.model.and.city');
Route::get('/البلد/{Country}-{CountryName}/المدينة/{City}-{CityName}/الشركات/{Brand}-{BrandName}/الفئات/{Model}-{ModelName}/السنة/{Year}',[SearchController::class, 'adsbymodelandyear'])->name('ads.by.model.and.year');

Route::get('/البلد/{Country}-{CountryName}',[SearchController::class, 'adsbycountry'])->name('ads.by.country');
Route::get('/البلد/{Country}-{CountryName}/المدينة/{City}-{CityName}',[SearchController::class, 'adsbycity'])->name('ads.by.city');
Route::get('/البلد/{Country}-{CountryName}/المدينة/{City}-{CityName}/الأقسام/{Category}-{CategoryName}',[SearchController::class, 'adsbycategory'])->name('ads.by.category');
Route::get('/البلد/{Country}-{CountryName}/المدينة/{City}-{CityName}/الأقسام/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}',[SearchController::class, 'adsbysubcategory'])->name('ads.by.subcategory');
Route::get('/البلد/{Country}-{CountryName}/المدينة/{City}-{CityName}/الأقسام/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}/{SubSubCategory}-{SubSubCategoryName}',[SearchController::class, 'adsbysubsubcategory'])->name('ads.by.subsubcategory');


Route::get('/الأقسام',[CategoryController::class, 'allcategories'])->name('allcategories');

Route::get('/الأقسام/{Category}-{CategoryName}',[CategoryController::class, 'home'])->name('category');
Route::get('/الأقسام/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}',[SubCategoryController::class, 'home'])->name('subcategory');
Route::get('/الأقسام/{Category}-{CategoryName}/{SubCategory}-{SubCategoryName}/{SubSubCategory}-{SubSubCategoryName}',[SubSubCategoryController::class, 'home'])->name('subsubcategory');


require __DIR__.'/auth.php';
