<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'alumnos';

    protected $fillable = ['nombre','apellido','fechaDeNacimiento','direccion','genero','telefono','correo','clave'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notas()
    {
        return $this->hasMany('App\Models\Nota', 'alumno_id', 'id');
    }
    
}
