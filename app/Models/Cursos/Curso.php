<?php
namespace App\Models\Cursos;
use Illuminate\Database\Eloquent\Model;
class Curso extends Model
{
    protected $fillable = [
        'titulo', 'descripcion','video','destacados','inicia','img','img_min','nombreURL',
    ];
    protected $appends = [
        'video_source',
    ];
    public function getVideoSourceAttribute()
    {
        $source = explode('=', $this->video);
        if (count($source) > 1) {
        return $source[1];
        }
        return $this->video;
    }
    
    public function modulos(){
        return $this->hasMany('App\Models\Cursos\Modulo');
    }
    public function progresos(){
        return $this->hasMany('App\Models\Relaciones\ProgresoCursoUser');
    }
}
