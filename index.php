<?php
// LDDOC-AUTHOR: ING. EMMANUEL RAMIREZ 
// LDDOC-ALIAS: EHYPERGROWTH
// LDDOC-EMAIL: emmanuelramirez@lindevelop.com, developer@ehypergrowth.com
// LDDOC-WEBSITE: https://lindevelop.com/products/linPhpKernel
// LDDOC-DATESTART: FECHA DE CREACION: 23/06/2018
// LDDOC-DATEREPOSITORI: FECHA EN QUE SE CREO UN REPOSITORIO OFICIAL: 12/09/2022

include('kernel/ldKernelSystem.php');
session_start();

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $path = dirname(__FILE__);
    $appPath = $path . '/mvc/controllers/ldevelopSystem.php';

    if (file_exists($appPath)) {
        $module = new lindebKernel();
        $module->ldInclude('/../libs/inputFilter/class.inputfilter.php');
        $route = $module->route($_GET);

        include($appPath);

        $start = new startSystem($route[0]);
    } else {
        echo 'The Library not found! Error: 404 Library Master ' . htmlspecialchars($appPath, ENT_QUOTES, 'UTF-8');
    }
} else {
    $hostDomain = $_SERVER['HTTP_HOST'];
    header("Location: https://$hostDomain/" . htmlspecialchars($module->route[0], ENT_QUOTES, 'UTF-8'));
    exit(); // Asegurarse de que el script se detiene después de la redirección.
}
?>
