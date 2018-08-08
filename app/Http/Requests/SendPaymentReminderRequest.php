<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendPaymentReminderRequest extends FormRequest
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
            'ids'   => 'required|array',
            'ids.*' => 'integer',
        ];
    }



    public function messages()
    {
        return [
            'ids.required' => 'No reminding selected yet.'
        ];
    }
}
