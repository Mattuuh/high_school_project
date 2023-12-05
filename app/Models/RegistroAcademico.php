<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroAcademico extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'legajo_alum',
        'asignatura',
        'nota',
        'fecha',
        'id_instancia',

    ];
public function instancia(){
    return $this->belongsTo( Instancia::class,'id_instancia'); 
}     
public function alumno(){
    return $this->belongsTo( Alumno::class,'legajo_alum'); 
}  
public function asignaturas(){
    return $this->belongsTo( Horario::class,'asignatura'); 
}  
            
}
