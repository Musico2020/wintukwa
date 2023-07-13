function confirmar(e){
  if (confirm("¿Esta seguro que desea eliminar este registro?")) {
    return true;
  }else{
    e.preventdefault();

  }
}
let linkdelete=document.querySelectorAll(".btn btn-outline-danger");
for(var i=0; i< linkdelete.length; i++){
  linkdelete[i].addEventListener("click",confirmacion);

}