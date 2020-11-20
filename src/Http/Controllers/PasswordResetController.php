<?php

namespace Mastani\NovaPasswordReset\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Mastani\NovaPasswordReset\Http\Requests\PasswordResetRequest;

class PasswordResetController extends Controller {

    public function reset(PasswordResetRequest $request) {
        $user = $request->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return 'Successful.';
    }
}
