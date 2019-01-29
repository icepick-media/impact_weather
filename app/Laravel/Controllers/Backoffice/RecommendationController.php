<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\Recommendation;
use App\Laravel\Requests\Backoffice\RecommendationRequest;
use Helper, Str;

class RecommendationController extends Controller
{

	protected $data = array();

    public function __construct() {

        $this->data['types'] = [
            '' => "Choose the type",
            'low' => "Low", 
            'moderate' => "Moderate",
            'critical' => "Critical",
        ];

    }

    public function index() {
        $this->data['recommendations'] = Recommendation::orderBy('created_at', "DESC")->get();
    	return view('backoffice.recommendation.index', $this->data);
    }

    public function create() {
        return view('backoffice.recommendation.create', $this->data);
    }

    public function store(RecommendationRequest $request) {

        $recommendation = new Recommendation;
        $recommendation->fill($request->all());
        $recommendation->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.recommendation.edit', [$recommendation->id]);
    }

    public function edit($id = 0) {
        $recommendation = Recommendation::find($id);

        if($recommendation) {
            $this->data['recommendation'] = $recommendation;
            return view('backoffice.recommendation.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.recommendation.index');
    }

    public function update(RecommendationRequest $request, $id = 0) {
        $recommendation = Recommendation::find($id);

        if($recommendation) {
            $recommendation->fill($request->all());
            $recommendation->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record has been updated.");
            return redirect()->route('backoffice.recommendation.edit', [$recommendation->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.recommendation.index');
    }

    public function destroy($id = 0) {
        $recommendation = Recommendation::find($id);

        if($recommendation) {
            $recommendation->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.recommendation.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.recommendation.index');
    }

    public function trash() {
        $this->data['recommendations'] = Recommendation::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.recommendation.trash', $this->data);
    }

    public function recover($id = 0) {
        $recommendation = Recommendation::onlyTrashed()->find($id);

        if($recommendation) {
            $recommendation->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.recommendation.edit', [$recommendation->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.recommendation.index');
    }

}
