<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                'mysql:host=localhost;dbname=bd_estoque', 
                'root', 
                'qwe123'
            );

            return $conn;
        }
    }