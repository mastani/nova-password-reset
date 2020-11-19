<?php

namespace Mastani\NovaPasswordReset\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'current_password' => 'required|password',
            'new_password' => 'required|string|min:5',
            'confirm_new_password' => 'required|string|min:5|same:new_password'
        ];
    }
}
