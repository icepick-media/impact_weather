<?php

namespace App\Laravel\Controllers\Frontend;

use App\Laravel\Models\GeneralSetting;
use App\Laravel\Models\Product;
use App\Laravel\Models\Team;
use Str, Input;

class ProductController extends Controller {

	protected $data = array();

	public function __construct() {
		$this->data += $this->get_data();
	}

	public function index() {
		$this->data['products'] = Product::orderBy('sorting', "ASC")->get();
		$this->data['tags'] = array_unique( explode(",", implode(",", $this->data['products']->pluck('tags')->toArray())) );
		return view('frontend.product.index', $this->data);
	}

	public function show($slug = NULL) {
		$product = Product::where('slug', Str::slug($slug))->firstOrFail();
		if($product) {
			$this->data['experts'] = Team::orderBy('sorting', 'ASC')->get();
			$this->data['product'] = $product;
			return view('frontend.product.show', $this->data);
		}
	}

}