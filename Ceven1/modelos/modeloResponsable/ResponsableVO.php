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
class ResponsableVO {
    
    private $eventos_eveId;
    private $persona_perId;
    private $resEstado;
    
    function getEventos_eveId() {
        return $this->eventos_eveId;
    }

    function getPersona_perId() {
        return $this->persona_perId;
    }

    function getResEstado() {
        return $this->resEstado;
    }

    function setEventos_eveId($eventos_eveId) {
        $this->eventos_eveId = $eventos_eveId;
    }

    function setPersona_perId($persona_perId) {
        $this->persona_perId = $persona_perId;
    }

    function setResEstado($resEstado) {
        $this->resEstado = $resEstado;
    }

}


