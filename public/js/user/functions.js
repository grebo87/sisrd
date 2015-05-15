/**
 * @summary     Scripts SISRD
 * @description Response ajax 
 * @version     1.0.1
 * @file        functions.js
 * @authors      Gregorio Boada (Grebo87@gmail.com), Janetsi Brazon
 *
 *
 * This source file is free software, under either the GPL v2 license
 * 
 * This source file is distributed in the hope that it will be useful, but 
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY 
 * or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.
 * 
 */


 /*
|--------------------------------------------------------------------------
| Scripts the  Module User
|--------------------------------------------------------------------------
|
*/

//####### Scripts create.blade.php

$(document).ready(function(){

		$("#tipousuario").on('click change', function(e){
				var tipo=$("#tipousuario").val();
				if (tipo == '')
				 {
				 			$("#siguiente").attr('disabled', 'disabled');	
				 			alert('Debe Seleccionar un Tipo de Usuario');
				 } else{

				 			if (tipo === 'Administrativo')
				 			 {
				 			 	$("#form_administrativo").attr('action' ,'administrativo');
				 			 }

				 			if (tipo === 'Docente')
				 			 {
				 			 	$("#form_administrativo").attr('action' ,'docente');
				 			 }
				 			$("#siguiente").removeAttr('disabled');
				 };

		});

		$("#buscar").click(function () {
			var cedula=$("#cedula").val();
			if (cedula == '') 
			{
				alert('Debe Introducir Una Cedula!.');
			}else
				{
					$.post('datosdocente', { cedula : cedula  }, function(resp) {

																				if (resp == 'null') { 
																										$('#userdocente').attr('disabled','disabled');
																									} 
																				else{
																										 $("#nombre_completo").text(resp.primernombre +resp.segundonombre + resp.primerapellido + resp.segundoapellido);
																										 $("#cargo_docente").text(resp.cargo);
																										 $("#depart_docente").text(resp.depart);
																										 $('#userdocente').removeAttr('disabled');
																					}
																				console.log(resp);
																			
																		});
				}
			
		});
			

});
