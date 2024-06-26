<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 't_penjualans';       // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'penjualan_id';  // Mendefinisikan primary key dari tabel yang digunakan

    //@var array
    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    // public function DetailPenjualan(): BelongsTo
    public function DetailPenjualan(): HasMany
    {
        // return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
        return $this->hasMany(t_penjualan_detail::class, 'penjualan_id', 'penjualan_id');
    }
}