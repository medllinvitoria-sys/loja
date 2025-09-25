<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                'mysql:host=localhost;dbname=bd loja_medllin', 
                'root', 
                'root'
            );

            return $conn;
        }
    }