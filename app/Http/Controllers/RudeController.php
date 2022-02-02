<?php

namespace App\Http\Controllers;

use App\Models\Rude;
use App\Models\Alumno;
use App\Models\Persona;
use App\Models\UnidaEducativa;
use App\Models\TipoDiscapacidad;
use App\Models\GradoDiscapacidad;
use App\Models\DireccionActual;
use App\Models\DatosEstudiante;
use App\Models\CertificadoNacimiento;
use App\Models\CarnetIdentidad;
use App\Models\NacionPueblo;
use App\Models\DondeFue;
use App\Models\Socioeconomico;
use App\Models\IdiomaCultura;
use App\Models\SaludEstudiante;
use App\Models\SaludDonde;
use App\Models\CantidadDeVeces;
use App\Models\Vivienda;
use App\Models\AccedeEn;
use App\Models\Frecuencia;
use App\Models\MesesLaboral;
use App\Models\TipoTrabajo;
use App\Models\TurnoTrabajo;
use App\Models\FrecuenciaTrabajo;
use App\Models\RecibePago;
use App\Models\IrColegio;
use App\Models\TiempoDemora;
use App\Models\RazonesAbandono;
use App\Models\ServicioBasico;
use App\Models\AccesoInternet;
use App\Models\AccesoAccede;
use App\Models\ActividadLaboral;
use App\Models\MedioTransporte;
use App\Models\AbandonoEscolar;
use App\Models\AbandonoRazon;
use App\Models\ViveCon;
use App\Models\DatosTutor;
use App\Models\Tutor;

use Illuminate\Http\Request;

class RudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.alumno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rude  $rude
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $ue = UnidaEducativa::select()->first();
        $alumno = Alumno::find($id);
        $persona = Persona::find($alumno->id_perona);
        $datosEstudiantes = DatosEstudiante::where('id_alummno', $alumno->id)->first();
        $certificadoNac = CertificadoNacimiento::find($datosEstudiantes->id_certificado_nacimiento);
        $carnetIdentidad = CarnetIdentidad::find($persona->id_ci);

        // sec2
        $direccionActual = DireccionActual::find($persona->id_direccion);
        $rude = Rude::where('id_ii_datos_estudiante', $datosEstudiantes->id)->first();
        $socioeconomico = Socioeconomico::find($rude->id_iv_socioeconomico);
        $idiomacultura = IdiomaCultura::find($socioeconomico->id_idioma_cultura);
        $saludEstudiante = SaludEstudiante::find($socioeconomico->id_salud_estudiante);
        $saludDonde = SaludDonde::where('id_salud_estudiante', $saludEstudiante->id)->first();

        $servicioBasico = ServicioBasico::find($socioeconomico->id_servicio_basico);
        $accesInternet = AccesoInternet::find($socioeconomico->id_acceso_internet);
        $accesoAccede = AccesoAccede::find($socioeconomico->id_acceso_internet);
        $actividadLaboral = ActividadLaboral::find($socioeconomico->id_actividad_laboral);
        $medioTransporte = MedioTransporte::find($socioeconomico->id_medio_transporte);
        $abandonoEscolar = AbandonoEscolar::find($socioeconomico->id_abandono);

        $abandonoRazon = AbandonoRazon::where('id_abandono', $socioeconomico->id_abandono)->first();
        $tutor = Tutor::find($alumno->id_tutor);
        $datosTutor = DatosTutor::where('id_tutor', $tutor->id)->first();
        $padre = Persona::find($tutor->id_persona);
        $padreCi = CarnetIdentidad::find($padre->id_ci);
        // $accesoInternet
        //

        // DATOS PREVI
        $gradosDiscapacidad = GradoDiscapacidad::All();
        $tiposDiscapacidad = TipoDiscapacidad::All();
        $nacionesPueblos = NacionPueblo::All();
        $cantidadDeVeces = CantidadDeVeces::All();
        $dondeFue = DondeFue::All();
        $viviendas = Vivienda::All();
        $accesoInternet = AccedeEn::All();
        $frecuencias = Frecuencia::All();
        $mesesLaborales = MesesLaboral::All();
        $tipoTrabajos = TipoTrabajo::All();
        $turnoTrabajos = TurnoTrabajo::All();
        $frecuenciaTrabajos = FrecuenciaTrabajo::All();
        $recibePagos = RecibePago::All();
        $irColegio = IrColegio::All();
        $tiempoDemora = TiempoDemora::All();
        $razonesAbandono = RazonesAbandono::All();
        $viveCons = ViveCon::All();
        
        return view('administrador.rude.rude')
                ->with('ue', $ue)
                ->with('gradosDiscapacidad', $gradosDiscapacidad)
                ->with('tiposDiscapacidad', $tiposDiscapacidad)
                ->with('nacionesPueblos', $nacionesPueblos)
                ->with('dondeFue', $dondeFue)
                ->with('viviendas', $viviendas)
                ->with('accesoInternet', $accesoInternet)
                ->with('cantidadDeVeces', $cantidadDeVeces)
                ->with('frecuencias', $frecuencias)
                ->with('mesesLaborales', $mesesLaborales)
                ->with('tipoTrabajos', $tipoTrabajos)
                ->with('turnoTrabajos', $turnoTrabajos)
                ->with('frecuenciaTrabajos', $frecuenciaTrabajos)
                ->with('recibePagos', $recibePagos)
                ->with('irColegio', $irColegio)
                ->with('tiempoDemora', $tiempoDemora)
                ->with('razonesAbandono', $razonesAbandono)
                ->with('medioTransporte', $medioTransporte)
                ->with('abandonoEscolar', $abandonoEscolar)
                ->with('abandonoRazon', $abandonoRazon)

                ->with('datosTutor', $datosTutor)
                ->with('padre', $padre)
                ->with('padreCi', $padreCi)

                // 
                ->with('persona', $persona)
                ->with('certificadoNac', $certificadoNac)
                ->with('datosEstudiantes', $datosEstudiantes)
                ->with('carnetIdentidad', $carnetIdentidad)
                ->with('saludEstudiante', $saludEstudiante)
                ->with('saludDonde', $saludDonde)
                ->with('servicioBasico', $servicioBasico)
                // 
                ->with('direccionActual', $direccionActual)
                ->with('idiomacultura', $idiomacultura)
                ->with('accesoAccede', $accesoAccede)
                ->with('actividadLaboral', $actividadLaboral)
                ->with('accesInternet', $accesInternet)
                ->with('viveCons', $viveCons)
                ->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rude  $rude
     * @return \Illuminate\Http\Response
     */
    public function edit(Rude $rude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rude  $rude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rude $rude)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rude  $rude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rude $rude)
    {
        //
    }
}
