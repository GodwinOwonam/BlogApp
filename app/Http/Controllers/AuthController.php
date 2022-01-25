<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function registerShow()
    {
        return view('index');
    }


    public function registration(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //create a new user after validating that all required data has been supplied
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->userType = $request->input('userType');
        $user->password = bcrypt($request->input('password'));
        // dd($user->name, $user->email, $user->password, $user->userType);
        $user->save();

        if($user->userType == 'author'){
            return view('dummyAuthorDashboard', [
                'author' => $user
            ]);
            // return view('authorDashboard');
        }
        else{
            return redirect()->route('readerDash', [
                'reader_id' => $user->id
            ]);
            // return view('customerDashboard');
        }
    }


    public function loginShow()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only(['email', 'password']);

        
        if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]))
        {
            //Authentication passed...
            $user = User::where("email", $credentials['email'])->first();
            
            if($user->userType === 'author'){
                return redirect()->route('authorDash', $user->id);
                // return view('authorDashboard');
            }

            else{
                return redirect()->route('readerDash', $user->id);
                // return view('customerDashboard');
            }
            
        }

        else{
            return redirect()-> back();
            // return view('customerDashboard');
        }
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}
