<?php
    require "../../autoload.php";

    // Construir o objeto do cliente
    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);

    // Inserir no Banco de Dados
    $dao = new ClienteDAO();
    $dao->create($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');