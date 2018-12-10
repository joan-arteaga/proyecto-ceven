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
class ClientesVO {
    
    private $cliDocumento;
    private $cliNombre;
    private $cliApellido1;
    private $cliApellido2;
    private $cliFechaNacimiento;
    private $cliGenero;
    private $cliEstado;
 
    function getCliDocumento() {
        return $this->cliDocumento;
    }

    function getCliNombre() {
        return $this->cliNombre;
    }

    function getCliApellido1() {
        return $this->cliApellido1;
    }

    function getCliApellido2() {
        return $this->cliApellido2;
    }

    function getCliFechaNacimiento() {
        return $this->cliFechaNacimiento;
    }

    function getCliGenero() {
        return $this->cliGenero;
    }

    function getCliEstado() {
        return $this->cliEstado;
    }

    function setCliDocumento($cliDocumento) {
        $this->cliDocumento = $cliDocumento;
    }

    function setCliNombre($cliNombre) {
        $this->cliNombre = $cliNombre;
    }

    function setCliApellido1($cliApellido1) {
        $this->cliApellido1 = $cliApellido1;
    }

    function setCliApellido2($cliApellido2) {
        $this->cliApellido2 = $cliApellido2;
    }

    function setCliFechaNacimiento($cliFechaNacimiento) {
        $this->cliFechaNacimiento = $cliFechaNacimiento;
    }

    function setCliGenero($cliGenero) {
        $this->cliGenero = $cliGenero;
    }

    function setCliEstado($cliEstado) {
        $this->cliEstado = $cliEstado;
    }

        //put your code here
    
    
}


