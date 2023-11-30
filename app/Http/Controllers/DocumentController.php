<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Mail\DossierMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            'first_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'dpe' => 'required',
            'photo_impot' => 'required',
            'photo_maison1' => 'required',
            'photo_maison2' => 'required',
            'photo_maison3' => 'required',
            'photo_maison4' => 'required',
            'photo_comble1' => 'required',
            'photo_comble2' => 'required',
            'photo_sous_sol1' => 'required',
            'photo_sous_sol2' => 'required',
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

        if ($request->hasFile('dpe')) {
            $dpe = time() . '.' . $request->dpe->extension();
            $request->dpe->move(public_path('dpe'), $dpe);
            $pathDpe = $dpe;
        } else {
            $pathDpe = null;
        }

        
        if ($request->hasFile('photo_impot')) {
            $photo_impot = time() . '.' . $request->photo_impot->extension();
                $request->photo_impot->move(public_path('avis_imposition'), $photo_impot);
                $pathAvis = $photo_impot;
        } else {
            $pathAvis = null;
        }

        if ($request->hasFile('photo_maison1')) {
            $photo_maison1 = time() . '.' . $request->photo_maison1->extension();
                $request->photo_maison1->move(public_path('maisons'), $photo_maison1);
                $pathphoto_maison1 = $photo_maison1;
        } else {
            $pathphoto_maison1 = null;
        }

        if ($request->hasFile('photo_maison2')) {
            $photo_maison2 = time() . '.' . $request->photo_maison2->extension();
                $request->photo_maison2->move(public_path('maisons'), $photo_maison2);
                $pathphoto_maison2 = $photo_maison2;
        } else {
            $pathphoto_maison2 = null;
        }

        if ($request->hasFile('photo_maison3')) {
            $photo_maison3 = time() . '.' . $request->photo_maison3->extension();
            $request->photo_maison3->move(public_path('maisons'), $photo_maison3);
            $pathphoto_maison3 = $photo_maison3;
        } else {
            $pathphoto_maison3 = null;
        }
        

        if ($request->hasFile('photo_maison4')) {
            $photo_maison4 = time() . '.' . $request->photo_maison4->extension();
                $request->photo_maison4->move(public_path('maisons'), $photo_maison4);
                $pathphoto_maison4 = $photo_maison4;
        } else {
            $pathphoto_maison4 = null;
        }
        if ($request->hasFile('photo_comble1')) {
            $photo_comble1 = time() . '.' . $request->photo_comble1->extension();
                $request->photo_comble1->move(public_path('combles'), $photo_comble1);
                $pathphoto_comble1 = $photo_comble1;
        } else {
            $pathphoto_comble1 = null;
        }
        if ($request->hasFile('photo_comble2')) {
            $photo_comble2 = time() . '.' . $request->photo_comble2->extension();
                $request->photo_comble2->move(public_path('combles'), $photo_comble2);
                $pathphoto_comble2 = $photo_comble2;
        } else {
            $pathphoto_comble2 = null;
        }

        if ($request->hasFile('photo_sous_sol1')) {
            $photo_sous_sol1 = time() . '.' . $request->photo_sous_sol1->extension();
                $request->photo_sous_sol1->move(public_path('sous_sol'), $photo_sous_sol1);
                $pathphoto_sous_sol1 = $photo_sous_sol1;
        } else {
            $pathphoto_sous_sol1 = null;
        }
        if ($request->hasFile('photo_sous_sol2')) {
            $photo_sous_sol2 = time() . '.' . $request->photo_sous_sol2->extension();
                $request->photo_sous_sol2->move(public_path('sous_sol'), $photo_sous_sol2);
                $pathphoto_sous_sol2 = $photo_sous_sol2;
        } else {
            $pathphoto_sous_sol2 = null;
        }


        $dossier = new Document();
        $dossier->name = $request->name;
        $dossier->first_name = $request->first_name;
        $dossier->phone = $request->phone;
        $dossier->email = $request->email;
        $dossier->dpe = $pathDpe;
        $dossier->photo_impot = $pathAvis;
        $dossier->photo_maison1 = $pathphoto_maison1;
        $dossier->photo_maison2 = $pathphoto_maison2;
        $dossier->photo_maison3 = $pathphoto_maison3;
        $dossier->photo_maison4 = $pathphoto_maison4;
        $dossier->photo_comble1 = $pathphoto_comble1;
        $dossier->photo_comble2 = $pathphoto_comble2;
        $dossier->photo_sous_sol1 = $pathphoto_sous_sol1;
        $dossier->photo_sous_sol2 = $pathphoto_sous_sol2;
        $dossier->adress = $request->adress;
        $dossier->user_id = $user_Id;
        // $dossier->dossier_id = 1;
        $dossier->save();
        
        Mail::to("contact@fr2e.fr")->send(new DossierMail());
        
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
        // $dossier->dossier_id = 1;
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
