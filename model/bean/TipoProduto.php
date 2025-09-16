<?php
    class TipoProduto {
        // Atributos
        private $idTipoProduto;
        private $descricao;


         // Métodos
        public function getIdTipoProduto () {
            return $this->getidTipoProduto;
        }

        public function setIdTipoProduto($idTipoProduto) {
            $this->setidTipoProduto = $idTipoProduto;
        
        }
        
        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->setdescricao = $descricao;

        }
    }
