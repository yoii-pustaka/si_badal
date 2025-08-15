<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_services');
    }
    public function parent()
    {
        return $this->belongsTo(Package::class, 'parent_package_id');
    }

    // Ambil semua service termasuk dari parent
    public function allServices()
    {
        $services = $this->services;
        if ($this->parent) {
            $services = $services->merge($this->parent->allServices());
        }
        return $services;
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
