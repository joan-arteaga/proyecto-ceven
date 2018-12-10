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
class GestionVO {
    
    private $eveEstado;
    private $eveId;
    private $eveFechaInicial;
    private $eveCantidadPax;
    private $Servicios_serId;
    private $serNombre;
    private $Eventos_Clientes_cliDocumento;
    private $cliNombre;
    private $cliApellido1;
    private $cliApellido2;
    private $persona_perId;
    private $perDocumento;
    private $perNombre;
    private $perApellido;
    private $rolNombre;
    
    
    function getEveEstado() {
        return $this->eveEstado;
    }

    function getEveId() {
        return $this->eveId;
    }

    function getEveFechaInicial() {
        return $this->eveFechaInicial;
    }

    function getEveCantidadPax() {
        return $this->eveCantidadPax;
    }

    function getSerNombre() {
        return $this->serNombre;
    }

    function getEventos_Clientes_cliDocumento() {
        return $this->Eventos_Clientes_cliDocumento;
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

    function getPersona_perId() {
        return $this->persona_perId;
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

    function getRolNombre() {
        return $this->rolNombre;
    }

    function setEveEstado($eveEstado) {
        $this->eveEstado = $eveEstado;
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

    function setSerNombre($serNombre) {
        $this->serNombre = $serNombre;
    }

    function setEventos_Clientes_cliDocumento($Eventos_Clientes_cliDocumento) {
        $this->Eventos_Clientes_cliDocumento = $Eventos_Clientes_cliDocumento;
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

    function setPersona_perId($persona_perId) {
        $this->persona_perId = $persona_perId;
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

    function setRolNombre($rolNombre) {
        $this->rolNombre = $rolNombre;
    }

}


