<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aditional extends Model
{
	protected $connection = 'exp';//indica la conexión a la que esta vinculada el modelo, dicha conexión se configuira en el archivo que se encuentra en la ruta config/database del proyecto
    protected $table = 'Aditional_questions'; //la tabla a la que esta vinculada el modelo
    public $timestamps = false; // declaramos timestamps false para que no intente guardar los campos created_at y updated_at

    //los campos que pueden ser guardados con este modelo
    protected $fillable = ['a0','a1','a1_5','a2','a3','a4','a5','a6','a6_5','a7','a7_5','a8','a9','History_id'];

    // relaciones
    //esta indica que esta vinculada con el modelo history y recibe el id de History_id
    public function history(){
    	return $this->belongsTo('App\History', 'History_id');
    }

    //esta indica que tiene una relacion de uno con el modelo smoke y manda el id  en el campo Aditional_Questions_id a la tabla de smoke
    public function smoke(){
    	return $this->hasOne('App\Smoke', 'Aditional_Questions_id');
    }
}
