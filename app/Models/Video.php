<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'order_id',
        'pelaksana_id',
        'file_path',
        'description',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function pelaksana()
    {
        return $this->belongsTo(User::class, 'pelaksana_id');
    }



}
