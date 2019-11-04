//var i = 0;
var campos = 0;
/*
var original = document.getElementById('pr_0');

//var campos2 = 0;
//console.log(campos);

function duplicate() {
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "pr_" + ++i;
    // or clone.id = ""; if the divs don't need an ID
    original.parentNode.appendChild(clone);
    console.log(clone.id);
}
*/



function agregarCampo(wea) {
 
    
        campos = campos + 1;
        var NvoCampo = document.createElement("div");
        NvoCampo.id = "tr_" + (campos);
        NvoCampo.innerHTML =
        ' <div class="form-group row">' +
            ' <div class="col-lg-8">' +
            ' <input type="text" value="'+campos+'" name="valorr[]" id="valorr[]" style="display:none">' +
            '<input type="text"  name="respuestas[]" class="form-control"  id="respuestas[]" placeholder="Otra respuesta">' +
        '</div>'+
            '</div>';
        var contenedor = document.getElementById("pr_"+wea);
        contenedor.appendChild(NvoCampo);
       console.log(NvoCampo);
}

function quitarCampo(wea) {
    if (campos > 0) {
        var eliminar = document.getElementById("tr_" + campos);
        var contenedor = document.getElementById("pr_"+wea);
        contenedor.removeChild(eliminar);
        campos = campos - 1;
        console.log(eliminar);
    }
}

/*
function agregarCampoP() {
    
        campos2 = campos2 + 1;
        var NvoCampo2 = document.createElement("div");
        NvoCampo2.id = "pr_" + (campos2);
        var hola= NvoCampo2.id;
        console.log(hola);
        NvoCampo2.innerHTML =
        '<hr>'+
        ' <div class="form-group row">' +
            '<div class="col-md-6 offset-md-2">' +
            '<input type="text" name="valorp[]" id="valorp[]" value="'+campos2+'">' +
              '<input type="text" name="preguntas['+campos2+']" id="preguntas['+campos2+']" placeholder="Pregunta" class="form-control">' +
            '</div>'+
        '</div>'+
        '<div class="form-group row">'+
            '<div class="col-md-6 offset-md-2">'+
            '<input type="text" name="valorr[]" id="valorr[]" value="'+campos+'">' +
              '<input type="text" name="respuestas['+campos2+campos+']" id="respuestas['+campos2+campos+']" class="form-control" placeholder="Respuestas">'+
            '</div>'+
            '<div class="col-md-2">'+
                '<button class="btn btn-light" type="button" onclick="agregarCampo('+campos2+')"><i class="fas fa-plus-circle"></i></button>'+
                '<button class="btn btn-light" type="button" onclick="quitarCampo('+campos2+');"><i class="fas fa-minus-circle"></i></button>'+
            '</div>'+
            '</div>';
        var contenedor2 = document.getElementById("contenedor_todo");
        contenedor2.appendChild(NvoCampo2);
       console.log(NvoCampo2);
}

function quitarCampoP(wea) {
    if (campos2 > 0) {
        var contenedor = document.getElementById("contenedor_todo");
        var eliminar = document.getElementById("pr_"+campos2);
        contenedor.removeChild(eliminar);
        campos2 = campos2 - 1;
        console.log(eliminar);
    }
}
*/

