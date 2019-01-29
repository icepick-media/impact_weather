<?php


/**
 *
 * ------------------------------------
 * Frontend Routes
 * ------------------------------------
 *
 */

$this->group(

	array(
		'as' => "frontend.",
		'namespace' => "Frontend",
	),

	function() {

		$this->get('/', ['as' => "index", 'uses' => "PageController@index"]);
		// $this->get('about', ['as' => "about", 'uses' => "PageController@about"]);
		// $this->get('contact', ['as' => "contact", 'uses' => "PageController@contact"]);
		// $this->post('contact', ['as' => "send_contact", 'uses' => "PageController@send_contact"]);

		// $this->group(['prefix' => "blogs", 'as' => "blog."], function() {
		// 	$this->get('/', ['as' => "index", 'uses' => "BlogController@index"]);
		// 	$this->post('/', ['as' => "search", 'uses' => "BlogController@search"]);
		// 	$this->get('{slug?}', ['as' => "show", 'uses' => "BlogController@show"]);
		// });

		// $this->group(['prefix' => "products", 'as' => "product."], function() {
		// 	$this->get('/', ['as' => "index", 'uses' => "ProductController@index"]);
		// 	$this->get('{slug?}', ['as' => "show", 'uses' => "ProductController@show"]);
		// });

		// $this->group(['prefix' => "solutions", 'as' => "solution."], function() {
		// 	$this->get('/', ['as' => "index", 'uses' => "SolutionController@index"]);
		// 	$this->get('{slug?}', ['as' => "show", 'uses' => "SolutionController@show"]);
		// });
	}
);