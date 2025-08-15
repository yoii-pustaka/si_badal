<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_services');
    }
}
