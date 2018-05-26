// botones para la acción de borrar
var cBtnDel = document.getElementById("cBtnDel");
var btnGetId = document.getElementsByClassName("btnGetId");
document.getElementById('b1').addEventListener('click', function(event) {getId(event.target);});

// variable del producto
var id_product = -1;

// El boton obtiene el id y actualiza el parrrafo y el titulo
function getId(event) {
    console.log(event.target);
    id_product = parseInt(btnGetId.value);
    cBtnDel.value = id_product;
    document.getElementById("cName").innerHTML = document.getElementById("dname").innerHTML;
    document.getElementById("cPrice").innerHTML = document.getElementById("dprice").innerHTML;
}


// botones para la acción de agregar o quitar cantidad
var btnModify = document.getElementById("btnModify");
var btnModify2 = document.getElementById("btnModify2");
var mqBtnExec = document.getElementById("mqBtnExec");
// var btnSub = document.getElementById("btnSub");
btnModify.addEventListener("click", modify);
btnModify2.addEventListener("click", modify2);

// agregar cantidad
function modify() {
    id_product = parseInt(btnModify.value);
    document.getElementById("mqTitle").innerHTML = "Agregar cantidad";
    document.getElementById("mqPar1").innerHTML = "Ingresa la cantidad a agregar al inventario";
    mqBtnExec.value = id_product;
}
// modificar
function modify2() {
    id_product = parseInt(btnModify2.value);
    document.getElementById("mqTitle").innerHTML = "Quitar cantidad";
    document.getElementById("mqPar1").innerHTML = "Ingresa la cantidad a quitar del inventario";
    mqBtnExec.value = id_product;
}

// var xhr = new XMLHttpRequest();
// xhr.addEventListener("load", respuesta);
// function respuesta() {

// }

// function getDeleted() {
//     xhr.open("GET", "delete_item.php?id="+id_product);
//     xhr.send();
// }