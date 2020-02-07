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
        $currencies = app('db')->select("SELECT * FROM rates");
        return json_encode($currencies, JSON_FORCE_OBJECT);
    }

    public function get_currencies(Request $request)
    {
        try {
            $id = $request['id'];
            $currency = app('db')->select("SELECT * FROM rates WHERE id = $id")[0];
            return json_encode($currency, JSON_FORCE_OBJECT);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
