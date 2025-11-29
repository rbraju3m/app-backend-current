<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildNotificationRequest extends FormRequest
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
            'site_url' => 'required|url',
            'license_key' => 'required',

            'android_notification_content' => 'required_without:ios_notification_content|nullable',
            'ios_notification_content' => 'required_without:android_notification_content|nullable',
        ];

        return $rules;
    }
}
