<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Iatstuti\Database\Support\NullableFields;//namespace del trait (clase) que ayuda a colocar en null los campos vacios que se reciben del formulario, para que no cause conflictos en las validaciones de la base de datos.

class Body extends Model
{
    use NullableFields;// se especifica que se usara NullableFields

	protected $connection = 'exp';//conexion a la que esta ligada el modelo
    protected $table = 'Body_composition';//nombre de la tabla a la que esta ligada el modelo
    public $timestamps = false;//timestamps false para que no se guarden los campos created_at y updated_at

    //se especifican los campos que necesitamos se transformen en null
    protected $nullable = ['Abdominal','Triceps','Chest','Mid_axillary','Subcapsular','Suprailiac','Thigh','Neck','Shoulder','Biceps','Waist','Hips','Calf','Chest_cm','Thigh_cm'];

    //los campos que pueden ser guardados en este modelo
    protected $fillable = ['Abdominal','Triceps','Chest','Mid_axillary','Subcapsular','Suprailiac','Thigh','Neck','Shoulder','Biceps','Waist','Hips','Calf','Basic_Information_id','Chest_cm','Thigh_cm'];

    //relaciones
    //recibe de el modelo Information el id Basic_Information_id
    public function information(){
    	return $this->belongsTo('App\Information','Basic_Information_id');
    }

    //manda al modelo goal el id Body_composition_id especificando la relacion de uno a uno
    public function goal(){
    	return $this->hasOne('App\Goal','Body_composition_id');
    }
}
