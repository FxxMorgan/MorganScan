//Todos los elementos a los que les vamos a cambiar el fontSize
const elementsList = document.getElementsByTagName('p','li');

function getElementFontSize(element){
  //getComputedStyle nos devuelve las propiedades css de cada párrafo(elemento)
  const elementFontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
  return parseFloat(elementFontSize);  //Devolvemos el total de pixeles
}

function cambiarTexto(operador) {
   for(let element of elementsList) {
     //Obtener el total de pixel de cada párrafo.
     const currentSize = getElementFontSize(element);
     
     //Restar o sumar, dependiendo del operador.
     const newFontSize = (operador === '+' ? (currentSize + 1) : (currentSize - 1)) + 'px';
     //Aplicarle al parrafo actual el nuevo tamaño.
     element.style.fontSize = newFontSize
   }
}



