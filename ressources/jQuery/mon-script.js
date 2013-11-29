$(function() {

	$('.hidden_part').hide();	

		$('.box_content').click(function(e) {
			$(this).children("div.hidden_part").slideToggle();
		});


    $('#search').autocomplete({
    source : '/ressources/widgets/auto_completion.php',

        select : function(event, ui){
        	$(location).attr('href',"/current/objective/"+ui.item.id);
   		}
	});

});