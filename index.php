<?php
include('kernel/ldKernelSystem.php');
session_start();
if ($_SERVER['HTTPS'] == 'on') {										//LDDOC: Validamos que este entrando por HTTPS
	$Path = dirname( __FILE__ );										//LDDOC: OBTENEMOS DIRECTORIO RAÍZ
	$App = ''. $Path .'/mvc/controllers/ldevelopSystem.php';			//LDDOC: Dirección del archivo matriz de la APP
	if (file_exists($App)) {											//Verificamos que la librería matriz exista
	        # code...
			$module = new lindebKernel();
			$module->ldInclude('/../libs/inputFilter/class.inputfilter.php');
			$route = $module->route($_GET);
	        include($App);												//LDDOC: Si la librería existe incluirla 
			$start = New startSystem($route[0]);						//LDDOC: Iniciar la clase matriz del sistema con el constructor automático
	}else{																//LDDOC: Si la librería no existe mostramos mensaje de inexistencia de librería
		//echo 'La libreria no existe ' . $App;
		echo 'The Library not found! Error: 404 Lybrary Master ', $App;	//LDDOC: Mostremos un mensaje de error en la carga de la librería
	}
}else{
	$hostDomain = $_SERVER['HTTP_HOST'];
	header("Location: https://$hostDomain/$module->route[0]");			//LDDOC: De no entrar por HTTPS forzamos la entrada redireccionando con HTTPS
	//echo 'error no ssl';
}
?>