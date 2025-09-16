<?php
    class ClienteDAO {
        public function create($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO cliente(cnpj,razao_social,email,telefone) 
                     VALUES (:c, :r, :e, :t)"
                );
                $query->bindValue(':c',$cliente->getIdCliente(), PDO::PARAM_STR);
                $query->bindValue(':r',$cliente->getNome(), PDO::PARAM_STR);
                $query->bindValue(':r',$cliente->getCpf(), PDO::PARAM_STR);
                $query->bindValue(':e',$cliente->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':t',$cliente->getTelefone(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $cliente = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $cliente = new Fornecedor();
                    $cliente->setId_Cliente($linha['setid_cliente']);
                    $cliente->setNome($linha['nome']);
                    $cliente->setCpf($linha['cpf']);
                    $cliente->setEmail($linha['email']);
                    $cliente->setTelefone($linha['telefone']);

                    array_push($cliente,$cliente);
                }

                return $cliente;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }