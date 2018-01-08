/* gt_functions.js   */
//attendre que toute la page soit chargÃ©e
$(document).ready(function() {

    $("#gt_carousel").carousel({
        interval: 1500,
        pause: false
    });

    //Traitement direct de la liste dÃ©roulante
    //Ã©lÃ©ments appartenant Ã  <select>
    $('#id_type_ordi').change(function(){
        //on relÃ¨ve l'attribut "name" de <select>
        var parametre = $(this).attr('name');
        //on rÃ©cupÃ¨re la valeur du select
        var val = $(this).val();
        //recrÃ©er l'URL
        var refresh = 'index.php?' + parametre + '=' + val + '&choix_type=1';
        
        window.location.href = refresh;
   
    });
    
    //supprimer le bouton "choisir"
    $("#choix_type").remove();



     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function()
     {
      $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='mail"+i+"' type='text' placeholder='Mail'  class='form-control input-md'></td><td><input  name='mobile"+i+"' type='text' placeholder='Mobile'  class='form-control input-md'></td>");

      $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      i++; 
     });
     $("#delete_row").click(function(){
    	 if(i>1){
		 $("#addr"+(i-1)).html('');
		 i--;
		 }
	 });

});



});

