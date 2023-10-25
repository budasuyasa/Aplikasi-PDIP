<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kecamatan()
    {
       return $this->hasMany(Kecamatan::class);
    }
    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
    public function banjar()
    {
        return $this->hasMany(Banjar::class);
    }

    public function scopeFilter($query, array $filters)
    {
      $query->when($filters['search']?? false, function($query, $search){
           return  $query->where('nama','like','%' . $search . '%');
       });
    }
}
