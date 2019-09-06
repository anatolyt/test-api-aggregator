<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    const CLIENT_ID = 'AeKeJOyx0ycNE9Tw127JDjSbJHlzJtufnMiYVfko2S3f-CGnfQB5hoio8zCpDdHyqLwqKplbKsMa6-m-';
    const SECRET = 'EAahSiXDZYZRYELi0DZ4rxF8Dn3JI9cFWZY-3B-DQlfSP3YA69Rf2IOiO9wTQfrF2fw8FPxrMhhpoXnr';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }




}
