<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\packeges;
use App\Models\ReferralRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class packageController extends Controller
{
    public function index(){
        $packages = packeges::all();
        return view('packeges.index', compact('packages'));
    }
    public function show($id){

        if(Auth::check()){

            $package_id = $id;
            $package = packeges::find($package_id);
            return view('packeges.invoices', compact('package_id', 'package'));

        }
        else {

            return redirect('login');

        }
    }

    public function store(Request $request){
        // Get and Upload Image
        if($request->file('screen')){
            $file= $request->file('screen');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('assets/payment_screen'), $filename);
        }

        // insert to database

        $invoice = new invoices();
        $invoice->invoices_num = rand(1, 999);
        $invoice->invoices_date = now();
        if(isset($filename)){
            $invoice->screen = $filename;
        }
        $invoice->statue = 0;
        $invoice->package_id = $request->package_id;
        $invoice->user_id = $request->user_id;

        // print message
        $invoice->save();

        return redirect('user/home');
    }
}
