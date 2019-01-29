<?php

namespace App\Laravel\Controllers\Frontend;

use App\Laravel\Models\Blog;
use Str, Input;

class BlogController extends Controller {

	protected $data = array();

	public function __construct() {
		$this->data += $this->get_data();
	}

	public function index() {
		$this->data['blogs'] = Blog::orderBy('created_at', "DESC")->get();
		return view('frontend.blog.index', $this->data);
	}

	public function search() {
		$this->data['keyword'] = Str::slug(Input::get('keyword'), " ");
		$this->data['blogs'] = Blog::keyword($this->data['keyword'])->orderBy('created_at', "DESC")->get();
		return view('frontend.blog.index', $this->data);
	}

	public function show($slug = NULL) {
		$blog = Blog::where('slug', Str::slug($slug))->firstOrFail();
		if($blog) {
			$this->data['blog'] = $blog;
			$this->data['related_blogs'] = Blog::where('id', '<>', $blog->id)->take(3)->get();
			return view('frontend.blog.show', $this->data);
		}
	}

}