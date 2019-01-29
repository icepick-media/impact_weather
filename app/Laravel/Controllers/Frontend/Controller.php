<?php

namespace App\Laravel\Controllers\Frontend;

use App\Laravel\Controllers\Controller as BaseController;
use App\Laravel\Models\Blog;
use App\Laravel\Models\GeneralSetting;
use App\Laravel\Models\Product;

class Controller extends BaseController
{
    public function get_data() {
    	return [
    		'contact_settings' => $this->_get_contact(),
    		'recent_products' => $this->_get_products(),
    		'recent_blogs' => $this->_get_blogs(),
    	];
    }

    private function _get_contact() {
    	$contact = GeneralSetting::where('code', 'CONTACT')->first();
    	return $contact ? $contact->getData() : array();
    }

    private function _get_products() {
    	return Product::orderBy('created_at', "DESC")->take(8)->get();
    }

    private function _get_blogs() {
    	return Blog::orderBy('created_at', "DESC")->take(2)->get();
    }
}
