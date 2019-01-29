<?php


/**
 *
 * ------------------------------------
 * Metos Routes
 * ------------------------------------
 *
 */
		


$this->group(

	array(
		'as' => "metos.",
		'prefix'	=> "metos",
		'namespace' => "Metos",
	),
	function() {

		// $this->get('feed', ['as' => "index", 'uses' => "PageController@index"]);
		$this->get('bind.{format?}',['as' => 'bind', 'uses' => "FetchController@bind_farm"]);
		$this->get('weather.{format?}',['as' => 'weather', 'uses' => "FetchController@weather"]);
		$this->get('fetch-meteogram.{format?}',['as' => 'fetch_meteo', 'uses' => "FetchController@fetch_meteo"]);
		$this->get('fetch-weather.{format?}',['as' => 'fetch_weather', 'uses' => "FetchController@weather"]);
});