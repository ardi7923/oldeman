<?php

namespace App\Http\Requests;

use Validator;
use Illuminate\Validation\Rule;
use Auth;

class UpdateUserRequest
{

// Validation ========================================

    public static function validation($request,$method,$id_old = ""){


        $validator = Validator::make($request->all(), [
			
			'name'     => ['required'],
			'username' => ['required', Rule::unique('users')->ignore(Auth::user()->username,'username')],

        ]);

        return $validator;

    }

//===========================================
}