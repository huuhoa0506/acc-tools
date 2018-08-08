<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\AgentReminding;
use App\Agent\Reminder;
use Carbon\Carbon;
use Mail;

class SendRemindingToAgent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reminding;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Reminder $reminding)
    {
        $this->reminding = $reminding;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reminding = $this->reminding;
        Mail::to($reminding)->send(new AgentReminding($reminding));
        $reminding->is_sent = true;
        $reminding->sent_at = Carbon::now()->toDatetimeString();
        $reminding->save();
    }
}
