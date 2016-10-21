<?php
/**
 * Created by PhpStorm.
 * User: meir
 * Date: 10/10/2016
 * Time: 11:07 PM
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserManager
{
    public function addUser(Request $request){

        $userObject = json_decode(json_encode($request->all()), FALSE);
        //dd($userObject);

        $systadminUser = User::find(1);
        if(Hash::check($userObject->sysadminPassword, $systadminUser->password)){
            $user = new User();
            $user->firstName = $userObject->firstName;
            $user->lastName = $userObject->lastName;
            $user->email = $userObject->email;
            $user->password = Hash::make($userObject->password);
            $user->role = $userObject->role;
            $user->save();

            return true;
        }
        else
            return false;




    }

}