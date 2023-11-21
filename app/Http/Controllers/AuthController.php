<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'first_name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'code' => 'required',
            'picture' => 'required',
            'kbis' => 'required',
            'carte_identite' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json(
                $response,
                200
            );
        }

       
        if ($request->hasFile('picture')) {
            $picture = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('picture'), $picture);
            $pathPicture = $picture;
        } else {
            $pathPicture = null;
        }

        
        if ($request->hasFile('kbis')) {
            $kbis = time() . '.' . $request->kbis->extension();
                $request->kbis->move(public_path('kbis'), $kbis);
                $pathKbis = $kbis;
        } else {
            $pathKbis = null;
        }

        $pathCarte = '';
        if ($request->hasFile('carte_identite')) {
            $carte_identite = time() . '.' . $request->carte_identite->extension();
            $request->carte_identite->move(public_path('carte_identite'), $carte_identite);
            $pathCarte = $carte_identite;
        } else {
            $pathCarte = null;
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

       // $user = User::create($input);

       $user = new User();
       $user->name = $input['name'];
       $user->first_name = $input['first_name'];
       $user->phone = $input['phone'];
       $user->email = $input['email'];
       $user->adress = $input['adress'];
       $user->code = $input['code'];
       $user->password = $input['password'];
       $user->picture = $pathPicture;
       $user->kbis = $pathKbis;
       $user->role = 'user';
       $user->carte_identite = $pathCarte;
        
        $user->save();

        Mail::to($request->email)->send(new RegisterMail());

        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => "User register successfully"
        ];

        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // $user = Auth::user();

            $user = $request->user();


            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => "User login successfully"
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => "!!!!!! Ces coordonnees ne sont pas enregistrez : ressayez ou creer un compte"
            ];
            return response()->json($response);
        }
    }

    public function change_password(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json(
                $response,
                200
            );
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user_id = Auth::user()->id;

        $user = User::find( $user_id);
        $user->password = $input['password'];
        $user->save();

        $response = [
            'success' => true,
            'message' => "reset password  successfully"
        ];
        return response()->json(
            $response,
            200
        );

    }


    public function info_auth_user(){

        $user = Auth::user();

        return response()->json($user, 200);

    }
}
