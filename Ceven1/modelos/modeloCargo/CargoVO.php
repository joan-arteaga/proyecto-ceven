<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LibroVO
 *
 * @author AdministradorH
 */
class CargoVO {
    
    private $rolId;
    private $rolNombre;
    private $rolDescripcion;
    private $rolEstado;

    function getRolId() {
        return $this->rolId;
    }

    function getRolNombre() {
        return $this->rolNombre;
    }

    function getRolDescripcion() {
        return $this->rolDescripcion;
    }

    function getRolEstado() {
        return $this->rolEstado;
    }

    function setRolId($rolId) {
        $this->rolId = $rolId;
    }

    function setRolNombre($rolNombre) {
        $this->rolNombre = $rolNombre;
    }

    function setRolDescripcion($rolDescripcion) {
        $this->rolDescripcion = $rolDescripcion;
    }

    function setRolEstado($rolEstado) {
        $this->rolEstado = $rolEstado;
    }

        //put your code her
 
    
}


