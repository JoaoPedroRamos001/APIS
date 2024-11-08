<!-- 
    header.php = parte inicial do documento html
    
    este arquivo contém:
    1. link para css no <head>
    2. abertura do <body> com classe dinâmica
    3. cabeçalho do site com menu de navegação
    
    nota: classe do body varia conforme a página atual
    para permitir estilos específicos por página
-->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho APIs</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
</head>
<body class="<?php 
    $page = basename($_SERVER['PHP_SELF']); 
    switch($page) {
        case 'index.php': echo 'page-home'; break;
        case 'paises.php': echo 'page-paises'; break;
        case 'livros.php': echo 'page-livros'; break;
        default: echo 'page-default';
    }
?>">
    <header class="header">
        <nav class="nav">
            <a href="index.php">Início</a>
            <a href="paises.php">Países</a>
            <a href="livros.php">Livros</a>
        </nav>
    </header>