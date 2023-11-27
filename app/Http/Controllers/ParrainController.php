<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Parrain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParrainController extends Controller
{

   public function get_affiliers(){

    $user = Auth::user();
    
    $parrain = Parrain::where('code_parrain',$user->code)->first();
    
    $affilies = $user->parrains;

    foreach($affilies as $affilie){

      $affiliers[] =  User::where('code',$affilie->code_parrain)->first();

    }

    //dd($affiliers);

   return response()->json($affiliers, 200);

   }

   public function get_user_affiliers($id){

    //dd($id);

    $user = User::where('id',$id)->first();

    $affilies = $user->parrains;

    $affiliers = [];
    
    foreach($affilies as $affilie){

      $affiliers[] =  User::where('code',$affilie->code_parrain)->first();

    }

    //dd($affiliers);

   return response()->json($affiliers, 200);
   
   }
}
