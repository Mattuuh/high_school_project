<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistroAcademico extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'id_alumno',
        'id_docxmat',
        'nota',
        'fecha',
        'id_instancia',

    ];
    public function instancia(){
        return $this->belongsTo( Instancia::class,'id_instancia'); 
    }     
    public function alumno(){
        return $this->belongsTo( Alumno::class,'id_alumno'); 
    }  
    public function docentes_materia(){
        return $this->belongsTo( Docentes_materia::class,'id_docxmat'); 
    }  
            
}
