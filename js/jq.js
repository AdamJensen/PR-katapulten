(function($){ 
$(document).ready(function () {
     

(function($){ 
$(document).ready(function () {
     

	 $('#btn_2').click(function() { // Vi hooker ind på knappen i stedet for formen.
     
	 $("#titel2").show();
	 $("#afsende").hide();
	 $("#knap2").show();
	 
    if ($('#en').is(':checked')) {
	  
	  $("#afsendthjemmeside").show();
      
    } 
    else {
      
	$("#afsendthjemmeside").hide();
    
    }
	
	 if ($('#to').is(':checked')) {
	  
	  $("#afsendtenyhed").show();
      
    } 
    else {
      
	$("#afsendtenyhed").hide();
    
    }
	
	if ($('#tre').is(':checked')) {
	  
      $("#afsendtbibnyt").show();
      
    } 
      else {
       
      $("#afsendtbibnyt").hide();
      
      
	} 
	
	if ($('#fire').is(':checked')) {
	  
      $("#afsendtinfoboard").show();
      
    } 
      else {
       
      $("#afsendtinfoboard").hide();
      
      
	}
	
	if ($('#fem'_).is(':checked')) {
	  
      $("#afsendtkultunaut").show();
      
    } 
      else {
       
      $("#afsendtkultunaut").hide();
      
      
	}
	
	if ($('#seks').is(':checked')) {
	  
      $("#afsendtballerupbladet").show();
      
    } 
      else {
       
      $("#afsendtballerupbladet").hide();
      
      
	}
	
	
	if ($('#syv').is(':checked')) {
	  
      $("#afsendtkiglyt").show();
      
    } 
      else {
       
      $("#afsendtkiglyt").hide();
      
      
	}
	
	if ($('#otte').is(':checked')) {
	  
      $("#afsendt4aarstider").show();
      
    } 
      else {
       
      $("#afsendt4aarstider").hide();
      
      
	}
	
	if ($('#ni').is(':checked')) {
	  
      $("#afsendtplakater").show();
      
    } 
      else {
       
      $("#afsendtplakater").hide();
      
      
	}
	
	if ($('#ti').is(':checked')) {
	  
      $("#afsendtbilletter").show();
      
      
    } 
      else {
       
      $("#afsendtbilletter").hide();
     
      
	}
	}
    return false; // <<< Formen bliver ikke submittet!!! Ryk evt denne linje ind i ovenstående if-sætning
  });
});

})(jQuery);
