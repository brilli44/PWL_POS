<?php
namespace App\Http\Controllers;

//------jobsheet 7 praktikum 2 bagian 1-------
class WelcomeController extends Controller{
    public function index (){
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home','Welcome']
        ];
        $activeMenu = 'dashboard';

        return view('welcome', ['breadcrumb' =>$breadcrumb, 'activeMenu' => $activeMenu ]);
    }
}