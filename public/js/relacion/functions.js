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
| Scripts the  Module Relacion
|--------------------------------------------------------------------------
|
*/
//####### Scripts create.blade.php


$(document).ready(function(){

		$('#lapso').click(function(){

			$('#fechalapso').focus();
		});
		$('#fechalapso').focus(function(){

			$('#fechalapso').css({'color':'red'});
		});

		$('#trimestre').click(function(){

			$('#fechatrimestre').focus();
		});
		$('#fechatrimestre').focus(function(){

			$('#fechatrimestre').css({'color':'red'});
		});
});

//####### Scripts registrar.blade.php
/**
*quitarpre
*funcion para eliminar un  campo pregrado
*/
function quitarCampo(){

  var $contenedor= $("#listasaber");
  $contenedor.detach();
}//Fin quitarpre


$('#saber').click(function(){
							
							$('#popup').fadeIn('slow');
							$('#horasAcademicas').attr('max',$('#totaHoras').val() - $('#horasAdministrativas').val());
							$('#horasAdministrativas').attr('max',$('#totaHoras').val() - $('#horasAcademicas').val() );
});

//----------------------------------------------------------------------------------------------------------------------------------------------
$('#nombresaber').click(function(e){

							var mensaje='';
							$('#sabertable td input').each(function (idx, ele){
					
									if ( $(ele).val() == $('#nombresaber').val() ){

											mensaje="El Docente Ya tiene esa Unidad Agregado!.";
									} 
							});

							var codigo=$('#nombresaber').val();
							if (codigo) {
											if ( mensaje == '' ) {
																		$.post('horasemanal', { codigo : codigo  }, function(resp) {
																				$('#hora').text(resp);
																				var hac= parseInt($('#horasAcademicas').val());
																				var th= $('#totaHoras').val();
																				var resul= th - hac;
																				var max = resul / resp;
																				$('#numeroSecciones').attr('max', parseInt(max));
																				$('#numeroSecciones').removeAttr('disabled');
																				$('#numeroSecciones').val(0);
																				$('#mns').text('');
																				$('#mns').removeAttr('class');
																		});
											} else{
													 $('#mns').text(mensaje);
													 $("#mns").attr('class','alert alert-error');
											};
							} else{

									$('#numeroSecciones').attr('disabled', 'disabled');
									$('#agregarsaber').attr('disabled', 'disabled');
							  }
});

//----------------------------------------------------------------------------------------------------------------------------------------------
$('#numeroSecciones').on('click keyup', function(e){

			if (! e.target.validity.valid ) {
				$('#mns').text(e.target.validationMessage);
				$('#agregarsaber').attr('disabled', 'disabled');
				$('#agregarunidad').attr('disabled', 'disabled');
			}
			else
			{
				$('#mns').text('');				
				if ($('#numeroSecciones').val() > 0) { $('#agregarsaber').removeAttr('disabled'); $('#agregarunidad').removeAttr('disabled');};
				
			}
			
			
			e.preventDefault();
			var suma = $('#numeroSecciones').val() * $('#hora').text();
			if (suma > $('#totaHoras').val() || parseInt($('#numeroSecciones').val()) > parseInt($('#numeroSecciones').attr('max')) )
			 {
			 	$('#mns').text('El número de Horas Académicas no debe ser mayor al total de horas!.');
			 	$("#mns").attr('class','alert alert-error');
			 } 
			else
				{
					$('#mns').text('');
					$('#mns').removeAttr('class');					
				};			
});

//----------------------------------------------------------------------------------------------------------------------------------------------


$('#agregarsaber').click(function(e){			

				if ( $('#numeroSecciones').val() == 0 ) {
						$('#mns').text('Debe Agregar al menos una (1) Sección!.');
				} else{

							$('#numeroSecciones').attr('disabled', 'disabled');
							$('#agregarsaber').attr('disabled', 'disabled');
							$('#sabertable tbody').append('<tr id="' + $('#nombresaber').val() + '" > <td><input  id="codigo[]" name="codigo[]" class="codigo" type="text" value="'+$('#nombresaber').val()+'" disabled style="background-color: #fff; color: #000000;" ></td> <td><input id="nombre[]" name="nombre[]" class="nombre" type="text" value="' + $('#nombresaber option[value='+ $('#nombresaber').val() +']').text() + '" disabled style="background-color: #fff; color: #000000;" ></td> <td><input id="horas[]" name="horas[]" type="text"value="'+ $('#hora').text() +'" disabled style="background-color: #fff; color: #000000;" ></td> <td><input id="secciones[]" name="secciones[]" class="secciones" type="text" value="'+ $('#numeroSecciones').val() +'" disabled style="background-color: #fff; color: #000000;" ></td> <td> <a href="JavaScript:quitarsaber('+ $('#nombresaber').val() + ',' + $('#numeroSecciones').val() + ',' + $('#hora').text() + ');"> Quitar </a> </td> </tr>');
							var multiplicacion= parseInt($('#numeroSecciones').val()) *  parseInt( $('#hora').text());
							$('#horasAcademicas').val( parseInt($('#horasAcademicas').val(  )) + multiplicacion ) ;
							$('#horasAdministrativas').val( $('#totaHoras').val() - $('#horasAcademicas').val() );
							$('#mns').text('');
							$('#hora').text('');
							$('#numeroSecciones').val(0);
							$('#nombresaber').val('');
							$('#popup').fadeOut(10);
							$('#guardar').removeAttr('disabled');
							$("#valida").val( parseInt($("#valida").val() ) + 1);
							
				};
});


