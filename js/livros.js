//uso de js para imprimir alerta de erro ao ensirir dados vazio (livros.js)

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const livroInput = document.getElementById('livroInput');
    const errorMessage = document.getElementById('error-message');

    if (form && livroInput && errorMessage) { //verifica se os elementos existem
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (livroInput.value.trim() === '') {
                showErrorMessage('Por favor, digite o título de um livro.');
            } else {
                this.submit();
            }
        });
    }

    function showErrorMessage(message) {
        errorMessage.textContent = message;
        errorMessage.classList.add('show');
        errorMessage.style.display = 'block';

        setTimeout(() => {
            errorMessage.classList.remove('show');
            errorMessage.style.display = 'none';
        }, 3000);
    }
});

