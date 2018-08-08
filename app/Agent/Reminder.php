<?php

namespace App\Agent;

use Illuminate\Database\Eloquent\Model;
use App\Jobs\SendRemindingToAgent;

class Reminder extends Model
{
	/**
	 * [$fillable description]
	 * @var [type]
	 */
    protected $fillable = [
    	'title', 'email', 'content', 'payload'
    ];


    protected $casts = [
    	'payload' => 'array',
    ];


    /**
     * [send description]
     * @return [type] [description]
     */
    public function send()
    {
        SendRemindingToAgent::dispatch($this);
    }
}
