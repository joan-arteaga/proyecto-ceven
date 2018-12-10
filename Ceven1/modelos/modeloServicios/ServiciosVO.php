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
class ServiciosVO {
    
    private $serId;
    private $serNombre;
    private $serDescripcion;
    private $serEstado;
 
    function getSerId() {
        return $this->serId;
    }

    function getSerNombre() {
        return $this->serNombre;
    }

    function getSerDescripcion() {
        return $this->serDescripcion;
    }

    function getSerEstado() {
        return $this->serEstado;
    }

    function setSerId($serId) {
        $this->serId = $serId;
    }

    function setSerNombre($serNombre) {
        $this->serNombre = $serNombre;
    }

    function setSerDescripcion($serDescripcion) {
        $this->serDescripcion = $serDescripcion;
    }

    function setSerEstado($serEstado) {
        $this->serEstado = $serEstado;
    }

}


