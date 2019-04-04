<?php


/**
 *
 * ------------------------------------
 * Api Routes
 * ------------------------------------
 *
 */

Route::group(

	array(
		'as' => "api.",
		'namespace' => "Api",
	),

	function() {

		$this->any('app-settings.{format?}', ['as' => "index", 'uses' => "AppSettingController@index"]);

		$this->any('get-country.{format?}', ['as' => "get_country", 'uses' => "AppSettingController@get_country"]);

		$this->group(['as' => "auth.", 'prefix' => "auth", 'namespace' => "Auth"], function () {
			$this->post('login.{format?}', ['as' => "login", 'uses' => "LoginController@authenticate"/*, 'middleware' => "api.verify-auth-code"*/]);
			$this->post('v2/login.{format?}', ['as' => "login_v2", 'uses' => "LoginController@authenticate_v2"/*, 'middleware' => "api.verify-auth-code"*/]);
			$this->post('resend-code.{format?}', ['as' => "resend_code", 'uses' => "LoginController@resend_code"]);
			$this->post('fb-login.{format?}', ['as' => "fb_login", 'uses' => "FacebookLoginController@authenticate"]);
			$this->post('v2/register.{format?}', ['as' => "register_v2", 'uses' => "RegisterController@store_v2"]);

			$this->post('register.{format?}', ['as' => "register", 'uses' => "RegisterController@store"]);
			$this->post('forgot-password.{format?}', ['as' => "forgot_password", 'uses' => "ForgotPasswordController@forgot_password"]);
			$this->post('refresh-token.{format?}', ['as' => "refresh_token", 'uses' => "RefreshTokenController@refresh"]);
			$this->post('logout.{format?}', ['as' => "logout", 'uses' => "LoginController@logout", 'middleware' => "jwt.auth"]);
		});

		//All routes protected by authentication
		//'middleware' => "auth:api"
		$this->group(['middleware' => "auth:api"], function() {
			$this->any('advisory.{format?}', ['as' => "advisory", 'uses' => "AppSettingController@advisory"]);
			$this->group(['as' => "inquiry.",'prefix' => "inquiry"],function(){
				$this->post('advisory.{format?}',['as' => "advisory", 'uses' => "AppSettingController@send_advisory"]);
			});

			$this->group(['as' => "profile.", 'prefix' => "profile"], function() {
				$this->any('info.{format?}', ['as' => "show", 'uses' => "ProfileController@show"]);
				$this->post('edit.{format?}', ['as' => "update_profile", 'uses' => "ProfileController@update_profile"]);
				$this->post('edit-field.{format?}', ['as' => "update_field", 'uses' => "ProfileController@update_field"]);
				$this->post('upload-avatar.{format?}', ['as' => "update_avatar", 'uses' => "ProfileController@update_avatar"]);
				$this->post('change-password.{format?}', ['as' => "update_password", 'uses' => "ProfileController@update_password"]);
				$this->post('change-fcm-token.{format?}', ['as' => "update_device", 'uses' => "ProfileController@update_device"]);
				$this->post('fb-connect.{format?}', ['as' => "fb_connect", 'uses' => "ProfileController@fb_connect"]);
				$this->post('farm.{format?}', ['as' => "farm", 'uses' => "FarmController@show", 'middleware' => "api.exists:farm"]);
			});

			$this->group(['as' => "notification.", 'prefix' => "notifications"], function() {
				$this->any('all.{format?}', ['as' => "index", 'uses' => "NotificationController@index"]);
				$this->any('unread-count.{format?}', ['as' => "unread_count", 'uses' => "NotificationController@unread_count"]);
				$this->any('show.{format?}', ['as' => "show", 'uses' => "NotificationController@show", 'middleware' => "api.exists:notification"]);
				$this->any('read.{format?}', ['as' => "read", 'uses' => "NotificationController@read", 'middleware' => "api.exists:notification"]);
				$this->any('unread.{format?}', ['as' => "unread", 'uses' => "NotificationController@unread", 'middleware' => "api.exists:notification"]);
				$this->any('delete.{format?}', ['as' => "destroy", 'uses' => "NotificationController@destroy", 'middleware' => "api.exists:notification"]);
				$this->any('read-all.{format?}', ['as' => "read_all", 'uses' => "NotificationController@read_all"]);
				$this->any('unread-all.{format?}', ['as' => "unread_all", 'uses' => "NotificationController@unread_all"]);
				$this->any('delete-all.{format?}', ['as' => "destroy_all", 'uses' => "NotificationController@destroy_all"]);
			});

			$this->group(['as' => "user.", 'prefix' => "users"], function() {
				$this->any('show.{format?}', [ 'as' => "show", 'uses' => "UserController@show" , 'middleware' => "api.exists:user"]);
				$this->post('search.{format?}', [ 'as' => "search", 'uses' => "UserController@search"]);
			});

			$this->group(['as' => "crop.", 'prefix' => "crops"], function() {
				$this->any('all.{format?}', [ 'as' => "index", 'uses' => "CropController@index"]);
			});

			$this->group(['as' => "farm.", 'prefix' => "farms"], function() {
				$this->any('all.{format?}', ['as' => "index", 'uses' => "FarmController@index"]);
				$this->any('show.{format?}', ['as' => "show", 'uses' => "FarmController@show", 'middleware' => "api.exists:farm"]);
				$this->any('create.{format?}', ['as' => "store", 'uses' => "FarmController@store"]);
				$this->any('edit.{format?}', ['as' => "update", 'uses' => "FarmController@update", 'middleware' => "api.exists:farm"]);
				$this->any('edit-crops.{format?}', ['as' => "update_crops", 'uses' => "FarmController@update_crops", 'middleware' => "api.exists:farm"]);
				$this->any('delete.{format?}', ['as' => "destroy", 'uses' => "FarmController@destroy", 'middleware' => "api.exists:farm"]);
			});

			$this->group(['as' => "farm_activity.", 'prefix' => "farm_activity"], function() {
				$this->get('all.{format?}', ['as' => "index", 'uses' => "FarmActivityController@index"]);
				$this->get('{id}/get_activity.{format?}', ['as' => "show", 'uses' => "FarmActivityController@show"]);
				$this->post('create.{format?}', ['as' => "store", 'uses' => "FarmActivityController@store"]);
				$this->any('{id}/update_farm_acitvity.{format?}', ['as' => "update", 'uses' => "FarmActivityController@update"]);
				$this->any('{id}/delete.{format?}', ['as' => "destroy", 'uses' => "FarmActivityController@destroy"]);
			});

			$this->group(['as' => "farm_crop.", 'prefix' => "farm-crops"], function() {
				$this->any('show.{format?}', ['as' => "show", 'uses' => "FarmCropController@show", 'middleware' => "api.exists:farm"]);
			});

			$this->group(['as' => "journal.", 'prefix' => "journals"], function() {
				$this->any('all.{format?}', ['as' => "index", 'uses' => "JournalController@index", 'middleware' => "api.exists:farm"]);
				$this->any('crop.{format?}', ['as' => "crop", 'uses' => "JournalController@crop", 'middleware' => "api.exists:farm"]);
				$this->any('show.{format?}', ['as' => "show", 'uses' => "JournalController@show", 'middleware' => "api.exists:journal"]);
				$this->any('create.{format?}', ['as' => "store", 'uses' => "JournalController@store", 'middleware' => "api.exists:farm"]);
				$this->any('edit.{format?}', ['as' => "update", 'uses' => "JournalController@update", 'middleware' => "api.exists:journal"]);
				$this->any('delete.{format?}', ['as' => "destroy", 'uses' => "JournalController@destroy", 'middleware' => "api.exists:journal"]);
			});

			$this->group(['as' => "station.", 'prefix' => "stations"], function() {
				$this->any('all.{format?}', ['as' => "index", 'uses' => "StationController@index"]);
				$this->any('owned.{format?}', ['as' => "owned", 'uses' => "StationController@owned"]);
				$this->any('nearby.{format?}', ['as' => "nearby", 'uses' => "StationController@nearby"]);
				$this->any('show.{format?}', ['as' => "show", 'uses' => "StationController@show", 'middleware' => "api.exists:station"]);
				$this->any('subscriptions.{format?}', ['as' => "index", 'uses' => "SubscriptionController@index"]);
				$this->any('subscribe.{format?}', ['as' => "subscribe", 'uses' => "SubscriptionController@subscribe", 'middleware' => "api.exists:station"]);
				$this->any('unsubscribe.{format?}', ['as' => "unsubscribe", 'uses' => "SubscriptionController@unsubscribe", 'middleware' => "api.exists:subscription"]);
			});

		});
		
	}
);