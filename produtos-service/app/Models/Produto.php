<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'valor', 'estoque', 'codigo', 'imagem'];
    protected $hidden = ['imagem'];

    protected $appends = ['imagem_link'];
    public function getImagemLinkAttribute()
    {
        return asset($this->imagem);
    }
}
