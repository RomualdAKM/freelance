<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contrat;
use App\Mail\ContratMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContratController extends Controller
{
    public function create_contrat(Request $request){

        $validator = Validator::make($request->all(), [

            'user_id' => 'required',
            'description' => 'required',
            
        ]);
       //dd($request->all());

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
        
        $contrat = new Contrat();
        $contrat->description = $request->description;
        $contrat->save();
       // dd($request->user_id);

       if($request->user_id !== 'tout'){

            $user = User::find($request->user_id);

            $user->contrats()->attach($contrat);

            Mail::to($user->email)->send(new ContratMail());
            
       }else{

         $users = User::where('role','user')->get();
         
         foreach($users as $userLoop){
             
           // dd($user);

            $user = User::find($request->user_id);

            $userLoop->contrats()->attach($contrat);


            Mail::to($userLoop->email)->send(new ContratMail());

       }

    }

    $response = [
        'success' => true,
        'message' => "contrat save successfully"
    ];
    return response()->json(
        $response,
        200
    );

    }

    public function get_contrats(){

        $user = Auth::user();

        $contrats = $user->contrats;
       // dd($user);
        return $contrats;
    }

    public function get_all_contrats(){

        $allcontrats = Contrat::all();

        return $allcontrats;
    }

    public function get_contrat($id){

        $contrat = Contrat::find($id);

        return $contrat;
    }

    public function delete_contrat($id){

        $contrat = Contrat::find($id);

        $contrat->delete();
    }

    public function edit_contrat(Request $request, $id){


        $validator = Validator::make($request->all(), [
           
            'description' => 'required',
            
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

        $contrat = Contrat::find($id);

        $contrat->description = $request->description;

        $contrat->save();


        if($request->user_id !== 'tout'){

            $user = User::find($request->user_id);

            $user->contrats()->attach($contrat);
            
       }else{

         $users = User::where('role','user')->get();

         foreach($users as $userLoop){
             
           // dd($user);

            $user = User::find($request->user_id);

            $userLoop->contrats()->attach($contrat);
        
       }

    }

    $response = [
        'success' => true,
        'message' => "contrat save successfully"
    ];
    return response()->json(
        $response,
        200
    );


    }


}
