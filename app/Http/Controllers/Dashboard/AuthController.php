<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(AuthRequest $request){

        
        $user = User::where("email", $request->email)->first();
        $is_true_password = Hash::check($request->password ,$user->password );
        if(!$is_true_password){ return $this->sendError("password_not_match");}

        $token = $user->createToken("APP")->plainTextToken;


        $data =[];
        $data['user']=  $user;
        $data['token']=$token;

        return $this->sendResponse("login_sucssefuly",["data"=>$data]);
    }
}
