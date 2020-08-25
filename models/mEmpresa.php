<?php

//
date_default_timezone_set('America/Bogota');

class empresa {

    //
    function cargarTablaEmpresas() {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "select e.emp_id, e.emp_nombre, e.emp_nit, "
                . "e.emp_estado, c.ciu_nombre from empresa e join ciudad c on "
                . "e.ciu_id = c.ciu_id order by e.emp_id asc");
        //
        $datos = array();
        //
        if (mysqli_num_rows($rsp) > 0) {
            //
            $fila = 0;
            //
            while ($row = mysqli_fetch_assoc($rsp)) {
                //
                $datos['data'][$fila] = array(
                    'sql' => 1,
                    'idEmp' => $row['emp_id'],
                    'nombre' => $row['emp_nombre'],
                    'nit' => $row['emp_nit'],
                    'ciudad' => $row['ciu_nombre'],
                    'estado' => $row['emp_estado']
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
    function actualizarEstadoEmpresa($idEmp) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rspE = mysqli_query($con, "select emp_estado from empresa where emp_id"
                . " = $idEmp");
        //
        if (mysqli_num_rows($rspE) > 0) {
            //
            $row = mysqli_fetch_assoc($rspE);
            //
            $sql = '';
            //
            if ($row['emp_estado'] === 'Inactiva') {
                //
                $sql = "update empresa set emp_estado = 'Activa' where emp_id "
                        . "= $idEmp";
            } else {
                //
                $sql = "update empresa set emp_estado = 'Inactiva' where emp_id"
                        . " = $idEmp";
            }
            //
            $rsp = mysqli_query($con, $sql);
            //
            if ($rsp) {
                //
                return $rspA[0] = array('sql' => 1, 'estado' => $row['emp_estado']);
            } else {
                //
                return $rspA[0] = array('sql' => 0);
            }
        }
    }

    //
    function guardarEmpresa($nombre, $nit, $ciudad, $sector, $correo, $password) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $passwordE = base64_encode($password);
        //
        $rsp = mysqli_query($con, "insert into empresa values (null, "
                . "'$nombre', '$nit', '$passwordE', '$correo', 'Activa', "
                . "'Normal', $ciudad, $sector)");
        //
        if ($rsp) {
            //
            $idEmp = mysqli_insert_id($con);
            //
            $rspS = mysqli_query($con, "insert into sede values (null, "
                    . "'Principal', 'Activa', $ciudad, $idEmp)");
            //
            return $rspS;
        }
    }

    //
    function cargarEmpresaaEditar($idEmp) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "SELECT e.emp_nombre, e.emp_nit, e.ciu_id, "
                . "e.emp_correo, e.emp_password, e.sec_id, c.dep_id from "
                . "empresa e join ciudad c on e.ciu_id = c.ciu_id"
                . " where emp_id = $idEmp");
        //
        $datos = array();
        //
        if (mysqli_num_rows($rsp) > 0) {
            //
            $row = mysqli_fetch_assoc($rsp);
            //
            $idDep = $row['dep_id'];
            //
            $rspC = mysqli_query($con, "SELECT ciu_id, ciu_nombre from ciudad "
                    . "where dep_id = $idDep and ciu_estado = 1 order by "
                    . "ciu_nombre asc");
            //
            $ciudades = array();
            //
            if (mysqli_num_rows($rsp) > 0) {
                //
                while ($rowC = mysqli_fetch_assoc($rspC)) {
                    //
                    array_push($ciudades, array(
                        'idCiu' => $rowC['ciu_id'],
                        'nombre' => $rowC['ciu_nombre']
                    ));
                }
            }
            //
            $datos[0] = array(
                'sql' => 1,
                'nombre' => $row['emp_nombre'],
                'nit' => $row['emp_nit'],
                'idCiu' => $row['ciu_id'],
                'idDep' => $row['dep_id'],
                'idSec' => $row['sec_id'],
                'correo' => $row['emp_correo'],
                'password' => base64_decode($row['emp_password']),
                'ciudades' => $ciudades
            );
            //
            return $datos;
        } else {
            return $datos[0] = array('sql' => 0);
        }
    }

    //
    function editarEmpresa($idEmp, $nombre, $nit, $ciudad, $sector, $correo, $password) {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $passwordE = base64_encode($password);
        //
        $rsp = mysqli_query($con, "update empresa set emp_nombre = '$nombre', "
                . "emp_nit = '$nit', ciu_id = $ciudad, emp_correo = '$correo', "
                . "sec_id = $sector, emp_password = '$passwordE' where emp_id = $idEmp");
        //
        if ($rsp) {
            //
            return 1;
        } else {
            //
            return 2;
        }
    }

    //
    function cargarSelectEmpresas() {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "SELECT emp_id, emp_nombre from empresa where"
                . " emp_estado = 'Activa' order by emp_nombre asc");
        //
        $datos = array();
        //
        if (mysqli_num_rows($rsp) > 0) {
            //
            while ($row = mysqli_fetch_assoc($rsp)) {
                //
                array_push($datos, array(
                    'sql' => 1,
                    'idEmp' => $row['emp_id'],
                    'nombre' => $row['emp_nombre']
                ));
            }
            //
            return $datos;
        } else {
            return $datos[0] = array('sql' => 0);
        }
    }

    //
    function cargarSelectSectores() {
        //
        require '../models/config.php';
        mysqli_set_charset($con, 'utf8');
        //
        $rsp = mysqli_query($con, "SELECT sec_id, sec_nombre from sector where"
                . " sec_estado = 'Activo' order by sec_nombre asc");
        //
        $datos = array();
        //
        if (mysqli_num_rows($rsp) > 0) {
            //
            while ($row = mysqli_fetch_assoc($rsp)) {
                //
                array_push($datos, array(
                    'sql' => 1,
                    'idSec' => $row['sec_id'],
                    'nombre' => $row['sec_nombre']
                ));
            }
            //
            return $datos;
        } else {
            return $datos[0] = array('sql' => 0);
        }
    }

}
