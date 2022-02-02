@extends('administrador.index')
@section('content')
    <div class="flex-r-sb top-stiky">
        <h2>RUDE ALUMNO</h2>
        <button id="edit" class="btn btn-primary">
            <i class="fas fa-edit"></i>
            <span>Editar</span>
        </button>
    </div>
   <div class="r-seccion pb">
      <div class="">
         <div class="row">
            <div class="col-6">
               <h4>I. DATOS DE LA UNIDAD EDUCATIVA</h4>
            </div>
            <div class="col-6 box-row flex-r-sb">
               <h4>CODIGO SIE DE LA UNIDAD EDUCATIVA</h4>
               <input type="text" value="{{$ue->cod_sie}}" disabled data-bloq="si">
            </div>
         </div>
        <form action="/administrador/alumno/{{$persona->id}}" method="POST">
            <input type="hidden" name="id_rude" value="{{ Request::segment(3) }}"/>
            @method('put')
            @csrf
         <!--  -->
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
                              <input id="apellido_paterno" name="apellido_paterno" value="{{$persona->apellido_paterno}}" disabled type="text">
                           </div>
                           <div class="gd g-4-8 mb-4">
                              <label class="form-label">Apellido materno</label>
                              <input id="apellido_materno" name="apellido_materno" value="{{$persona->apellido_materno}}" disabled type="text">
                           </div>
                           <div class="gd g-4-8 mb-4">
                              <label class="form-label">Nombre(s) </label>
                              <input id="nombre" name="nombres" type="text" value="{{$persona->nombres}}" disabled>
                           </div>
                     </div>
                     <div class="col-5">
                           <h4>2.6 CODIGO RUDE</h4>
                           <input type="text" value="{{$alumno->rude}}" disabled  data-bloq="si">
                           <div class="row">
                              <div class="col-5 flex">
                                 <h4>2.7 SEXO</h4>
                                 <div class="ml-2 col-md-3">
                                       <div class="form-check">
                                          <input class="form-check-input" disabled type="radio" name="sexo" id="m" value="M" {{$persona->sexo == 'M' ? 'checked=checked':''}}>
                                          <label class="form-check-label fz-12" for="m">Masculino</label>
                                       </div>
                                       <div class="form-check">
                                          <input class="form-check-input" disabled type="radio" name="sexo" id="f" value="F" {{$persona->sexo == 'F' ? 'checked=checked':''}}>
                                          <label class="form-check-label fz-12" for="f">Femenino</label>
                                       </div>
                                 </div>
                              </div>
                              <div class="col-7 flex">
                                 <h4>2.8 ¿EL/LA ESTUDIANTE PRESENTA ALGUNA DISCAPACIDAD?</h4>
                                 <div class="ml-2 col-md-5">
                                    <div class="form-check">
                                       <label class="form-check-label fz-12" for="md">Si(Pase a 2.9)</label>
                                       <input value="true" class="form-check-input" disabled type="radio" name="i_discapacidad" id="md" {{$datosEstudiantes->discapacidad ? 'checked=checked':''}}>
                                    </div>
                                    <div class="form-check">
                                       <label class="form-check-label fz-12" for="fd">No(Pase a III)</label>
                                       <input value="false" class="form-check-input" disabled type="radio" name="i_discapacidad" id="fd" {{$datosEstudiantes->discapacidad==false ? 'checked=checked':''}}>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </div>
                     <div class="col-7 mb">
                           <h4>2.2 LUGAR DE NACIMIENTO</h4>
                           <div class=" mb row">
                              <div class="col-6">
                                 <div class="gd g-4-8 mb-4">
                                    <label for="">Pais</label>
                                    <input type="text" name="i_pais_nacimiento" value="{{$datosEstudiantes->pais_nacimiento}}" disabled>
                                 </div>
                                 <div class="gd g-4-8">
                                       <label for="">Provincia</label>
                                       <input type="text" name="fn_provincia" value="{{$certificadoNac->provincia}}" disabled>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="gd g-4-8 mb-4">
                                       <label for="">Departamento</label>
                                       <input type="text" name="fn_departamento" value="{{$certificadoNac->departamento}}" disabled>
                                 </div>
                                 <div class="gd g-4-8">
                                       <label for="">Localidad</label>
                                       <input type="text" name="fn_localidad" value="{{$certificadoNac->localidad}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <h4>2.3 CERTIFICADO DE NACIMIENTO</h4>
                           <div class="mb row">
                              <div class="col-7 gd g-auto">
                                 <div class="fz-12 text-center">
                                       <input type="number" name="nro_oficialia" value="{{$certificadoNac->nro_oficialia}}" disabled>
                                       <label for="">Oficialia N°</label>
                                 </div>
                                 <div class="fz-12 text-center">
                                       <input type="number" name="nro_libro" value="{{$certificadoNac->nro_libro}}" disabled>
                                       <label for="">Libro N°</label>
                                 </div>
                                 <div class="fz-12 text-center">
                                       <input type="number" name="nro_partida" value="{{$certificadoNac->nro_partida}}" disabled>
                                       <label for="">Partida N°</label>
                                 </div>
                                 <div class="fz-12 text-center">
                                       <input type="number" name="nro_folio" value="{{$certificadoNac->nro_folio}}" disabled>
                                       <label for="">Folio N°</label>
                                 </div>
                              </div>
                              <div class="col-5">
                                 <div>
                                       <h4>2.4 FECHA DE NACIMIENTO</h4>
                                       <input type="date" name="fecha_nacimiento" value="{{$persona->fecha_nacimiento}}" disabled>
                                 </div>
                              </div>
                           </div>
                           <div class="mb gd g-7-5">
                              <div>
                                 <h4>2.5 DOCUMENTO DE IDENTIFICACION</h4>
                                 <div class="gd g-5-7">
                                       <label>Carnet de identidad</label>
                                       <input type="text" name="ci_alumno" value="{{$carnetIdentidad->ci}}" disabled>
                                 </div>
                              </div>
                              <div class="gd g-6-6">
                                 <div>
                                       <label class="fz-12">Complemento</label>
                                       <input type="text" name="expedido_alumno" value="{{$carnetIdentidad->expedido}}" disabled>
                                 </div>
                                 <div>
                                       <label class="fz-12">Expedido</label>
                                       <input type="text" name="complemento_alumno" value="{{$carnetIdentidad->complemento}}" disabled>
                                 </div>
                              </div>
                           </div>
                     </div>
                     <div class="col-5 ">
                           <div class="gd g-8-4">
                              <h4>2.9 N° DE REGISTRO DE DISCAPACIDAD O IBC</h4>
                              <input type="text" name="registro_discapacidad" value="{{$datosEstudiantes->registro_discapacidad}}" disabled>
                           </div>
                           <div class="gd g-7-5">
                              <div>
                                 <h4>2.10 TIPO DE DISCAPACIDAD</h4>
                                 <p><small>(Marque solo una opción)</small></p>
                                 <div class="gd g-6-6">
                                       @foreach ($tiposDiscapacidad as $tipo)
                                          <div class="form-check">
                                             <label for="tipodisc-{{$tipo->id}}" class="form-check-label fz-12">{{$tipo->nombre}}</label>
                                             <input class="form-check-input" value="{{$tipo->id}}" disabled
                                              name="tipo_discapacidad" type="radio" id="tipodisc-{{$tipo->id}}"
                                              {{$datosEstudiantes->id_tipo_discapacidad == $tipo->id ? 'checked=checked':''}}>
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
                                             <input name="id_grado_discapacidad" class="form-check-input" type="radio" value="{{$grado->id}}" id="grdodic-{{$grado->id}}" disabled
                                             {{$datosEstudiantes->id_grado_discapacidad == $grado->id ? 'checked=checked':''}}>
                                          </div>
                                       @endforeach
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </section>
         <!--  -->
         <section class="sec-on mt" id="s-2">
            <h4>III. DIRECCIÓN ACTUAL DE LA O EL ESTUDIANTE (Información para uso exclusivo de la Unidad Educativa)</h4>
            <div class="box-row">
                <div class="col-11">
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Departamento</label>
                        <input name="d_departamento" type="text" value="{{$direccionActual->departamento}}" disabled required>
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Provincia</label>
                        <input name="d_provincia" type="text" value="{{$direccionActual->provincia}}" disabled required>
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Sección/Municipio</label>
                        <input name="d_seccion_municipio" type="text" value="{{$direccionActual->seccion_municipio}}" disabled required>
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Localidad/Comunidad</label>
                        <input name="d_localidad_comunidad" type="text" value="{{$direccionActual->localidad_comunidad}}" disabled required>
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Zona/Villa</label>
                        <input name="d_zona_villa" type="text" value="{{$direccionActual->zona_villa}}" disabled required>
                    </div>
                    <div class="gd g-3-9 mb-4">
                        <label class="form-label">Avenida/Calle</label>
                        <input name="d_avenida_calle" type="text" value="{{$direccionActual->avenida_calle}}" disabled required>
                    </div>
                    <div class="gd g-auto">
                        <div class="gd g-4-8 mb-4">
                            <label for="">N° Vivienda</label>
                            <input name="d_nro_vivienda" type="text" value="{{$direccionActual->nro_vivienda}}" disabled required>
                        </div>
                        <div class="gd g-4-8 mb-4">
                            <label for="">Teléfono fijo</label>
                            <input name="d_telefono_fijo" type="text" value="{{$direccionActual->telefono_fijo}}" disabled required>
                        </div>
                        <div class="gd g-4-8 mb-4">
                           <label for="">Celular</label>
                           <input type="text" name="celular" value="{{$direccionActual->celular_contacto}}" disabled required>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <!--  -->
         <section class="sec-on mt" id="s-3">
            <h4>IV. ASPECTOS SOCIOECONÓMICOS DE LA O EL ESTUDIANTE</h4>
            <div class="gd g-8-4">
               <div>
                  <h4>4.1 IDIOMA Y PERTENENCIA CULTURAL DE LA O EL ESTUDIANTE</h4>
                  <div class="gd g-3-9">
                     <div class="box-row">
                           <p class="fz-12">(?) 4.1.1 ¿Cuál es el idioma en el que aprendió a hablar en su niñez?</p>
                           <input name="idioma_ninies" type="text" value="{{$idiomacultura->idioma_ninies}}" disabled>
                           <p class="fz-12">(?) 4.1.2 ¿Qué idioma(s) habla frecuentemente?</p>
                           <input name="idioma_frecuente1" type="text" value="{{$idiomacultura->idioma_frecuente1}}" disabled>
                           <input name="idioma_frecuente2" type="text" value="{{$idiomacultura->idioma_frecuente2}}" disabled>
                           <input name="idioma_frecuente3" type="text" value="{{$idiomacultura->idioma_frecuente3}}" disabled>
                     </div>
                     <div class="box-row">
                           <p class="fz-12">(?) 4.1.3 ¿Pertenece a una nación, pueblo indígena originario campesino o afroboliviano? <small>(Marque solo una opción)</small> </p>
                           <div class="gd grid-4">
                              @foreach ($nacionesPueblos as $nacion)
                                 <div class="form-check">
                                       <label for="nacion-{{$nacion->id}}" class="form-check-label fz-12">{{$nacion->nombre}}</label>
                                       <input class="form-check-input" value="{{$nacion->id}}" 
                                       name="idioma_nacion_pueblo" type="radio" id="nacion-{{$nacion->id}}" disabled
                                       {{$idiomacultura->id_nacion_pueblo == $nacion->id ? 'checked=checked':''}}>
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
                                 <input name="centro_salud" value="true" class="form-check-input" type="radio" id="a51" disabled {{$saludEstudiante->centro_salud ? 'checked=checked':''}}>
                              </div>
                              <div class="form-check">
                                 <label for="b422" class="form-check-label fz-12">No</label>
                                 <input name="centro_salud" value="false" class="form-check-input" type="radio" id="b422" disabled {{$saludEstudiante->centro_salud==false ? 'checked=checked':''}}>
                              </div>
                           </div>
                     </div>
                     <p class="fz-12">4.2.2 El año pasado, por problemas de salud, ¿acudió o se atendió en… (Puede marcar más de una opción)</p>
                     <div class="gd g-6-6">
                           @foreach ($dondeFue as $item)
                              <div class="form-check">
                                 <label for="item-{{$item->id}}" class="form-check-label fz-12">{{$item->nombre}}</label>
                                 <input class="form-check-input" value="{{$item->id}}" name="id_donde_estudiante[]" type="checkbox" id="item-{{$item->id}}"
                                 disabled {{$saludDonde->id_donde_fue == $item->id ? 'checked=checked':''}}>
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
                                 <input class="form-check-input" value="{{$veces->id}}" name="id_cantidad_veces" type="radio"
                                 id="veces-{{$veces->id}}"
                                 disabled {{$saludEstudiante->id_cantidad_veces==$veces->id ? 'checked=checked':''}}>
                              </div>
                           @endforeach
                     </div>
                     <p class="fz-12">4.2.4 ¿Tiene seguro de salud?</p>
                     <div class="gd g-6-6">
                        <div class="form-check">
                           <label class="form-check-label fz-12" for="sl-01">Si</label>
                           <input name="seguro_salud" value="true" class="form-check-input" type="radio" id="sl-01" disabled {{$saludEstudiante->seguro_salud ? 'checked=checked':''}}>
                        </div>
                        <div class="form-check">
                           <label class="form-check-label fz-12" for="sl-02">No</label>
                           <input name="seguro_salud" value="false" class="form-check-input" type="radio" id="sl-02" disabled {{$saludEstudiante->seguro_salud==false ? 'checked=checked':''}}>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--  -->
         <section class="sec-on mt" id="s-4">
            <h4>4.3 ACCESO DE LA O EL ESTUDIANTE A SERVICIOS BÁSICOS</h4>
            <div class="box-row">
                <div class="gd g-auto">
                    <div>
                        <h4>4.3.1 ¿Tiene acceso a agua por cañería de red? </h4>
                        <div class="gd g-auto">
                           <div class="form-check">
                              <input class="form-check-input" value="true" type="radio" name="agua_canieria" disabled
                              {{$servicioBasico->agua_canieria ? 'checked=checked':''}}>
                              <label class="form-check-label">Si</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" value="false" type="radio" name="agua_canieria" disabled
                              {{$servicioBasico->agua_canieria == false ? 'checked=checked':''}}>
                              <label class="form-check-label">No</label>
                           </div>
                        </div>
                        <h4 class="mt">(?)4.3.2 ¿Tiene baño en su vivienda?  </h4>
                        <div class="gd g-auto">
                              <div class="form-check">
                                 <input class="form-check-input" value="true" type="radio" name="banio_vivienda" id="4-3-2-1"
                                 {{$servicioBasico->banio_vivienda ? 'checked=checked':''}}>
                                 <label class="form-check-label" for="4-3-2-1">Si</label>
                              </div>
                              <div class="form-check">
                                 <input class="form-check-input" value="false" type="radio" name="banio_vivienda" id="4-3-2-2"
                                 {{$servicioBasico->banio_vivienda == false ? 'checked=checked':''}}>
                                 <label class="form-check-label" for="4-3-2-2">No</label>
                              </div>
                        </div>
                        <h4 class="mt">4.3.3 ¿Tiene red de alcantarillado?</h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" value="true" type="radio" name="alcantarillado" id="4-3-2-3"
                                {{$servicioBasico->alcantarillado ? 'checked=checked':''}}>
                                <label class="form-check-label" for="4-3-2-3">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="false" type="radio" name="alcantarillado" id="4-3-2-4"
                                {{$servicioBasico->alcantarillado == false ? 'checked=checked':''}}>
                                <label class="form-check-label" for="4-3-2-4">No</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>4.3.4 ¿Usa energía eléctrica para alumbrar su vivienda?</h4>
                        <div class="gd g-auto">
                            <div class="form-check">
                                <input class="form-check-input" value="true" type="radio" name="energia_electrica" id="4-3-4-1"
                                {{$servicioBasico->energia_electrica ? 'checked=checked':''}}>
                                <label class="form-check-label" for="4-3-4-1">Si</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="false" type="radio" name="energia_electrica" id="4-3-4-2"
                                {{$servicioBasico->energia_electrica == false ? 'checked=checked':''}}>
                                <label class="form-check-label" for="4-3-4-2">No</label>
                            </div>
                        </div>
                        <h4 class="mt">4.3.5 ¿Cuenta con servicio de recojo de basura?</h4>
                        <div class="gd g-auto">
                           <div class="form-check">
                              <input class="form-check-input" value="true" type="radio" name="recojo_basura" id="4-3-4-3"
                              {{$servicioBasico->recojo_basura ? 'checked=checked':''}}>
                              <label class="form-check-label" for="4-3-4-3">Si</label>
                           </div>
                           <div class="form-check">
                              <input class="form-check-input" value="false" type="radio" name="recojo_basura" id="4-3-4-5"
                              {{$servicioBasico->recojo_basura == false ? 'checked=checked':''}}>
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
                                    <input class="form-check-input" value="{{$vivienda->id}}" name="id_vivienda" type="radio" id="vivienda-{{$vivienda->id}}"
                                    {{$servicioBasico->id_vivienda == $vivienda->id ? 'checked=checked':''}}>
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
                                    <input class="form-check-input" value="{{$acceso->id}}" name="id_accede_en"
                                       type="checkbox" id="acceso-{{$acceso->id}}"
                                       disabled
                                       {{$acceso->id == $accesoAccede->id_accede_en ? 'checked=checked':''}}>
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
                                    <input class="form-check-input" value="{{$frecuencia->id}}" name="id_frecuencia" type="radio" id="frecuencia-{{$frecuencia->id}}"
                                    disabled
                                    {{$frecuencia->id==$accesInternet->id_frecuencia ? 'checked=checked':''}}>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h4>4.5 ACTIVIDAD LABORAL DE LA O EL ESTUDIANTE</h4>
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
                                @foreach ($frecuenciaTrabajos as $frecuenciaTra)
                                    <div class="form-check">
                                       <label for="frecuenciaTra-{{$frecuenciaTra->id}}" class="form-check-label fz-12">{{$frecuenciaTra->nombre}}</label>
                                       <input class="form-check-input" value="{{$frecuenciaTra->id}}" name="frecuecia" type="radio" id="frecuenciaTra-{{$frecuenciaTra->id}}"
                                       disabled>
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
            </div> -->
            <div class="gd g-6-6 mt">
                <div>
                    <h4>4.6 MEDIO DE TRANSPORTE PARA LLEGAR A LA UNIDAD EDUCATIVA</h4>
                    <div class="box-row">
                        <div class="gd g-6-6">
                            <div>
                                <h4>4.6.1 Generalmente, ¿Cómo llega el estudiante a la Unidad Educativa?(Coloque solo una opción)</h4>
                                @foreach ($irColegio as $irCol)
                                    <div class="form-check">
                                        <label for="irCol-{{$irCol->id}}" class="form-check-label fz-12">{{$irCol->nombre}}</label>
                                        <input class="form-check-input" value="{{$irCol->id}}" name="id_ir_colegio" type="checkbox" 
                                        id="irCol-{{$irCol->id}}"
                                        disabled
                                        {{$irCol->id == $medioTransporte->id_ir_colegio? 'checked=checked':''}}>
                                    </div>
                                @endforeach
                                <div>
                                    <input name="especifique" value="{{$medioTransporte->especifique}}" type="text">
                                </div>
                            </div>
                            <div>
                                <h4>4.6.2 Según el medio de transporte señalado, ¿Cuál es el tiempo máximo que demora el estudiante desde su vivienda hasta la Unidad Educativa?</h4>
                                @foreach ($tiempoDemora as $tiempoDem)
                                    <div class="form-check">
                                        <label for="tiempoDem-{{$tiempoDem->id}}" class="form-check-label fz-12">{{$tiempoDem->nombre}}</label>
                                        <input class="form-check-input" value="{{$tiempoDem->id}}" name="id_tiempo_demora" type="checkbox" id="tiempoDem-{{$tiempoDem->id}}"
                                          disabled
                                          {{$tiempoDem->id == $medioTransporte->id_tiempo_demora? 'checked=checked':''}}>
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
                                        <input name="ab_correcto" class="form-check-input" value="true" type="radio" id="a47"
                                        {{$abandonoEscolar->correcto ? 'checked=checked':''}}>
                                    </div>
                                    <div class="form-check">
                                        <label for="b47" class="form-check-label fz-12">No</label>
                                        <input name="ab_correcto" class="form-check-input" value="false" type="radio" id="b47"
                                        {{$abandonoEscolar->correcto==false ? 'checked=checked':''}}>
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
                                            <input class="form-check-input" value="{{$razon->id}}" name="id_razon" type="checkbox" id="razon-{{$razon->id}}" disabled
                                            {{$abandonoRazon && $razon->id == $abandonoRazon->id_razon ? 'checked=checked':''}}>
                                        </div>
                                    @endforeach
                                    <div class="form-check">
                                        <label for="a47291" class="form-check-label fz-12">Otra (especifique)</label>
                                        <input name="ab_especifique" class="form-input" type="text" disabled value="{{ $abandonoRazon ? $abandonoRazon->especifique : ''}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <!--  -->
         <section class="sec-on" id="s-5">
            <h4>V. DATOS DEL PADRE, MADRE o TUTOR (A) DE O LA ESTUDIANTE</h4>
            <div class="box-row">
                <h4>5.1 LA O EL ESTUDIANTE VIVE HABITUALMENTE CON: </h4>
                <div class="gd g-auto">
                <!-- viveCons -->
                     @foreach ($viveCons as $vivec)
                        <div class="form-check">
                           <label for="vv-{{$vivec->id}}" class="form-check-label fz-12">{{$vivec->nombre}}</label>
                           <input name="id_vive_con" value="{{$vivec->id}}" class="form-check-input" type="radio" id="vv-{{$vivec->id}}"
                           {{$vivec->id == $datosTutor->id_vive_con? 'checked=checked':''}}>
                        </div>
                     @endforeach
                </div>
            </div>
            <div class="mt gd g-6-6">
                <div class="box-row">
                    <h4>5.2. DATOS DEL TUTOR</h4>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Carnet de identidad</label>
                        <input name="tutor_ci" type="text" disabled value="{{$padreCi->ci}}">
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Apellido paterno</label>
                        <input name="tutor_apellido_paterno" type="text" disabled value="{{$padre->apellido_paterno}}" required>
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Apellido materno</label>
                        <input name="tutor_apellido_materno" type="text" disabled value="{{$padre->apellido_materno}}" required>
                    </div>
                    <div class="gd g-4-8">
                        <label class="fz-12 text-end">Nombre(s)</label>
                        <input name="tutor_nombres" type="text" disabled value="{{$padre->nombres}}" required>
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
                        <input name="tutor_fecha_nacimiento" type="date" disabled value="{{$padre->fecha_nacimiento}}" required>
                    </div>
                </div>
                <!-- <div class="box-row">
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
                </div> -->
            </div>
        </section>
        <button type="submit" id="submit" class="bt-sumbit btn btn-primary mt">
            <span>Guardar cambios</span>
        </button>
        </form>
      </div>
   </div>
   <script>
      function disabledInputs(val=true){
         var inputs = document.querySelectorAll('input');
         inputs.forEach(el => {
            if(val){
                el.setAttribute('disabled', val)
            }else{
                if(!el.getAttribute("data-bloq") ){
                    el.removeAttribute('disabled')
                }
            }
         });
      }
      // 
      disabledInputs();
      let edit = document.getElementById('edit')
      let submit = document.getElementById('submit')
      edit.addEventListener('click', (e) => {
        submit.classList.toggle('bt-sumbit-on')
        if(submit.classList.contains('bt-sumbit-on')){
            disabledInputs(false)
        }else{
            disabledInputs(true)
        }
      });
      
   </script>
@stop

<style>
   /* input[type=checkbox]:checked, */
   input:disabled{
      background: white;
      border: solid 1px #ddd;
      padding: 0 6px;
   }
   h4{
      margin-bottom: 0 !important;
   }
   .form-check-input:disabled,
   .form-check-input:disabled~.form-check-label, .form-check-input[disabled]~.form-check-label{
      opacity: 1 !important;
   }
</style>
