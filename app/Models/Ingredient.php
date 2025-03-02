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
        'quantity',
        'recipe_id'
   ];

   // Muchos ingredientes pueden tener una receta

   public function recipe(): BelongsTo
   {
    return $this->belongsTo(Recipe::class, 'recipe_id','id');
   }
}
