<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MovimientoCategoria extends Model
{
    /**
     * Indica que la categoría de movimiento está activa.
     */
    public const ESTATUS_ACTIVO = 1;

    /**
     * Indica que la categoría de movimiento está inactiva.
     */
    public const ESTATUS_INACTIVO = 0;

    protected $table = 'movimientos_categorias';

    /**
     * Atributos asignables masivamente.
     * @var array<int, string>
     */
    protected $fillable = [
        'id_usuario',
        'nombre',
        'descripcion',
        'estatus',
    ];

    /**
     * Atributos adicionales que se incluyen en las representaciones del modelo.
     * @var array<int, string>
     */
    protected $appends = ['estatus_descripcion'];

    /**
     * Devuelve la descripción del estatus.
     */
    public function getEstatusDescripcionAttribute()
    {
        $estatus = $this->estatus ?? self::ESTATUS_ACTIVO;
        return $estatus == self::ESTATUS_ACTIVO ? 'Activo' : 'Inactivo';
    }

    /**
     * Define la relación con el modelo User.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
