<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login () { 
        session()->forget('USER_ID');
        return view('Pages.Login');
    }

    public function auth(Request $Request) {
        $Users = \DB::table('users')
                    ->where('Email', $Request->Email)
                    ->where('Password', $Request->Password)
                    ->get();
 
        foreach ($Users as $User) {
            if (count($Users) > 0) { 
                session()->put('USER_ID', $User->id);
                session()->put('FullName', $User->FullName);
                session()->put('Role', $User->Role); 
                session()->forget('Error');
                \DB::table('users')->where('id', $User->id)->update([
                    'LastLogin' => date('Y-m-d H:i A'),
                ]);
                if(parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com') {
                    \DB::table('user_logins')->insert([
                        'Name' => $User->FullName,
                        'Time' => date('H:i A'),
                        'Date' => date('Y-m-d'),
                        'Action' => 'LOGGED IN', 
                        'Source' => 'SEA_SERVICE_TESTIMONIAL', 
                    ]);
                    return redirect('/Vessels');
                }
                if(parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com' || parse_url(url()->current())['host'] == '192.168.20.252') {
                    \DB::table('user_logins')->insert([
                        'Name' => $User->FullName,
                        'Time' => date('H:i A'),
                        'Date' => date('Y-m-d'),
                        'Action' => 'LOGGED IN', 
                        'Source' => 'VESSEL_TRACKER', 
                    ]);
                    return redirect('/Availability');
                }
            }  
        }                     
        session()->put('Error', 'Incorrect email or password..');
        return redirect('/');
    }

    public function logout() {
        \DB::table('users')->where('id', session()->get('USER_ID'))->update([
            'LastLogout' => date('Y-m-d H:i A'),
        ]);
        if(parse_url(url()->current())['host'] == 'seaservice.lttcoastalmarine.com') {
            \DB::table('user_logins')->insert([
                'Name' => session()->get('FullName'),
                'Time' => date('H:i A'),
                'Date' => date('Y-m-d'),
                'Action' => 'LOGGED OUT', 
                'Source' => 'SEA_SERVICE_TESTIMONIAL', 
            ]);
        }
        if(parse_url(url()->current())['host'] == 'vesseltracker.lttcoastalmarine.com' || parse_url(url()->current())['host'] == '192.168.20.252') {
            \DB::table('user_logins')->insert([
                'Name' => session()->get('FullName'),
                'Time' => date('H:i A'),
                'Date' => date('Y-m-d'),
                'Action' => 'LOGGED OUT', 
                'Source' => 'VESSEL_TRACKER', 
            ]);
        }
        session()->forget('USER_ID');
        session()->forget('FullName');
        session()->forget('Role');
        session()->flush();
        return redirect('/');
    }
}
