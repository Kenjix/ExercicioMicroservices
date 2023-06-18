<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho_compra extends Model
{
    use HasFactory;

    protected $table = 'carrinho_compras';
    protected $fillable = ['carrinho_id', 'produto_id', 'quantidade'];
}
