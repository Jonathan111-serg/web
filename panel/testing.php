
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'Recursos/BD.php';

require_once 'Recursos/empresa.php';


if($_SERVER["REQUEST_METHOD"] == "GET"){

	if(isset($_GET['dinero']) && isset($_GET['plazos']) && isset($_GET['steamID'])){

		$empresa = new Empresa($_GET['steamID'], "VictorMinemu");
		$test = $empresa->nuevoPrestamo($_GET['dinero'], $_GET['plazos']);


	}


	
}




//$test = $empresa->nuevoPrestamo(58000, 5);
//$test = $empresa->nuevoPrestamo(1000000, 5);
//$test = $empresa->nuevoPrestamo(200000, 5);


/**

testing.php?steamID=steam:11000010a908ac7&dinero=10000&plazos=1

[{"identifier":"steam:11000010a908ac7","activo":1,"cantidad":200000,"totalAPagar":240000,"plazos":5,"NUMpago":0,"totalPagado":0,"inicio":6,"ultimo":"0","pendiente":false},{"identifier":"steam:11000010a908ac7","activo":1,"cantidad":1000000,"totalAPagar":1200000,"plazos":5,"NUMpago":0,"totalPagado":0,"inicio":3,"ultimo":"15","pendiente":false},{"identifier":"steam:11000010a908ac7","activo":1,"cantidad":58000,"totalAPagar":69600,"plazos":5,"NUMpago":4,"totalPagado":0,"inicio":0,"ultimo":"0","pendiente":false}]

$pago['identifier'] = $steamID;
			$pago['activo'] = 1;
			$pago['cantidad'] = $cantidad;
			$pago['totalAPagar']= $cantidad*1.2;
			$pago['plazos'] = $plazos;
			$pago['NUMpago'] = 0;
			$pago['totalPagado'] = 0;
			$pago['inicio']= $timestamp;
			$pago['ultimo'] = "0";
			$pago['pendiente'] = false;

*/

/**

$timestamp = time();
//$datos = seleccionar_BD("SELECT * FROM datastore_data WHERE name = 'banco'");


foreach ($datos as $dato) {
	# code...
	$data = array();
	if (!isset($dato['data'])) {
		# code...
		return;
	}
	$json = $dato['data'];

	$prestamos = json_decode($json, TRUE);


	foreach ($prestamos as $prestamo) {
		# code...
		
		if ($prestamo['activo'] == 1) {
			# code...

			if ($prestamo['ultimo'] != '0') {
				# code...
				$ultimopago = $prestamo['ultimo'];
			}else{
				$ultimopago = $prestamo['inicio'];
			}

			$diferencia = time() - $ultimopago;

			if ($diferencia > 86400) {
				# code...
				$empresa = new Empresa($prestamo['identifier']);
				$data[] = $empresa->pagar($prestamo);

			}else{
				$data[] = $prestamo;
			}


		}
	}

	$steamID = $dato['owner'];
	$jsonnew = json_encode($data);
	print_r($jsonnew);
	$request = request_BD("UPDATE datastore_data SET data='$jsonnew' WHERE owner = '$steamID' AND name = 'banco'");
	

}

*/


/**
		foreach ($datos as $dato) {
			# code...
			print_r($dato);
			$prestamos = json_decode($dato['data'], true);
			echo count($prestamos);
			$nuevosPrestamos = array();
			if (count($prestamos)>0) {

				# code...
				foreach ($prestamos as $prestamo) {
					# code...
					echo("lol");

					if ($prestamo['activo']) {
							# code...
						echo("lol2");
						$empresa = new Empresa($prestamo['identifier']);
						
						if ($prestamo['NUMpago'] >0) {
						# code...
							if (($timestamp - $prestamo['ultimo']) >= 86400) {
								# code...
								$data = $empresa->pagar($prestamo);
								print_r($data);
								echo "DEBUG1";
							}
						}elseif ($prestamo['NUMpago'] == 0) {
							# code...
							if (($timestamp - $prestamo['inicio']) >= 86400) {
								# code...
								$data = $empresa->pagar($prestamo);
								print_r($data);
								echo "DEBUG2";
							}
						}elseif($prestamo['NUMpago'] == $prestamo['plazos']){
							if (($timestamp - $prestamo['inicio'] )>= 86400) {
								# code...
								$data = $empresa->pagar($prestamo);
								$data['activo'] = false;
								echo "DEBUG3";
								print_r($data);
							}
								
						}else{
							$data = $prestamo;
							print_r($data);
							echo "DEBUG4";
						}
						
					}else{
						$data = $prestamo;
						echo "DEBUG5";
					}
					

					$nuevosPrestamos[] = $data
					;
					

				}
			}
			echo "OUTPUT";
			print_r($data);
			$steamID = $dato['owner'];
			$nuevosPrestamos = json_encode($nuevosPrestamos);
			$request = request_BD("UPDATE datastore_data SET data='$nuevosPrestamos' WHERE owner = '$steamID' AND name = 'banco'");
		}
		*/


/**
require_once 'Recursos/propiedades.php';

$propiedad = new Propiedad("steam:11000010a908ac7", "VictorMinemu");


		//print_r($propiedad->isOnline());


		print_r($propiedad);
		
		$test = $propiedad->modificarINV('water', 250);

		print_r($test);

	
*/

?>


