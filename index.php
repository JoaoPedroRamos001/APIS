<!--inclui a cabeça comum do site que tem elementos HTML-->
<?php include 'includes/header.php'; ?>

<!--container principal que centraliza o conteúdo -->
<div class="container">

    <h1>Trabalho APIs</h1>
    
    <div class="card-container">
        <!--primeiro card-APIs de países -->
        <div class="card">
            <!--imagem para a seção de países -->
            <img src="imagens/Países.jpg" alt="Países">
            <!--conteúdo do card -->
            <div class="card-content">
                <h2>APIs de Países</h2>
                <p>Descubra informações sobre países do mundo todo.</p>
                <!--botão/link para a página de países -->
                <a href="paises.php" class="btn">Explorar Países</a>
            </div>
        </div>

        <!--segundo card-APIs de livros -->
        <div class="card">
            <!--imagem para a seção de livros -->
            <img src="imagens/Biblioteca.jpg" alt="Livros">
            <!--conteúdo do card -->
            <div class="card-content">
                <h2>APIs de Livros</h2>
                <p>Pesquise livros e descubra novos títulos.</p>
                <!--botão/link para a página de livros -->
                <a href="livros.php" class="btn">Pesquisar Livros</a>
            </div>
        </div>
    </div>
</div>

<!--inclui o rodape comum do site -->
<?php include 'includes/footer.php'; ?>