<?php
    require "../../autoload.php";

    // Construir o objeto do Fornecedor
    $fornecedor = new fornecedor();
    $fornecedor->setCnpj($_POST['cnpj']);
    $fornecedor->setRazaoSocial($_POST['razao_social']);
    $fornecedor->setEmail($_POST['email']);
    $fornecedor->setTelefone($_POST['telefone']);
  

    // Atualizar registro no Banco de Dados
    $dao = new FornecedorDAO();
    $dao->update($fornecedor);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');