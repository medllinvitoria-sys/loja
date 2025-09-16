<?php
    class TipoProdutoDAO {
        public function create($TipoProduto) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO TipoProduto(id_tipo_produto, descricao) 
                     VALUES (:c, :r, :e, :t)"
                );
                $query->bindValue(':c',$TipoProduto->getTipoProduto(), PDO::PARAM_STR);
                $query->bindValue(':r',$TipoProduto->getdescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM TipoProduto");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $TipoProduto = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $TipoProduto = new TipoProduto();
                    $TipoProduto->setIdTipoProduto($linha['id_tipo_produto']);
                    $TipoProduto->setDescricao($linha['descricao']);
                
                    array_push($TipoProduto);
                }

                return $TipoProduto;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }