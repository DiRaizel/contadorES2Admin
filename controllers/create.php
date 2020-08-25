<?php

//
require '../models/mUsuario.php';
require '../models/mEmpresa.php';
require '../models/mSede.php';
require '../models/mSlider.php';

//
$mUsuario = new usuario();
$mEmpresa = new empresa();
$mSede = new sede();
$mSlider = new slider();

//
if ($_POST['accion'] === 'guardarUsuario') {
    //
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $empresa = $_POST['empresa'];
    $sede = $_POST['sede'];
    $password = base64_encode($_POST['password']);
    //
    $rsp = $mUsuario->guardarUsuario($nombres, $apellidos, $documento, $correo, $rol, $empresa, $sede, $password);
    //
    if ($rsp) {
        //
        echo 1;
    } else {
        //
        echo 2;
    }
} else if ($_POST['accion'] === 'guardarEmpresa') {
    //
    $nombre = $_POST['nombre'];
    $nit = $_POST['nit'];
    $ciudad = $_POST['ciudad'];
    $sector = $_POST['sector'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    //
    $rsp = $mEmpresa->guardarEmpresa($nombre, $nit, $ciudad, $sector, $correo, $password);
    //
    if ($rsp) {
        //
        echo 1;
    } else {
        //
        echo 2;
    }
    //
} else if ($_POST['accion'] === 'guardarSede') {
    //
    $idUsu = (int) $_POST['idUsu'];
    //
    $empresa = 0;
    //
    if ($idUsu !== 1) {
        //
        $empresa = $_POST['idEmp'];
    } else {
        //
        $empresa = $_POST['empresa'];
    }
    //
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    //
    $rsp = $mSede->guardarSede($nombre, $empresa, $ciudad);
    //
    if ($rsp) {
        //
        echo 1;
    } else {
        //
        echo 2;
    }
    //
} else if ($_POST['accion'] === 'guardarConfigSede') {
    //
    $idSed = $_POST['idSed'];
    $idEmp = $_POST['idEmp'];
    $max = $_POST['max'];
    //
    $rsp = $mSede->guardarConfigSede($idSed, $idEmp, $max);
    //
    if ($rsp) {
        //
        echo 1;
    } else {
        //
        echo 2;
    }
}else if ($_POST['accion'] === 'guardarSlider') {
    //
    $file = $_FILES['file'];
    $temp = $_FILES['file']['tmp_name'];
    $imagen = '';
    //
    if ($temp !== '') {
        //
        $ext = '';
        switch ($_FILES['file']['type']) {
            case 'image/jpeg':
                $ext = '.jpg';
                break;
            case 'image/gif':
                $ext = '.gif';
                break;
            case 'image/png':
                $ext = '.png';
                break;
        }
        //
        $imagen = time() . $ext;
    }
    //
    $nombre = $_POST['nombre'];
    $sector= $_POST['sector'];
    $url = $_POST['url'];
    $empresa = $_POST['empresa'];
    //
    $rsp = $mSlider->guardarSlider($nombre, $sector, $url, $empresa, $imagen);
    //
    if ($rsp) {
        //
        if ($imagen !== '') {
            //
            $ruta = "../imagenes/sliders/" . $imagen;
            //
            if (move_uploaded_file($temp, $ruta)) {
                //
                echo 1;
            } else {
                //
                echo 3;
            }
        } else {
            //
            echo 1;
        }
    } else {
        //
        echo 2;
    }
    //
}