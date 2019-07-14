<?php 
	include("funciones.php");
	$DATA     = json_decode($_POST['data']);
	
	$nombre_cuestionario = $DATA[0][0];
	$id_modulo = $DATA[0][1];

	consulta_gen("INSERT INTO cuestionario(id_modulo,nombre,posicion) values('$id_modulo','$nombre_cuestionario','0')");
	$id_cuestionario = consulta_txt("SELECT id_cuestionario FROM cuestionario WHERE nombre='$nombre_cuestionario'","id_cuestionario");
	for ($i=0; $i < count($DATA[1]); $i++) {
		$pregunta = $DATA[1][$i]->pregunta;
		$opcion_a = $DATA[1][$i]->opcion_a;
		$opcion_b = $DATA[1][$i]->opcion_b;
	    $opcion_c = $DATA[1][$i]->opcion_c;
		$opcion_d = $DATA[1][$i]->opcion_d;
		$opcion_e = $DATA[1][$i]->opcion_e;
		$correcto = $DATA[1][$i]->correcto;

		consulta_gen("INSERT INTO preguntas(id_cuestionario,pregunta,opcion_a,opcion_b,opcion_c,opcion_d,opcion_e,correcto) VALUES('$id_cuestionario','$pregunta','$opcion_a','$opcion_b','$opcion_c','$opcion_d','$opcion_e','$correcto')");
		echo "Subido exitosamente";

		echo htmlspecialchars('
			<div class="pregunta actual"> 
                                                <p class="pregunta_texto">
                                                    <strong><span class="numerito"></span> Primera pregunta</strong>
                                                </p>
                                              
                                                <p class="inciso" > 
                                                    <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp; 
                                                    a) Pregunta uno 
                                                </p>
                                              
                                                <p class="inciso" >
                                                    <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp; 
                                                    b) Pregunto dos
                                                </p>
                                                <p class="inciso" >
                                                    <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp; 
                                                    c) Pregunta tres
                                                </p>
                                              
                                                <p class="inciso " data="este">
                                                    <i class="fa fa-circle-o" style="font-size: .8em"></i>&nbsp; 
                                                    d) Pregunta cuatro correcta
                                                </p> 

                                            </div>

		');  
	}
?>