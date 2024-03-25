<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


//Praktikum 6 – Implementasi Eloquent ORM
class UserController extends Controller
{
    public function index(){
        //tambah data user dengan Eloquent model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username','customer-1')->update($data);//update data user
       
        //JS 4 Praktikum 1 - $fillable
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);

         //JS 4 Praktikum 2.1 - Retrieving Single Models
        //  $user = UserModel::findOr(20, ['username','nama'],function (){
        //     abort(404);
        //  }); //->first()

        //JS 4 Praktikum 2.2 - Not Found Exceptions
        // $user = UserModel::where('level_id',2)->count();
        // // dd($user);
        //  return view('user',['data' => $user]);

        //coba akses model UserModel
        // $user = UserModel::all(); // ambill semua data dari tabel m_user
        // return view('user', ['data' => $user]);
        
        //--------Jobsheet 4 praktikum 2.4----------------------------
            // $user = UserModel::firstOrCreate(
            //     [
            //         'username' => 'manager22',
            //         'nama' => 'Manager Dua Dua',
            //         'password' => Hash::make('12345'),
            //         'level_id' => 2
            //     ],
            // );
            // return view('user', ['data' => $user]);

        // $user =UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ]
        //     );
        //     return view('user',['data' => $user]);

        // $user = UserModel::firstOrNew(
        //         [
        //             'username' => 'manager33',
        //             'nama' => 'Manager Tiga Tiga',
        //             'password' => Hash::make('12345'),
        //             'level_id' => 2
        //         ],
        //     );
        //     $user->save();
        //     return view('user', ['data' => $user]);

        //------Jobsheet 4 praktikum 2.5--------------

        // $user = UserModel::Create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2 
        //     ]
        //     );
        // $user->username = 'username12';

        // $user->save();

        // $user->wasChanged();//true
        // $user->wasChanged('username');//true
        // $user->wasChanged(['username','level_id']);//true
        // $user->wasChanged('nama');//false
        // dd($user->wasChanged(['nama','username']));//true;

        //-----------jobshet 4 praktikum 2.6--------
        $user = UserModel::all();
        return view('user',['data' => $user]);
    }
    public function tambah(){
        return view ('user_tambah');
    }
    public function tambah_simpan(Request $request){
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }
    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah',['data' => $user]);
    }
    public function ubah_simpan($id, Request $request){
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }
    public function hapus($id){
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
    //------jobsheet 4 praktikum 2.7-------
    // $user = UserModel::with('level')->get();
    // // dd($user);
    // return view('user',['data' => $user]);
}

