<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\ResponseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends ResponseController
{
    public function register( RegisterRequest $request ) {
        $request->validated();
        $user = User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => bcrypt( $request["password"]),
            "admin" => $request[ "admin" ]
        ]);

        return $this->sendResponse( $user->email, "Sikeres regisztráció");
    }

    public function login( LoginRequest $request ) {
        $request->validated();
        if( Auth::attempt([ "email" => $request["email"], "password" => $request["password"]])) {
            $actualTime = Carbon::now();
            $authUser = Auth::user();
            $bannedTime = ( new BanController )->getBannedTime( $authUser->email );
            ( new BanController )->resetLoginCounter( $authUser->email );
            if( $bannedTime < $actualTime ) {
                ( new BanController )->resetBannedTime( $authUser->email );
                $token = $authUser->createToken( $authUser->email."Token" )->plainTextToken;
                $data["user"] = [ "user" => $authUser->email ];
                $data[ "time" ] = $bannedTime;
                $data["token"] = $token;

                return $this->sendResponse( $data, "Sikeres bejelentkezés");
            }else {
                return $this->sendError( "Autentikációs hiba", [ "Következő lehetőség: ", $bannedTime ], 401 );
            }
        }else {
            $loginCounter = ( new BanController )->getLoginCounter( $request[ "email" ]);
            if( $loginCounter < 3 ) {
                ( new BanController )->setLoginCounter( $request[ "email" ]);
            }else {
                ( new BanController )->setBannedTime( $request[ "email" ]);
            }
            $error = ( new BanController )->getBannedTime( $request[ "email" ]);
            $errorMessage = [ "time" => Carbon::now(), "hiba" => "Helytelen e-mail vagy jelszó" ];

            return $this->sendError( $error, [$errorMessage], 401 );
        }
    }

    public function logout() {
        auth( "sanctum" )->user()->currentAccessToken()->delete();
        $email = auth( "sanctum" )->user()->email;

        return $this->sendResponse( $email, "Sikeres kijelentkezés");
    }

    public function getTokens() {
        $tokens = DB::table( "personal_access_tokens" )->get();

        return $tokens;
    }
}
