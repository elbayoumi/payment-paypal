<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Transaction;
class PayPalController extends Controller

{
    public static $message='';
    public function goPayment($status=''){
        return view('products.index',['data' => $status]);
    }
    public function payment(){
        $data=[];
        $data['items']=[
            [
                'name'=>'Appel',
                'price'=>100,
                'description'=>'Macbook Pro 14 inch',
                'qty'=>1
            ]
        ];
        $data['invoice_id']=1;
        $data['invoice_description']='Order Invoice';
        $data['return_url']=route('payment.success');
        $data['cancel_url']=route('payment.cancel');
        $data['total']=100;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data,true);




        return redirect($response['paypal_link']);


    }
    public function cancel(Request $request){
        // dd('you are cancelled this payment');
        self::$message="canceld";

        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);
        // $token=$request->all()['token'];
        Transaction::create([
         'currency'=>$response['CURRENCYCODE'],
         'token'=> $response['TOKEN'],
          'amount'=>$response['AMT'],
           'status'=>$response['BILLINGAGREEMENTACCEPTEDSTATUS'],
           'email'=>'canceld',
           'invoice_number'=>$response['CORRELATIONID'],
           'country_code'=>'canceld',

        ]);;
        //  view('products.index',['data'=>'canceld','request'=>$response]);
        // return redirect('go-payment')->with('data','canceld','request',$response);
        return redirect('go-payment/canceld');

    }
    public function success(Request $request){

        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);
        // $token=$request->all()['token'];

        // $response = $provider->getExpressCheckoutDetails($request->token);
    if (in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
//    dd('your payment has been successfully');
    // view('products.index',['data'=>'success','request'=>$response]);
    // return redirect('go-payment')->with('data','success','request',$response);
    Transaction::create([
        'currency'=>$response['CURRENCYCODE'],
        'token'=> $response['TOKEN'],
         'amount'=>$response['AMT'],
          'status'=>$response['BILLINGAGREEMENTACCEPTEDSTATUS'],
          'email'=>$response['EMAIL'],
          'invoice_number'=>$response['CORRELATIONID'],
          'country_code'=>$response['COUNTRYCODE'],

       ]);
    return redirect('go-payment/success');

    }
    else {
// view('products.index',['data'=>'try_again']);
// return redirect('go-payment')->with('data','try_again');
return redirect('go-payment/try_again');

// dd('no payment please try again');
    }

    }

}
