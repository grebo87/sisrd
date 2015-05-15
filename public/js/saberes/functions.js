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
| Scripts the  Module Unidad Curricular
|--------------------------------------------------------------------------
|
*/

//####### Scripts show.blade.php

$(document).ready(function(){

		$('#saberdepartamentoAcademico').click(function () {
	
		var departamento=document.getElementById('saberdepartamentoAcademico').value;
	

		var request=$.ajax({

							url : "listsaber",
							type : "POST",
							data : { depa : departamento },
							dataType : "html"

						});
		request.done(function(msg){ $('.table').html(msg).appendTo('section'); });


		});

		$('#data').dataTable();
});



/*
|--------------------------------------------------------------------------
*/
