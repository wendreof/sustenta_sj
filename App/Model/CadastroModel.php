<?php

    namespace App\Model;

    class CadastroModel{
        private $DEN_TITULO;
        private $DEN_DESCRICAO;
        private $DEN_FOTO_VIDEO;
        private $DEN_RUA;
        private $DEN_NUMERO;
        private $DEN_BAIRRO;
        private $DEN_COMPLEMENTO;

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }