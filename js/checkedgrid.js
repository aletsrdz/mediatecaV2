function userClicks(target_id) {
	

	 //alert($.fn.yiiGridView.getSelection(target_id));
	
	//alert("listo");
	var selected = $("#aprendiente2-grid").selGridView("getAllSelection");
	alert("listo" + selected);
	
}

function obtenerId()
{	

	var selected = $.fn.yiiGridView.getChecked("aprendiente2-grid","selectedIds").toString();	
	//var output = JSON.stringify(selected);
	//alert (output);
	

	if(!selected.length == 0)
	{
		/*
		var data = {
	      "theIds": selected
	    }; // este es un objeto
	    */
		$.ajax({                
	      //url: 'http://localhost:8000/mediatecaV2/index.php/aprendiente2/selcredapre',	
	      type: "POST",	      	      	     
	      data: {theIds:selected}, 	   	     	      
	      success: function(data){    
	      	
			document.cookie ='var='+selected;               			      	
			 $.fn.yiiGridView.update("aprendiente2-grid");			 
			 alert("Se han generado las credenciales");					 
	      },
	      
	      	//document.cookie = "var=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	      
	      
	    });
	    alert("lo que seleccionaste fue:" + selected);
	}
	else
	{		
		document.cookie = "var=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		alert("Selecciona al menos un registro");		
		return;
	}
	

}
