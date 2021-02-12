
/** Gestion des membres ***/
// Paramétrage de notre appli front 
//const backendRootURL = 'http://172.21.188.110:8001/';
const backendRootURL = 'http://back.poney.local/';


rechercheAJAX(); 

// Lors du chargement de la page on récupère la liste de tous les membres
document.getElementById("submitBtn").click();

function rechercheAJAX() {
    const form = document.getElementById("search"); 
    form.addEventListener('submit', (ev) => {
        const form = document.querySelector('#search'); 
        // On ne veut pas que le navigateur fasse le post lui même et quitte la page
        ev.preventDefault();

        // On fabrique notre "form data", les champs de form à envoyer :
        const data = new URLSearchParams();
        for (const pair of new FormData(form)) {
            data.append(pair[0], pair[1]);
        }
        fetch(backendRootURL + 'membres.php?' + data.toString(), {
            method: 'GET',
            credentials: "include",
            
        })
            .then(response => response.json())
            .then(data => {
                afficheMembres(data);
            })
            .catch(error => {
                console.error('Connexion échouée', error)
                document.querySelector('.bad.message').classList.add('visible');
                document.querySelector('.good.message').classList.remove('visible');
            })
    })

}



function afficheMembres(listeMembres) {
    const ul = document.getElementById('listeMembres'); 
    ul.innerHTML='';

    for(membre of listeMembres) {
        let li = document.createElement('li'); 
        const inscription = new Date(membre.dateAdhesion); 
        const nbJours  = dateDiffInDays(inscription, new Date());
        let texte = membre.nom.toUpperCase() + ' ' + membre.prenom + ` (inscrit depuis ${nbJours} jours) `;
        li.innerText = texte; 
        if(! membre.titre) {
            li.classList.add('grise');
        } else {
            let lien = document.createElement('a');
            lien.setAttribute("href", "#");
            lien.innerText = "Voir le profil"; 
            li.append(lien);
        }
        ul.appendChild(li);
    }

}



/* -- Gestion des dates, merci StackOverflow : https://stackoverflow.com/a/15289883
*/
const _MS_PER_DAY = 1000 * 60 * 60 * 24;

// a and b are javascript Date objects
function dateDiffInDays(a, b) {
  // Discard the time and time-zone information.
  const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
  const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
}
