<?php

namespace App\Http\Controllers;



use App\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function currencies()
    {
        $currencies = $results = app('db')->select("SELECT * FROM rates");
        return view('rates.currencies',compact('currencies'));
    }

    public function get_currencies(Request $request)
    {
        $id = $request['id'];
        $currency = $results = app('db')->select("SELECT * FROM rates WHERE id = $id")[0];
        return view('rates.get_currency',compact('currency'));
    }
}
