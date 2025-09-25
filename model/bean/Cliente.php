<?php
    class Cliente {
        // Atributos
        private $id_cliente;
        private $nome;
        private $cpf;
        private $email;
        private $telefone;

                // Métodos
        public function getId_cliente() {
            return $this->id_cliente;
        }

        public function setId($id_cliente) {
            $this->id_cliente = $id_cliente;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
    }
