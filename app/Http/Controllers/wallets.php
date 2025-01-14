<?php

namespace App\Http\Controllers;

use App\Models\PurchasedStory;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wallets extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_wallet = Wallet::where('user_id',Auth::id())->get();
        $id = Wallet::where('user_id',Auth::id())->pluck('id');
        $single_wallet_chapter = Transaction::where('wallet_id',$id)->get();
       return view('user.wallet',compact('total_wallet','id','single_wallet_chapter'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
