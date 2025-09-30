<?php
    require "../../autoload.php";

    // Construir o objeto do cliente
    $cliente = new cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);

    // Atualizar registro no Banco de Dados
    $dao = new ClienteDAO();
    $dao->update($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');