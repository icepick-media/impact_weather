<?php

namespace App\Laravel\Controllers\Frontend;

use App\Laravel\Models\Blog;
use App\Laravel\Models\GeneralSetting;
use App\Laravel\Models\ImageSlider;
use App\Laravel\Models\Page;
use App\Laravel\Models\Partner;
use App\Laravel\Models\Product;
use App\Laravel\Models\Solution;
use App\Laravel\Models\Team;
use App\Laravel\Requests\Frontend\ContactRequest;
use App\Laravel\Mails\NewInquiry;
use Session, Mail;

class PageController extends Controller {

	protected $data = array();

	public function __construct() {
		$this->data += $this->get_data();
	}

	public function index() {
		return redirect()->route('backoffice.index');
		// $this->data['image_slider'] = ImageSlider::orderBy('sorting', "ASC")->get();
		// $this->data['about'] = Page::where('code', 'about')->first();
		// $this->data['solutions'] = Solution::orderBy('sorting', "ASC")->get();
		// $this->data['products'] = Product::orderBy('sorting', "ASC")->get();
		// $this->data['blogs'] = Blog::orderBy('created_at', "DESC")->take(3)->get();
		// $this->data['download'] = Page::where('code', 'download')->first();
		// $this->data['partners'] = Partner::orderBy('sorting', "ASC")->get();
		// return view('frontend.index', $this->data);
	}

	public function about() {
		$this->data['welcome'] = Page::where('code', 'welcome')->first();
		$this->data['devices'] = Page::where('code', 'devices')->first();
		$this->data['challenges'] = Page::where('code', 'challenges')->first();
		$this->data['experts'] = Team::orderBy('sorting', 'ASC')->get();
		$this->data['download'] = Page::where('code', 'download')->first();
		$this->data['partners'] = Partner::orderBy('sorting', "ASC")->get();
		return view('frontend.about', $this->data);
	}

	public function contact() {
		$this->data['contact'] = Page::where('code', "contact")->first();
		$this->data['subjects'] = ['' => "Inquire for what?", 'Product' => "Product" ];
		return view('frontend.contact', $this->data);
	}

	public function send_contact(ContactRequest $request) {
		Mail::to("support@waveone.com")->send(new NewInquiry($request->all()));
		Session::flash('notification-status', "success");
		Session::flash('notification-msg', "<strong>Success!</strong> Your message has been sent.");
		return redirect()->route('frontend.contact');
	}

}