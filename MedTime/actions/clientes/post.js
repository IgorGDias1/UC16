function post(url, body){
    console.log("Body=", body)

    let request = new XMLHttpRequest()
    request.open("POST", url, true)
    request.setRequestHeader("Content-type", "application/json")
    request.send(JSON.stringify(body))

    request.onload = function() {
        console.log(this.responseText)
    }

    return request.responseText
}

function cadastrarCargo(){
    event.preventDefault()

    let url = "../cargos/cadastrar_cargo.php"
    let nomeCargo = document.getElementById("nomeCargo").value

    console.log(nomeCargo)

    body = {
        "name": nomeCargo
    }

    post(url, body)
}

