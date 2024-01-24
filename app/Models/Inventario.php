<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $guarded= ['id'];

    /*----------------Relaciones -------------------*/

    public function user()
    {
        return $this->belongsTo(Product::class);
    }
}