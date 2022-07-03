<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function subgroup(){
        $total = invoices::sum('invoice_value');
        $accounts = invoices::where('statue', 1)->join('packeges', 'packeges.id', '=', 'invoices.package_id')->groupBy('packege_name')->get(['packeges.id as pack_id', 'packeges.packege_name']);
        return view('admin.Allusers', compact('accounts', 'total'));
    }

    public function usersshow($id){
        $total = invoices::sum('invoice_value');
        $accounts = invoices::where('package_id', $id)->where('statue', 1)->join('packeges', 'packeges.id', '=', 'invoices.package_id')->join('users', 'users.id', '=', 'invoices.user_id')->get(['packeges.id as pack_id', 'packeges.packege_name', 'users.id as sub_id', 'users.name', 'invoices.invoice_value']);
        $sys_Earn = invoices::where('package_id', $id)->where('statue', 1)->join('users', 'users.id', '=', 'invoices.user_id')->get([ 'invoices.*', 'users.name' ]);
        return view('admin.user', compact('accounts', 'sys_Earn', 'total'));
    }

    public function updateaccounts(Request $request, $id){
        $pack_id = $id;
        $accounts = invoices::where('package_id', $pack_id);
        $accounts->update([
            'daily_earnings' => $request->daily_earnings,
            'net_profit'     => $request->net_profit,
            'deposited_amount' => $request->deposited_amount,
        ]);
        return back()->with('status', 'تم تعيين أرباح الجميع بنجاح');
    }


}
