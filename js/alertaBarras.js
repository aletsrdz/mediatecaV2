window.onload = function(){
	$("#codigo").change(function(){
		var codigo = document.getElementById("codigo").value;
			alert("El codigo es: " + codigo);		
		
            $.ajax({                
                url: 'http://localhost:8000/mediatecaV2/index.php/asistencia/ajaxProcessor',				
                type: "POST",
                data: {idAprendiente: codigo}, 
				
                /*error: function(xhr,tStatus,e){
                    if(!xhr){
                        alert(" We have an error ");
                        alert(tStatus+"   "+e.message);
                    }else{
                        alert("else: "+e.message); // the great unknown
                    }
                },
				*/
                success: function(resp){                   
				
					var data = $.parseJSON(resp);
					alert(data);
					$('#lblHoraServidor').text(result);				
					alert("El codigo es: " + codigo);						
					$('#lblHoraServidor').text(codigo);
					
                }
			});        
	});	

	$("#boton").click(function(){
		
		//alert("apretaste el boton");
		$.ajax({   
          url: 'http://localhost:8000/mediatecaV2/index.php/asistencia/obtenerHora',				
        })
		.done(function( result ) {     
          $('#lblHoraServidor').text(result);
		});
		
	});
	




	
}//cierre de window.onload	
