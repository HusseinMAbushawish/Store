<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'id',
        'title',
        'is_active',
        'created_at',
        'updated_at'
    ];
    use HasFactory;

    public function products()
    {

        return $this->hasMany(Product::class, foreignKey: 'categories_id', localKey: 'id');
    }
}
