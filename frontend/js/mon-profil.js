getCurrentUserInfos();

function getCurrentUserInfos() {
    fetch(backendRootURL + 'connected.php', {
        credentials: "include"
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            // document.querySelector('h1').innerText = `Bonjour ${data.pseudo}`;
        })

}