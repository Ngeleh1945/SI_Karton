<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['username', 'password'];

    public static function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string',
        ];
    }

    // Relasi ke tabel lain, misalkan tabel 'posts'
    public function posts()
    {
        return $this->hasMany(Post::class, 'username', 'username');
    }

    public function userAccount()
    {
        return $this->hasOne(UserAccount::class);
    }
}
