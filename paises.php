<?php include 'includes/header.php';

$paisesTraducao = [
    'alemanha' => 'germany',
    'brasil' => 'brazil',
    'espanha' => 'spain',
    'estados unidos' => 'united states',
    'França' => 'france',
    'holanda' => 'netherlands',
    'Inglaterra' => 'united kingdom', 
    'Japão' => 'japan',
    'portugal' => 'portugal',
    'italia' => 'italy',
    'china' => 'china',
    'russia' => 'russia',
    'méxico' => 'mexico',
    'canadá' => 'canada',
    'austrália' => 'australia',
    'paraguai' => 'paraguay',
    'uruguai' => 'uruguay',
];

//função para traduzir o nome do país
function traduzirPais($nome) {
    global $paisesTraducao;
    $nomeLower = strtolower(trim($nome));
    return isset($paisesTraducao[$nomeLower]) ? $paisesTraducao[$nomeLower] : $nome;
}

$resultado = '';
//verifica se foi feita uma busca
if (isset($_GET['pais']) && !empty($_GET['pais'])) {
    $paisTraduzido = traduzirPais($_GET['pais']);
    $url = "https://restcountries.com/v3.1/name/" . urlencode($paisTraduzido);
    
    //faz a requisição à API
    $response = @file_get_contents($url);
    
    if ($response !== false) {
        $data = json_decode($response, true);
        if (isset($data[0])) {
            //extrai as informações do país
            $pais = $data[0];
            $populacao = number_format($pais['population'], 0, ',', '.');
            $bandeira = $pais['flags']['png']; //url da bandeira 
            $resultado = "
                <h2>{$pais['name']['common']}</h2>
                <img src='{$bandeira}' alt='Bandeira de {$pais['name']['common']}' class='bandeira-pais'>
                <p><strong>Capital:</strong> " . ($pais['capital'][0] ?? 'Não disponível') . "</p>
                <p><strong>População:</strong> {$populacao} habitantes</p>
            ";
        } else {
            $resultado = "<p>País não encontrado.</p>";
        }
    } else {
        $resultado = "<p>Erro ao buscar informações do país.</p>";
    }
}
?>

<div class="container">
    <h1>Explorador de Países</h1>

    <div class="search-container">
        <!--div para exibir mensagens de erro-->
        <div id="error-message" class="error-message"></div>
        
        <!--formulário de busca-->
        <form method="GET" action="" class="search-form">
            <div class="input-group">
                <input type="text" 
                       name="pais" 
                       id="paisInput" 
                       placeholder="Digite o nome do país..." 
                       value="<?php echo isset($_GET['pais']) ? htmlspecialchars($_GET['pais']) : ''; ?>">
                <button type="submit" id="buscarPais">Buscar</button>
            </div>
        </form>

        <!--exibe o resultado da busca-->
        <?php if ($resultado): ?>
            <div class="card-container">
                <div class="card resultado-card">
                    <div class="card-content">
                        <?php echo $resultado; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    
    </div>
</div>

<?php include 'includes/footer.php'; ?>