// function cadastrarCargo(){
//     const url = "post.php"
//     const data = {id: 'id', nomeCargo: 'nomeCargo'}

//     fetch(url, {
//         method: 'POST',
//         headers: {'Content-Type': 'application/json'},
//         body: JSON.stringify(data),
//     })
//         .then(response => response.json())
//         .then(data => console.log('Sucesso: ', data))
//         .catch(error => console.error('Erro: ', error))
// }

// function post(url, body){
//     console.log("Body=", body)

//     let request = new XMLHttpRequest()
//     request.open("POST", url, true)
//     request.setRequestHeader("Content-type", "application/json")
//     request.send(JSON.stringify(body))

//     request.onload = function() {
//         console.log(this.responseText)
//     }

//     return request.responseText
// }

// function cadastrarCargo(){
//     event.preventDefault()

//     let url = "post.php"
//     let nomeCargo = document.getElementById("nomeCargo").value

//     console.log(nomeCargo)

//     body = {
//         "name": nomeCargo
//     }

//     post(url, body)
// }



// function cadastrarCargo() {

//     var nomeCargo = document.getElementById('nomeCargo').value

//     let data = {nome: nomeCargo};

//     fetch("post.php", {
//     method: "POST",
//     headers: {'Content-Type': 'application/json'}, 
//     body: JSON.stringify(data)
//     }).then(res => {
//     console.log("Request complete! response:", res);
//     });
// }