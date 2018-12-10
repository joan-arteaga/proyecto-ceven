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
class Persona_1VO {
    
    private $perId;
    private $perDocumento;
    private $perNombre;
    private $perApellido;
    private $perEstado;
 
    
    function getPerId() {
        return $this->perId;
    }

    function getPerDocumento() {
        return $this->perDocumento;
    }

    function getPerNombre() {
        return $this->perNombre;
    }

    function getPerApellido() {
        return $this->perApellido;
    }

    function getPerEstado() {
        return $this->perEstado;
    }

    function setPerId($perId) {
        $this->perId = $perId;
    }

    function setPerDocumento($perDocumento) {
        $this->perDocumento = $perDocumento;
    }

    function setPerNombre($perNombre) {
        $this->perNombre = $perNombre;
    }

    function setPerApellido($perApellido) {
        $this->perApellido = $perApellido;
    }

    function setPerEstado($perEstado) {
        $this->perEstado = $perEstado;
    }

        //put your code here
    
}


