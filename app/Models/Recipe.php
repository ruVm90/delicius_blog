<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;
    
    protected $fillable= [
        'title',
        'image',
        'description',
        'difficulty',
        'user_id',
        'category_id',
        'created_at',
        'updated_at'

    ];

    // Muchas recetas puede tener un usuario

    public function user()
    {
       return $this->belongsTo(User::class);


    }

    // Muchas recetas pueden tener una categoria

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Una receta puede tener muchos ingredientes

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
