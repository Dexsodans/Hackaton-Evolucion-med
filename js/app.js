function generarCodigo(){

    let codigo = "";

    for(let i = 0; i < 10; i++){

        codigo +=
        Math.floor(Math.random() * 10);

    }

    document.getElementById(
    "codigo_barras"
    ).value = codigo;

}

// MENSAJE AL GUARDAR

const formulario =
document.getElementById("formulario");

formulario.addEventListener(
"submit",
function(e){

    e.preventDefault();


    const alerta =
    document.createElement("div");

    alerta.innerText =
    "✅ Producto registrado correctamente";

    alerta.classList.add("alerta");

    document.body.appendChild(alerta);

    setTimeout(() => {

        alerta.remove();

    },3000);


    formulario.reset();

});