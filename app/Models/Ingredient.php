<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;

  

   protected $fillable = [
        'name',
        'recipe_id',
        'quantity'
   ];
   public $timestamps = false;

   // Muchos ingredientes pueden tener una receta

   public function recipe(): BelongsTo
   {
    return $this->belongsTo(Recipe::class);
   }
}
