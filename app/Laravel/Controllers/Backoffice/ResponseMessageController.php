<?php

namespace App\Laravel\Controllers\Backoffice;

use App\Laravel\Models\ResponseMessage;
use App\Laravel\Requests\Backoffice\ResponseMessageRequest;
use Helper;

class ResponseMessageController extends Controller
{

    protected $data = array();

    public function __construct() {
    }

    public function index() {
        $this->data['responses'] = ResponseMessage::orderBy('created_at', "DESC")->get();
        return view('backoffice.response-message.index', $this->data);
    }

    public function create() {
        return view('backoffice.response-message.create', $this->data);
    }

    public function store(ResponseMessageRequest $request) {
        $response_message = new ResponseMessage;
        $response_message->fill($request->all());
        $response_message->save();

        session()->flash('notification-status',"success");
        session()->flash('notification-msg', "Record created.");
        return redirect()->route('backoffice.response_message.edit', [$response_message->id]);
    }

    public function edit($id = 0) {
        $response_message = ResponseMessage::find($id);

        if($response_message) {
            $this->data['response'] = $response_message;
            return view('backoffice.response-message.edit', $this->data);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.response_message.index');
    }

    public function update(ResponseMessageRequest $request, $id = 0) {
        $response_message = ResponseMessage::find($id);

        if($response_message) {
            $response_message->fill($request->all());
            $response_message->save();

            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record updated.");
            return redirect()->route('backoffice.response_message.edit', [$response_message->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.response_message.index');
    }

    public function destroy($id = 0) {
        $response_message = ResponseMessage::find($id);

        if($response_message) {
            $response_message->delete();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record deleted.");
            return redirect()->route('backoffice.response_message.index');
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.response_message.index');
    }

    public function trash() {
        $this->data['responses'] = ResponseMessage::onlyTrashed()->orderBy('deleted_at', "DESC")->get();
        return view('backoffice.response-message.trash', $this->data);
    }

    public function recover($id = 0) {
        $response_message = ResponseMessage::onlyTrashed()->find($id);

        if($response_message) {
            $response_message->restore();
            session()->flash('notification-status',"success");
            session()->flash('notification-msg', "Record restored.");
            return redirect()->route('backoffice.response_message.edit', [$response_message->id]);
        }

        session()->flash('notification-status',"error");
        session()->flash('notification-msg', "Record not found");
        return redirect()->route('backoffice.response_message.index');
    }

}
