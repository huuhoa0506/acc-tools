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

    /**
     * [scopeShouldBeSent description]
     * @param  [type] $query [description]
     * @return [type]        [description]
     */
    public function scopeShouldBeSent($query)
    {
        return $query->where('is_sent', false);
    }
}
