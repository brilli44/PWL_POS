<?php

namespace App\Http\Controllers;

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

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username','customer-1')->update($data);//update data user
       
        //coba akses model UserModel
        $user = UserModel::all(); // ambill semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}
