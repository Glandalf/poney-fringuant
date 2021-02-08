// Paramétrage de notre appli front 
//const backendRootURL = 'http://172.21.188.110:8001/';
const backendRootURL = 'http://back.poney.local/';

/** Demande au serveur la liste des centres d'interêts */
function listeInterets() {
    fetch(backendRootURL +  'interets.php', {credentials: 'include', method: 'GET'})
    .then(response => response.json())
    .then(data => {
        
        console.log(data);
        for(interet of data){
            // On créé les checkbox (id = "interets")
            const ul = document.getElementById("listeInterets"); 
            let li = document.createElement('li');
            let checkbox = document.createElement('input');
            checkbox.setAttribute("type", "checkbox"); 
            checkbox.setAttribute("id", interet.nom);
            checkbox.setAttribute("name", "interets[]");
            checkbox.setAttribute("value", interet.interetID);
            let label = document.createElement('label');
            label.setAttribute("for", interet.nom); 
            label.innerText = interet.nom;
            li.append(checkbox); 
            li.append(label);
            ul.append(li);
        }
    }).catch(error => {
        console.error('Récupération de la liste impossible', error)
    })
}
listeInterets();

sauveInterets();
function sauveInterets() {
    document.querySelector('#centreInterets').addEventListener('submit', (ev) => {
        const form = document.querySelector('#centreInterets'); 
        // On ne veut pas que le navigateur fasse le post lui même et quitte la page
        ev.preventDefault();

        // On fabrique notre "form data", les champs de form à envoyer :
        const data = new URLSearchParams();
        for (const pair of new FormData(form)) {
            data.append(pair[0], pair[1]);
        }

        fetch(backendRootURL + 'interets.php', {
            method: 'POST',
            credentials: 'include',
            body: data
        })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'ok') {
                    console.log('MISE À JOUR RÉUSSIE', error)
                }
                else {
                    console.log('MISE À JOUR ÉCHOUÉE', error)
                }
            })
            .catch(error => {
                console.error('MISE À JOUR ECHOUEE', error)
            })
    })
}