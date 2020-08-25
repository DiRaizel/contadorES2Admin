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
if ($_POST['accion'] === 'actualizarEstadoUsuario') {
    //
    $idUsu = $_POST['idUsu'];
    //
    $rsp = $mUsuario->actualizarEstadoUsuario($idUsu);
    //
    echo json_encode($rsp);
    //
} else if ($_POST['accion'] === 'actualizarEstadoEmpresa') {
    //
    $idEmp = $_POST['idEmp'];
    //
    $rsp = $mEmpresa->actualizarEstadoEmpresa($idEmp);
    //
    echo json_encode($rsp);
    //
} else if ($_POST['accion'] === 'editarEmpresa') {
    //
    $idEmp = $_POST['idEmp'];
    $nombre = $_POST['nombre'];
    $nit = $_POST['nit'];
    $ciudad = $_POST['ciudad'];
    $sector = $_POST['sector'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    //
    $rsp = $mEmpresa->editarEmpresa($idEmp, $nombre, $nit, $ciudad, $sector, $correo, $password);
    //
    echo json_encode($rsp);
    //
} else if ($_POST['accion'] === 'actualizarEstadoSede') {
    //
    $idSed = $_POST['idSed'];
    //
    $rsp = $mSede->actualizarEstadoSede($idSed);
    //
    echo json_encode($rsp);
    //
} else if ($_POST['accion'] === 'editarSede') {
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
    $idSed = $_POST['idSed'];
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    //
    $rsp = $mSede->editarSede($idSed, $nombre, $empresa, $ciudad);
    //
    echo json_encode($rsp);
    //
} else if ($_POST['accion'] === 'editarUsuario') {
    //
    $idEmp = (int) $_POST['idEmp'];
    $idUsu = $_POST['idUsu'];
    $correoA = $_POST['correoA'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    //
    if ($idEmp != 0) {
        //
        $empresa = $idEmp;
    } else {
        //
        $empresa = $_POST['empresa'];
    }
    //
    $sede = $_POST['sede'];
    $password = base64_encode($_POST['password']);
    //
    $rsp = $mUsuario->editarUsuario($idUsu, $correoA, $nombres, $apellidos, $documento, $correo, $rol, $empresa, $sede, $password);
    //
    echo json_encode($rsp);
    //
}else if ($_POST['accion'] === 'actualizarEstadoSlider') {
    //
    $idSli = $_POST['idSli'];
    //
    $rsp = $mSlider->actualizarEstadoSlider($idSli);
    //
    echo json_encode($rsp);
    //
} else if ($_POST['accion'] === 'editarSlider') {
    //
    $idSli = $_POST['idSli'];
    $imagenA = $_POST['imagenA'];
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
    } else {
        //
        $imagen = $imagenA;
    }
    //
    $nombre = $_POST['nombre'];
    $sector= $_POST['sector'];
    $url = $_POST['url'];
    $empresa = $_POST['empresa'];
    //
    $rsp = $mSlider->editarSlider($idSli, $nombre, $sector, $url, $empresa, $imagen);
    //
    if ($rsp) {
        //
        if ($imagen !== '' && $imagen !== $imagenA) {
            //
            if ($imagenA !== '') {
                //
                unlink("../imagenes/sliders/" . $imagenA);
            }
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