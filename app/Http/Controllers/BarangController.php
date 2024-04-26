<?php

namespace App\Http\Controllers;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;



class BarangController extends Controller
{
    public function index(){
        $breadcrumb = (object) 
        [ 'title' => 'Daftar Barang', 
        'list' => ['Home', 'Barang'] ];
        
        $page = (object) [ 'title' => 'Daftar user yang terdaftar dalam sistem'
    ];
        $activeMenu = 'barang'; // set menu yang sedang aktif
        $barang = BarangModel::all(); 
        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang ,'activeMenu' => $activeMenu]);
    }

    
    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request) {
    $barang = BarangModel::select('barang_id', 'kategori_id', 'nama', 'barang_kode','barang_nama','harga_beli',
    'harga_jual' )->with('kategori');
    
    
    if ($request->barang_id){
        $barang->where('barang_id', $request->barang_id);
    }
    
    return DataTables::of($barang)
        ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addColumn('aksi', function ($barang) { // menambahkan kolom aksi
        $btn = '<a href="'.url('/barang/' . $barang->barang_id).'" class="btn btn-info btn-sm"> Detail</a> ';
        $btn .= '<a href="'.url('/barang/' . $barang->barang_id . '/edit').'"class="btn btn-warning btn-sm">Edit</a> ';
        $btn .= '<form class="d-inline-block" method="POST" action="'.url('/barang/'.$barang->barang_id).'">'
        . csrf_field() . method_field('DELETE') .
        '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakin menghapus data
        ini?\');">Hapus</button></form>';
    return $btn;
    })
    ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
    ->make(true);
  }  

  public function create(){
    $breadcrumb = (object) [
        'title' => 'Tambah Barang', 
        'list' => ['Home', 'Barang', 'Tambah']
    ];
        $page = (object) [ 
            'title' => 'Tambah barang baru'
        ];

        $kategori = BarangModel::all(); // ambil data level untuk ditampilkan di form 
        $activeMenu = 'barang'; // set menu yang sedang aktif

        return view('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $kategori, 'activeMenu' => $activeMenu]);
    
}

// Menyimpan data barang baru
public function store (Request $request){
    $request->validate([
        // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m user kolom username
        'barang_kode' => 'required|string|min:3|unique:m_barangs,barang_kode',
        'barang_nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
        'harga_beli' => 'required|integer|min:4',
        'harga_jual' => 'required|integer|min:4',
        'kategori_id' => 'required|integer' 
        ]);

        BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id

        ]);
        return redirect('/barang')->with('success', 'Data user berhasil disimpan');
        
}
// Jobsheet 7 Praktikum 3 bagian 14
// Menampilkan detail user
public function show(string $id)
{
    $barang = BarangModel::with('Barang')->find($id);

    $breadcrumb = (object) [
        'title' => 'Detail Barang',
        'list' => ['Home', 'Barang', 'Detail']
    ];

    $page = (object) [
        'title' => 'Detail Barang'
    ];

    $activeMenu = 'barang'; // set menu yang sedang aktif

    return view('barang.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'activeMenu' => $activeMenu]);
}
// Jobsheet 7 praktikum 3 bagian 18
// Menampilkan halaman form edit user
public function edit($id)
    {
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();
        $breadcrumb = (object) [
            'title' => 'Edit Barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Barang',
        ];

        $activeMenu = 'barang';

        return view('barang.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data user
    public function update (Request $request, string $id){
        $request->validate([
            'barang_kode' => 'required|string|unique:m_barangs,barang_kode,' . $id . ',barang_id',
            'barang_nama' => 'required|string|min:3|max:100',
            'harga_beli' => 'required|integer|min:4',
            'harga_jual' => 'required|integer|min:4',
            'kategori_id' => 'required|integer'
        ]);

        BarangModel::find($id)->update([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect('/barang')->with('success', 'Data barang berhasil diubah');
    }

    public function destroy (string $id){
        $check = BarangModel::find($id);
        if (!$check) {  // untuk mengecek apakah data barang dengan id yang dimaksud ada atau tidak
            return redirect('/barang')->with('error', 'Data barang tidak ditemukan');
        }
    
        try {
            BarangModel::destroy($id); // Hapus data kategori
    
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
    
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/barang')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    
        }
    }

}



// Menampilkan halaman form tambah user

   




