<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;

    protected $table = 'user_accounts';
    protected $primaryKey = 'nik';

    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = ['nik', 'nama', 'jabatan', 'username', 'password'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($userAccount) {
            $userAccount->user()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
