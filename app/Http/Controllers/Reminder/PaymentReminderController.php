<?php

namespace App\Http\Controllers\Reminder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent\{ReminderListImport, ReminderListRequest, Reminder};

class PaymentReminderController extends Controller
{
	/**
	 * [import description]
	 * @return [type] [description]
	 */
    public function import(ReminderListRequest $request, ReminderListImport $import)
    {
    	$agents = $import->handleImport();

    	foreach ($agents as $email => $studients)
    	{
    		$reminder = [
    			'email' => $email,
    			'title' => $request->title,
    			'payload' => $studients->toArray(),
    			'content' => $request->content,
    		];

    		Reminder::create($reminder);
    	}

    	return back();
    }

    /**
     * [showForm description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showForm(Request $request)
    {
    	return view('reminder.import');
    }



    public function addToQueue(Request $request)
    {
    	$ids = $request->ids;

    	optional(Reminder::find($ids))->each->send();

    	return back();
    }
}
