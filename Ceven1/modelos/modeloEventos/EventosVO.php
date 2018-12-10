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
class EventosVO {
    
    private $eveId;
    private $eveFechaInicial;
    private $eveCantidadPax;
    private $Clientes_cliDocumento;
    private $eveEstado;
    
    function getEveId() {
        return $this->eveId;
    }

    function getEveFechaInicial() {
        return $this->eveFechaInicial;
    }

    function getEveCantidadPax() {
        return $this->eveCantidadPax;
    }

    function getClientes_cliDocumento() {
        return $this->Clientes_cliDocumento;
    }

    function getEveEstado() {
        return $this->eveEstado;
    }

    function setEveId($eveId) {
        $this->eveId = $eveId;
    }

    function setEveFechaInicial($eveFechaInicial) {
        $this->eveFechaInicial = $eveFechaInicial;
    }

    function setEveCantidadPax($eveCantidadPax) {
        $this->eveCantidadPax = $eveCantidadPax;
    }

    function setClientes_cliDocumento($Clientes_cliDocumento) {
        $this->Clientes_cliDocumento = $Clientes_cliDocumento;
    }

    function setEveEstado($eveEstado) {
        $this->eveEstado = $eveEstado;
    }

}


