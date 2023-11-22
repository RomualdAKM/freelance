<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormationController extends Controller
{
    public function create_formation(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'picture' => 'required',
            
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


        if ($request->hasFile('picture')) {
            $picture = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('picture'), $picture);
            $pathpicture = $picture;
        } else {
            $pathpicture = null;
        }


        $formation = new Formation();
        $formation->title = $request->title;
        $formation->description = $request->description;   
        $formation->picture = $pathpicture;
        $formation->save();
        
        $response = [
            'success' => true,
            'message' => "formation save successfully"
        ];
        return response()->json(
            $response,
            200
        );

    }


    public function get_formations(){

        $formations = Formation::all();

        return response()->json($formations, 200);
    }

    public function get_formation($id){

        $formation = Formation::find($id);

        return response()->json($formation, 200);
    }

    public function edit_formation(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
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


        if ($request->hasFile('picture')) {
            $picture = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('picture'), $picture);
            $pathpicture = $picture;
        } else {
            $pathpicture = null;
        }

        $formation = Formation::find($id);
        $formation->title = $request->title;
        $formation->description = $request->description;   
        $formation->picture = $pathpicture;
        $formation->save();
        
        $response = [
            'success' => true,
            'message' => "formation modified successfully"
        ];
        return response()->json(
            $response,
            200
        );


    }

    public function delete_formation($id){


        $formation = Formation::find($id);
        $formation->delete();
    }
}
