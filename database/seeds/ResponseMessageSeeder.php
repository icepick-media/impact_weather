<?php

use App\Laravel\Models\ResponseMessage;
use Illuminate\Database\Seeder;

class ResponseMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ResponseMessage::truncate();
    	
    	ResponseMessage::create([
    		'code' => "LOGIN_SUCCESS",
    		'short_description' => NULL,
    		'content' => "Hi {name}!"
    	]);

		ResponseMessage::create([
			'code' => "LOGIN_FAILED",
			'short_description' => NULL,
			'content' => "Invalid account details."
		]);

		ResponseMessage::create([
			'code' => "LOGOUT_SUCCESS",
			'short_description' => NULL,
			'content' => "Bye {name}!"
		]);

		ResponseMessage::create([
			'code' => "REGISTER_SUCCESS",
			'short_description' => NULL,
			'content' => "You are now registered. Welcome my friend!"
		]);

		ResponseMessage::create([
			'code' => "FACEBOOK_LOGIN_FAILED",
			'short_description' => NULL,
			'content' => "Invalid facebook token."
		]);

		ResponseMessage::create([
			'code' => "FACEBOOK_LOGIN_SUCCESS",
			'short_description' => NULL,
			'content' => "Hi {name}!"
		]);

		ResponseMessage::create([
			'code' => "FACEBOOK_CONNECT_SUCCESS",
			'short_description' => NULL,
			'content' => "Your user and facebook accounts are now connected."
		]);

		ResponseMessage::create([
			'code' => "FACEBOOK_REGISTER_SUCCESS",
			'short_description' => NULL,
			'content' => "You are now registered. Welcome my friend!"
		]);

		ResponseMessage::create([
			'code' => "INVALID_DATA",
			'short_description' => NULL,
			'content' => "Incomplete or invalid input."
		]);

		ResponseMessage::create([
			'code' => "RESET_TOKEN_SENT",
			'short_description' => NULL,
			'content' => "Check your email for the link to reset your password."
		]);

		ResponseMessage::create([
			'code' => "NEW_TOKEN",
			'short_description' => NULL,
			'content' => "New token generated successfully."
		]);

		ResponseMessage::create([
			'code' => "GENERAL_REQUEST_DATA",
			'short_description' => NULL,
			'content' => "General request data."
		]);

		ResponseMessage::create([
			'code' => "PAGE_INFO",
			'short_description' => NULL,
			'content' => "Page information."
		]);

		ResponseMessage::create([
			'code' => "URL_NOT_FOUND",
			'short_description' => NULL,
			'content' => "URL not found."
		]);

		ResponseMessage::create([
			'code' => "UNREAD_NOTIFICATION_COUNT",
			'short_description' => NULL,
			'content' => "Unread notification count."
		]);

		ResponseMessage::create([
			'code' => "NOTIFICATION_DATA",
			'short_description' => NULL,
			'content' => "Notification data."
		]);

		ResponseMessage::create([
			'code' => "NOTIFICATION_INFO",
			'short_description' => NULL,
			'content' => "Notification information."
		]);

		ResponseMessage::create([
			'code' => "NOTIFICATION_MARKED_AS_READ",
			'short_description' => NULL,
			'content' => "Notification marked as read."
		]);

		ResponseMessage::create([
			'code' => "NOTIFICATION_MARKED_AS_UNREAD",
			'short_description' => NULL,
			'content' => "Notification marked as unread."
		]);

		ResponseMessage::create([
			'code' => "NOTIFICATION_DELETED",
			'short_description' => NULL,
			'content' => "Notification deleted."
		]);

		ResponseMessage::create([
			'code' => "ALL_NOTIFICATIONS_MARKED_AS_READ",
			'short_description' => NULL,
			'content' => "All notifications marked as read."
		]);

		ResponseMessage::create([
			'code' => "ALL_NOTIFICATIONS_MARKED_AS_UNREAD",
			'short_description' => NULL,
			'content' => "All notifications marked as unread."
		]);

		ResponseMessage::create([
			'code' => "ALL_NOTIFICATIONS_DELETED",
			'short_description' => NULL,
			'content' => "All notifications deleted."
		]);

		ResponseMessage::create([
			'code' => "PROFILE_INFO",
			'short_description' => NULL,
			'content' => "Profile information."
		]);

		ResponseMessage::create([
			'code' => "PROFILE_UPDATED",
			'short_description' => NULL,
			'content' => "Your profile has been updated."
		]);

		ResponseMessage::create([
			'code' => "PASSWORD_UPDATED",
			'short_description' => NULL,
			'content' => "Your password has been updated."
		]);

		ResponseMessage::create([
			'code' => "DEVICE_UPDATED",
			'short_description' => NULL,
			'content' => "Your device has been updated."
		]);

		ResponseMessage::create([
			'code' => "USER_INFO",
			'short_description' => NULL,
			'content' => "User information."
		]);

		ResponseMessage::create([
			'code' => "USER_SEARCH_DATA",
			'short_description' => NULL,
			'content' => "Results of keyword : {keyword}."
		]);

		ResponseMessage::create([
			'code' => "USER_NOT_FOUND",
			'short_description' => NULL,
			'content' => "User not found."
		]);

		ResponseMessage::create([
			'code' => "NOTIFICATION_NOT_FOUND",
			'short_description' => NULL,
			'content' => "Notification not found."
		]);

		ResponseMessage::create([
			'code' => "TOKEN_NOT_PROVIDED",
			'short_description' => NULL,
			'content' => "The authorization token is not provided in the request."
		]);

		ResponseMessage::create([
			'code' => "TOKEN_EXPIRED",
			'short_description' => NULL,
			'content' => "The authorization token has already expired."
		]);

		ResponseMessage::create([
			'code' => "TOKEN_INVALID",
			'short_description' => NULL,
			'content' => "The authorization token is invalid."
		]);

		ResponseMessage::create([
			'code' => "INVALID_AUTH_USER",
			'short_description' => NULL,
			'content' => "Authenticated user not found."
		]);

		ResponseMessage::create([
			'code' => "UNSUPPORTED_RESPONSE_FORMAT",
			'short_description' => NULL,
			'content' => "Unsupported response format."
		]);

		ResponseMessage::create([
			'code' => "SERVER_ERROR",
			'short_description' => NULL,
			'content' => "Server error."
		]);

		ResponseMessage::create([
			'code' => "CURL_ERROR",
			'short_description' => NULL,
			'content' => "CURL error."
		]);

		ResponseMessage::create([
			'code' => "INVALID_AUTH_CODE",
			'short_description' => NULL,
			'content' => "Invalid confirmation code."
		]);

		ResponseMessage::create([
			'code' => "INVALID_CONTACT",
			'short_description' => NULL,
			'content' => "Invalid contact number."
		]);

		ResponseMessage::create([
			'code' => "RESENT_CODE",
			'short_description' => NULL,
			'content' => "Check your inbox for the confirmation code."
		]);

		ResponseMessage::create([
			'code' => "FARM_NOT_FOUND",
			'short_description' => NULL,
			'content' => "Farm not found."
		]);

		ResponseMessage::create([
			'code' => "FARM_DATA",
			'short_description' => NULL,
			'content' => "Farm data."
		]);

		ResponseMessage::create([
			'code' => "FARM_INFO",
			'short_description' => NULL,
			'content' => "Farm information."
		]);

		ResponseMessage::create([
			'code' => "FARM_CREATED",
			'short_description' => NULL,
			'content' => "New farm added."
		]);

		ResponseMessage::create([
			'code' => "UNAUTHORIZED_FARM_EDIT",
			'short_description' => NULL,
			'content' => "Unable to edit a farm you do not own."
		]);

		ResponseMessage::create([
			'code' => "FARM_UPDATED",
			'short_description' => NULL,
			'content' => "Farm details updated."
		]);

		ResponseMessage::create([
			'code' => "UNAUTHORIZED_FARM_DELETE",
			'short_description' => NULL,
			'content' => "Unable to remove a farm you do not own."
		]);

		ResponseMessage::create([
			'code' => "FARM_DELETED",
			'short_description' => NULL,
			'content' => "Farm removed."
		]);

		ResponseMessage::create([
			'code' => "JOURNAL_NOT_FOUND",
			'short_description' => NULL,
			'content' => "Journal not found."
		]);

		ResponseMessage::create([
			'code' => "JOURNAL_DATA",
			'short_description' => NULL,
			'content' => "Journal data."
		]);

		ResponseMessage::create([
			'code' => "JOURNAL_INFO",
			'short_description' => NULL,
			'content' => "Journal information."
		]);

		ResponseMessage::create([
			'code' => "UNAUTHORIZED_JOURNAL_CREATED",
			'short_description' => NULL,
			'content' => "Unable to create a journal to a farm you do not own."
		]);

		ResponseMessage::create([
			'code' => "JOURNAL_CREATED",
			'short_description' => NULL,
			'content' => "New journal added."
		]);

		ResponseMessage::create([
			'code' => "UNAUTHORIZED_JOURNAL_EDIT",
			'short_description' => NULL,
			'content' => "Unable to edit a journal from a farm you do not own."
		]);

		ResponseMessage::create([
			'code' => "JOURNAL_UPDATED",
			'short_description' => NULL,
			'content' => "Journal details updated."
		]);

		ResponseMessage::create([
			'code' => "UNAUTHORIZED_JOURNAL_DELETE",
			'short_description' => NULL,
			'content' => "Unable to remove a journal from a farm you do not own."
		]);

		ResponseMessage::create([
			'code' => "JOURNAL_DELETED",
			'short_description' => NULL,
			'content' => "Journal removed."
		]);

		ResponseMessage::create([
			'code' => "CROP_DATA",
			'short_description' => NULL,
			'content' => "Crop data."
		]);

		ResponseMessage::create([
			'code' => "STATION_NOT_FOUND",
			'short_description' => NULL,
			'content' => "Station not found."
		]);

		ResponseMessage::create([
			'code' => "STATION_DATA",
			'short_description' => NULL,
			'content' => "Station data."
		]);

		ResponseMessage::create([
			'code' => "STATION_INFO",
			'short_description' => NULL,
			'content' => "Station information."
		]);

		ResponseMessage::create([
			'code' => "SUBSCRIPTION_NOT_FOUND",
			'short_description' => NULL,
			'content' => "You subscription does not exist."
		]);

		ResponseMessage::create([
			'code' => "SUBSCRIPTION_DATA",
			'short_description' => NULL,
			'content' => "Subscription data."
		]);

		ResponseMessage::create([
			'code' => "SUBSCRIPTION_CREATED",
			'short_description' => NULL,
			'content' => "You are now subscribed to this station."
		]);

		ResponseMessage::create([
			'code' => "SUBSCRIPTION_DELETED",
			'short_description' => NULL,
			'content' => "You are no longer subscribed to this station."
		]);

		ResponseMessage::create([
			'code' => "SUBSCRIPTION_ALREADY_EXIST",
			'short_description' => NULL,
			'content' => "You are already subscribed to this station."
		]);

		ResponseMessage::create([
			'code' => "FARM_CROP_NOT_FOUND",
			'short_description' => NULL,
			'content' => "Crop does not exist in your list."
		]);


		ResponseMessage::create([
			'code' => "FARM_CROP_INFO",
			'short_description' => NULL,
			'content' => "Farm crop information."
		]);

    }
}
