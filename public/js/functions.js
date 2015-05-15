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






$(document).ready(function() {


		






	

		

});



// function hora()
// {
// 	var codigo=$('.nombre').val();
// 	$.post('horasemanal', { codigo : codigo  }, function(resp) {
// 			console.log(resp.horasSemanales);
// 			$('#hora').text(resp.horasSemanales);
// 			var hac= parseInt($('#horasAcademicas').val());
// 			var th= $('#totaHoras').val();
// 			var resul= th - hac;
// 			var max = resul / resp.horasSemanales;
// 			$('#numeroSecciones').attr('max', parseInt(max));
// 			$('#numeroSecciones').removeAttr('disabled');
// 			$('#numeroSecciones').val(0);
// 			$('#numeroHorasAcademicas').attr('max',$('#totaHoras').val());
// 			$('#numeroHorasAdministrativas').attr('max',$('#totaHoras').val());
// 			$('#numeroHorasAdministrativas').val( $('#totaHoras').val() - $('#horasAcademicas').val());
// 			$('#numeroHorasAcademicas').val($('#horasAcademicas').val());
// 			$('#error').text('');
// 			$('#mns').text('');
// 			$('#guardar').removeAttr('disabled');
// 			$('#nombre').val(resp.nombre);
// 			$('#nombre').attr('class', resp.codigo);
// 		});

	
	 
		
// }







/*
|--------------------------------------------------------------------------
*/










//####### Scripts registrar.blade.php

$(document).ready(function(){

	
		$('#nombresaber').click(function(){
			
		});
	


});

var titulo="";

$('.menu').click(function(e) {

	var menu=$(this).text();
			var id="#"+menu+"";
			console.log(id);
			console.log("hh");
			$('#title').text(id);
			titulo=id;
			$(''+id+'').css({'color':'black','background-color':'#CCCCCC','padding-bottom': '10px','margin':'0px','border-style':'outset','border-radius':'10px','border-color': '#CCCCCC','boder-width':'1px','box-shadow': '2px 2px 2px 2px rgba(0,0,0,.2)' });
	
});

	



function titulo() {
	
	console.log(titulo);
}


