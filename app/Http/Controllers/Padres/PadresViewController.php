<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Models\PerfilEstudiante\PerfilEstudianteUser;
use Carbon\Carbon;

class PadresViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        }]);
        //$baseUrl="http://165.22.27.174/rompecabeza/1";
        //$client = new Client(['base_uri' => 'http://165.22.27.17/']);  
        //$response = $client->request('GET', 'http://165.22.27.174/rompecabeza/1'); 
        //$body = $response->getBody();
        //$content =$body->getContents();
        //$arr = json_decode($content);
      
        return view('Padres.Home.home',compact('user'));
    }
    
    public function detalleIndividualpadrecursos($id)
    {
        $user = Auth::user();
        $now = Carbon::now();
        
        $perfil=PerfilEstudianteUser::find($id)->load(['avatar','misactividades','planes'=>function($q) use($now)
        {
            return $q->with(['plan'=>function($j) use($now)
            {
                return $j->with(['membresia'=>function($z) use($now)
                {
                    return $z->with(['cursos'=>function($m) use($now)
                    {
                        return $m->with(['modulos'=>function($c) use($now)
                        {
                            return $c->where('inicia', '<=', $now)
                                ->where('finaliza', '>', $now)->with(['clases'=>function($a) use($now)
                            {
                                return $a->where('inicia', '<=', $now)
                                ->where('finaliza', '>', $now)->with('actividades');
                            }]);
                        },'idioma']);
                    },'idiomas',]);
                }]);
            }]);
        }]);
        return view('Padres.Detalles.Cursos.individual',compact('perfil','user'));
    }

    public function detallespadrecursos()
    {
        $now = Carbon::now();
        
        $user=Auth::user()->load(['perfiles'=>function($q) use($now)
        {
            return $q->with(['avatar','misactividades','planes'=>function($q) use($now)
            {
                return $q->with(['plan'=>function($j) use($now)
                {
                    return $j->with(['membresia'=>function($z) use($now)
                    {
                        return $z->with(['cursos'=>function($m) use($now)
                        {
                            return $m->with(['progresos','idioma','modulos'=>function($c) use($now)
                            {
                                return $c->where('inicia', '<=', $now)
                                    ->where('finaliza', '>', $now)->with(['clases'=>function($a) use($now)
                                {
                                    return $a->where('inicia', '<=', $now)
                                    ->where('finaliza', '>', $now)->with('actividades');
                                }]);
                            }]);
                        },'idiomas']);
                    }]);
                }]);
            }]);
        },'planes'=>function($q)
        {
            return $q->with(['membresia'=>function($k)
            {
                return $k->with('idiomas','cursos');
            }]);
        }]);
     
        return view('Padres.Detalles.Cursos.index',compact('user'));
    }

    public function detallesProgreso()
    {
     
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with(['avatar','misactividades','planes'=>function($q)
            {
                return $q->with(['plan'=>function($j)
                {
                    return $j->with(['membresia'=>function($z)
                    {
                        return $z->with(['cursos'=>function($m)
                        {
                            return $m->with(['modulos'=>function($c)
                            {
                                return $c->with(['clases'=>function($a)
                                {
                                    return $a->with('actividades');
                                }]);
                            },'progresos']);
                        },'idiomas']);
                    }]);
                }]);
            }]);
        },'planes'=>function($q)
        {
            return $q->with(['membresia'=>function($k)
            {
                return $k->with(['idiomas','cursos']);
            }]);
        }]);
        return view('Padres.Detalles.Cursos.progreso',compact('user'));
    }

    public function detallespadremembresias()
    {
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with('avatar');
        },'planes'=>function($q)
        {
            return $q->with(['membresia'=>function($k)
            {
                return $k->with('idiomas','cursos');
            }]);
        }]);
        return view('Padres.Detalles.Membresias.index',compact('user'));
    }

    public function editarMembresia($plan_id)
    {   
        $plan = Auth::user()
                    ->planes()
                    ->with(['membresia'=>function($k) {
                        return $k->with('idiomas', 'planes');
                    }])
                    ->get()
                    ->find($plan_id);
        
        return view('Padres.Detalles.Membresias.editar', compact('plan'));
    }

    public function perfil()
    {
        $user=Auth::user();
        return view('Padres.Perfil.perfil',compact('user'));
    }

    public function certificados()
    {
        $user=Auth::user()->load(['perfiles'=>function($q)
        {
            return $q->with(['avatar','certificados','planes'=>function($q)
            {
                return $q->with(['plan'=>function($k)
                {
                    return $k->with(['membresia'=>function($j)
                    {
                        return $j->with(['cursos'=>function($j)
                        {
                            return $j->where('certificado',1);
                        }]);
                    }]);
                }]);
            }]);
        }]);
        
        return view('Padres.Detalles.Cursos.certificados',compact('user'));
    }
    public function recuperar()
    {
        $user=Auth::user();
        $data = [
            'frase' => $user->frase,
        ];
     
        Mail::send('mails.Suscripcion', $data, function($message) use ($data,$user) {
            $message->to($user->email,$data['frase'])->subject('Frase de Acceso');
        });
        return $data;
	}
    
}
