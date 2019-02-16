<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Advisory;
use App\Laravel\Models\Journal;
use App\Laravel\Models\User;

use App\Laravel\Models\Station;
use Carbon, Helper;

class DashboardController extends Controller
{

	protected $data = array();

    public function index() {
    	$this->data['date_today'] = Carbon::now()->format("Y-m-d");
    	$this->data['customers'] = User::where('type','user')->orderBy('last_activity',"DESC")->get();
    	$this->data['stations'] = Station::get();
        $this->data['journal']  = Journal::whereRaw("DATE(created_at) = '{$this->data['date_today']}'")->orderBy('created_at')->get();
        // echo "<pre>";
        // print_r(!$this->data['customers']->isEmpty() ? $this->data['customers']->count() : 'Empty');
        // exit;
    	return view('backoffice.dashboard', $this->data);
    }

    public function report(){
        $this->data['reports'] = Advisory::orderBy('created_at', "DESC")->paginate(10);
        return view('backoffice.report.index', $this->data);
    }

    public function report_item($id = NULL){
        $report = Advisory::find($id);

        if($report) {
            $this->data['report'] = $report;
            return view('backoffice.report.show', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.report.index');
    }


    private function _percent_change($new, $old) {
    	return $old ? (( ($new - $old) / $old ) / 100) : 0;
    }
}
