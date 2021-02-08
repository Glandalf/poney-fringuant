
// Une fois la page HTML chargée, 
// on veut surcharger le submit du formulaire
// pour le faire en AJAX
postInscriptionAJAX();

function postInscriptionAJAX() {
    document.querySelector('#inscription').addEventListener('submit', (ev) => {
        const form = document.querySelector('#inscription'); 
        // On ne veut pas que le navigateur fasse le post lui même et quitte la page
        ev.preventDefault();

        // On fabrique notre "form data", les champs de form à envoyer :
        const data = new URLSearchParams();
        for (const pair of new FormData(form)) {
            data.append(pair[0], pair[1]);
        }

        fetch(backendRootURL + 'enregistrement.php', {
            method: 'POST',
            body: data
        })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'ok') {
                    document.querySelector('.good.message').classList.add('visible');
                    document.querySelector('.bad.message').classList.remove('visible');
                    setTimeout(() => {
                        window.location = 'mon-profil.html';
                    }, 2000);
                }
                else {
                    document.querySelector('.bad.message').classList.add('visible');
                    document.querySelector('.good.message').classList.remove('visible');
                    document.querySelector('.bad.message').innerText = data.description
                    
                    // On peut vérifier ici un ou plusieurs code d'erreur (1062 = clé dupliquée)
                    if (data.errorInfo[1] === 1062) {
                        document.querySelector('.bad.message').innerText = 'Ce pseudo, numéro ou mail est déjà utilisé';
                    }
                    else {
                        document.querySelector('.bad.message').innerText = 'Une erreur est survenue. Déso';
                    }
                }
                
            })
            .catch(error => {
                console.error('INSCRIPTION ECHOUEE', error)
                document.querySelector('.bad.message').classList.add('visible');
                document.querySelector('.good.message').classList.remove('visible');

            })
    })
}