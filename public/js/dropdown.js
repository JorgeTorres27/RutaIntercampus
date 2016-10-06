$("#ruta").change(function(event){
	$.get("precios/"+event.target.value+"",function(response,ruta){
		$("#precio").empty();
		for(i=0; i<response.length; i++){
			$("#precio").append("<option value='"+response[i].id+"'> "+response[i].valor+"</option>");
		}

		
	});
});

$("#ruta").change(function(event){
	$.get("recorridos/"+event.target.value+"",function(response,ruta){
		$("#recorrido").empty();
		for(i=0; i<response.length; i++){
			$("#recorrido").append("<option value='"+response[i].id+"'> "+response[i].hora_salida+"</option>");
		}
	});
});

$("#ruta").change(function(event){
	$.get("buses/"+event.target.value+"",function(response,ruta){
		$("#bus").empty();
		for(i=0; i<response.length; i++){
			$("#bus").append("<option value='"+response[i].id+"'> "+response[i].placa+"</option>");
		}
	});
});