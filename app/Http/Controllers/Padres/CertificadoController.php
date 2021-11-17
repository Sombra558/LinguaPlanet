<?php

namespace App\Http\Controllers\Padres;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Certificado\Certificado;
use App\Models\Curso\Curso;
use Barryvdh\DomPDF\Facade;


class CertificadoController extends Controller
{
    public function store(Request $request)
    {
        
        $verfificacertificado=Certificado::where('perfil_id', $request->perfil_id)->where('curso_id', $request->curso_id);
        if ($verfificacertificado->count()>0) {
            return "certificado existente";
        } else {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 15; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            Certificado::create([
                'codigo' => $randomString,
                'curso_id' => $request->curso_id,
                'perfil_id' => $request->perfil_id
                
            ]);
            return $randomString;
        }
        
    }
    public function dergargarcertificado($codigo, $curso)
    {
        $certificado=Certificado::where('codigo',$codigo)->first()->load(['perfil','curso']);
        if ($certificado->perfil->user_id == Auth::user()->id && $certificado->curso_id == $curso) {
            $pdf = \PDF2::loadView('Estudiantes.certificado.Descargable.InformeCertificado',['certificado' => $certificado]);
            $pdf->setPaper('letter', 'landscape');
            return $pdf->stream('certificado.pdf', array("Attachment" => false));
        } else {
            return 'sin acceso';
        }
    }
}
