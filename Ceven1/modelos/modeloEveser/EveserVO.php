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
class EveserVO {
    
    private $Eventos_eveId;
    private $Eventos_Clientes_cliDocumento;
    private $Servicios_serId;
    private $evsEstado;
    
    function getEventos_eveId() {
        return $this->Eventos_eveId;
    }

    function getEventos_Clientes_cliDocumento() {
        return $this->Eventos_Clientes_cliDocumento;
    }

    function getServicios_serId() {
        return $this->Servicios_serId;
    }

    function getEvsEstado() {
        return $this->evsEstado;
    }

    function setEventos_eveId($Eventos_eveId) {
        $this->Eventos_eveId = $Eventos_eveId;
    }

    function setEventos_Clientes_cliDocumento($Eventos_Clientes_cliDocumento) {
        $this->Eventos_Clientes_cliDocumento = $Eventos_Clientes_cliDocumento;
    }

    function setServicios_serId($Servicios_serId) {
        $this->Servicios_serId = $Servicios_serId;
    }

    function setEvsEstado($evsEstado) {
        $this->evsEstado = $evsEstado;
    }

}


