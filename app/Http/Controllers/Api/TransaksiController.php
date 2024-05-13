<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Penjualan::all();

        return response()->json([
            'transaksi' => $transaksi
        ],200);
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'penjualan_id' => 'required',
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 400);
        }

        try {
            
            $transaksi = Penjualan::create([
                'penjualan_id' => $request->penjualan_id,
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => $request->penjualan_tanggal,
                
            ]);

            // Return Json Response
            return response()->json([
                'success' => true,
                'transaksi' => $transaksi,
            ], 200);

        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'success' => false,
            ], 500);
        }
    }

    public function show($id)
    {
        $transaksi = Penjualan::find($id);
        if ($transaksi) {
            return response()->json($transaksi, 200);
        } else {
            return response()->json(['message' => 'transaksi tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $validator = validator($request->all(), [
            'penjualan_id' => 'required',
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
        
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 400);
        }

        try {
          
            $transaksi = Penjualan::find($id);
            if (!$transaksi) {
                return response()->json([
                    'message' => 'transaksi tidak ditemukan'
                ], 404);
            }

            $transaksi->penjualan_id = $request->penjualan_id;
            $transaksi->user_id = $request->user_id;
            $transaksi->pembeli= $request->pembeli;
            $transaksi->penjualan_kode = $request->penjualan_kode;
            $transaksi->penjualan_tanggal = $request->penjualan_tanggal;
           
            
            $transaksi->save();

            // Return Json Response
            return response()->json([
                'success' => true,
                'transaksi' => $transaksi,
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            // Detail
            $transaksi = Penjualan::find($id);
            if (!$transaksi) {
                return response()->json([
                    'message' => 'transaksi tidak ditemukan'
                ], 404);
            }

            // Delete barang
            $transaksi->delete();

            // Return Json Response
            return response()->json([
                'success' => true,
                'message' => 'Data terhapus',
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
}
