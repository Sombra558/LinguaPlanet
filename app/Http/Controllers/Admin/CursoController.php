<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membresia\Membresia;
use App\Models\Cursos\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $membresias=Membresia::get()->load(['planes']);
       return view('Administrador.Cursos.create', compact('membresias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $link = explode('watch?v=',$request['video']);
		if(count($link) > 1){
			$id = $link[1];
			if($id){
				$url = 'https://www.youtube.com/embed/'.$id;  
			}
        }else{
                $link = explode('vimeo.com/',$request['video']);
                if(count($link) > 1){
                    $id = $link[1];
                    if($id){
                        $url = 'https://player.vimeo.com/video/'.$id;
                    }
                }else{
                    $url = 'https://www.youtube.com/embed/'.$request['video'];
                }
            }
        $curso = Curso::create([
            'titulo' => $request['titulo'],
            'descripcion' => $request['descripcion'],
            'nombreURL' => $request['nombreURL'],
            'destacados' => 1,
            'video' => $url,
            'linkoriginal' => $request['video'],
        ]);
        return $curso;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membresias=Membresia::get();
        $curso=Curso::find($id)->load(['modulos' => function($q){
            return $q->with(['clases'=>function($g){
                return $g->with(['actividades']);
            }]);
        },'membresias']);
        return view('Administrador.Cursos.show', compact('curso','membresias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $membresias=Membresia::get()->load(['planes']);
        return view('Administrador.Cursos.edit', compact('membresias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::destroy($id);
    }
}