<?php


/**
 *
 * ------------------------------------
 * Backoffice Routes
 * ------------------------------------
 *
 */

Route::group(

	array(
		'as' => "backoffice.",
		'prefix' => "admin",
		'namespace' => "Backoffice",
	),

	function() {

		$this->group(['as' => "auth.", 'namespace' => "Auth"], function() {
			$this->get('login/{redirect_uri?}', ['as' => "login", 'uses' => "LoginController@login"]);
			$this->post('login/{redirect_uri?}', ['as' => "authenticate", 'uses' => "LoginController@authenticate"]);
			$this->any('logout', ['as' => "logout", 'uses' => "LoginController@logout"]);
			$this->get('register', ['as' => "register", 'uses' => "RegisterController@register"]);
			$this->post('register', ['as' => "store", 'uses' => "RegisterController@store"]);
			$this->get('forgot-password', ['as' => "forgot_password", 'uses' => "ForgotPasswordController@showForgotPasswordView"]);
			$this->post('forgot-password', ['as' => "sendPasswordResetToken", 'uses' => "ForgotPasswordController@sendPasswordResetToken"]);
			$this->get('reset-password/{token?}', ['as' => "reset_password", 'uses' => "ResetPasswordController@showResetPasswordView"]);
			$this->post('reset-password/{token?}', ['as' => "processPasswordResetToken", 'uses' => "ResetPasswordController@processPasswordResetToken"]);
		});

		$this->group(['middleware' => "backoffice.auth"], function(){

			$this->get('/', ['as' => "index", 'uses' => "DashboardController@index"]);

			$this->group(['prefix' => "report",'as' => "report."],function(){
				$this->get('/', ['as' => "index", 'uses' => "DashboardController@report"]);
				$this->get('{id?}', ['as' => "show", 'uses' => "DashboardController@report_item"]);
			});

			$this->group(['as' => "profile.", 'prefix' => "profile"], function() {
				$this->get('/', ['as' => "index", 'uses' => "ProfileController@index"]);
				$this->group(['prefix' => "update"], function(){
					$this->post('profile', ['as' => "update_profile", 'uses' => "ProfileController@update_profile"]);
					$this->post('password', ['as' => "update_password", 'uses' => "ProfileController@update_password"]);
				});
			});

			$this->group(['as' => "user.", 'prefix' => "users"], function() {
				$this->get('/', ['as' => "index", 'uses' => "UserController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "UserController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "UserController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "UserController@edit"]);
				$this->post('profile/{id?}', ['as' => "update_profile", 'uses' => "UserController@update_profile"]);

				$this->post('password/{id?}', ['as' => "update_password", 'uses' => "UserController@update_password"]);
				
				$this->get('trash', ['as' => "trash", 'uses' => "UserController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "UserController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "UserController@destroy"]);

				$this->get('{id}/farm/{farm_id?}', ['as' => "farm", 'uses' => "UserController@farm"]);

				$this->get('{id}/farm/{farm_id?}/edit', ['as' => "edit_farm", 'uses' => "UserController@edit_farm"]);
				$this->post('{id}/farm/{farm_id?}/edit', ['as' => "update_farm", 'uses' => "UserController@update_farm"]);

			});

			$this->group(['as' => "response_message.", 'prefix' => "responses"], function() {
				$this->get('/', ['as' => "index", 'uses' => "ResponseMessageController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "ResponseMessageController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "ResponseMessageController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "ResponseMessageController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "ResponseMessageController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "ResponseMessageController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "ResponseMessageController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "ResponseMessageController@destroy"]);
			});

			$this->group(['as' => "advertisement.", 'prefix' => "advertisement"], function() {
				$this->get('/', ['as' => "index", 'uses' => "AdvertisementController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "AdvertisementController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "AdvertisementController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "AdvertisementController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "AdvertisementController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "AdvertisementController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "AdvertisementController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "AdvertisementController@destroy"]);
			});

			$this->group(['as' => "advisory.", 'prefix' => "advisory"], function() {
				$this->get('/', ['as' => "index", 'uses' => "AdvisoryController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "AdvisoryController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "AdvisoryController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "AdvisoryController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "AdvisoryController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "AdvisoryController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "AdvisoryController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "AdvisoryController@destroy"]);
			});

			$this->group(['as' => "image_slider.", 'prefix' => "image-slider"], function() {
				$this->get('/', ['as' => "index", 'uses' => "ImageSliderController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "ImageSliderController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "ImageSliderController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "ImageSliderController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "ImageSliderController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "ImageSliderController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "ImageSliderController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "ImageSliderController@destroy"]);
			});

			$this->group(['as' => "image_asset.", 'prefix' => "image-asset"], function() {
				$this->get('/', ['as' => "index", 'uses' => "ImageAssetController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "ImageAssetController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "ImageAssetController@store"]);
				$this->get('show/{id?}', ['as' => "edit", 'uses' => "ImageAssetController@edit"]);
				$this->post('show/{id?}', ['as' => "update", 'uses' => "ImageAssetController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "ImageAssetController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "ImageAssetController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "ImageAssetController@destroy"]);
			});

			$this->group(['as' => "blog.", 'prefix' => "blogs"], function() {
				$this->get('/', ['as' => "index", 'uses' => "BlogController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "BlogController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "BlogController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "BlogController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "BlogController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "BlogController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "BlogController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "BlogController@destroy"]);
			});

			$this->group(['as' => "partner.", 'prefix' => "partners"], function() {
				$this->get('/', ['as' => "index", 'uses' => "PartnerController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "PartnerController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "PartnerController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "PartnerController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "PartnerController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "PartnerController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "PartnerController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "PartnerController@destroy"]);
			});

			$this->group(['as' => "product.", 'prefix' => "products"], function() {
				$this->get('/', ['as' => "index", 'uses' => "ProductController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "ProductController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "ProductController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "ProductController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "ProductController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "ProductController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "ProductController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "ProductController@destroy"]);
			});

			$this->group(['as' => "solution.", 'prefix' => "solutions"], function() {
				$this->get('/', ['as' => "index", 'uses' => "SolutionController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "SolutionController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "SolutionController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "SolutionController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "SolutionController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "SolutionController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "SolutionController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "SolutionController@destroy"]);
			});

			$this->group(['as' => "general_setting.", 'prefix' => "general-settings"], function() {
				$this->get('/', ['as' => "index", 'uses' => "GeneralSettingController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "GeneralSettingController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "GeneralSettingController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "GeneralSettingController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "GeneralSettingController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "GeneralSettingController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "GeneralSettingController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "GeneralSettingController@destroy"]);
			});

			$this->group(['as' => "team.", 'prefix' => "team"], function() {
				$this->get('/', ['as' => "index", 'uses' => "TeamController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "TeamController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "TeamController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "TeamController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "TeamController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "TeamController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "TeamController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "TeamController@destroy"]);
			});

			$this->group(['as' => "page.", 'prefix' => "pages"], function() {
				$this->get('/', ['as' => "index", 'uses' => "PageController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "PageController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "PageController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "PageController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "PageController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "PageController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "PageController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "PageController@destroy"]);
			});

			$this->group(['as' => "station.", 'prefix' => "stations"], function() {
				$this->get('/', ['as' => "index", 'uses' => "StationController@index"]);
				$this->get('map', ['as' => "map", 'uses' => "StationController@map"]);

				$this->get('create', ['as' => "create", 'uses' => "StationController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "StationController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "StationController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "StationController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "StationController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "StationController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "StationController@destroy"]);
			});

			$this->group(['as' => "activity.", 'prefix' => "farm-activities"], function() {
				$this->get('/', ['as' => "index", 'uses' => "FarmActivityController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "FarmActivityController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "FarmActivityController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "FarmActivityController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "FarmActivityController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "FarmActivityController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "FarmActivityController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "FarmActivityController@destroy"]);
			});

			$this->group(['as' => "crop.", 'prefix' => "crops"], function() {
				$this->get('/', ['as' => "index", 'uses' => "CropController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "CropController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "CropController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "CropController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "CropController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "CropController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "CropController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "CropController@destroy"]);
			});

			$this->group(['as' => "registrant.", 'prefix' => "registrants"], function() {
				$this->get('/', ['as' => "index", 'uses' => "RegistrantContactController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "RegistrantContactController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "RegistrantContactController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "RegistrantContactController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "RegistrantContactController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "RegistrantContactController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "RegistrantContactController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "RegistrantContactController@destroy"]);
			});

			$this->group(['as' => "recommendation.", 'prefix' => "recommendations"], function() {
				$this->get('/', ['as' => "index", 'uses' => "RecommendationController@index"]);
				$this->get('create', ['as' => "create", 'uses' => "RecommendationController@create"]);
				$this->post('create', ['as' => "store", 'uses' => "RecommendationController@store"]);
				$this->get('edit/{id?}', ['as' => "edit", 'uses' => "RecommendationController@edit"]);
				$this->post('edit/{id?}', ['as' => "update", 'uses' => "RecommendationController@update"]);
				$this->get('trash', ['as' => "trash", 'uses' => "RecommendationController@trash"]);
				$this->any('restore/{id?}', ['as' => "recover", 'uses' => "RecommendationController@recover"]);
				$this->any('delete/{id?}', ['as' => "destroy", 'uses' => "RecommendationController@destroy"]);
			});


		});
	}
);