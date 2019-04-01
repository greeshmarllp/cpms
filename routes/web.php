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

Route::get('/', 'FrontController@index');
Route::get('/about', 'FrontController@about');
Route::get('/associates', 'FrontController@associates');
Route::get('/gallery', 'FrontController@gallery');
Route::get('/contact-us', 'FrontController@contact_us');
Route::get('/catalogue/{id}', 'FrontController@catalogue');
Route::get('/catalogue/{firstlevel}/{id}', 'FrontController@catalogue');
Route::get('/catalogue/{secondlevel}/{id}', 'FrontController@catalogue');
Route::get('/catalogue/{thirdlevel}/{id}', 'FrontController@catalogue');
Route::get('/catalogue/{fourthlevel}/{id}', 'FrontController@catalogue');


Auth::routes();
Route::get('/admin', 'LoginController@index');

Route::get('/admin/home', 'HomeController@index')->name('admin/home');











Route::get('/admin/contact','HomeController@contact');
Route::post('/admin/save_contact', 'SavecontactController@save_contact');

Route::get('admin/logout', function() {
	Session::forget('key');
	if(!Session::has('key'))
	{
		return Redirect::to('/admin');
	}
});

Route::get('/admin/gallery','HomeController@gallery'); 
Route::post('/admin/gallery-save', 'GallleryController@save');
Route::get('/admin/add-gallery/{id}', 'HomeController@add_gallery');

Route::get('/admin/banner','HomeController@banner'); 
Route::get('/admin/add-banner/{id}', 'HomeController@add_banner');
Route::post('/admin/save-banner/{id}', 'BannerController@save');

Route::get('/admin/testimonials', 'HomeController@testimonials');
Route::get('/admin/add-new-testimonial/{id}', 'TestimonialController@add_new_testimonial');
Route::post('/admin/save-testimonial/{id}', 'TestimonialController@save_testimonial');
Route::get('/admin/edit-testimonial/{id}', 'TestimonialController@add_new_testimonial');

Route::get('/admin/faq', 'HomeController@faq');
Route::get('/admin/add-new-faq/{id}', 'FaqController@add_new_faq');
Route::post('/admin/save-faq/{id}', 'FaqController@save_faq');
Route::get('/admin/edit-faq/{id}', 'FaqController@add_new_faq');


Route::get('/admin/rentals-faq', 'HomeController@rentals_faq');
Route::get('/admin/add-new-rentalsfaq/{id}', 'RentalsFaqController@add_new_rentalsfaq');
Route::post('/admin/save-rentalsfaq/{id}', 'RentalsFaqController@save_rentalsfaq');
Route::get('/admin/edit-rentalsfaq/{id}', 'RentalsFaqController@add_new_rentalsfaq');


Route::get('/admin/faq-banner', 'HomeController@faq_banner');
Route::get('/admin/add-new-faqbanner/{id}', 'FaqBannerController@add_new_faqbanner');
Route::post('/admin/save-faqbanner/{id}', 'FaqBannerController@save_faqbanner');
Route::get('/admin/edit-faqbanner/{id}', 'FaqBannerController@add_new_faqbanner');

Route::get('/admin/contact-banner', 'HomeController@contact_banner');
Route::get('/admin/add-new-contactbanner/{id}', 'ContactBannerController@add_new_contactbanner');
Route::post('/admin/save-contactbanner/{id}', 'ContactBannerController@save_contactbanner');
Route::get('/admin/edit-contactbanner/{id}', 'ContactBannerController@add_new_contactbanner');

Route::get('/admin/about', 'HomeController@about');
Route::get('/admin/add-new-about/{id}', 'AboutController@add_new_about');
Route::post('/admin/save-about/{id}', 'AboutController@save_about');
Route::get('/admin/edit-about/{id}', 'AboutController@add_new_about');

Route::get('/admin/rentals', 'HomeController@rentals');
Route::get('/admin/add-new-rentals/{id}', 'RentalsController@add_new_rentals');
Route::post('/admin/save-rentals/{id}', 'RentalsController@save_rentals');
Route::get('/admin/edit-rentals/{id}', 'RentalsController@add_new_rentals');

Route::get('/admin/rentals-gallery', 'HomeController@rentals_gallery');
Route::get('/admin/add-new-rentals-gallery/{id}', 'RentalsGalleryController@add_new_rentals_gallery');
Route::post('/admin/save-rentals-gallery/{id}', 'RentalsGalleryController@save_rentals_gallery');
Route::get('/admin/edit-rentals-gallery/{id}', 'RentalsGalleryController@add_new_rentals-gallery');

Route::get('/admin/property-types', 'HomeController@property_types');
Route::get('/admin/add-new-property-types/{id}', 'PropertyTypeController@add_new_property_types');
Route::post('/admin/save-property-types/{id}', 'PropertyTypeController@save_property_types');
Route::get('/admin/edit-property-types/{id}', 'PropertyTypeController@add_new_property_types');

Route::get('/admin/land-lord', 'HomeController@land_lord');
Route::get('/admin/add-new-land-lord/{id}', 'LandLordController@add_new_land_lord');
Route::post('/admin/save-land-lord/{id}', 'LandLordController@save_land_lord');
Route::get('/admin/edit-land-lord/{id}', 'LandLordController@add_new_land_lord');




Route::post('/admin/DeleteTestimonial', 'TestimonialController@DeleteTestimonial');
Route::post('/admin/DeleteBanner', 'BannerController@DeleteBanner');

Route::post('/admin/DeleteGallery', 'GallleryController@DeleteGallery');
Route::post('/admin/DeleteFaq', 'FaqController@DeleteFaq');
Route::post('/admin/DeleteRentalsFaq', 'RentalsFaqController@DeleteRentalsFaq');
Route::post('/admin/DeleteFaqBanner', 'RentalsFaqController@DeleteFaqBanner');
Route::post('/admin/DeleteRentals', 'RentalsController@DeleteRentals');
Route::post('/admin/DeletePropertyTypes', 'PropertyTypeController@DeletePropertyTypes');




