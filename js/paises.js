//uso de js para imprimir alerta de erro ao ensirir dados vazio (paises.js)

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const paisInput = document.getElementById('paisInput');
    const errorMessage = document.getElementById('error-message');

    if (form && paisInput && errorMessage) { //verifica se os elementos existem
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (paisInput.value.trim() === '') {
                showErrorMessage('Por favor, digite o nome de um país.');
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
