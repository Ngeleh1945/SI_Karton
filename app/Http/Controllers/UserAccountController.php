<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function createUserAccount(Request $request)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'nik' => 'required|unique:user_accounts,nik',
                'nama' => 'required',
                'jabatan' => 'required',
                'username' => 'required|min:6|unique:users,username',
                'password' => 'required|min:8'
            ]);

            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            UserAccount::create([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
            return redirect()->route('register')->with('success', 'User berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['msg' => 'Terjadi kesalahan']);
        }
    }

    public function showUserAccounts()
    {
        $userAccounts = UserAccount::all();
        return view('showdatauser', ['userAccounts' => $userAccounts]);
    }
    public function deleteAccount($nik)
    {
        $userAccount = UserAccount::find($nik);

        if ($userAccount) {
            $userAccount->delete();
            return redirect()->route('userAccounts.index')->with('success', 'User account and associated user deleted successfully');
        }

        return redirect()->route('userAccounts.index')->with('error', 'User account not found');
    }
}
