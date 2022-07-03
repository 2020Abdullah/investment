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
    public function Home()
    {
        return view('users.home');
    }

    public function calcEarn(){
        $user_id = Auth::id();
        $daily_earnings = invoices::where('user_id', $user_id)->where('statue', 1)->sum('daily_earnings');
        $net_profit = invoices::where('user_id', $user_id)->where('statue', 1)->sum('net_profit');
        $deposited_amount = invoices::where('user_id', $user_id)->where('statue', 1)->sum('deposited_amount');
        $total = invoices::where('user_id', $user_id)->sum('invoice_value');
        $refEarntotal = ReferralLink::where('user_id', $user_id)->pluck('bounce')->first();

        return response()->json([
            'net_profit' => $net_profit,
            'daily_earnings' => $daily_earnings,
            'deposited_amount' => $deposited_amount,
            'total'            => $total,
            'ref_total'         => $refEarntotal,
        ]);
    }

    public function package()
    {
        $user_id = Auth::id();
        $packages = invoices::join('packeges', 'packeges.id', '=' , 'invoices.package_id')->select('invoices.*','packeges.*')->where('invoices.user_id', $user_id)->groupBy('package_id')->get();
        return view('users.package', compact('packages'));
    }

    public function changePackage(Request $request, $id){
        $currentPackage = $id;
        $packages = packeges::all();
        return view('packeges.index', compact('packages', 'currentPackage'));
    }

    public function storePackage(Request $request){
        $currentPackage = $request->current_id;
        $new_package = $request->package_id;
        $package = invoices::where('package_id', $currentPackage);
        $package->update([
            'package_id' => $new_package,
            'statue'     => 0,
        ]);
        return redirect('user/packeges')->with('status', 'تم تحديث باقتك بنجاح وبانتظار الموافقة ...');
    }

    public function profile(){
        return view('users.profile');
    }

    public function Updateprofile(Request $request){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $user->update($request->all());
        return back()->with('status', 'تم تعديل بياناتك بنجاح');
    }

    public function payment(){
        $user_id = Auth::user()->id;
        $packages = invoices::join('packeges', 'packeges.id', '=' , 'invoices.package_id')->select('invoices.*', 'packeges.*')->where('statue', 1)->where('invoices.user_id', $user_id)->paginate(10);
        return view('users.payment', compact('packages'));
    }

    public function withdraw(){
        $user_id = Auth::user()->id;
        $net_profit = invoices::where('user_id', $user_id)->pluck('net_profit')->first();
        $withdraw_exits = Withdraw::where('user_id', $user_id)->where('withdraw_statue', 2)->count();
        $ref_value = ReferralLink::where('user_id', $user_id)->pluck('bounce')->first();
        $Withdraw = withdraw::join('users', 'users.id', '=', 'withdraws.user_id')->select('users.*', 'withdraws.*')->where('withdraws.user_id', $user_id)->get();

        if($withdraw_exits){
            $withdraw_value = Withdraw::where('user_id', $user_id)->pluck('withdraw_value')->first();
        }
        else {
            $withdraw_value = 0;
        }
        return view('users.withdraw', compact('Withdraw', 'net_profit', 'withdraw_value', 'ref_value'));
    }
    public function sendwithdraw(Request $request){
        $inputs = $request->all();
        $user_extits = User::where('name', '=', $inputs['Name'])->where('email', '=', $inputs['Email'])->exists();

        if($user_extits){
            $Withdraw = new Withdraw();
            $Withdraw->request_num = rand(0, 1000);
            $Withdraw->request_date = now();
            $Withdraw->withdraw_method = $request->withdraw_method;
            $Withdraw->withdraw_value = $request->withdraw_value;
            $Withdraw->withdraw_address  = $request->withdraw_address;
            $Withdraw->user_id = Auth::id();
            $Withdraw->save();
            return back()->with('status', 'تسجيل طلبك بنجاح');
        } else {
            session()->flash("Error", "هناك خطأ في بياناتك برجاءالتأكد بياناتك");
            return redirect()->back();
        }
    }

    public function Refreal(){
        $user_id = Auth::id();
        $user_ref = ReferralLink::where('user_id', $user_id)->pluck('id');
        $countbuy = ReferralRelationship::join('users', 'users.id', '=', 'referral_relationships.user_id')->where('is_active', 1)->select('users.is_active')->pluck('is_active')->count();
        $bounce = ReferralLink::where('user_id', $user_id)->pluck('bounce')->first();
        return view('users.Refreal', compact('countbuy', 'bounce'));
    }
}
