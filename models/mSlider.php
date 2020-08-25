<?php

//
date_default_timezone_set('America/Bogota');

class slider {

    //
    function cargarTablaSliders() {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "select s.sli_id, s.sli_nombre, s.sli_imagen,"
                . " s.sli_estado, s.sli_url, s.emp_id, se.sec_nombre from slider s join "
                . "sector se on s.sec_id = se.sec_id order by s.sli_id asc");
        //
        $datos = array();
        //
        if (mysqli_num_rows($rsp) > 0) {
            //
            $fila = 0;
            //
            while ($row = mysqli_fetch_assoc($rsp)) {
                //
                $idEmp = (int) $row['emp_id'];
                $empresa = '';
                //
                if ($idEmp > 0) {
                    //
                    $rspE = mysqli_query($con, "select emp_nombre from empresa "
                            . "where emp_id  = $idEmp");
                    //
                    if (mysqli_num_rows($rspE) > 0) {
                        //
                        $rowE = mysqli_fetch_assoc($rspE);
                        //
                        $empresa = $rowE['emp_nombre'];
                    }
                }
                //
                $datos['data'][$fila] = array(
                    'sql' => 1,
                    'idSli' => $row['sli_id'],
                    'nombre' => $row['sli_nombre'],
                    'imagen' => $row['sli_imagen'],
                    'url' => $row['sli_url'],
                    'estado' => $row['sli_estado'],
                    'sector' => $row['sec_nombre'],
                    'empresa' => $empresa
                );
                //
                $fila++;
            }
            //
            return $datos;
        } else {
            return $datos['data'][0] = array('sql' => 0);
        }
    }

    //
    function actualizarEstadoSlider($idSli) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rspE = mysqli_query($con, "select sli_estado from slider where sli_id"
                . " = $idSli");
        //
        if (mysqli_num_rows($rspE) > 0) {
            //
            $row = mysqli_fetch_assoc($rspE);
            //
            $sql = '';
            //
            if ($row['sli_estado'] === 'Inactiva') {
                //
                $sql = "update slider set sli_estado = 'Activa' where sli_id "
                        . "= $idSli";
            } else {
                //
                $sql = "update slider set sli_estado = 'Inactiva' where sli_id"
                        . " = $idSli";
            }
            //
            $rsp = mysqli_query($con, $sql);
            //
            if ($rsp) {
                //
                return $rspA[0] = array('sql' => 1, 'estado' => $row['sli_estado']);
            } else {
                //
                return $rspA[0] = array('sql' => 0);
            }
        }
    }

    //
    function guardarSlider($nombre, $sector, $url, $empresa, $imagen) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "insert into slider values (null, "
                . "'$nombre', '$imagen', 'Activa', $sector, '$url', $empresa)");
        //
        return $rsp;
    }

    //
    function cargarSlideraEditar($idSli) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "SELECT sli_nombre, sli_imagen, sec_id, "
                . "sli_url, emp_id from slider where sli_id = $idSli");
        //
        $datos = array();
        //
        if (mysqli_num_rows($rsp) > 0) {
            //
            $row = mysqli_fetch_assoc($rsp);
            //
            $datos[0] = array(
                'sql' => 1,
                'nombre' => $row['sli_nombre'],
                'imagen' => $row['sli_imagen'],
                'idSec' => $row['sec_id'],
                'url' => $row['sli_url'],
                'idEmp' => $row['emp_id']
            );
            //
            return $datos;
        } else {
            return $datos[0] = array('sql' => 0);
        }
    }

    //
    function editarSlider($idSli, $nombre, $sector, $url, $empresa, $imagen) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "update slider set sli_nombre = '$nombre', "
                . "sli_imagen = '$imagen', sec_id = $sector, sli_url = '$url', "
                . "emp_id = $empresa where sli_id = $idSli");
        //
        if ($rsp) {
            //
            return 1;
        } else {
            //
            return 2;
        }
    }

}
