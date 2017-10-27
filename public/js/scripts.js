var inicio=function () {
	$(".cantidad").keyup(function(e){
		if($(this).val()!=''){
			if($(this).val()==0||(e.keyCode==109)||(e.keyCode==189)){
				alert('El producto debe tener una cantidad minima de 1');
				this.value = 1
			}
			if((e.keyCode==190)||(e.keyCode==110)){
				alert('La cantidad debe ser un numero entero');
				this.value = 2;
				this.value = 1;
			}
		}else{
			this.value = 1
		}
		if(this.value>99999){
			this.value = 99999
		}
		
		var id=$(this).attr('data-id');
		var precio=$(this).attr('data-precio');
		var cantidad=$(this).val();
		$(this).parentsUntil('.quantity-select').find('.subtotal').text(precio*cantidad);
		$.post('./modificarDatos.php',{
			Id:id,
			Precio:precio,
			Cantidad:cantidad
		},function(e){
			$("#total").text('Total: '+e);
		});
	});

	$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.producto').remove();
		$.post('./eliminarProducto.php',{
			Id:id
		},function(a){
			if(a=='0'){
				location.href="./checkout.php";
			}
		});
		location.href="./checkout.php";
	});
}
$(document).on('ready',inicio);