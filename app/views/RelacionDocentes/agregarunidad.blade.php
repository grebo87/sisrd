{{--Muestra el formulario de registro de la unidad curricular de la relacion --}}


<?php
		$resultado=Sabere::where('departamento_id',$docente->departamento_id)->get();
		$saberes['']="Seleccione";
		foreach ($resultado as $value) {
					$saberes[$value->codigo]=$value->unidad;
		}
		

		//$saberesdocente=SaberDocente::where('cedulaDocente', '=', $docente->cedula)->get();
?>

		 
				
				@if(!empty($resultado))
						<form action="guardarsaber" method="post" id="agragaruindad" accept-charset="utf-8">
						<br><br>
						<p id="mns"></p>
						<h3>Agregar Unidad Curricular</h3>
						
							
						
						<label for="nombreunidad"> <strong> Unidad Curricular:</strong>
						{{ Form::select('nombreunidad',$saberes,'', ['required', 'id' => 'nombreunidad', 'form' => 'agragaruindad'] ) }}
						</label><br>
						<label><strong>Horas Semanales: <span id="hora"></span></strong></label><br>
						<label><strong> N<sup>o</sup> de Secciones: </strong><input type="number" size="2" form="agragaruindad" name="numeroSecciones" id="numeroSecciones" max="12" min="0" class="numeroSecciones" maxlength="2" required disabled title="solo numeros" /> </label><br>
						<br><input type="submit" disabled="" name="agregarunidad" id="agregarunidad" value="Agregar" form="agragaruindad" class="pure-button pure-button-primary">
               			<input type="button" name="" id="closesaber" value="Cerrar" class="pure-button" form="agragaruindad" onclick="quitarCampo();">
						<input type="hidden" id="docente_id" name="docente_id" value="{{$docente->id}}"  />
						<input type="hidden" id="relaciondocente" name="relaciondocente" value="{{$relacionDocente->id}}" />
						<br><br>
						</form>
				@else

						<h2>No hay Registro de Unidad Curricular</h2>

				@endif
