<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Carbon\Carbon;
use Auth;
use App\Models\UserInfo;
use Stevebauman\Location\Facades\Location;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ip = '172.69.178.53';
        $response = Http::get("http://ip-api.com/json/{$ip}");

        if ($response->successful() && $response->json()['status'] === 'success') {
            $countryCode = $response->json()['countryCode'];
        } else {
            $countryCode = '';
        }

        if($countryCode != ''){
            $products = Products::where('country', $countryCode)->count();
        }

        $allProducts = Products::count();
        return view('admin.dashboard',compact('allProducts', 'products'));
    }
}
