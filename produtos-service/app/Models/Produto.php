<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $casts = [
        'imagem' => 'binary',
    ];
    protected $table = 'produtos';
    protected $fillable = ['nome', 'codigo', 'imagem', 'descricao', 'valor', 'estoque'];
}
