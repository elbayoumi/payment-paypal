<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
// use App\Models\Transaction;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $transaction= Transaction::all();
        //    dd($transaction);
            return view('products.showPaymentTransaction',['transaction'=>$transaction]);

    }
    public function transactions(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = Transaction::select(['payment_id', 'amount', 'currency', 'created_at', 'status'])->latest();

        //     return Transaction::of($data)
        //         ->addColumn('action', function($row) {
        //             // Add action column if needed
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        // return view('transactions.index');
        $columns = ['invoice_number', 'amount', 'currency', 'created_at', 'status'];
        $data = Transaction::select($columns)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $json_data = array(
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => count($data),
            'recordsFiltered' => count($data),
            'data'            => $data,
        );
        // return view('transactions.index',['json_data',$json_data]);

        return response()->json($json_data);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
