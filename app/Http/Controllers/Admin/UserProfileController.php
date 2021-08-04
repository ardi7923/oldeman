<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\RenewPasswordRequest;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.user-profile.index');
    }

    /**
     * Update Username or Name for user authenticated
     *
     * @param Request $request
     * @return void
     */
    public function updateUser(Request $request)
    {
        $validator = UpdateUserRequest::validation($request, 'store');

        if ($validator->fails()) {
            $errors =  $validator->errors()->all();

            return redirect()->back()->with(['errors' => $errors]);
        }
        Auth::user()->update([
            'username' => $request->username,
            'name'     => $request->name
        ]);
        return redirect()->back()->with(['success' => 'User Berhasil Diubah']);
    }

    /**
     * Renew Password For User authenticated
     *
     * @param Request $request
     * @return void
     */
    public function renewPassword(Request $request)
    {
        $validator = RenewPasswordRequest::validation($request, 'store');

        if ($validator->fails()) {
            $errors =  $validator->errors()->all();

            return redirect()->back()->with(['errors_password' => $errors]);
        }

        Auth::user()->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with(['success_password' => 'Password Berhasil Diubah']);
    }
}
