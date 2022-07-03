<?php

namespace App\Http\Controllers;

use App\Models\invoices;
use App\Models\packeges;
use App\Models\ReferralLink;
use App\Models\ReferralRelationship;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $total = invoices::sum('invoice_value');
        $regtotal = User::where('is_admin', 0)->count();
        $subtotal = invoices::all()->count();
        return view('admin.home', compact('total', 'regtotal', 'subtotal'));
    }

    public function create()
    {
        $packages = packeges::all();
        $total = invoices::sum('invoice_value');
        return view('admin.packeges', compact('packages', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'packageName' => 'required',
            'rate'        => 'required',
        ]);

        packeges::create([
            'packege_name'       => $request->packageName,
            'packege_code'       => $request->package_code,
            'packege_price'      => $request->price,
            'packege_time'       => $request->time,
            'packege_rate'       => $request->rate,
            'packege_feature_1'  => $request->feature1,
            'packege_feature_2'  => $request->feature2,
            'packege_feature_3'  => $request->feature3,
            'packege_feature_4'  => $request->feature4,
            'user_id'            => Auth::user()->id,
        ]);

        return back()->with('status', 'تم إضافة الباقة بنجاح');
    }

    public function invoices()
    {
        $invoices = invoices::join('packeges', 'packeges.id', '=' , 'invoices.package_id')->join('users', 'users.id', '=' , 'invoices.user_id')->get(['packeges.*', 'invoices.*', 'users.*']);
        $total = invoices::sum('invoice_value');
        return view('admin.invoices', compact('invoices', 'total'));
    }

    public function payed(Request $request,$id){
        $invoice = invoices::where('invoices_num', $id)->join('users', 'users.id', '=' , 'invoices.user_id')->select('invoices.*', 'users.user_id');

        // update invoices

        $invoice->update([
            'invoice_value'  => $request->invoice_value,
            'statue'         => 1,
        ]);

        // program affliate

        $user_id = $request->user_id;

        $ref_buy = ReferralRelationship::where('user_id', $user_id);

        $ref_buy->update([
            'ref_date' => now(),
            'is_buy'     => 1,
            'bal'    => $request->invoice_value,
        ]);
        return back();
    }
    public function finished($id){
        $invoice = invoices::where('invoices_num', $id);
        $invoice->update([
            'statue' => 2,
        ]);
        return back();
    }
    public function ban($id){
        $invoice = invoices::where('invoices_num', $id);
        $invoice->update([
            'statue' => 3,
        ]);
        return back();
    }
    public function destory($id){
        $invoice = invoices::where('invoices_num', $id);
        $invoice->delete();
        return back();
    }

    public function profile(){
        $total = invoices::sum('invoice_value');
        return view('admin.profile', compact('total'));
    }

    public function Updateprofile(Request $request){
        $user = User::find(Auth::id());
        $user->update($request->all());
        return back()->with('status', 'تم تعديل بياناتك بنجاح');
    }

    public function withdraw(){
        $total = invoices::sum('invoice_value');
        $Withdraw = Withdraw::join('users', 'users.id', '=', 'withdraws.user_id')->select('users.*', 'withdraws.*')->get();
        return view('admin.withdraw', compact('Withdraw', 'total'));
    }

    public function Acceptdwithdraw($id){
        $Withdraw = Withdraw::find($id);
        $Withdraw->update([
            'withdraw_statue' => 1
        ]);
        return back()->with('status', 'تم الموافقة علي الطلب بنجاح');
    }

    public function rejeteddwithdraw($id){
        $Withdraw = Withdraw::find($id);
        $Withdraw->update([
            'withdraw_statue' => 3
        ]);
        return back()->with('status', 'تم رفض الطلب بنجاح');
    }

    public function confirmdwithdraw($id){
        $Withdraw = Withdraw::find($id);
        $Withdraw->update([
            'withdraw_statue' => 2
        ]);
        return back()->with('status', 'تم تحويل الطلب إلي مدفوع');
    }

    public function getRefrals(){
        $total = invoices::sum('invoice_value');
        $AllRefrael = ReferralLink::with('user', 'relationships')->get();
        return view('admin.AllRefrael', compact('AllRefrael','total'));
    }

    public function showReferals($id){
        $total = invoices::sum('invoice_value');
        $ref_target = ReferralRelationship::where('referral_link_id', $id)->join('users', 'users.id', '=', 'referral_relationships.user_id')->get(['referral_relationships.*', 'users.name']);
        return view('admin.Referal', compact('ref_target','total'));
    }

    public function storeRefrals(Request $request, $id){
        $update_ref = ReferralLink::where('user_id', $id);
        $update_ref->update([
            'bounce'  => $request->bounce
        ]);
        return back()->with('status', 'تم تعيين ربح المستخدم بنجاح');
    }



}
