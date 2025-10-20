<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'Categorias';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre',
        'descripcion',
        'slug'
    ];

    // Relación: una categoría tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria', 'id_categoria');
    }


    public function getImagenCategoriaAttribute()
    {
        // Convertir a minúsculas para evitar errores por mayúsculas
        $nombre = strtolower($this->nombre);

        // Mapeo de imágenes por nombre
        $imagenes = [
            'deportivas' => 'deportivas.png',
            'scooters' => 'scooters.png',
            'cruiser' => 'cruiser.png',
            'touring' => 'touring.png',
            'adventure' => 'adventure.png',
            'naked' => 'naked.png',
            'eléctricas' => 'electricas.png',
            'accesorios' => 'accesorios.png',
        ];

        foreach ($imagenes as $clave => $img) {
            if (str_contains($nombre, $clave)) {
                return asset("assets/img/categorias/$img");
            }
        }

        return asset('assets/img/categorias/default.png');
    }
}
