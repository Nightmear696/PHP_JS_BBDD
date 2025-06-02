function searchDog() {
    const breed = document.getElementById('breed').value.toLowerCase();
    fetch(`https://dog.ceo/api/breed/${breed}/images/random`)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById('result').innerHTML = `<img src="${data.message}" width="300">`;
            } else {
                document.getElementById('result').innerText = "No se encontró la raza.";
            }
        })
        .catch(err => {
            document.getElementById('result').innerText = "Error al buscar.";
        });
}
