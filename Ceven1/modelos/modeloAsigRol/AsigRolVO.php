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
class AsigRolVO {
    
    private $id_usuario_s;
    private $id_rol;
    private $estado;
      
    function getId_usuario_s() {
        return $this->id_usuario_s;
    }

    function getId_rol() {
        return $this->id_rol;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_usuario_s($id_usuario_s) {
        $this->id_usuario_s = $id_usuario_s;
    }

    function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

}


