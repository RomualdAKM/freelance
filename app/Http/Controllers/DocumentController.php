<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function create_document(Request $request){

        $user = Auth::user();
       // dd($user);
        $user_Id = $user->id;    
       //dd( $user->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'adress' => 'required',
                   
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

        $dossier = new Document();
        $dossier->name = $request->name;
        $dossier->adress = $request->adress;
        $dossier->user_id = $user_Id;
        // $dossier->customer_id = 1;
        $dossier->save();
        
        $response = [
            'success' => true,
            'message' => "dossier save successfully"
        ];
        return response()->json(
            $response,
            200
        );
    }

    public function get_documents(Request $request){

        $user = Auth::user();

        $user_Id = $user->id;  

        // $documents = Document::where('user_id', $user_Id)->get();

        $query = Document::where('user_id', $user_Id);

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        $documents = $query->get();

        return response()->json($documents, 200);
    }

    
    public function get_all_documents(Request $request){ 


        if ($request->has('search')) {
            $documents = Document::where('name', 'like', '%' . $request->input('search') . '%')->get();
        }else{
            $documents = Document::all();
        }
        
        // $documents = Document::all();

        return response()->json($documents, 200);
    }

    public function get_document($id){
        
        $document = Document::find($id);

        return response()->json($document, 200);


    }

    public function edit_document(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'adress' => 'required',
                   
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

        $dossier = Document::find($id);
        $dossier->name = $request->name;
        $dossier->adress = $request->adress;
        $dossier->amount_quote = $request->amount_quote;
        $dossier->status = $request->status;
        $dossier->date_bill = $request->date_bill;
        // $dossier->user_id = $user_Id;
        // $dossier->customer_id = 1;
        $dossier->save();
        
        $response = [
            'success' => true,
            'message' => "dossier update successfully"
        ];
        return response()->json(
            $response,
            200
        );

    }

    public function delete_dossier($id){
        
        $dossier = Document::find($id);
        $dossier->delete();
    }
}
