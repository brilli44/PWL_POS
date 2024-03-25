<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// // use Illuminate\Support\Facades\DB;
// use App\DataTables\KategoriDataTable;
// use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class KategoriController extends Controller
{
//  public function index(KategoriDataTable $dataTable){
    // $data = [
    //     'kategori_kode' => 'SNK',
    //     'kategori_nama' => 'Snack/Makanan Ringan',
    //     'created_at' => now()
    // ];
    // DB::table('m_kategori')->insert($data);
    // return 'Insert data baru berhasil';

    // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
    // return 'Update data berhasil. Jumlah data yang diupdate : ' .$row . 'baris';

    // $row = DB::table('m_kategori')->where('kategori_kode','SNK')->delete();
    // return 'Delete data berhasil. Jumlah data yang dihapus : '.$row. 'baris';

   //  $data = DB::table('m_kategori')->get();
   //  return view('kategori',['data'=>$data]);
  //  return $dataTable->render('kategori.index');


 //jobsheet 5 tugas praktikum 1 --------
// Jobsheet 6 bagian B

 public function create(): View
  {

   return view('kategori.create');
 }

 public function store(Request $request): RedirectResponse{

   $validated = $request->validate([
      'kategori_kode'=> 'required',
      'kategori_nama'=> 'required',
   ]);
   return redirect('/kategori');
 }
}
 //jobsheet 5 tugas praktikum 3 --------
//  public function edit($id){
//   $kategori = KategoriModel::findOrFail($id);
//   return view('kategori.edit',compact('kategori'));
//  }

//  public function edit_simpan(Request $request,$id){
//   $kategori = KategoriModel::find($id);
//   $kategori->kategori_kode = $request->kodeKategori;
//   $kategori->kategori_nama = $request->namaKategori;
//   $kategori->save();
//   return redirect('/kategori');
//  }

//  //<!-- Jobheet 5 tugas praktikum 4
//  public function hapus($id){
//   $kategori = KategoriModel::find($id);
//   $kategori->delete();
//   return redirect('/kategori');
//  }

