<?php
include("store.jmequipos.com/conexion.php");

// Servicio a consumir por PHP
$service_url = 'http://www.zonapagos.com/Apis_CicloPago/api/VerificacionPago/';

$filtro = '';
if(is_numeric($_GET["idPay"])){$filtro .= " OR respz_pedido='".$_GET["idPay"]."'";}

$pagosPendientesConsulta = mysqli_query($conexion,"SELECT * FROM store_respuesta_pasarela
WHERE (respz_estado=999 OR respz_estado=4001 OR respz_estado IS NULL) $filtro");

while($pagosPendientes = mysqli_fetch_array($pagosPendientesConsulta)){
	
        // Creación de la data.
        $data_post = array (
			'int_id_comercio'=> 24497,
			'str_usr_comercio' => 'Jmendoza24497',
			'str_pwd_Comercio' => 'Jmendoza24497',
			'str_id_pago' => $pagosPendientes['respz_pedido'],
			'int_no_pago' => -1,
		); 


        // Impresión de la data en formato JSON.
		
        echo "<pre>";
        echo "<br>Requested Params: ";
        print_r(json_encode($data_post)); 
		

        $options = array(
            'http' => array(
				'header'  => "Content-type: application/json",
				'method'  => 'POST',
				'content' => json_encode($data_post),
            )
        );

        $context  = stream_context_create($options);

         echo "<pre>";
         echo "<br>Contexto: ";
         print_r(json_encode($options)); 

        $result = file_get_contents($service_url, false, $context);
        
		var_dump($result);
		
		
        echo "<pre>";
        echo "<br>Respuesta Servicio: ";
        print_r($result); 
		echo "<br><br>";
		
		
		$jsonObject = json_decode($result);
		foreach ($jsonObject as $k=>$v){
			echo "$k : $v\n";
			if($k==='str_res_pago'){
				$datosPago = explode("|", $v);
				echo trim($datosPago[1]);
				
				//if(trim($datosPago[4])!=999 and trim($datosPago[4])!=4001){

					mysqli_query($conexion,"UPDATE store_respuesta_pasarela SET respz_estado='".trim($datosPago[4])."', respz_transaccion='".trim($datosPago[1])."', respz_forma_pago='".trim($datosPago[20])."'
					WHERE respz_pedido='".$pagosPendientes['respz_pedido']."'
					");
					//if(mysqli_errno()!=0){echo mysqli_error(); exit();}	

				//}
				
			}
		}
}
?>

<script>
	window.close();
</script>
