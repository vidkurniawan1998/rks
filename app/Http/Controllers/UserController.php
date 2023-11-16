<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Limittransaksi;
use App\Logpurchase;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_login()
    {
        return view('pages.login');
    }

    public function process_login(Request $request)
    {
        // Validate Username And Password
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Check Username And Password
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('rks.dashboard');
        }

        return back()
        ->withErrors([
                'username' => 'Username atau password anda salah',
                'password' => 'Password atau username anda salah',
        ])
        ->withInput($request->only('username')); // Menyimpan input username agar tidak hilang saat kembali
    }

    public function view_dashboard()
    {
        return view('pages.dashboard');
    }

    public function view_log_transaksi()
    {
        $query= Logpurchase::query();
        $query->join('limit_koperasi', 'log_purchase.agenid', '=', 'limit_koperasi.idstaff')
        ->where('agenid', 'LIKE', 'RK%');

        // if (!empty($agenid)) {
        //     $query->where(function($q) use ($agenid) {
        //         $q->where('agenid', 'LIKE', 'RK%'); // Mencari agen yang dimulai dengan 'CW'
        //     });
        // }

        if (!empty($start_date)) {
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }

        $query->orderBy('tanggal', 'desc');
        $logpurchase = $query->paginate(10);
        return view('pages.logtransaksi', compact('logpurchase'));
    }

    public function filter_log_transaksi(Request $request)
    {
        $agenid = $request->input('agenid');
        $start_date = date('Y-m-d', strtotime($request->input('start_date')));
        $end_date = date('Y-m-d', strtotime($request->input('end_date')));

        $query= Logpurchase::query();

        if (!empty($agenid)) {
            $query->where(function($q) use ($agenid) {
                $q->where('agenid', 'LIKE', 'RK%')// Mencari agen yang dimulai dengan 'CW'
                ->orwhere('h2h_id', '');//Mencari Dengan h2h_id Seluruhnya
            });
        }

        if (!empty($start_date)) {
            $start_date = date('Y-m-d H:i:s', strtotime($start_date.' 00:00:00'));
            $end_date = date('Y-m-d H:i:s', strtotime($end_date.' 23:59:59'));
            $query->whereBetween('tanggal', [$start_date, $end_date]);
        }

        $logpurchase = $query->paginate(10);
        return view('pages.logtransaksi', compact('logpurchase'));
    }

    public function process_logout(Request $request)
    {
        //Logout Process
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('rks.login');
    }
}
