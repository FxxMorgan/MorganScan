
const paragraphElements = document.querySelectorAll('p, li');

function getFontSizeInPixels(element) {
  const fontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
  return parseFloat(fontSize);
}

function cambiarTexto(operator) {
  const sizesInPixels = Array.from(paragraphElements, getFontSizeInPixels);
  const newSizesInPixels = sizesInPixels.map(size => operator === '+' ? size + 1 : size - 1);
  
  paragraphElements.forEach((element, index) => {
    element.style.fontSize = `${newSizesInPixels[index]}px`;
  });
}
