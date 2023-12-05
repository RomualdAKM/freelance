<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Bill;
use App\Models\User;
use App\Mail\FactureMail;
use App\Models\BillItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BillController extends Controller
{
    public function create_bill(Request $request){
        //dd($request->all());
        // $user = Auth::user();
        // $companyId = $user->company_id;
        // $userSaveBill = $user->name;
        
        $validator = Validator::make($request->all(), [
            'items' => 'required|array',     
            'form' => 'required|array',
        ]);
       // dd($request->all());
    
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }
    
    
            $data = $request->all();
            $items = $data['items'];
            $form = $data['form'];
    
            $bill = new Bill([
                
                'total' => $form['total'],
                'totalHT' => $form['totalHT'],
                'totalTVA' => $form['totalTVA'],
                'date_emission' => $form['date_emission'],
                'date_echeance' => $form['date_echeance'],
                'nom' => $form['nom'],
                'iban' => $form['iban'],
                'bic' => $form['bic'],
                'reference' => $form['reference'],
                'user_id' => $form['user_id'],

                
            ]);
            $bill->save();
    
            foreach ($items as $item) {
                $billItem = new BillItems([
                    'bill_id' => $bill->id,
                    'article' => $item['article'],
                    'quantite' => $item['quantite'],
                    'price' => $item['price'],
                    'numberTVA' => $item['numberTVA'],
                ]);
    
                $billItem->save();
            }
    
                $response = [
                    'success' => true,
                    'message' => "Facture enregistrée avec succès"
                ];
                return response()->json($response, 200);
    
            }
    public function get_bills(){

        $bills = Bill::orderBy('id','DESC')->with('user')->get();
       // dd($bills);
        return response()->json($bills, 200);
    }

    public function download_facture(Request $request)
    {
    
     $id = $request->id;

       $facture = Bill::where('id', $id)->with('bill_items')->first();
       $item_factures = BillItems::where('bill_id',$facture->id)->get();
       $user_id = $facture->user_id;
       $user = User::find($user_id);

    //    $pdf = new PDF();
    //    $pdf->loadView('factures.download', compact(['facture','user','item_factures']));
      $pdf = PDF::loadView('factures.download', compact(['facture','user','item_factures']));

      $filename = 'facture.pdf';
         $headers = [
             'Content-Type' => 'application/pdf',
             'Content-Disposition' => 'attachment; filename="' . $filename . '"',
         ];

         return $pdf->output();

     }


     private function generatePDF($facture,$user,$item_factures)
     {
        $pdf = PDF::loadView('factures.download', compact(['facture','user','item_factures']));

         return $pdf->output();

     }

     public function send_facture(Request $request){

        $id = $request->id_Facture;

        $facture = Bill::where('id', $id)->with('bill_items')->first();
        $item_factures = BillItems::where('bill_id',$facture->id)->get();
        $user_id = $facture->user_id;
        $user = User::find($user_id);
        $pdfData = $this->generatePDF($facture,$user,$item_factures);

        $pdfFileName = 'facture.pdf';

        Mail::to($user->email)->send(new FactureMail($facture,$user, $item_factures, $pdfData, $pdfFileName));

         return response()->json([
             200
         ]);


     }

     public function delete_facture($id){

        $bill = Bill::find($id);
        
        $bill->delete();
        
     }

}
