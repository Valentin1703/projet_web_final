/* gt_functions.js   */
//attendre que toute la page soit chargÃ©e
$(document).ready(function() {

 
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
    
    
    
   

});

