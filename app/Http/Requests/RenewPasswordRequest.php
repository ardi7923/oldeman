<?php

namespace App\Http\Requests;

use Validator;
use Illuminate\Validation\Rule;

class RenewPasswordRequest
{

// Validation ========================================

    public static function validation($request,$method,$id_old = ""){


        $validator = Validator::make($request->all(), [
			
			'password'        => ['required','min:6'],
			'repeat_password' => ['required','same:password'],

        ]);

        return $validator;

    }

//===========================================
}