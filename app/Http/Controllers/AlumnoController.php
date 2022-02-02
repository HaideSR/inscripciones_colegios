<?php

namespace App\Http\Controllers;

use App\Models\AccedeEn;
use App\Models\Alumno;
use App\Models\CantidadDeVeces;
use App\Models\CarnetIdentidad;
use App\Models\DireccionActual;
use App\Models\DondeFue;
use App\Models\Frecuencia;
use App\Models\FrecuenciaTrabajo;
use App\Models\GradoDiscapacidad;
use App\Models\IrColegio;
use App\Models\MesesLaboral;
use App\Models\NacionPueblo;
use App\Models\Persona;
use App\Models\Profesor;
use App\Models\RazonesAbandono;
use App\Models\RecibePago;
use App\Models\TiempoDemora;
use App\Models\TipoDiscapacidad;
use App\Models\TipoTrabajo;
use App\Models\TurnoTrabajo;
use App\Models\Tutor;
use App\Models\UnidaEducativa;
use App\Models\Vivienda;
use App\Models\DatosEstudiante;
use App\Models\CertificadoNacimiento;
use App\Models\Rude;
use App\Models\Socioeconomico;
use App\Models\IdiomaCultura;
use App\Models\SaludEstudiante;
use App\Models\SaludDonde;
use App\Models\ServicioBasico;
use App\Models\AccesoAccede;
use App\Models\AccesoInternet;
use App\Models\MedioTransporte;
use App\Models\AbandonoRazon;
use App\Models\AbandonoEscolar;
use App\Models\DatosTutor;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos =  Alumno::select('alumno.rude', 'alumno.id',
                'C.ci', 'C.complemento', 'D.nro_vivienda','D.avenida_calle',
                'PR.nombres as tutorNombres', 'PR.apellido_paterno as tutorPaterno', 'PR.apellido_materno as tutorMaterno',
                'P.nombres', 'P.apellido_paterno', 'P.apellido_materno', 'P.celular', 'P.sexo', 'P.fecha_nacimiento')
                ->join('persona AS P', 'alumno.id_perona' , '=', 'P.id')
                ->join('carnet_identidad AS C', 'P.id_ci' , '=', 'C.id')
                ->join('direccion_actual AS D', 'P.id_direccion' , '=', 'D.id')
                ->join('tutor AS T', 'alumno.id_tutor' , '=', 'T.id')
                ->join('persona AS PR', 'T.id_persona' , '=', 'PR.id')
                ->where('alumno.activo', true)
                ->orderBy('alumno.id')
                ->get();
        return view('administrador.alumno.index')->with('alumnos', $alumnos);
    }
    public function buscar(Request $request){
        $cis = CarnetIdentidad::select('P.nombres', 'P.apellido_paterno', 'P.apellido_materno', 'carnet_identidad.ci', 'A.id')
            ->join('persona as P', 'P.id_ci', '=', 'carnet_identidad.id')
            ->join('alumno as A', 'A.id_perona', '=', 'P.id');
        $cis->where('ci', 'LIKE', "%{$request->ci}%");
        $cis->where('A.activo', '=', true);
        $data = $cis->limit(10)->get();
        return $data->toJson();
    }
     // consulta de union de tablas de persona y de ahi obtener los datos o la lista de alumnos y profesores
     //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ue = UnidaEducativa::select()->first();
        $codigorude = Alumno::get()->last();
        //
        $gradosDiscapacidad = GradoDiscapacidad::All();
        $tiposDiscapacidad = TipoDiscapacidad::All();
        $nacionesPueblos = NacionPueblo::All();
        $dondeFue = DondeFue::All();
        $cantidadDeVeces = CantidadDeVeces::All();
        $viviendas = Vivienda::All();
        $accesoInternet = AccedeEn::All();
        $frecuencias = Frecuencia::All();
        $mesesLaborales = MesesLaboral::All();
        // meses laboral
        $tipoTrabajos = TipoTrabajo::All();
        $turnoTrabajos = TurnoTrabajo::All();
        // $turnoTrabajos = Fecu::All();
        $frecuenciaTrabajos = FrecuenciaTrabajo::All();
        $recibePagos = RecibePago::All();
        $irColegio = IrColegio::All();
        $tiempoDemora = TiempoDemora::All();
        $razonesAbandono = RazonesAbandono::All();

        return view('administrador.alumno.create')
            ->with('codigorude', $codigorude->rude+1)
            ->with('gradosDiscapacidad', $gradosDiscapacidad)
            ->with('tiposDiscapacidad', $tiposDiscapacidad)
            ->with('nacionesPueblos', $nacionesPueblos)
            ->with('dondeFue', $dondeFue)
            ->with('cantidadDeVeces', $cantidadDeVeces)
            ->with('viviendas', $viviendas)
            ->with('accesoInternet', $accesoInternet)
            ->with('frecuencias', $frecuencias)
            ->with('mesesLaborales', $mesesLaborales)
            ->with('tipoTrabajos', $tipoTrabajos)
            ->with('turnoTrabajos', $turnoTrabajos)
            ->with('frecuenciaTrabajos', $frecuenciaTrabajos)
            ->with('recibePagos', $recibePagos)
            ->with('irColegio', $irColegio)
            ->with('tiempoDemora', $tiempoDemora)
            ->with('razonesAbandono', $razonesAbandono)
            ->with('ue', $ue);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //CI
        $ultimoCI = CarnetIdentidad::orderBy('id', 'desc')->first();
        $ci = new CarnetIdentidad();
        $ci->timestamps = false;
        $ci->id = $ultimoCI->id + 1;
        $ci->ci = $request->get('ci');
        $ci->complemento = $request->get('expedido');
        $ci->expedido = $request->get('complemento');
        $ci->save();
        $idCarnet = $ci->id;

        //
        $direccion = new DireccionActual();
        $direccion->timestamps = false;
        $direccion->departamento = '';
        $direccion->provincia = '';
        $direccion->seccion_municipio = '';
        $direccion->zona_villa = '';
        $direccion->localidad_comunidad = '';
        $direccion->avenida_calle = '';
        $direccion->nro_vivienda = '';
        $direccion->celular_contacto = '';
        $direccion->save();
        $idDireccion = $direccion->id;

        $persona = new Persona();
        $persona->timestamps = false;
        $persona->nombres = $request->get('nombres');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->sexo = $request->get('sexo');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->celular = 0;
        $persona->id_ci = $idCarnet;
        $persona->id_direccion = $idDireccion;
        $persona->save();
        $idPersona = $persona->id;

        $alumno =  new Alumno();
        $alumno->timestamps = false;
        $alumno->activo = true;
        $alumno->id_tutor = $this->setDatosTutor();
        $alumno->id_perona = $idPersona;
        $alumno->rude = $request->get('codigorude');
        $alumno->save();

        $this->setDatosEstudiante($alumno->id, $idDireccion, $alumno->id_tutor);
        return redirect('/administrador/alumno');
    }
    private function setDatosTutor(){
        $ultimoCI = CarnetIdentidad::orderBy('id', 'desc')->first();
        $ci = new CarnetIdentidad();
        $ci->timestamps = false;
        $ci->id = $ultimoCI->id + 1;
        $ci->ci = 0;
        $ci->complemento = null;
        $ci->expedido = '';
        $ci->save();
        $idCarnet = $ci->id;

        //
        $direccion = new DireccionActual();
        $direccion->timestamps = false;
        $direccion->departamento = '';
        $direccion->provincia = '';
        $direccion->seccion_municipio = '';
        $direccion->zona_villa = '';
        $direccion->localidad_comunidad = '';
        $direccion->avenida_calle = '';
        $direccion->nro_vivienda = '';
        $direccion->celular_contacto = '';
        $direccion->save();
        $idDireccion = $direccion->id;

        $persona = new Persona();
        $persona->timestamps = false;
        $persona->nombres = '';
        $persona->apellido_materno = '';
        $persona->apellido_paterno = '';
        $persona->sexo = 'M';
        $persona->fecha_nacimiento = '1900-01-01';
        $persona->celular = 0;
        $persona->id_direccion = $idDireccion;
        $persona->save();
        
        $tutor = new Tutor();
        $tutor->id_persona = $persona->id;
        $tutor->correo = '';
        $tutor->activo = true;
        $tutor->save();
        return $tutor->id;
    }

    private function setDatosEstudiante($idAlumno, $idDireccion, $idTutor){
        $ultimoCr = CertificadoNacimiento::orderBy('id', 'desc')->first();
        $certificadoNac = new CertificadoNacimiento();
        $certificadoNac->id = $ultimoCr->id+1;
        $certificadoNac->nro_oficialia = 0;
        $certificadoNac->nro_libro = 0;
        $certificadoNac->nro_partida = 0;
        $certificadoNac->nro_folio = 0;
        $certificadoNac->departamento = '';
        $certificadoNac->provincia = '';
        $certificadoNac->localidad = '';
        $certificadoNac->save();

        $ultimoDatEstud = DatosEstudiante::orderBy('id', 'desc')->first();
        $datosEstudiantes = new DatosEstudiante();
        $datosEstudiantes->id = $ultimoDatEstud->id+1;
        $datosEstudiantes->id_alummno = $idAlumno;
        $datosEstudiantes->id_certificado_nacimiento = $certificadoNac->id;
        $datosEstudiantes->discapacidad = false;
        $datosEstudiantes->id_tipo_discapacidad = 10;
        $datosEstudiantes->id_grado_discapacidad = 7;
        $datosEstudiantes->registro_discapacidad = 0;
        $datosEstudiantes->pais_nacimiento = 'Bolivia';
        $datosEstudiantes->save();
        $this->setRudeAlumno($datosEstudiantes->id, $idDireccion, $idTutor);
    }
    //
    private function setRudeAlumno($idDatosEstudiantes, $idDireccion, $idTutor){
        $ultimoDatosTutor = DatosTutor::orderBy('id', 'desc')->first();
        $datosTutor =  new DatosTutor();
        $datosTutor->id = $ultimoDatosTutor->id + 1;
        $datosTutor->id_vive_con = 1;
        $datosTutor->id_tutor = $idTutor;
        $datosTutor->save();
        // 
        $ultimoRude = DatosEstudiante::orderBy('id', 'desc')->first();
        $rude = new Rude();
        $rude->id = $ultimoRude->id+1;
        $rude->id_ii_datos_estudiante = $idDatosEstudiantes;
        $rude->id_i_datosue = 1;
        $rude->id_iii_direccion_actual = $idDireccion;
        $rude->id_iv_socioeconomico = $this->setSocioconomicoAlumno();
        $rude->id_v_datos_tutores = $datosTutor->id;
        $rude->save();
    }
    private function setSocioconomicoAlumno(){
        $idiomaUltima = IdiomaCultura::orderBy('id', 'desc')->first();
        $idiomacultura = new IdiomaCultura();
        $idiomacultura->id = $idiomaUltima->id + 1;
        $idiomacultura->idioma_ninies = 'Español';
        $idiomacultura->id_nacion_pueblo = 1;
        $idiomacultura->idioma_frecuente1 = '';
        $idiomacultura->idioma_frecuente2 = '';
        $idiomacultura->idioma_frecuente3 = '';
        $idiomacultura->save();
        // 
        $saludUltimo = SaludEstudiante::orderBy('id', 'desc')->first();
        $saludEstudiante = new SaludEstudiante();
        $saludEstudiante->id = $saludUltimo->id + 1;
        $saludEstudiante->id_cantidad_veces = 1;
        $saludEstudiante->centro_salud = true;
        $saludEstudiante->seguro_salud = false;
        $saludEstudiante->save();
        //
        $ultimoServicioBasico = ServicioBasico::orderBy('id', 'desc')->first();
        $servicioBasico = new ServicioBasico();
        $servicioBasico->id = $ultimoServicioBasico->id + 1;
        $servicioBasico->agua_canieria = true;
        $servicioBasico->banio_vivienda = true;
        $servicioBasico->alcantarillado = true;
        $servicioBasico->energia_electrica = true;
        $servicioBasico->recojo_basura = true;
        $servicioBasico->id_vivienda = 1;
        $servicioBasico->save();
        
        $ultimoSuludDonde = SaludDonde::orderBy('id', 'desc')->first();
        $saludDonde = new SaludDonde();
        $saludDonde->id = $ultimoSuludDonde->id + 1;
        $saludDonde->id_salud_estudiante = $saludEstudiante->id;
        $saludDonde->id_donde_fue = 2;
        $saludDonde->save();

        //
        $ultimoSocio = Socioeconomico::orderBy('id', 'desc')->first();
        $socioeconomico = new Socioeconomico();
        $socioeconomico->id = $ultimoSocio->id + 1;
        $socioeconomico->id_idioma_cultura = $idiomacultura->id;
        $socioeconomico->id_salud_estudiante = $saludEstudiante->id;
        $socioeconomico->id_servicio_basico = $servicioBasico->id;
        $socioeconomico->id_acceso_internet = 50;
        $socioeconomico->id_actividad_laboral = 50;
        $socioeconomico->id_medio_transporte = 50;
        $socioeconomico->id_abandono = 5;

        $socioeconomico->save();
        return $socioeconomico->id;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $alumno = Alumno::find($id);
        $persona = Persona::find($alumno->id_perona);
            // ->join('direccion_actual', 'persona.id', '=', 'direccion_actual.id')
            // ->first();
        //
        // echo $persona;
        $ci = CarnetIdentidad::find($persona->id_ci);
        $tutor = Tutor::select()
            ->leftJoin('persona AS P', 'tutor.id_persona' , '=', 'P.id')
            ->where('tutor.id',$alumno->id_tutor)
            ->first();
            return view('administrador.alumno.alumno')
                ->with('alumno', $alumno)
                ->with('persona', $persona)
                ->with('ci', $ci)
                ->with('tutor',$tutor);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ){
        $idPersona = $id;
        $idRude = $request->get('id_rude');

        $this->_editarNombreAlumno($idPersona, $request);
        $this->_editarDatosNaciAlumno($idPersona, $request);
        $this->_editarDireccionAlumno($idPersona, $request);
        $this->_editarIdiomasAlumno($idPersona, $request);
        $this->_editarSaludAlumno($idPersona, $request);
        $this->_editarServicioBasicoAlumno($idPersona, $request);
        $this->_editarDatosTutorAlumno($idPersona, $request);
        // $this->_editarTutorAlumno($idPersona, $request);

        return redirect('/administrador/rude/'.$idRude);
    }
    
    private function _editarDireccionAlumno($id, $request){
        $persona = Persona::find($id);
        $direccionActual = DireccionActual::find($persona->id_direccion);
        $direccionActual->departamento = $request->get('d_departamento');
        $direccionActual->provincia = $request->get('d_provincia');
        $direccionActual->seccion_municipio = $request->get('d_seccion_municipio');
        $direccionActual->localidad_comunidad = $request->get('d_localidad_comunidad');
        $direccionActual->zona_villa = $request->get('d_zona_villa');
        $direccionActual->avenida_calle = $request->get('d_avenida_calle');
        $direccionActual->nro_vivienda = $request->get('d_nro_vivienda');
        $direccionActual->telefono_fijo = $request->get('d_telefono_fijo');
        // $direccionActual->celular = $request->get('d_celular');
        $direccionActual->update();
    }
    private function _editarDatosNaciAlumno($id, $request){
        $persona = Persona::find($id);
        $alumno = Alumno::where('id_perona', $persona->id)->first();
        $datosEstudiantes = DatosEstudiante::where('id_alummno', $alumno->id)->first();
        $datosEstudiantes = DatosEstudiante::find($datosEstudiantes->id);
        
        $datosEstudiantes->pais_nacimiento = $request->get('i_pais_nacimiento');
        $datosEstudiantes->discapacidad = $request->get('i_discapacidad');
        $datosEstudiantes->registro_discapacidad = $request->get('registro_discapacidad');
        $datosEstudiantes->id_tipo_discapacidad = $request->get('tipo_discapacidad');
        $datosEstudiantes->id_grado_discapacidad = $request->get('id_grado_discapacidad');
        $datosEstudiantes->update();
        //
        $certificadoNac = CertificadoNacimiento::find($datosEstudiantes->id_certificado_nacimiento);
        $certificadoNac->nro_oficialia = $request->get('nro_oficialia');
        $certificadoNac->nro_libro = $request->get('nro_libro');
        $certificadoNac->nro_partida = $request->get('nro_partida');
        $certificadoNac->nro_folio = $request->get('nro_folio');
        $certificadoNac->departamento = $request->get('fn_departamento');
        $certificadoNac->provincia = $request->get('fn_provincia');
        $certificadoNac->localidad = $request->get('fn_localidad');
        $certificadoNac->update();
    }
    private function _editarNombreAlumno($id, $request){
        $persona = Persona::find($id);
        $persona->nombres = $request->get('nombres');
        $persona->apellido_materno = $request->get('apellido_materno');
        $persona->apellido_paterno = $request->get('apellido_paterno');
        $persona->fecha_nacimiento = $request->get('fecha_nacimiento');
        $persona->celular = $request->get('celular');
        $persona->sexo = $request->get('sexo');
        $persona->update();
        
        //carnet
        $ci = CarnetIdentidad::find($persona->id);
        $ci->ci = $this->validarLongitud( $request->get('ci_alumno'), 10 );
        $ci->expedido = $this->validarLongitud( $request->get('expedido_alumno'), 2);
        $ci->complemento = $this->validarLongitud( $request->get('complemento_alumno'), 2);
        $ci->update();
    }
    private function _editarServicioBasicoAlumno($id, $request){
        $alumno = Alumno::where('id_perona', $id)->first();
        $datosEstudiantes = DatosEstudiante::where('id_alummno', $alumno->id)->first();
        $rude = Rude::where('id_ii_datos_estudiante', $datosEstudiantes->id)->first();
        $socioeconomico = Socioeconomico::find($rude->id_iv_socioeconomico);
        $servicioBasico = ServicioBasico::find($socioeconomico->id_servicio_basico);
        $servicioBasico->agua_canieria = $request->get('agua_canieria');
        $servicioBasico->banio_vivienda = $request->get('banio_vivienda');
        $servicioBasico->alcantarillado = $request->get('alcantarillado');
        $servicioBasico->energia_electrica = $request->get('energia_electrica');
        $servicioBasico->recojo_basura = $request->get('recojo_basura');
        $servicioBasico->id_vivienda = $request->get('id_vivienda');
        $servicioBasico->update();
        
        $accesoAccede = AccesoAccede::find($socioeconomico->id_acceso_internet);
        $accesoAccede->id_accede_en = $request->get('id_accede_en');
        $accesoAccede->update();
        
        $accesInternet = AccesoInternet::find($socioeconomico->id_acceso_internet);
        $accesInternet->id_frecuencia = $request->get('id_frecuencia');
        $accesInternet->update();
        
        $medioTransporte = MedioTransporte::find($socioeconomico->id_acceso_internet);
        $medioTransporte->id_tiempo_demora = $request->get('id_tiempo_demora');
        $medioTransporte->id_ir_colegio = $request->get('id_ir_colegio');
        $medioTransporte->especifique = $request->get('especifique');
        $medioTransporte->update();

        $abandonoEscolar = AbandonoEscolar::find($socioeconomico->id_abandono);
        $abandonoEscolar->correcto = $request->get('ab_correcto');
        $abandonoEscolar->update();

        $abandonoRazon = AbandonoRazon::where('id_abandono', $socioeconomico->id_abandono)->first();
        // if( count($abandonoRazon, COUNT_RECURSIVE) < 1){
        //     $abandonoRazon = new AbandonoRazon();
        //     $abandonoRazon->id_abandono = $socioeconomico->id_abandono;
        // }
        // foreach($abandonoRazon as $key=> $razon){
            // }
        // $abandonoRazon->id_razon = $request->get('id_razon');
        // $abandonoRazon->especifique = $request->get('ab_especifique');
        // $abandonoRazon->save();
    }
    private function _editarDatosTutorAlumno($id, $request){
        $alumno = Alumno::where('id_perona', $id)->first();
        $tutor = Tutor::find($alumno->id_tutor);
        $datosTutor = DatosTutor::where('id_tutor', $tutor->id)->first();
        $datosTutor = DatosTutor::find($datosTutor->id);
        $datosTutor->id_vive_con = $request->get('id_vive_con');
        $datosTutor->update();

        $personaTutor = Persona::find($tutor->id_persona);
        $personaTutor->fecha_nacimiento = $request->get('tutor_fecha_nacimiento');
        $personaTutor->apellido_paterno = $request->get('tutor_apellido_paterno');
        $personaTutor->apellido_materno = $request->get('tutor_apellido_materno');
        $personaTutor->nombres = $request->get('tutor_nombres');
        $personaTutor->update();
        
        $ciTutor = CarnetIdentidad::find($personaTutor->id_ci);
        $ciTutor->ci = $request->get('tutor_ci');
        $ciTutor->update();
    }
    private function _editarSaludAlumno($id, $request){
        $alumno = Alumno::where('id_perona', $id)->first();
        $datosEstudiantes = DatosEstudiante::where('id_alummno', $alumno->id)->first();
        $rude = Rude::where('id_ii_datos_estudiante', $datosEstudiantes->id)->first();
        $socioeconomico = Socioeconomico::find($rude->id_iv_socioeconomico);
        $saludEstudiante = SaludEstudiante::find($socioeconomico->id_salud_estudiante);
        $saludEstudiante->centro_salud = $request->get('centro_salud');
        $saludEstudiante->id_cantidad_veces = $request->get('id_cantidad_veces');
        $saludEstudiante->seguro_salud = $request->get('seguro_salud');
        $saludEstudiante->update();
        $items = $request->get('id_donde_estudiante');
        $saludDonde = SaludDonde::where('id_salud_estudiante', $saludEstudiante->id)->first();
        for ($i=0; $i < count($items); $i++) {
            $saludDonde->id_donde_fue = $items[$i];
            $saludDonde->save();
        }
    }
    private function _editarIdiomasAlumno($id, $request){
        $alumno = Alumno::where('id_perona', $id)->first();
        $datosEstudiantes = DatosEstudiante::where('id_alummno', $alumno->id)->first();
        $rude = Rude::where('id_ii_datos_estudiante', $datosEstudiantes->id)->first();
        $socioeconomico = Socioeconomico::find($rude->id_iv_socioeconomico);
        $idiomacultura = IdiomaCultura::find($socioeconomico->id_idioma_cultura);
        $idiomacultura->idioma_ninies = $request->get('idioma_ninies');
        $idiomacultura->idioma_frecuente1 = $request->get('idioma_frecuente1');
        $idiomacultura->idioma_frecuente2 = $request->get('idioma_frecuente2');
        $idiomacultura->idioma_frecuente3 = $request->get('idioma_frecuente3');
        $idiomacultura->id_nacion_pueblo = $request->get('idioma_nacion_pueblo');
        $idiomacultura->update();
    }

    private function validarLongitud($str, $long){
        if(strlen($str) > $long){
            return substr($str, 0, $long);
        }
        return $str;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $alumno = Alumno::find($id);
        $alumno->activo = false;
        $alumno->save();
        return redirect('/administrador/alumno');
    }
}
