
//
//
var inputAlumno = document.getElementById('alumno');
var listAlumno = document.getElementById('listalumno');
inputAlumno.addEventListener('input', getAlumnos );
inputAlumno.addEventListener('change', (event) => {
   var ci = event.target.value;
   if(ci && window.$alumnos){
      var elCi = window.$alumnos.find(item => item.ci == parseInt(ci))
      var id_alumno = document.getElementById('id_alumno');
      id_alumno.value = elCi.id;
   }
});

function getAlumnos(event){
   var ci = event.target.value
   fetch('/administrador/alumno/buscar?ci='+ci)
   .then(res => {
      return res.json()
   })
   .then(res =>{
      setListAlumnos(res);
   })
}

function setListAlumnos(data){
   var list = ''
   window.$alumnos = data;
   data.forEach(el =>{
      var option = `<option data-id="${el.id}" value="${el.ci}">${el.nombres} ${el.apellido_paterno} ${el.apellido_materno}</option>`;
      list += option
   })
   listAlumno.innerHTML = list;
   listAlumno.disabled = false
}


