<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShortLinkController extends Controller
{
    public function index(ShortLink $shortLink){

        $ips = [
            '187.214.84.50',
            '158.138.63.153',
            '21.134.202.25',
            '229.30.71.143',
            '115.87.124.220',
            '248.36.30.32',
            '68.107.165.20',
            '13.217.188.135',
            '121.174.2.101',
            '207.180.177.72'
        ];

        $random_keys = rand(0, 1);
        $ip = env('APP_ENV') == 'local' ? $ips[$random_keys] : request()->ip();
        $ipInfo = Http::get('http://ip-api.com/json/'.$ip)->object();

        Visit::create([
            'country' => $ipInfo->country,
            'short_link_id' => $shortLink->id,
        ]);

        return redirect($shortLink->url);
    }
}
