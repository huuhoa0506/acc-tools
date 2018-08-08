<?php

namespace App\Agent;

use Illuminate\Foundation\Http\FormRequest;

class ReminderListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file'    => 'required|file',
            'title'   => 'required|string',
            'content' => 'required|string',
        ];
    }
}
