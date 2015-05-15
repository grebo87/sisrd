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
| Scripts the  Module Docentes
|--------------------------------------------------------------------------
|
*/
var i=0;
//####### Scripts show.blade.php

$(document).ready(function(){

		$('#departamentoAcademico').click(function () {
	
		var departamento=document.getElementById('departamentoAcademico').value;	

		var request=$.ajax({

							url : "listadocentes",
							type : "POST",
							data : { depa : departamento },
							dataType : "html"

						});
		request.done(function(msg){$('.table').html(msg).appendTo('section');});

			});

		$('#data').dataTable();
});


//####### Scripts edit.blade.php

var campos=0;
/**
*quitarpost
*funcion para eliminar un campo postgrado
*/
function quitarpostgrado(iddiv){
  var eliminar = document.getElementById("pt" + iddiv);

  var contenedor= document.getElementById("pos");
  contenedor.removeChild(eliminar);
}//Fin quitarpost
	/**
*quitarpost
*funcion para eliminar un campo postgrado
*/
function quitarpregrado(iddiv){
  var eliminar = document.getElementById("pg" + iddiv);

  var contenedor= document.getElementById("pr");
  contenedor.removeChild(eliminar);
}//Fin quitarpo

$(document).ready(function() {

						$('.a').click(function(e){ 							
		
       										$('#popup1').fadeIn('slow');

											return false;
    			        });

				$('#close').click(function(e){
    							e.preventDefault();
   	 							$('#popup1').fadeOut(10);
        
 				});

 				$('#close1').click(function(e){
    							e.preventDefault();
   	 							$('#popup1').fadeOut(10);
        
 				});				
});

//####### Scripts create.blade.php

var campos=0;
/**
*quitarpre
*funcion para eliminar un  campo pregrado
*/
function quitarpt(iddiv){

  var eliminar = document.getElementById('pos'+iddiv);
  var contenedor= document.getElementById("postg");
  contenedor.removeChild(eliminar);
}//Fin quitarpre
function quitarpr(iddiv){

  var eliminar = document.getElementById('pre'+iddiv);
  var contenedor= document.getElementById("preg");
  contenedor.removeChild(eliminar);
}//Fin quitarpre


$(document).ready(function() {
						
				
				$('.d').click(function(e){
 							
											if ($(this).attr('id') === 'post')
												{
													$('#titulo').html('Titúlo Postgrado');
												}
											else
												{
													$('#titulo').html('Titúlo Pregrado');
												}
		
       										$('#popup').fadeIn('slow');

											return false;
    			});

				$('#close').click(function(e){
    							e.preventDefault();
   	 							$('#mns').html('');
   	 							$('#nombre').val('');
   	 							$('#guardar').attr('disabled','disabled' );
       							$('#popup').fadeOut(10);      
 				});

				$('#limpiar').click(function(){
      
   								$('#nombre').val('');
   								$('#mns').html('');
     
				 });

				$('#agregar').click(function(){

    								  if ($('#nombre').val() == '')
      									 {
       											$('#mns').html('Bebe ingresar el Titúlo');
       											$('#mns').css({'color' : 'red'});
       									 } 
       								  else
       									 {
       									 		if ($('#titulo').html() === 'Titúlo Postgrado')
   	    											   {
   	       													  campos = campos + 1;
   	  	         											  var $postg=$('#postg'); $postg.append("<div id='pos"+campos+"'><label>Titúlo de Postgrado <input type='text' id='postgrado[]' name='postgrado[]' value='"+$('#nombre').val()+"' /></label> <a href='JavaScript:quitarpt(" + campos +");'>Quitar</a> </div><br>");
   	  	           											  $('#nombre').val('');
   	       												} 
   	     										else
   	      											 {
   	       													  campos = campos + 1;
   		        											  var $preg=$('#preg'); $preg.append("<div id='pre"+campos+"'><label>Titúlo de Pregrado <input type='text' id='pregrado[]' name='pregrado[]' value='"+$('#nombre').val()+"' /></label> <a href='JavaScript:quitarpr(" + campos +");'>Quitar</a> </div><br>");
   		          											  $('#nombre').val('');
   	       											 }
   	 											$('#mns').html('');
        										$('#popup').fadeOut(10);
         									}   
 				});	
});


$(document).ready(function(){			

			$(".editarpostgrado").click(function(e){
 					e.preventDefault();
 					 					
 					$("#form_editar_postgrado").load('../form_editar_postgrado', { id : $(this).attr('id') }, function(form) { });
 					$("#popup12").fadeIn('slow');
 				});

			$(".editarpregrado").click(function(e){
 					e.preventDefault();
 					 					
 					$("#form_editar_pregrado").load('../form_editar_pregrado', { id : $(this).attr('id') }, function(form) { });
 					$("#popup13").fadeIn('slow');
 				});
});

/*
|--------------------------------------------------------------------------
*/