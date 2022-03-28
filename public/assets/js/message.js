const sendMessage = document.querySelector('#add-message');
const containerMessage = document.querySelector('#container-message');
if (sendMessage) {
    sendMessage.addEventListener('click', () => {
        const xhr = new XMLHttpRequest();
        xhr.responseType = 'json';

        const body = {
            content: document.querySelector('#content-message').value
        };

        xhr.open('post', '/?c=api&a=add-message');

        xhr.onload = function () {
            if (xhr.status === 404) {
                alert('Aucun enpoint trouvé !');
            }
            else if (xhr.status === 400) {
                alert('Un paramètre est manquant');
            }
            if (containerMessage) {
                setInterval( function () {
                    const xhr = new XMLHttpRequest();
                    xhr.responseType = 'json';
                    xhr.open('post','/?c=message&a=find-all')

                    xhr.onload = function () {
                        const response = xhr.response;
                        printChat(response);
                    }
                    xhr.send();
                },1000);
            }
        }
        xhr.send(JSON.stringify(body));
    });
}

function printChat(messages) {
    containerMessage.innerHTML = '';
    for (let i = 0; i < messages.length; i++) {
        containerMessage.innerHTML += "<p>" + messages[i]['author'] + "</p>" + "<p>" + messages[i]['content'] + "</p>";
    }
}