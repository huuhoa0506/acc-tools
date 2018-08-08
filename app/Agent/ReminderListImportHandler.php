<?php 

namespace App\Agent;

use Maatwebsite\Excel\Files\ImportHandler;
use App\Agent\ReminderListImport;

class ReminderListImportHandler implements ImportHandler
{
	/**
	 * [handle description]
	 * @param  UserListImport $import [description]
	 * @return [type]                 [description]
	 */
	public function handle($import)
    {
    	$emailCol = 'agent_email';

        $agents = $import->get()->groupBy($emailCol);

        return $agents->each(function($stds){
        	$stds->each->forget('agent_email');
        });
    }
}
