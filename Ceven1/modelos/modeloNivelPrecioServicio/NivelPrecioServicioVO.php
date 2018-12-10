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
class NivelPrecioServicioVO {
    
    private $nivId;
    private $nivPaxMinimo;
    private $nivPaxMaximo;
    private $nivEstado;
    private $nivSerPrecioBase;
    private $nivSerPrecioServicio;
    private $nivSerPorcentajeAumento;
 
    function getNivId() {
        return $this->nivId;
    }

    function getNivPaxMinimo() {
        return $this->nivPaxMinimo;
    }

    function getNivPaxMaximo() {
        return $this->nivPaxMaximo;
    }

    function getNivEstado() {
        return $this->nivEstado;
    }

    function getNivSerPrecioBase() {
        return $this->nivSerPrecioBase;
    }

    function getNivSerPrecioServicio() {
        return $this->nivSerPrecioServicio;
    }

    function getNivSerPorcentajeAumento() {
        return $this->nivSerPorcentajeAumento;
    }

    function setNivId($nivId) {
        $this->nivId = $nivId;
    }

    function setNivPaxMinimo($nivPaxMinimo) {
        $this->nivPaxMinimo = $nivPaxMinimo;
    }

    function setNivPaxMaximo($nivPaxMaximo) {
        $this->nivPaxMaximo = $nivPaxMaximo;
    }

    function setNivEstado($nivEstado) {
        $this->nivEstado = $nivEstado;
    }

    function setNivSerPrecioBase($nivSerPrecioBase) {
        $this->nivSerPrecioBase = $nivSerPrecioBase;
    }

    function setNivSerPrecioServicio($nivSerPrecioServicio) {
        $this->nivSerPrecioServicio = $nivSerPrecioServicio;
    }

    function setNivSerPorcentajeAumento($nivSerPorcentajeAumento) {
        $this->nivSerPorcentajeAumento = $nivSerPorcentajeAumento;
    }

        //put your code here
    
}


