$(function() {

	$('#nb_steps_add').change(function() {
		var number_steps = 0;
		$('#nb_steps_add option:selected').each(function() {
			number_steps = parseInt($(this).text());
			$('#box_steps_content').empty();
			for (var i = 1; i < number_steps + 1; i++) {
				$('#box_steps_content').append('<br/><br/><label for="step_'+i+'"/>Etape numéro '+i+' : </label><input type="text" id="step_'+i+'" name="step_'+i+'" required/>');
			};
		});
	});

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