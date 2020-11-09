<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\payment;

use Illuminate\Support\Facades\Log;

class confirmcallback extends Controller
{
    public function storeResults(Request $request){
        
        // $res = $request->all();

        // if (!empty($res)) {
        //     $payent = new hall();
        //     $payent->TransactionType = $res->input('TransactionType');
        //     $payent->TransID = $res->input('TransID');
        //     $payent->TransTime = $res->input('TransTime');
        //     $payent->TransAmount = $res->input('TransAmount');
        //     $payent->BusinessShortCode = $res->input('BusinessShortCode');
        //     $payent->BillRefNumber = $res->input('BillRefNumber');
        //     $payent->InvoiceNumber = $res->input('InvoiceNumber');
        //     $payent->MSISDN = $res->input('MSISDN');
        //     $payent->FirstName = $res->input('FirstName');
        //     $payent->MiddleName = $res->input('MiddleName');
        //     $payent->LastName = $res->input('LastName');
        //     $payent->OrgAccountBalance = $res->input('OrgAccountBalance');

        //     $payent->save();
        //     return redirect('/event')->with('success', 'Hall Was Successfully Added');

            
        // }return abort(404);



        $request=file_get_contents('php://input');

        if (!empty($request)) {
        
        //process the received content into an array
        $array = json_decode($request, true);
        $transactiontype= $array['TransactionType']; 
        $transid=$array['TransID']; 
        $transtime=$array['TransTime']; 
        $transamount=$array['TransAmount']; 
        $businessshortcode=$array['BusinessShortCode']; 
        $billrefno=$array['BillRefNumber']; 
        $invoiceno=$array['InvoiceNumber']; 
        $msisdn=$array['MSISDN']; 
        $orgaccountbalance=$array['OrgAccountBalance']; 
        $firstname=$array['FirstName']; 
        $middlename=$array['MiddleName']; 
        $lastname=$array['LastName'];
        
       // Log::info('RECEIVED TRANSAMOUNT: '.$transamount);
        
        DB::insert('INSERT INTO payments
                    ( 
                    TransactionType,
                    TransID,
                    TransTime,
                    TransAmount,
                    BusinessShortCode,
                    BillRefNumber,
                    InvoiceNumber,
                    MSISDN,
                    FirstName,
                    MiddleName,
                    LastName,
                    OrgAccountBalance
                    )   values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                    [$transactiontype, 
                    $transid, 
                    $transtime, 
                    $transamount, 
                    $businessshortcode, 
                    $billrefno, 
                    $invoiceno, 
                    $msisdn,
                    $firstname, 
                    $middlename, 
                    $lastname, 
                    $orgaccountbalance] );
                            
                echo'{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
                return redirect('/event')->with('success', 'Hall Was Successfully Added');
                    }
                    return abort(404);

        
    }
}