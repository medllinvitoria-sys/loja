<?php
    class UsuarioDAO {
        public function create($Usuario) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO usuario(cnpj,razao_social,email,telefone) 
                     VALUES (:c, :r, :e, :t)"
                );
                $query->bindValue(':c',$usuario->getId_usuario(), PDO::PARAM_STR);
                $query->bindValue(':r',$usuario->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':e',$usuario->getSenha(), PDO::PARAM_STR);
              
                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuario");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $usuario = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $usuario = new usuario();
                    $usuario->setId_usuario($linha['id_usuario']);
                    $usuario->setEmail($linha['email']);
                    $usuario->setSenha($linha['senha']);

                    array_push($usuario,$usuario);
                }

                return $usuario;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }