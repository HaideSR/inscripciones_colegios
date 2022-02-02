var selGestion = document.getElementById('gestion');

selCurso.addEventListener('change', event => {
    var idCurso = event.target.value;
    createUrl(idCurso, selGestion.value);
});

function createUrl(idCurso, idgestion=null){
    var pathName = location.pathname
    var host = location.origin
    var params = ''

    if(idCurso || idgestion){
        params += '?id_curso='+idCurso
        if(idgestion){
            params +='&gestion='+idgestion
        }
        location.replace(host+pathName+params)
    }else{
        location.replace(host+pathName)
    }
}


selGestion.addEventListener('change', event => {
    var gestion = event.target.value;
    createUrl( selCurso.value, gestion);
});
