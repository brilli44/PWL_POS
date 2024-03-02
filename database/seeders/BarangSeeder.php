<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'barang_kode' => 'E001',
                'barang_nama' => 'Laptop Gaming',
                'harga_beli' => 8000000,
                'harga_jual' => 10000000,
            ],
            [
                'kategori_id' => 1,
                'barang_kode' => 'E002',
                'barang_nama' => 'Smartphone Flagship',
                'harga_beli' => 6000000,
                'harga_jual' => 7500000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'P001',
                'barang_nama' => 'Kemeja Putih',
                'harga_beli' => 150000,
                'harga_jual' => 250000,
            ],
            [
                'kategori_id' => 2,
                'barang_kode' => 'P002',
                'barang_nama' => 'Jacket Kulit',
                'harga_beli' => 400000,
                'harga_jual' => 600000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'M001',
                'barang_nama' => 'Ayam Kecap',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'kategori_id' => 3,
                'barang_kode' => 'M002',
                'barang_nama' => 'Nasi Goreng',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'Mn001',
                'barang_nama' => 'Es Teh Manis',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'kategori_id' => 4,
                'barang_kode' => 'Mn002',
                'barang_nama' => 'Jus Alpukat',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'At001',
                'barang_nama' => 'Pensil 2B',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
            ],
            [
                'kategori_id' => 5,
                'barang_kode' => 'At002',
                'barang_nama' => 'Buku Tulis',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
        ];

        DB::table('m_barangs')->insert($data);
    }
}
