<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Kecamatan extends Model
{
    use HasFactory;

     protected $guarded = ['id'];
   public function kabupaten()
   {
        return $this->belongsTo(Kabupaten::class);
   }
   public function desa()
   {
       return $this->hasMany(Desa::class);
   }
   public function banjar()
   {
       return $this->hasMany(Banjar::class);
   }
   public function scopecarilistkec($query, array $filters)
   {
     $query->when($filters['search']?? false, function($query, $search){
          return  $query->where('nama','like','%' . $search . '%');
      });
   }
   public function scopecarikec($query, array $filters)
   {

     $query->when($filters['search']?? false, function($query, $search){
          return  $query->where('nama','like','%' . $search . '%');
      });
     // $query->when($filters['kabupaten_id']?? false, function($query, $kabupaten_id){
     //      return $query->whereHas('kabupaten_id', function($query) use ($kabupaten_id) {
     //           $query->where('kabupaten_id', $kabupaten_id);

     //      });
     //  });
   }
}
