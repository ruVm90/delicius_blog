<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   use HasFactory;
   

   protected $fillable = [
    
   'category_name',
    'image' 
   ];
   public $timestamps = false;
   // una categoria puede tener muchas recetas

   public function recipes(){
    
    return $this->hasMany(Recipe::class);
   }
}
