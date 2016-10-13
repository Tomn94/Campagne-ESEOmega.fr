function nuage(num) {
  document.getElementById('nuage'+num).style.webkitFilter = 'brightness(2.7)';
  document.getElementById('nuage'+num).style['-ms-filter'] = 'brightness(2.7)';
  document.getElementById('nuage'+num).style['filter'] = 'brightness(2.7)';
}
function denuage(num) {
  document.getElementById('nuage'+num).style.webkitFilter = '';
  document.getElementById('nuage'+num).style['-ms-filter'] = '';
  document.getElementById('nuage'+num).style['filter'] = '';
}