// Paramétrage de notre appli front 
//const backendRootURL = 'http://172.21.188.110:8001/';
const backendRootURL = 'http://back.poney.local/';

fetch(backendRootURL + "connected.php", {credentials: "include"})
    .then(response => response.json())
    .then(data => {document.getElementById("pseudo").innerText = data.pseudo})