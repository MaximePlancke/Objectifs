$(function() {

	//Choose number of steps
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

	//hidden part of objective
	$('.hidden_part').hide();	

		$('.box_content').click(function(e) {
			$(this).children("div.hidden_part").slideToggle();
			e.stopPropagation();
		});

	//auto complete search bar tor
    $('#search_bar').autocomplete({
    source : '/ressources/widgets/auto_completion.php',

        select : function(event, ui){
        	$(location).attr('href',"/current/objective/"+ui.item.id);
   		}
	});

    //hidden part where you can modify steps
	$('.step_done').hide();

    $('.box_step').hover(function() {
    	if ($(this).attr('value')) {
    		$(this).children('.form_modif_steps').children('.step_done_modif').show();
    	} else {
    		$(this).children('.form_modif_steps').children('.step_done_done').show();
    	}
	},
	function () {
    	if ($(this).attr('value')) {
    		$(this).children('.form_modif_steps').children('.step_done_modif').hide();
    	} else {
    		$(this).children('.form_modif_steps').children('.step_done_done').hide();
    	}
	}
	);

    //update steps to done
    $('.form_modif_steps').click(function(event) {
    	var done = $(event.target).val();
    	var id = $(this).children('.step_id').val();
    	$.ajax({
            type: 'POST',
            url: '/ressources/request_ajax/modif_steps.php',
            data: { id :id , done :done},
        });    

	});

});