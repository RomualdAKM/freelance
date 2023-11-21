<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function create_customer(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'first_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'dpe' => 'required',
            'avis_imposition' => 'required',
            'photo_maison1' => 'required',
            'photo_maison2' => 'required',
            'photo_maison3' => 'required',
            'photo_maison4' => 'required',
            'photo_comble1' => 'required',
            'photo_comble2' => 'required',
            'photo_comble3' => 'required',
            'photo_comble4' => 'required',
            'photo_sous_sol1' => 'required',
            'photo_sous_sol2' => 'required',
            'photo_sous_sol3' => 'required',
            'photo_sous_sol4' => 'required',
            
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


        if ($request->hasFile('dpe')) {
            $dpe = time() . '.' . $request->dpe->extension();
            $request->dpe->move(public_path('dpe'), $dpe);
            $pathDpe = $dpe;
        } else {
            $pathDpe = null;
        }

        
        if ($request->hasFile('avis_imposition')) {
            $avis_imposition = time() . '.' . $request->avis_imposition->extension();
                $request->avis_imposition->move(public_path('avis_imposition'), $avis_imposition);
                $pathAvis = $avis_imposition;
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
        if ($request->hasFile('photo_comble3')) {
            $photo_comble3 = time() . '.' . $request->photo_comble3->extension();
                $request->photo_comble3->move(public_path('combles'), $photo_comble3);
                $pathphoto_comble3 = $photo_comble3;
        } else {
            $pathphoto_comble3 = null;
        }
        if ($request->hasFile('photo_comble4')) {
            $photo_comble4 = time() . '.' . $request->photo_comble4->extension();
                $request->photo_comble4->move(public_path('combles'), $photo_comble4);
                $pathphoto_comble4 = $photo_comble4;
        } else {
            $pathphoto_comble4 = null;
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
        if ($request->hasFile('photo_sous_sol3')) {
            $photo_sous_sol3 = time() . '.' . $request->photo_sous_sol3->extension();
                $request->photo_sous_sol3->move(public_path('sous_sol'), $photo_sous_sol3);
                $pathphoto_sous_sol3 = $photo_sous_sol3;
        } else {
            $pathphoto_sous_sol3 = null;
        }
        if ($request->hasFile('photo_sous_sol4')) {
            $photo_sous_sol4 = time() . '.' . $request->photo_sous_sol4->extension();
                $request->photo_sous_sol4->move(public_path('sous_sol'), $photo_sous_sol4);
                $pathphoto_sous_sol4 = $photo_sous_sol4;
        } else {
            $pathphoto_sous_sol4 = null;
        }

        $user = Auth::user();
        $user_Id = $user->id;   

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->first_name = $request->first_name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->dpe = $pathDpe;
        $customer->avis_imposition = $pathAvis;
        $customer->photo_maison1 = $pathphoto_maison1;
        $customer->photo_maison2 = $pathphoto_maison2;
        $customer->photo_maison3 = $pathphoto_maison3;
        $customer->photo_maison4 = $pathphoto_maison4;
        $customer->photo_comble1 = $pathphoto_comble1;
        $customer->photo_comble2 = $pathphoto_comble2;
        $customer->photo_comble3 = $pathphoto_comble3;
        $customer->photo_comble4 = $pathphoto_comble4;
        $customer->photo_sous_sol1 = $pathphoto_sous_sol1;
        $customer->photo_sous_sol2 = $pathphoto_sous_sol2;
        $customer->photo_sous_sol3 = $pathphoto_sous_sol3;
        $customer->photo_sous_sol4 = $pathphoto_sous_sol4;
        $customer->user_id = $user_Id;
        // $dossier->customer_id = 1;
        $customer->save();
        
        $response = [
            'success' => true,
            'message' => "dossier save successfully"
        ];
        return response()->json(
            $response,
            200
        );

    }
    public function get_customers(){

        $customers = Customer::all();

        return response()->json($customers, 200);
    }
}
