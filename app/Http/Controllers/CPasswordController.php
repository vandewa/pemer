<?php

namespace App\Http\Controllers;

use App\Jobs\MailResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CPasswordController extends Controller
{
    public function resetLink(Request $request)
    {
        // dd($request->email);
        $cari = User::where('email', $request->email)->first();
        if (isset($cari)) {
            MailResetPassword::dispatch($cari->id);
            return redirect('forgot-password')->with('status', 'Silahkan Cek Email Anda untuk merubah password akun');
        } else {
            return redirect('forgot-password')->with('status', 'Email Tidak ditemukan.');
        }
    }

    public function index($token, $email)
    {
        $data = User::where('email', $email)->where('remember_token', $token)->first();
        if (isset($data)) {
            return view('auth/reset-password')->with(['token' => $token, 'email' => $email]);
        } else {
            return redirect()->route('login');
        }
    }

    public function rubahPassword(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        $password = $request->password;

        $rules = [
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
            ],
        ];

        $this->validate($request, $rules);

        $data = User::where('email', $email)->where('remember_token', $token)->first();
        $data->password = Hash::make($password);
        $data->remember_token = '';
        $data->save();
        return redirect()->route('login')->with('status', 'Silahkan Login dengan Password terbaru');
    }
}
