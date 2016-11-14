
$(function () {
    $(document).on("ready", function () {

	 	$.ajax({
			 		dataType: "json",
			 		error: function(data) {
			 			
			 		},
			 		success: function(data) {
			 			console.log("Respuesta al traer información de la BD" , data);
                       // tbTematicas = $("#tbpersonas").DataTable();

                      var personas = data.persona;

						
						for (var i =0; i < personas.length; i++)
						 {
    console.log(personas[i].Nombres);
var codigo = "<tr data-persona-id='" +personas[i].IdPersona + "'>" +
  "<td>"+  personas[i].Nombres+ "  "+personas[i].Apellidos  + "</td>"  +
  "<td>"+ personas[i].FechaNacimiento + "</td>" +
    "<td>"     +  personas[i].Correo+ "</td>" +
      "<td>"     + personas[i].Estatura+ "</td> " +
	"<td>"     +	personas[i].Peso+ "</td> " +
	"<td>"     +	personas[i].Sexo+ "</td>" +
       "<td><button id='btnEditar' data-persona-id='" +
        personas[i].IdPersona  + 
        "'  class='btn btn-primary'>Editar</button><button id='btnEliminar'  data-toggle='modal' data-target='#myModal'   data-persona-id='" + personas[i].IdPersona+ "' class='btn btn-danger'>Eliminar</button></td></tr>";
		
			$("#tbpersonas > tbody").append(codigo);
		}
 	// Init DataTable
 	tbpersonas = $("#tbpersonas").DataTable();                      			





			 		
			 										},
			 		type: "post",
			 		url: "personas"
 					


 		});




// registrar persona
$("#btnAgregar").on("click", function(e) {
	e.preventDefault();
	$("input").trigger("blur");
	if ($("form").find("span.LV_invalid").length && $("form").find("span.LV_valid").length > 0) {return false;}
	var sUrl = "/UEES/jsp/nuevo-facilitador.json";
	if ($(this).data("facilitador-id") !== "" && $(this).data("facilitador-id") !== undefined) {
		sUrl = "/UEES/jsp/editar-facilitador.json";
		var iFacilitadorID = $(this).data("facilitador-id");
	}
 	// ajax to get facilitadores from json
 	$.ajax({
 		dataType: "json",
 		data: $("#fmFacilitador").serialize(),
 		error: function(data) {
 			if (data.responseText !== undefined) {
		 			show_stack_bottomleft("error", "¡Error!", "Error fatal ocurrió, por favor avisar al administrador."); //agregar email del administrador
 			} else {
 				show_stack_bottomleft("error", "¡Error!", "Error al registrar un nuevo facilitador.<br>Inténtelo nuevamente."); //agregar feedback para el usuario
 			}
 		},
 		success: function(data) {
 			// show_stack_bottomleft("success", "Datos", "Los facilitadores han sido extraÃ­dos de la BD");
 			console.log("Respuesta al registrar", data);
 			// saber si es nuevo facilitador
 			if (data.is_new) {
 				$("#tbFacilitadores").DataTable().row.add([
 					data.rows[0].cell[1],
 					data.rows[0].cell[2],
 					data.rows[0].cell[3],
 					"<button data-facilitador-id='" + data.rows[0].id + "' class='btnEliminar btn btn-danger'>Eliminar</button>"
        ]).draw(false);
 			} else {
 				var oRow = fnGetRowByCustomAttr(tbFacilitadores, iFacilitadorID, "data-facilitador-id");
 				$(oRow).children().eq(0).html(data.rows[0].cell[1]);
 				$(oRow).children().eq(1).html(data.rows[0].cell[2]);
 				$(oRow).children().eq(2).html(data.rows[0].cell[3]);
 			}
 			fnClearForm();
      $(".form-control.input-sm").trigger("change");
 			show_stack_bottomleft("success", "¡Muy bien!", "El facilitador " + data.rows[0].cell[1] + " fue registrado con éxito.");
 		},
 		type: "post",
 		url: sUrl
 	});
});

















    });


});