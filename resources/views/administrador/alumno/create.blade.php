@extends('administrador.index')
@section('content')
<h2>NUEVO ALUMNO</h2>
<form action="/administrador/alumno/" method="POST"  class="row g-3 p">
    @method('post')
    @csrf
    {{--  --}}
    <div class="r-seccion">
        <div class="row">
            <div class="col-6">
                <h4>I. DATOS DE LA UNIDAD EDUCATIVA</h4>
            </div>
            <div class="col-6 box-row flex-r-sb">
                <h4>CODIGO SIE DE LA UNIDAD EDUCATIVA</h4>
                <input type="text" value="{{$ue->cod_sie}}" disabled>
            </div>
        </div>
        <section class="sec-on" id="s-1">
            <div class="col-6">
                <h4>II. DATOS DE LA O EL ESTUDIANTE</h4>
            </div>
            <div class="box-row">
                <div class="row mb">
                    <div class="col-7">
                        <h4>2.1 APELLIDO(S) Y NOMBRE(S)</h4>
                        <div class="gd g-4-8 mb-4">
                            <label class="form-label">Apellido paterno</label>
                            <input id="apellido_paterno" name="apellido_paterno" type="text">
                        </div>
                        <div class="gd g-4-8 mb-4">
                            <label class="form-label">Apellido materno</label>
                            <input id="apellido_materno" name="apellido_materno" type="text" required>
                        </div>
                        <div class="gd g-4-8 mb-4">
                            <label class="form-label">Nombre(s) </label>
                            <input id="nombre" name="nombres" type="text" required>
                        </div>
                    </div>
                    <div class="col-5">
                        <h4>2.6 CODIGO RUDE</h4>
                        <input name="codigorude" type="text" value="{{$codigorude}}" readonly>
                        <div class="row">
                            <div class="col-5 flex">
                                <h4>2.7 SEXO</h4>
                                <div class="ml-2 col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input " type="radio" name="sexo" id="m" value="M">
                                        <label class="form-check-label fz-12" for="m">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sexo" id="f" value="F">
                                        <label class="form-check-label fz-12" for="f">
                                            Femenino
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-7 flex">
                                <h4>2.8 ¿EL/LA ESTUDIANTE PRESENTA ALGUNA DISCAPACIDAD?</h4>
                                <div class="ml-2 col-md-5">
                                    <div class="form-check">
                                        <label class="form-check-label fz-12" for="md">Si(Pase a 2.9)</label>
                                        <input class="form-check-input" type="checkbox" name="discapacidad" id="md" value="true">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label fz-12" for="fd">No(Pase a III)</label>
                                        <input class="form-check-input" type="checkbox" name="discapacidad" id="fd" value="false">
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-7 mb">
                        <!-- <h4>2.2 LUGAR DE NACIMIENTO</h4>
                        <div class=" mb row">
                            <div class="col-6">
                                <div class="gd g-4-8 mb-4">
                                    <label for="">Pais</label>
                                    <input name="pais" type="text">
                                </div>
                                <div class="gd g-4-8">
                                    <label for="">Provincia</label>
                                    <input name="provincia" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="gd g-4-8 mb-4">
                                    <label for="">Departamento</label>
                                    <input name="departamento" type="text">
                                </div>
                                <div class="gd g-4-8">
                                    <label for="">Localidad</label>
                                    <input name="localidad" type="text">
                                </div>
                            </div>
                        </div> -->
                        <h4>2.3 CERTIFICADO DE NACIMIENTO</h4>
                        <div class="mb row">
                            <!-- <div class="col-7 gd g-auto">
                                <div class="fz-12 text-center">
                                    <input name="nro_oficialia" type="number">
                                    <label for="">Oficialia N°</label>
                                </div>
                                <div class="fz-12 text-center">
                                    <input name="nro_libro" type="number">
                                    <label for="">Libro N°</label>
                                </div>
                                <div class="fz-12 text-center">
                                    <input name="nro_partidad" type="number">
                                    <label for="">Partida N°</label>
                                </div>
                                <div class="fz-12 text-center">
                                    <input name="nro_folio" type="number">
                                    <label for="">Folio N°</label>
                                </div>
                            </div> -->
                            <div class="col-5">
                                <div>
                                    <h4>2.4 FECHA DE NACIMIENTO</h4>
                                    <input name="fecha_nacimiento" type="date" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb gd g-7-5">
                            <div>
                                <h4>2.5 DOCUMENTO DE IDENTIFICACION</h4>
                                <div class="gd g-5-7">
                                    <label>Carnet de identidad</label>
                                    <input name="ci" type="text">
                                </div>
                            </div>
                            <div class="gd g-6-6">
                                <div>
                                    <label class="fz-12">Complemento</label>
                                    <input name="complemeto" type="text">
                                </div>
                                <div>
                                    <label class="fz-12">Expedido</label>
                                    <input name="expedido" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-5 ">
                        <div class="gd g-8-4">
                            <h4>2.9 N° DE REGISTRO DE DISCAPACIDAD O IBC</h4>
                            <input type="text">
                        </div>
                        <div class="gd g-7-5">
                            <div>
                                <h4>2.10 TIPO DE DISCAPACIDAD</h4>
                                <p>
                                    <small>(Marque solo una opción)</small>
                                </p>
                                <div class="gd g-6-6">
                                    @foreach ($tiposDiscapacidad as $tipo)
                                        <div class="form-check">
                                            <label for="tipodisc-{{$tipo->id}}" class="form-check-label fz-12">{{$tipo->nombre}}</label>
                                            <input class="form-check-input" value="{{$tipo->id}}" name="tipo_discapacidad" type="radio" id="tipodisc-{{$tipo->id}}">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div>
                                <h4>2.11 GRADO DE DISCAPACIDAD</h4>
                                <div>
                                    @foreach ($gradosDiscapacidad as $grado)
                                        <div class="form-check">
                                            <label for="grdodic-{{$grado->id}}" class="form-check-label fz-12">{{$grado->nombre}}</label>
                                            <input class="form-check-input" type="radio" value="{{$grado->id}}" id="grdodic-{{$grado->id}}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </section>
        <section class="sec-off" id="s-2">
            <h4>III. DIRECCIÓN ACTUAL DE LA O EL ESTUDIANTE (Información para uso exclusivo de la Unidad Educativa)</h4>
            <div class="box-row">
                <div class="col-11">
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Departamento</label>
                        <input name="departamento" type="text">
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Provincia</label>
                        <input name="provincia" type="text">
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Sección/Municipio</label>
                        <input name="seccion_municipio" type="text">
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Localidad/Comunidad</label>
                        <input name="localidad_comunidad" type="text">
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Zona/Villa</label>
                        <input name="zona_villa" type="text">
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Avenida/Calle</label>
                        <input name="avenida_calle" type="text">
                    </div>
                    <div class="gd g-auto">
                        <div class="gd g-4-8 mb-4">
                            <label for="">N° Vivienda</label>
                            <input type="text">
                        </div>
                        <div class="gd g-4-8 mb-4">
                            <label for="">Teléfono fijo</label>
                            <input type="text">
                        </div>
                        <div class="gd g-4-8 mb-4">
                            <label for="">Celular</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec-off" id="s-3">
            <h4>IV. ASPECTOS SOCIOECONÓMICOS DE LA O EL ESTUDIANTE</h4>
            <div class="gd g-8-4">
                <div>
                    <h4>4.1 IDIOMA Y PERTENENCIA CULTURAL DE LA O EL ESTUDIANTE</h4>
                    <div class="gd g-3-9">
                        <div class="box-row">
                            <p class="fz-12">(?) 4.1.1 ¿Cuál es el idioma en el que aprendió a hablar en su niñez?</p>
                            <input type="text">
                            <p class="fz-12">(?) 4.1.2 ¿Qué idioma(s) habla frecuentemente?</p>
                            <input type="text">
                            <input type="text">
                            <input type="text">
                        </div>
                        <div class="box-row">
                            <p class="fz-12">(?) 4.1.3 ¿Pertenece a una nación, pueblo indígena originario campesino o afroboliviano? <small>(Marque solo una opción)</small> </p>
                            <div class="gd grid-4">
                                @foreach ($nacionesPueblos as $nacion)
                                    <div class="form-check">
                                        <label for="nacion-{{$nacion->id}}" class="form-check-label fz-12">{{$nacion->nombre}}</label>
                                        <input class="form-check-input" value="{{$nacion->id}}" name="nacion" type="radio" id="nacion-{{$nacion->id}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>4.2 SALUD DE LA O EL ESTUDIANTE</h4>
                    <div class="box-row">
                        <div class="gd g-10-2">
                            <p class="fz-12">4.2.1 ¿Existe algún Centro de Salud/Posta/Hospital en su comunidad/barrio/zona?</p>
                            <div>
                                <div class="form-check">
                                    <label for="a51" class="form-check-label fz-12">Si</label>
                                    <input class="form-check-input" type="checkbox" id="a51">
                                </div>
                                <div class="form-check">
                                    <label for="b422" class="form-check-label fz-12">No</label>
                                    <input class="form-check-input" type="checkbox" id="b422">
                                </div>
                            </div>
                        </div>
                        <p class="fz-12">4.2.2 El año pasado, por problemas de salud, ¿acudió o se atendió en… (Puede marcar más de una opción)</p>
                        <div class="gd g-6-6">
                            @foreach ($dondeFue as $item)
                                <div class="form-check">
                                    <label for="item-{{$item->id}}" class="form-check-label fz-12">{{$item->nombre}}</label>
                                    <input class="form-check-input" value="{{$item->id}}" name="accede_en" type="radio" id="item-{{$item->id}}">
                                </div>
                            @endforeach
                        </div>
                        <p class="fz-12">Si respondio las opciones 1, 2 y/o 3 de la pregunta 4.2.2</p>
                        <p class="fz-12">4.2.3 El año pasado, ¿Cuántas veces fue al Centro de Salud?</p>
                        <div class="gd g-auto">
                            {{-- cantidadDeVeces --}}
                            @foreach ($cantidadDeVeces as $veces)
                                <div class="form-check">
                                    <label for="veces-{{$veces->id}}" class="form-check-label fz-12">{{$veces->nombre}}</label>
                                    <input class="form-check-input" value="{{$veces->id}}" name="accede_en" type="radio" id="veces-{{$veces->id}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec-off" id="s-4">
            <h4>4.3 ACCESO DE LA O EL ESTUDIANTE A SERVICIOS BÁSICOS</h4>
            <div class="box-row">
                <div class="gd g-auto">
                    <div>
                        <h4>4.3.1 ¿Tiene acceso a agua por cañería de red? </h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="agua" id="4-3-1-1">
                                <label class="form-check-label" for="4-3-1-1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="agua" id="4-3-1-2">
                                <label class="form-check-label" for="4-3-1-2">No</label>
                            </div>
                        </div>
                        <h4 class="mt">(?)4.3.2 ¿Tiene baño en su vivienda?  </h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="banio" id="4-3-2-1">
                                <label class="form-check-label" for="4-3-2-1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="banio" id="4-3-2-2">
                                <label class="form-check-label" for="4-3-2-2">No</label>
                            </div>
                        </div>
                        <h4 class="mt">4.3.3 ¿Tiene red de alcantarillado?</h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alcantarillado" id="4-3-2-3">
                                <label class="form-check-label" for="4-3-2-3">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alcantarillado" id="4-3-2-4">
                                <label class="form-check-label" for="4-3-2-4">No</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>4.3.4 ¿Usa energía eléctrica para alumbrar su vivienda?</h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="energia" id="4-3-4-1">
                                <label class="form-check-label" for="4-3-4-1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="energia" id="4-3-4-2">
                                <label class="form-check-label" for="4-3-4-2">No</label>
                            </div>
                        </div>
                        <h4 class="mt">4.3.5 ¿Cuenta con servicio de recojo de basura?</h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="basura" id="4-3-4-3">
                                <label class="form-check-label" for="4-3-4-3">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="basura" id="4-3-4-5">
                                <label class="form-check-label" for="4-3-4-5">No</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>4.3.6 La vivienda que ocupa el hogar es:</h4>
                        <div class="gd g-6-6">
                            @foreach ($viviendas as $vivienda)
                                <div class="form-check">
                                    <label for="vivienda-{{$vivienda->id}}" class="form-check-label fz-12">{{$vivienda->nombre}}</label>
                                    <input class="form-check-input" value="{{$vivienda->id}}" name="vive" type="radio" id="vivienda-{{$vivienda->id}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <h4>4.4 ACCESO A INTERNET DE LA O EL ESTUDIANTE</h4>
            <div class="box-row">
                <div class="gd g-6-6">
                    <div>
                        <h4>4.4.1 El estudiante accede a internet en: (Puede marcar más de una opción)</h4>
                        <div class="gd g-4-4-4">
                            @foreach ($accesoInternet as $acceso)
                                <div class="form-check">
                                    <label for="acceso-{{$acceso->id}}" class="form-check-label fz-12">{{$acceso->nombre}}</label>
                                    <input class="form-check-input" value="{{$acceso->id}}" name="vive" type="checkbox" id="acceso-{{$acceso->id}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h4>4.4.2 ¿Con qué frecuencia usa internet? (Marque solo una opción)</h4>
                        <div class="gd g-6-6">
                            @foreach ($frecuencias as $frecuencia)
                                <div class="form-check">
                                    <label for="frecuencia-{{$frecuencia->id}}" class="form-check-label fz-12">{{$frecuencia->nombre}}</label>
                                    <input class="form-check-input" value="{{$frecuencia->id}}" name="frecuecia" type="radio" id="frecuencia-{{$frecuencia->id}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <h4>4.5 ACTIVIDAD LABORAL DE LA O EL ESTUDIANTE</h4>
            <div class="box-row">
                <div class="gd g-3-5-4">
                    <div class="gd g-5-7">
                        <div>
                            <div class="gd g-6-6 mt">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Trabajo" value="1" id="n1-1">
                                    <label class="form-check-label fz-14" for="n1-1">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Trabajo" value="2" id="n2-2">
                                    <label class="form-check-label fz-14" for="n2-2">No</label>
                                </div>
                            </div>
                            <div class="mt">
                                <h4>(pase a 4.6)</h4>
                                <div class="form-check mt">
                                    <input class="form-check-input" type="radio" name="trabajo" id="o2-2" velue="3">
                                    <label class="form-check-label fz-14" for="o2-2">Ns/Nr</label>
                                </div>
                                <h4 class="mt">(pase a 4.6)</h4>
                            </div>
                        </div>
                        <div class="mt">
                            <h4>Marque los meses que trabajó:</h4>
                            <div class="gd grid-4 mt">
                                @foreach ($mesesLaborales as $meses)
                                    <div class="form-check">
                                        <label for="meses-{{$meses->id}}" class="form-check-label fz-12">{{$meses->nombre}}</label>
                                        <input class="form-check-input" value="{{$meses->id}}" name="frecuecia" type="radio" id="meses-{{$meses->id}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>4.5.2 En la pasada gestión ¿En qué actividad trabajó el estudiante?</h4>
                        <div class="gd g-3-4-5">
                            {{-- tipoTrabajos --}}
                            @foreach ($tipoTrabajos as $tipoT)
                                <div class="form-check">
                                    <label for="tipoT-{{$tipoT->id}}" class="form-check-label fz-12">{{$tipoT->nombre}}</label>
                                    <input class="form-check-input" value="{{$tipoT->id}}" name="frecuecia" type="checkbox" id="tipoT-{{$tipoT->id}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h4>4.5.3 ¿En qué turno trabajó el estudiante? (Puede marcar más de una opción)</h4>
                            <div class="gd g-4-4-4">
                                {{-- turnoTrabajos --}}
                                @foreach ($turnoTrabajos as $turnoTrab)
                                    <div class="form-check">
                                        <label for="turnoTrab-{{$turnoTrab->id}}" class="form-check-label fz-12">{{$turnoTrab->nombre}}</label>
                                        <input class="form-check-input" value="{{$turnoTrab->id}}" name="frecuecia" type="checkbox" id="turnoTrab-{{$turnoTrab->id}}">
                                    </div>
                                @endforeach
                           </div>
                        <div>
                            <h4>4.5.4 ¿Con qué frecuencia trabajó?</h4>
                            <div class="gd g-4-4-4">
                                {{-- frecuenciaTrabajos --}}
                                @foreach ($frecuenciaTrabajos as $frecuenciaTra)
                                    <div class="form-check">
                                        <label for="frecuenciaTra-{{$frecuenciaTra->id}}" class="form-check-label fz-12">{{$frecuenciaTra->nombre}}</label>
                                        <input class="form-check-input" value="{{$frecuenciaTra->id}}" name="frecuecia" type="radio" id="frecuenciaTra-{{$frecuenciaTra->id}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h4>4.5.5 ¿Recibió algún pago?</h4>
                            <div class="gd g-6-6">
                                @foreach ($recibePagos as $recibePago)
                                    <div class="form-check">
                                        <label for="recibePago-{{$recibePago->id}}" class="form-check-label fz-12">{{$recibePago->nombre}}</label>
                                        <input class="form-check-input" value="{{$recibePago->id}}" name="frecuecia" type="radio" id="recibePago-{{$recibePago->id}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gd g-6-6">
                <div>
                    <h4>4.6 MEDIO DE TRANSPORTE PARA LLEGAR A LA UNIDAD EDUCATIVA</h4>
                    <div class="box-row">
                        <div class="gd g-6-6">
                            <div>
                                <h4>4.6.1 Generalmente, ¿Cómo llega el estudiante a la Unidad Educativa?(Coloque solo una opción)</h4>
                                @foreach ($irColegio as $irCol)
                                    <div class="form-check">
                                        <label for="irCol-{{$irCol->id}}" class="form-check-label fz-12">{{$irCol->nombre}}</label>
                                        <input class="form-check-input" value="{{$irCol->id}}" name="frecuecia" type="checkbox" id="irCol-{{$irCol->id}}">
                                    </div>
                                @endforeach
                                <div>
                                    <input type="text">
                                </div>
                            </div>
                            <div>
                                <h4>4.6.2 Según el medio de transporte señalado, ¿Cuál es el tiempo máximo que demora el estudiante desde su vivienda hasta la Unidad Educativa?</h4>
                                @foreach ($tiempoDemora as $tiempoDem)
                                    <div class="form-check">
                                        <label for="tiempoDem-{{$tiempoDem->id}}" class="form-check-label fz-12">{{$tiempoDem->nombre}}</label>
                                        <input class="form-check-input" value="{{$tiempoDem->id}}" name="frecuecia" type="checkbox" id="tiempoDem-{{$tiempoDem->id}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>4.7 ABANDONO ESCOLAR CORRESPONDIENTE A LA GESTIÓN ANTERIOR</h4>
                    <div class="box-row">
                        <div>
                            <div class="gd g-8-4">
                                <h4>4.7.1 ¿El estudiante abandonó la Unidad Educativa el año pasado? </h4>
                                <div>
                                    <div class="form-check">
                                        <label for="a47" class="form-check-label fz-12">Si</label>
                                        <input class="form-check-input" value="1" type="radio" id="a47">
                                    </div>
                                    <div class="form-check">
                                        <label for="b47" class="form-check-label fz-12">No</label>
                                        <input class="form-check-input" value="2" type="radio" id="b47">
                                    </div>
                                    <small>(pase a la Sección V)</small>
                                </div>
                            </div>
                            <div>
                                <h4>4.7.2 ¿Cuál o cuáles fueron las razones de abandono escolar?</h4>
                                <small>(Puede marcar mas de una opcion)</small>
                                <div class="gd g-6-6">
                                    @foreach ($razonesAbandono as $razon)
                                        <div class="form-check">
                                            <label for="razon-{{$razon->id}}" class="form-check-label fz-12">{{$razon->nombre}}</label>
                                            <input class="form-check-input" value="{{$razon->id}}" name="frecuecia" type="checkbox" id="razon-{{$razon->id}}">
                                        </div>
                                    @endforeach
                                    <div class="form-check">
                                        <label for="a47291" class="form-check-label fz-12">Otra (especifique)</label>
                                        <input class="form-input" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="sec-off" id="s-5">
            <h4>V. DATOS DEL PADRE, MADRE o TUTOR (A) DE O LA ESTUDIANTE</h4>
            <div class="box-row">
                <h4>5.1 LA O EL ESTUDIANTE VIVE HABITUALMENTE CON: </h4>
                <div class="gd g-auto">
                    <div class="form-check">
                        <label for="a511" class="form-check-label fz-12">1.- Padre y madre</label>
                        <input class="form-check-input" type="radio" id="a511">
                    </div>
                    <div class="form-check">
                        <label for="a512" class="form-check-label fz-12">2.- Solo padre</label>
                        <input class="form-check-input" type="radio" id="a512">
                    </div>
                    <div class="form-check">
                        <label for="a513" class="form-check-label fz-12">2.- Solo madre</label>
                        <input class="form-check-input" type="radio" id="a513">
                    </div>
                    <div class="form-check">
                        <label for="a514" class="form-check-label fz-12">2.- Tutor(a)</label>
                        <input class="form-check-input" type="radio" id="a514">
                    </div>
                    <div class="form-check">
                        <label for="a515" class="form-check-label fz-12">2.- Solo(a)</label>
                        <input class="form-check-input" type="radio" id="a515">
                    </div>
                </div>
            </div>
            <div class="mt gd g-6-6">
                <div class="box-row">
                    <h4>5.2. DATOS DEL PADRE</h4>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Carnet de identidad</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Apellido paterno</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Apellido materno</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Nombre(s)</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Idioma que habla frecuetemente</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Ocupacion laboral actual</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Mayor grado de instruccion alcanzado</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Fecha de nacimiento</label>
                        <input type="date">
                    </div>
                </div>
                <div class="box-row">
                    <h4>5.3. DATOS DE LA MADRE</h4>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Carnet de identidad</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Apellido paterno</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Apellido materno</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Nombre(s)</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Idioma que habla frecuetemente</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Ocupacion laboral actual</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Mayor grado de instruccion alcanzado</label>
                        <input type="text">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Fecha de nacimiento</label>
                        <input type="date">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="gd d-6-6">
        <!-- <div id="nav-btns">
            <button id="prev" type="button" class="none btn btn-primary">Anterior</button>
            <button id="next" type="button" class="btn btn-primary">Siguiente</button>
        </div> -->
        <div class="">
            <a href="/administrador/alumno" class="btn btn-secondary" tabindex="3">Cancelar</a>
            <button type="submit" class="btn btn-secondary" tabindex="4">Guardar</button>
        </div>
    </div>
</form>

<script>
    var next = document.getElementById('next')
    var prev = document.getElementById('prev')
    next.addEventListener('click', e => nextSecction());
    prev.addEventListener('click', e => prevSecction());
    function nextSecction(){
        var sections = document.querySelectorAll('section');
        let cant = sections.length;
        sections.forEach((el, index) => {
            if(el.classList.contains('sec-on')){
                if(sections[index+1]){
                    el.classList.remove('sec-on')
                    prev.classList.remove('none')
                    el.classList.add('sec-off')
                    sections[index+1].classList.add('sec-on')
                    sections[index+1].classList.remove('sec-off')
                }
                throw BreakException;
            }
            // console.log(index);
        });
    }
    function prevSecction(){
        var sections = document.querySelectorAll('section');
        let cant = sections.length;
        sections.forEach((el, index) => {
            if(el.classList.contains('sec-on')){
                if(sections[index-1]){
                    el.classList.remove('sec-on')
                    el.classList.add('sec-off')
                    sections[index-1].classList.add('sec-on')
                    sections[index-1].classList.remove('sec-off')
                }else{
                    prev.classList.add('none')
                }
                throw BreakException;
            }
            // console.log(index);
        });
    }

</script>

@stop
