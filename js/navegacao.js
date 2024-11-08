document.addEventListener('DOMContentLoaded', function() {
    const content = document.querySelector('.container');
    const body = document.body;
    
    //seleciona tanto os links da navegação quanto os botões dos cards
    const allNavigationElements = document.querySelectorAll('.nav a, .card .btn');

    function handleNavigation(href) {
        //determina a classe correta do body baseado na página
        let newBodyClass = '';
        switch(href) {
            case 'index.php':
                newBodyClass = 'page-home';
                break;
            case 'paises.php':
                newBodyClass = 'page-paises';
                break;
            case 'livros.php':
                newBodyClass = 'page-livros';
                break;
            default:
                newBodyClass = 'page-default';
        }

        //anima a saída do conteúdo atual
        content.style.opacity = 0;
        content.style.transform = 'translateY(20px)';

        setTimeout(() => {
            fetch(href)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContent = doc.querySelector('.container').innerHTML;

                    //atualiza o conteúdo
                    content.innerHTML = newContent;

                    //remove todas as classes page-* existentes
                    body.classList.forEach(className => {
                        if (className.startsWith('page-')) {
                            body.classList.remove(className);
                        }
                    });

                    //adiciona a nova classe
                    body.classList.add(newBodyClass);

                    //anima a entrada do novo conteúdo
                    content.style.opacity = 1;
                    content.style.transform = 'translateY(0)';

                    //atualiza a URL sem recarregar a página
                    history.pushState({bodyClass: newBodyClass}, '', href);

                    attachNavigationListeners();
                });
        }, 300);
    }

    function attachNavigationListeners() {
        document.querySelectorAll('.nav a, .card .btn').forEach(element => {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                handleNavigation(href);
            });
        });
    }

    attachNavigationListeners();

    //lidar com o botão voltar do navegador
    window.addEventListener('popstate', function(e) {
        if (e.state && e.state.bodyClass) {

            body.classList.forEach(className => {
                if (className.startsWith('page-')) {
                    body.classList.remove(className);
                }
            });
            body.classList.add(e.state.bodyClass);
        }
        location.reload();
    });
});