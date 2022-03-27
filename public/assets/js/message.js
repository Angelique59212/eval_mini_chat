const sendMessage = document.querySelector('#save-content');

if (sendMessage) {
    sendMessage.addEventListener('click', () => {
        const xhr = new XMLHttpRequest();
        xhr.responseType = 'json';

        const body = {
            content: document.querySelector('#content-message').value
        };

        xhr.open('post', '/api/add-message.php');

        xhr.onload = function () {
            if (xhr.status === 404) {
                alert('Aucun enpoint trouvé !');
                return;
            } else if (xhr.status === 400) {
                alert('Un paramètre est manquant');
                return;
            }

            xhr.send(JSON.stringify(body));
        }
}