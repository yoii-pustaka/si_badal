<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelaksanaProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'passport_number', 'passport_expiry',
        'address', 'phone', 'photo_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
