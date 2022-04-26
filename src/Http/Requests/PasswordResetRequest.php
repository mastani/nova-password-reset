<?php

namespace Mastani\NovaPasswordReset\Http\Requests;

use Illuminate\Validation\Rules\Password;
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
        return [
            'current_password' => ['required', Password::default()],
            'new_password' => "required|string|min:$minPasswordSize",
            'confirm_new_password' => "required|string|min:$minPasswordSize|same:new_password"
        ];
    }
}
