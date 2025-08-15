<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_code',
        'nama_alm',
        'bin_binti',
        'kondisi',
        'package_id',
        'user_id',
        'pelaksana_id',
        'tanggal_pelaksanaan',
        'status',
        'alamat_pendaftar',
        'no_hp',
        'keterangan'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // Format kode: ORD-20250813-ABCDE
            $order->order_code = 'ORD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(5));
        });
    }

    // Relasi
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelaksana()
    {
        return $this->belongsTo(User::class, 'pelaksana_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
