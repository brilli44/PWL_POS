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
        $user = UserModel::where('username','manager9')->firstOrFail();
         return view('user',['data' => $user]);

        //coba akses model UserModel
        // $user = UserModel::all(); // ambill semua data dari tabel m_user
        // return view('user', ['data' => $user]);
    }
}
