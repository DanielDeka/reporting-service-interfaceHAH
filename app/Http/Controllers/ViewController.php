<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function customer()
    {
    	return view('customer');
    }

    public function restaurant()
    {
    	return view('restaurant');
    }

    public function customerSubmit(Request $request)
    {
    	$client = new Client();
    	if ($request->id != null && $request->tgl != null) {
    		$string = 'http://b8ab4382.ngrok.io/api/reports/customers/get?id_cust='. $request->id .'&tgl_transaksi='. $request->tgl;
    		$res = $client->get($string);
    		$result = json_decode($res->getBody());
    	}
    	else if ($request->id == null && $request->tgl != null) {
    		$string = 'http://b8ab4382.ngrok.io/api/reports/customers/get?tgl_transaksi='. $request->tgl;
    		$res = $client->get($string);
    		$result = json_decode($res->getBody());
    	}
    	else if ($request->id != null && $request->tgl == null) {
    		$string = 'http://b8ab4382.ngrok.io/api/reports/customers/get?id_cust='. $request->id;
    		$res = $client->get($string);
    		$result = json_decode($res->getBody());
    	}
    	else return view('welcome');

    	$arr = $result->data;
    	$data['data'] = $arr;
    	// dd($data['data']);
    	return view('customerid', $data);
    }

    public function restaurantSubmit(Request $request)
    {
    	$client = new Client();
    	if ($request->id != null && $request->tgl != null) {
    		$string = 'http://b8ab4382.ngrok.io/api/reports/restaurants/get?id_rest='. $request->id .'&tgl_transaksi='. $request->tgl;
    		$res = $client->get($string);
    		$result = json_decode($res->getBody());
    	}
    	else if ($request->id == null && $request->tgl != null) {
    		$string = 'http://b8ab4382.ngrok.io/api/reports/restaurants/get?tgl_transaksi='. $request->tgl;
    		$res = $client->get($string);
    		$result = json_decode($res->getBody());
    	}
    	else if ($request->id != null && $request->tgl == null) {
    		$string = 'http://b8ab4382.ngrok.io/api/reports/restaurants/get?id_rest='. $request->id;
    		$res = $client->get($string);
    		$result = json_decode($res->getBody());
    	}
    	else return view('welcome');

    	$arr = $result->data;
    	$data['data'] = $arr;
    	// dd($data['data']);
    	return view('restaurantid', $data);
    }
}
