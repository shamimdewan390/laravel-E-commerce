<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Product;
use Illuminate\Http\Request;
use App\Cart;
use App\Country;
use App\State;
use App\City;
use App\Coupon;
use App\Exports\BillingExport;
use App\Mail\SendEmail;
use App\sale;
use App\shipping;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use Mail;
use PDF;
use Excel;
use Illuminate\Contracts\Queue\ShouldQueue;

class HomeController extends Controller implements ShouldQueue

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

    public function ajaxState($country)
    {
        $state = State::where('country_id', $country)->orderBy('name', 'asc')->get();
        return response()->json($state);
    }

    public function ajaxCity($state_id)
    {
        $city = City::where('state_id', $state_id)->orderBy('name', 'asc')->get();
        return response()->json($city);
    }

    public function checkout()
    {
        $country = Country::all();
        $total = 0;
        $subtotal = 0;
        $discount = 0;
        $shopping = Cart::where('visitor_ip', request()->ip())->get();


        foreach ($shopping as  $value) {
            $total += ($value->get_product->product_price * $value->quantity);
        }
        $discount = session('discount');
        $grand_total = $total - session('discount');

        session(['grand_total' => $grand_total, 'sub-total' => $grand_total]);
        return view('template/checkout', compact('shopping', 'total', 'country', 'grand_total', 'discount'));
    }

    function stripe()
    {
        $total = session('total');
        return view('template/checkout', compact('total'));
    }


    function stripePost(Request $request)
    {
        $sub_total =  session('sub-total');
        $total =  session('total');
        $discount = session('discount');
        $grand_total = $request->session()->get('grand_total');

        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $shopping = shipping::insertGetId([
            'user_id' => Auth::id(),
            'fname' => $request->fname,
            'lname' => $request->lname,
            'company' => $request->company,
            'address' => $request->address,
            'house_on' => $request->house_on,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'zip_code' => $request->zip_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'payment_status' => 'padding',
        ]);

        $sale_id = sale::insertGetId([
            'user_id' => Auth::id(),
            'shipping_id' => $shopping,
            'grand_total' => $grand_total,
        ]);
        \Stripe\Stripe::setApiKey("sk_test_8xI7is7xsKmDPtgFxaprdhlK00uDfCyCdm");

        $charge = \Stripe\Charge::create([
            "amount" => 100 * $grand_total,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        $data = Cart::where('visitor_ip', request()->ip())->get();

        foreach ($data as $value) {

            Billing::insert([
                'sale_id' => $sale_id,
                'user_id' => Auth::id(),
                'product_id' => $value->product_id,
                'product_quantity' => $value->quantity,
                'product_price' => $value->get_product->product_price,
                'payment_type' => $charge->source->brand,
                'created_at' => Carbon::now()
            ]);
            
            Product::findOrFail($value->product_id)->decrement('product_quantity', $value->quantity);
            $value->delete();
        }

        $billing = Billing::where('user_id', Auth::id())->where('sale_id', $sale_id)->get();
        $pdf = PDF::loadView('mail', compact('billing', 'sub_total', 'discount', 'grand_total'));

        try {
            Mail::send('mail', compact('billing', 'sub_total', 'discount', 'grand_total'), function ($message) use ($pdf) {
                $message->to([Auth::user()->email])
                    ->subject('hacksaw')
                    ->attachData($pdf->output(), "invoice.pdf");
            });
        } catch (JWTException $exception) {
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            $this->statusdesc  =   "Error sending mail";
            $this->statuscode  =   "0";
        } else {

            $this->statusdesc  =   "Message sent Succesfully";
            $this->statuscode  =   "1";
        }

        $request->session()->forget('discount', 'total','coupon_discount','sub_total');
        return redirect('/');
    }

    public function excelDownload()
    {
        $billing = Billing::all();
        return Excel::download(new BillingExport($billing), 'invoices.xlsx');
    }

    public function pdfDownload()
    {
        $billing = Billing::where('user_id', Auth::id())->get();
        $pdf = PDF::loadView('mail', compact('billing'));

        try {
            Mail::send('mail', compact('billing'), function ($message) use ($billing, $pdf) {
                $message->to(Auth::user()->email)
                    ->subject('hacksaw')
                    ->attachData($pdf->output(), "invoice.pdf");
            });
        } catch (JWTException $exception) {
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            $this->statusdesc  =   "Error sending mail";
            $this->statuscode  =   "0";
        } else {

            $this->statusdesc  =   "Message sent Succesfully";
            $this->statuscode  =   "1";
        }
        return redirect('/');
    }
}