//----------------------------------------------------------------------------------------------------------------------------------------------



$('#closesaber').on('click keyup', function(){
			
			//var quitar = quitarCampo();
			$('#popup').fadeOut(10);
			$('#numeroSecciones').val(0);
			$('#numeroSecciones').attr('disabled', 'disabled');
			$('#nombresaber').val('');
			$('#nombreunidad').val('');
			$('#mns').text('');
			$('#hora').text('');
			$('#mns').removeAttr('class');

});

//----------------------------------------------------------------------------------------------------------------------------------------------


$('#guardar').click(function(){

			$('#horasAdministrativas').removeAttr('disabled');
			$('#horasAcademicas').removeAttr('disabled');
			$('#totaHoras').removeAttr('disabled');
			$('.nombre').removeAttr('disabled');
			$('.secciones').removeAttr('disabled');
			$('.codigo').removeAttr('disabled');

});

//----------------------------------------------------------------------------------------------------------------------------------------------



function quitarsaber(saber,secciones,hora)
{
	//console.log(saber);
	//var eliminar= '#'+saber+'';
	var $contenedor= $(saber);
    $contenedor.detach();
    var resta = hora * secciones;
    //console.log(resta);
   $('#horasAcademicas').val( parseInt($('#horasAcademicas').val() ) - resta);
   $('#horasAdministrativas').val( parseInt( $('#totaHoras').val() ) - parseInt( $('#horasAcademicas').val() ) );
   $("#valida").val( parseInt($("#valida").val() ) - 1);
   if ( $("#valida").val() == 0 ) {
   				
   				 $('#guardar').attr('disabled', 'disabled');
   };
}
//----------------------------------------------------------------------------------------------------------------------------------------------
$('#nombreunidad').click(function(e){

							var mensaje='';
							$('#sabertable td input').each(function (idx, ele){
									
									if ( $(ele).val() == $('#nombreunidad').val() ){

											mensaje="El Docente Ya tiene esa Unidad Agregado!.";

									} 
							});

							var codigo=$('#nombreunidad').val();
							if (codigo) {
											if ( mensaje == '' ) {
																		$.post('horasemanal', { codigo : codigo  }, function(resp) {
																				$('#hora').text(resp);
																				var hac= parseInt($('#horasAcademicas').val());
																				var th= $('#totaHoras').val();
																				var resul= th - hac;
																				var max = resul / resp;
																				$('#numeroSecciones').attr('max', parseInt(max));
																				$('#numeroSecciones').removeAttr('disabled');
																				$('#numeroSecciones').val(0);
																				$('#mns').text('');
																				$('#mns').removeAttr('class');
																		});
											} else{
													 $('#mns').text(mensaje);
													 $("#mns").attr('class','alert alert-error');
													 $('#numeroSecciones').attr('disabled', 'disabled');
													 $('#agregarunidad').attr('disabled', 'disabled');
											};
							} else{

									$('#numeroSecciones').attr('disabled', 'disabled');
									$('#agregarunidad').attr('disabled', 'disabled');

							  }
});


//####### Scripts relaciondocente.blade.php
$('#data').dataTable();
		


//####### Scripts relaciondocente.blade.php

$(document).ready(function(){

		$('#departamentorelacion').click(function () {
	
		var departamento=document.getElementById('departamentorelacion').value;
	
		if (departamento == '')
		 {
		 	
		 	 $('#departamentorelacion').focus();
		 }
		else{

				var request=$.ajax({

							url : "listarelacionget",
							type : "POST",
							data : { depa : departamento },
							dataType : "html"

						});
				request.done(function(msg){$('.table').html(msg).appendTo('section');});
		};
		


			});

});




