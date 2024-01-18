<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\User;
use App\Models\Role;
use App\Models\M_member;
use App\Models\M_kategori;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
	public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        $kategori=M_kategori::get();
        return view('login',compact('kategori'));
    }
     function genkode_daftar() {
        $kode =DB::table('member')->max('kdmember');    
                if(empty($kode)) {
                $noUrut = 1;
        }
        else {
            $noUrut = substr($kode, 4);
            $noUrut++;            
        }
        $char = "M";
        $newID = $char . sprintf("%08s", $noUrut);
        return $newID;
    }
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $cek=Auth::user();
            if($cek->role_id=="10"){
                    Session::put('email',$request->input('email'));
                    Session::put('login',TRUE);
                    return redirect()->route('adashboard');

            }
            else {
                Session::put('kdmember',$cek->kdmember);
                Session::put('email',$request->input('email'));
                Session::put('login',TRUE);
                return redirect()->route('home');
            }
            
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
 
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'

        ];
 
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $kdmember=AuthController::genkode_daftar();
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->role_id = 1;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->kdmember = $kdmember;
        $simpan = $user->save();
        //simpan member
        
        $simpanmember=M_member::create(['kdmember' =>$kdmember,
                'namamember' => $request->name,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'nohp' => $request->nohp,
                'aktif' => '1',
                'pwd' => $request->password,
                'groupuser' => 'member'                
            ]);

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {

        Auth::logout(); // menghapus session yang aktif
        Session::flush();
        return redirect('/');
    }    //
    public function gantipassword(){
        return view('admin.password');
    }
    
    public function change(Request $request)
    {
        $simpan=User::where('email',Session::get('email'))->update(['password'=>Hash::make($request->pbaru)]);
        if($simpan){
            return redirect()->route('logout');
        } else {
            Session::flash('errors', ['' => 'Update Password Gagal']);
            return redirect()->route('login');
        }
    }
}
