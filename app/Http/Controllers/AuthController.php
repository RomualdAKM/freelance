<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\AdminMail;
use App\Models\Parrain;
use App\Mail\PasswordMail;
use App\Mail\RegisterMail;
use App\Models\CodeParrain;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
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
            // 'password' => 'required',
            // 'c_password' => 'required|same:password'
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
        // $input['password'] = bcrypt($input['password']);

       // $user = User::create($input);
       //$date = Carbon::now()->format('d/m/y');
       $date = Carbon::now()->format('dmy');

      // $mycode = strtoupper($input['name'].$input['first_name']).$date.'/1';
       $mycode = strtoupper(substr($input['name'], 0, 1) . substr($input['first_name'], 0, 1)).$date.'1';

       //dd($mycode);
       
       $user = new User();
       $user->name = $input['name'];
       $user->first_name = $input['first_name'];
       $user->phone = $input['phone'];
       $user->email = $input['email'];
       $user->adress = $input['adress'];
       $user->code = $mycode;
       //$user->password = $input['password'];
       $user->picture = $pathPicture;
       $user->kbis = $pathKbis;
       $user->is_active = 0;
       $user->role = 'user';
       $user->carte_identite = $pathCarte;
       
       $user->save();
    
       $parrain = new Parrain();
       $parrain->code_parrain = $user->code;
       $parrain->save();
       
        $parrain_user = User::where('code', $input['code'])->first();

        //dd($parrain_user);

        //$parrain_user->parrains()->attach($parrain);

        $parrain->users()->attach($parrain_user);

        Mail::to($request->email)->send(new RegisterMail());

        Mail::to("contact@fr2e.fr")->send(new AdminMail());

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
            'password' => $request->password,
            'is_active' => '1',
            
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
                'message' => "!!! Ces coordonnees ne sont pas enregistrez ou votre compte n'est pas encore activé"
            ];
            return response()->json($response);
        }
    }

    public function change_password(Request $request){

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'c_password' => 'required|same:password',
            
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

    public function users(){

        $users = User::where('role', 'user')->get();

        return response()->json($users, 200);

    }

    public function active_user($id){

        $password = Str::random(8);

        $newPassword = bcrypt($password);

        $user = User::find($id);

        $user->is_active = 1;

        $user->password = $newPassword;

        $user->save();

        Mail::to($user->email)->send(new PasswordMail($user->email, $password, $user->code));

    }

    public function desactive_user($id){

        // $password = Str::random(8);

        // $newPassword = bcrypt($password);

        $user = User::find($id);

        $user->is_active = 0;

        //$user->password = $newPassword;

        $user->save();

       // Mail::to($user->email)->send(new PasswordMail($user->email, $password));

    }

    public function forgot_password(Request $request){

        $validator = Validator()->make($request->all(),[
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json(
                $response
            );
        }

        $newPassword = Str::random(8);

        Mail::to($request->email)->send(new ForgotPasswordMail($newPassword));

        $user = User::where('email',$request->email)->first();

        $input['password'] = bcrypt($newPassword);
        $user->password = $input['password'];

        $user->save();

        $response = [
            'success' => true,
            'message' => 'Vous Avez recu un nouveau mot de passe, Veillez consulter votre Email'
        ];
        return response()->json(
            $response,
            200
        );
    }

    
}
