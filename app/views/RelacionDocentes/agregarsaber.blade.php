{{--Muestra el formulario de registro de la unidad curricular de la relacion --}}


<?php
		$resultado=Sabere::where('departamento_id','=',$docente->departamento_id)->get();
		$saberes['']="Seleccione";
		foreach ($resultado as $value) {
					$saberes[$value->codigo]=$value->unidad;
		}
		

		//$saberesdocente=SaberDocente::where('cedulaDocente', '=', $docente->cedula)->get();
?>

		 
				
				@if(!empty($resultado))
						<br><br>
						<p id="mns"></p>
						<h3>Agregar Unidad Curricular</h3>
						<label for="nombresaber"> <strong> Unidad Curricular:</strong>
						{{ Form::select('nombresaber',$saberes,'', ['required', 'id' => 'nombresaber', 'form' => 'o'] ) }}
						</label><br>
						<label><strong>Horas Semanales: <span id="hora"></span></strong></label><br>
						<label><strong> N<sup>o</sup> de Secciones: </strong><input type="number" size="2" name="numeroSecciones" id="numeroSecciones" max="12" min="0" class="numeroSecciones" maxlength="2" required disabled title="solo numeros" /> </label><br>
						<br><input type="button" disabled="" name="" id="agregarsaber" value="Agregar" class="pure-button pure-button-primary">
               			<input type="button" name="" id="closesaber" value="Cerrar" class="pure-button" onclick="quitarCampo();">
						
						<br><br>
				@else

						<h2>No hay Registro de Unidad Curricular</h2>

				@endif
