getCurrentUserInfos();

function getCurrentUserInfos() {
    fetch(backendRootURL + 'connected.php', {
        credentials: "include"
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if(data.connected) {
                document.querySelector('h1').innerText = `Bonjour ${data.prenom} ${data.nom} (${data.pseudo})`;
                document.querySelector('span.numero').innerText = data.numero
                // On peut facilement afficher la date dans un format "standard" du pays en cours grâce à `toLocaleDateString()`
                document.querySelector('span.date').innerText = new Date(data.dateAdhesion).toLocaleDateString();
                // Enfin, on concatène tous les champs qui composent une adresse :
                document.querySelector('span.adresse').innerText = data.adresse + ' ' + data.cp + ', ' + data.ville;

            }
            else { // Si on n'est pas connecté, on est redirigé sur la page d'accueil
                window.location = './'
            }
        })

}