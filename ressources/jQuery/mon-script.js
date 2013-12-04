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

		$('.box_click_display_objective').click(function(event) {
			$(this).next().slideToggle();
            if ($(this).parent('.box_content').css('background-color') =='rgba(0, 0, 0, 0)') {
                $(this).parent('.box_content').css('background-color','#f5f5f5');
                $(this).children('.center_text').html('Cacher les détails');
                $(this).css('border-bottom','1px solid #e3e3e3');
            }else {
                $(this).parent('.box_content').css('background-color','rgba(0, 0, 0, 0)');
                $(this).children('.center_text').html('Afficher les détails');
                $(this).css('border-bottom','0px');
            }
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
	});

    //update steps to done
    $('.form_modif_steps').click(function(event) {
    	var done = $(event.target).val();
    	var id = $(this).children('.step_id').val();
        $.ajaxSetup({async: false});
    	$.ajax({
            type: 'POST',
            url: '/ressources/request_ajax/modif_steps.php',
            data: { id :id , done :done},
        });
        $.ajaxSetup({async: true});
	});

    //hidden part where you can modify advices
    $('.delete_advice').hide();
    $('.box_advice').hover(function() {
        $(this).children('.form_modif_advices').children('.delete_advice').show();
    },
    function () {
        $(this).children('.form_modif_advices').children('.delete_advice').hide();
    });

});