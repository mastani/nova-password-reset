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
        $minPasswordSize = config('nova-password-reset.min_password_size');
        $customPasswordRule = config('nova-password-reset.custom_password_rule');
        return [
            'current_password' => 'required|password',
            'new_password' => "required|$customPasswordRule|min:$minPasswordSize",
            'confirm_new_password' => "required|same:new_password"
        ];
    }
}
