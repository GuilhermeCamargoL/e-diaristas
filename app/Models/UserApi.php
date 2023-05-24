<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApi extends Model
{
    use HasFactory;

    protected $table = 'users_api';

    /**
     * Define a relação com as cidades atendidas pelo(a) diarista
     *
     * @return void
     */
    public function cidadesAtendidas()
    {
        return $this->belongsToMany(Cidade::class, 'cidade_diarista');
    }

    public function scopeDiarista(Builder $query)
    {
        return $query->where('tipo_usuario', 2);
    }
}
