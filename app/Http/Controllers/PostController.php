<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index( Post $key )
    {
        return $key;
    }

    public function get_session_request( Request $request)
    {
        $data = $request->session()->get('message');
        return $data;
    }

    public function get_session_helper()
    {
        $data = session('message');
        return $data;
    }

    public function get_session_facade()
    {
        $data = Session::get('message');
        return $data;
    }

    public function put_session_request(Request $request)
    {
        $request->session()->put('message','Hello Bangladesh Request');
    }

    public function put_session_helper()
    {
        session(['message' => 'Hello Bangladesh Helper']);
    }

    public function put_session_facade()
    {
        Session::put('message','Hello Bangladesh Facade');
    }
}
