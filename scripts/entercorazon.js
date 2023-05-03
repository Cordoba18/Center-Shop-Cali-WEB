let producto = document.querySelectorAll('.producto')


producto.forEach(function (producto_todo) {
    
   let botonlista = producto_todo.querySelector('.btn-listadeseos')
let botoncarrito = producto_todo.querySelector('.btn-carritocompras')
botonlista.setAttribute('hidden', 'true')
botoncarrito.setAttribute('hidden', 'true')

    producto_todo.addEventListener('mouseover', function (){
        let boton = producto_todo.querySelector('.btn-listadeseos')
        boton.removeAttribute('hidden')
        let boton2 = producto_todo.querySelector('.btn-carritocompras')
        boton2.removeAttribute('hidden')

     })
    

     producto_todo.addEventListener('mouseout', function (){
        let boton = producto_todo.querySelector('.btn-listadeseos')
        boton.setAttribute('hidden', 'true')
        let boton2 = producto_todo.querySelector('.btn-carritocompras')
        boton2.setAttribute('hidden', 'true')
   
     })
    })



