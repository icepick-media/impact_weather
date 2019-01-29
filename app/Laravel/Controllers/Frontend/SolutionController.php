<?php

namespace App\Laravel\Controllers\Frontend;

use App\Laravel\Models\GeneralSetting;
use App\Laravel\Models\Page;
use App\Laravel\Models\Solution;
use Str, Input;

class SolutionController extends Controller {

	protected $data = array();

	public function __construct() {
		$this->data += $this->get_data();
	}

	public function index() {
		$this->data['profits'] = Page::where('code', 'profits')->first();
		$this->data['success_stories'] = Page::where('code', 'success-stories')->first();
		$this->data['solutions'] = Solution::orderBy('sorting', "ASC")->get();
		return view('frontend.solution.index', $this->data);
	}

	public function show($slug = NULL) {
		$solution = Solution::where('slug', Str::slug($slug))->firstOrFail();
		if($solution) {
			$this->data['solution'] = $solution;
			return view('frontend.solution.show', $this->data);
		}
	}

}