$(document).ready(function(){
	$(".eliminar").click(function(){
		alert('asdasdsad');
		var id=$(this).attr('data-id');
		var imagen=$(this).attr('data-img');
		alert(id);
		$.post('./ejecuta.php',{
			Id:id,
			Imagen:imagen
		},function(e){
			alert(e);
		})
	});

});