<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function get_customer()
    {
        // $data = DB::table('customers')->get();
        // $data = DB::table('customers')->first();
        // $data = DB::table('customers')->where('name', 'moshiur 2')->first();
        // $data = DB::table('customers')->where('id', 5)->first();
        // $data = DB::table('customers')->find(9);
        // $data = DB::table('customers')->pluck('name');
        // $data = DB::table('customers')->count('name');
        // $data = DB::table('customers')->count();
        // $data = DB::table('customers')->select('name', 'email as customer_email')->where('votes', 129)->get();
        // $data = DB::table('customers')->select('name', 'email as customer_email')->where('votes', 129)->first();
        $data = DB::table('customers')->select('name', 'email as customer_email')->where('votes', 129)->first();

        dd($data);
    }
}
