<?php

namespace App\Mail;

use App\Agent\Reminder;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Excel;

class AgentReminding extends Mailable
{
    use Queueable, SerializesModels;

    public $reminding;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reminder $reminding)
    {
        $this->reminding = $reminding;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $filename = "{$this->reminding->email}.xlsx";
        $excel = Excel::create($filename, function($excel) {
            $excel->sheet($this->reminding->email, function($sheet) {
                $sheet->setColumnFormat([
                    'H' => '0.00',
                    'I' => '0.00',
                    'J' => '0.00',
                    'K' => '0.00',
                ]);
                $sheet->fromArray($this->reminding->payload);
                $lastColIndex = count($this->reminding->payload[0]);
                $ascii = (65 + $lastColIndex - 1);
                $last_col = chr($ascii);
                
                $sheet->cells("A1:{$last_col}1", function($cells) {
                    // manipulate the range of cells
                    $cells->setBackground('#f5eb38');
                    $cells->setAlignment('center');
                    $cells->setFontColor('#000000');
                    $cells->setFontWeight();
                    $cells->setFontSize(14);
                });
            });
        });
        return $this->view('mail.agent-reminding')
                    ->attach($excel->store("xlsx",false,true)['full']);
    }
}
