<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@HomePage');
Route::get('/about', 'HomeController@aboutPage');

Route::get('/contact-us', 'HomeController@contact');
Route::post('/send/contact', 'ContactController@sendContact')->name('send.contact');

Route::get('/services', 'HomeController@servicesPage');

Route::get('/projects', 'HomeController@projectsPage');

Route::get('/blogs', 'HomeController@blogsPage');
Route::get('/blogs/{id}/{title}', 'HomeController@showBlog')->name('blog.show');

Route::get('/lang/{language}', 'HomeController@changeLanguage');

Route::get('flights', 'FlightController@showAll');
Route::get('flights/search', 'FlightController@showSearchFlights');
Route::get('flight/{id}', 'FlightController@showFlight');
Route::post('flight/book', 'FlightController@bookFlight');

Route::get('trips', 'TripController@showAll');
Route::get('trips/search', 'TripController@showSearchTrips');
Route::get('trip/{id}/{title}', 'TripController@showTrip');
Route::post('trip/book', 'TripController@bookTrip');

Route::get('hotels', 'HotelController@showAll');
Route::get('hotels/search', 'HotelController@showSearchHotels');
Route::get('offer/{id}', 'HotelController@showOffer');
Route::post('hotel/book', 'HotelController@bookHotel');


// Admin ROUTES
Auth::routes(['register' => false]);

Route::get('lang/{lang}','Admin\LanguageController@changeLanguage')->name('admin.lang');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'] , function () {

    Route::get('dashboard', 'AdminController@showDashboard');

    Route::resource('slider', 'SliderController');

    Route::resource('services', 'ServiceController');

    Route::resource('projects', 'ProjectController');

    Route::resource('contacts', 'ContactController');

    Route::resource('about', 'AboutUsController');

    Route::resource('testimonials', 'TestimonialController');

    Route::resource('blogs', 'BlogController');

    Route::resource('team-members', 'TeamMemberController');

    Route::resource('contactus', 'ContactUsController');

    Route::resource('categories', 'CategoryController');

    Route::resource('hotels', 'HotelController')->except('show');

    Route::resource('hotels/offers', 'HotelOfferController')->except('show');

    Route::resource('flights', 'FlightController')->except('show');

    Route::resource('trips', 'TripController')->except('show');

    Route::resource('booking-orders', 'BookingOrderController')->except('show');
    Route::post('change/status/{id}', 'BookingOrderController@changeStatus')->name('change.status');

    Route::get('settings/contact-info', 'ContactInfoController@contactInfo')->name('settings.contact');
    Route::post('settings/contact-info', 'ContactInfoController@store')->name('settings.contact.store');

    Route::get('settings/seo', 'SeoController@showSeoPage')->name('settings.seo');
    Route::post('settings/seo', 'SeoController@store')->name('settings.seo.store');

    Route::get('settings/analytics', 'AnalyticsController@showPage')->name('settings.analytics');
    Route::post('settings/analytics', 'AnalyticsController@store')->name('settings.analytics');

    Route::resource('website-settings', 'SettingController');

    Route::resource('logos', 'LogoController');

    Route::post('upload/image', 'ImageController@uploadPhoto')->name('upload.image');
    Route::post('remove/image', 'ImageController@removePhoto')->name('remove.image');

    Route::get('profile/edit', 'ProfileController@edit')->name('edit.profile');
    Route::post('profile/edit', 'ProfileController@update')->name('update.profile');

    Route::get('themes', 'ThemeController@index')->name('themes.index');
    Route::post('themes/{id}', 'ThemeController@changeTheme')->name('themes.change');

    Route::get('themes/{name}', 'ThemeController@showTheme')->name('theme.show');

    Route::get('settings/tokens', 'FacebookController@showPage')->name('settings.tokens');
    Route::post('settings/tokens', 'FacebookController@store')->name('settings.tokens');

    Route::get('clear/notifications', 'NotificationController@clearAll')->name('clear.notifications');
    Route::get('view/notifications', 'NotificationController@viewAll')->name('view.notifications');
});
