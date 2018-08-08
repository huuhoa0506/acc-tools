<?php

namespace App\Agent;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Files\ExcelFile;

class ReminderListImport extends ExcelFile
{
	/**
	 * [getFile description]
	 * @return [type] [description]
	 */
	public function getFile()
    {
        return app(Request::class)->file->getPathName();
    }
}