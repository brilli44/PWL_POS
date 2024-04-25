<?php

//Praktikum 6 – Implementasi Eloquent ORM
namespace App\Models;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class UserModel extends Authenticatable implements JWTSubject {

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return[];
    }
    protected $table = 'm_users';
    protected $primaryKey = 'user_id';
    protected $fillable = ['level_id','username','nama','password'];
}

// class UserModel extends User
// {
//     use HasFactory;

//     protected $table ='m_users'; // mendefiniskan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'user_id'; //mendefinisikan primary key dari tabel yang digunakan
   
//     protected $fillable = ['level_id','username','nama','password'];
    
//     public function level(): BelongsTo{
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }
//     /**
//      * The Attributes that are mass assignable
//      * 
//      * @var array
//      */
//     // protected $fillable = ['level_id','username','nama','password'];
//    
// }

