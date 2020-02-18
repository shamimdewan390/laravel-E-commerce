<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class Billing implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function view(): View
    // {
    //     $billing = Billing::where('user_id',Auth::id())->get();
    //     return view('mail',compact('billing'));
    // }

    public function view(): View
    {
        return view('mail', [
            'invoices' => Invoice::all()
        ]);
    }
}
