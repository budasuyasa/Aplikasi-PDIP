<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    
    protected $guarded = ['id'];
    public function kabupaten()
    {
       return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function banjar()
    {
        return $this->hasMany(Banjar::class);
    }
    public function tokoh()
    {
        return $this->hasMany(Tokoh::class);
    }
}
