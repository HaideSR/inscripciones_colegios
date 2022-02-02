var selNivel = document.getElementById('nivel');
var selTurno = document.getElementById('turno');
var selParalelo = document.getElementById('paralelo');
var selCurso = document.getElementById('curso');

selNivel?.addEventListener('change', getValuesSelect );
selTurno?.addEventListener('change', getValuesSelect );
selParalelo?.addEventListener('change', getValuesSelect );

function getValuesSelect(){
   // = 'id_nivel=1&id_turno=4&id_paralelo=3'
   var params = ''
   if(selNivel.value){
      params += 'id_nivel='+selNivel.value
   }
   if(selTurno.value){
      params += '&id_turno='+selTurno.value
   }
   if(selParalelo.value){
      params += '&id_paralelo='+selParalelo.value
   }
   getCursos(params);
   selCurso.innerHTML = `<option value="">Cargando...</option>`;
   selCurso.disabled = true
}

function getCursos(paramsData){
   var params = ''
   if(paramsData){
      params = paramsData
   }
   fetch('/administrador/curso/filter?'+params)
   .then(res => {
      return res.json()
   })
   .then(res =>{
      setResults(res);
   })
}

function setResults(data){
   var list = []
   data.forEach(el =>{
      var option = `<option value="${el.id}">${el.nombre}</option>`;
      list += option;
   })
   selCurso.innerHTML = list;
   selCurso.disabled = false;
   //seleccionar por defecto en el listar
   existUrl()
}
function existUrl(){
    var urlParams = location.href
    var url = new URL(urlParams);
    var idCurso = url.searchParams.get("id_curso");
    var gestion = url.searchParams.get("gestion");
    if(idCurso){
        selCurso.value = idCurso
    }
    if(gestion){
        selGestion.value = gestion
    }
    console.log(gestion);
    console.log(idCurso);
}

getCursos();
