
let $titulo = document.querySelector('.resultado');
let $resultadostotales = document.querySelector('.resultadototal');
let $textoresultado = $titulo.textContent
let $resultados = $resultadostotales.textContent
$titulo.innerHTML = $textoresultado + "( " + $resultados + " )"


let $filtros= document.querySelector('.recomendaciones');
let $ordenarpor = document.getElementById(10);
if ($resultados == 0) {
    $filtros.remove();
    $ordenarpor.remove();
}

