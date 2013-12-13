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

        //hidden part of objective on profile page
        $('.box_click_display_objective_profile').click(function(event) {
            $(this).next().slideToggle();
            if ($(this).parent('.box_content').css('background-color') =='rgba(0, 0, 0, 0)') {
                $(this).parent('.box_content').css('background-color','#f5f5f5');
                $(this).children('.center_img').attr('src' , '/ressources/images/hide_details.png');
                $(this).css('border-bottom','1px solid #e3e3e3');
            }else {
                $(this).parent('.box_content').css('background-color','rgba(0, 0, 0, 0)');
                $(this).children('.center_img').attr('src' , '/ressources/images/display_details.png');
                $(this).css('border-bottom','0px');
            }
        });   

	//auto complete search bar tor
    $('#search_bar').autocomplete({
    source : '/ressources/widgets/auto_completion.php',

        select : function(event, ui){
        	$(location).attr('href',"/user/profile/"+ui.item.id);
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
        var id_member = $(this).children('.id_member').val();
    	var id = $(this).children('.step_id').val();
        $.ajaxSetup({async: false});
    	$.ajax({
            type: 'POST',
            url: '/API/modif_steps.php',
            data: { id :id , done :done , id_member :id_member},
        });
        $.ajaxSetup({async: true});
	});

    //hidden part where you can modify advices
    $('.form_modif_advices').hide();
    $('.box_advice').hover(function() {
        $(this).children('.form_modif_advices').show();
    },
    function () {
        $(this).children('.form_modif_advices').hide();
    });

    //modif advice
    $('.form_modif_advices').click(function(event) {
        var $this = $(this);
        var $target_event = $(event.target);
        var target_event = $(event.target);
        var target_event = $(target_event).attr('value');
        var id_member_give_advice = $(this).children('.id_member_give_advice').attr('value');
        var id_member = $(this).children('.id_member').attr('value');
        var id_advice = $(this).children('.id_advice').attr('value');
        if (target_event) {
            $.ajax({
                type: 'POST',
                url: '/API/modif_advices.php',
                data: { id_member :id_member , id_advice :id_advice , id_member_give_advice :id_member_give_advice , target_event :target_event},
                success: function(data){
                    if (target_event == "accept_advice" || target_event == "delete_advice") {
                        $this.parent().html(data).delay(2500).fadeOut(200);
                    } else if (target_event == "like_advice") {
                        $this.next().children('.box_count_like').html('Vous aimez');
                        $target_event.fadeOut(200);
                    } else if (target_event == "unlike_advice") {
                        $this.next().children('.box_count_like').html('Vous n\'aimez plus');
                        $target_event.fadeOut(200);
                    };
                },
                error: function(){
                    location.reload();
                }
            });
        };
    });

    //add advice
    $('.success_add_advice').hide();
    $('.add_advice_submit').click(function(event) {
        var $this = $(this);
        var id_objective = $(this).siblings('.id_objective').attr('value');
        var add_advice_content = $(this).siblings('.add_advice_content').attr('value');
        $.ajax({
            type: 'POST',
            url: '/API/new_advice.php',
            data: { add_advice_content :add_advice_content , id_objective :id_objective},
            success: function(data){
                $this.siblings('.success_add_advice').show().html(data).css('background-color','#dff0d8').delay(3000).fadeOut(300);
                $this.siblings('.add_advice_content').attr('value',"Ajouter un conseil");
            },
            error: function(){
                location.reload();
            }
        });
    });

    //modif friends
    $('.form_modify_friend').click(function(event) {
        var $this = $(this);
        var target_event = $(event.target);
        var target_event = $(target_event).attr('value');
        var id_member = $(this).children('.id_member').attr('value');
        var id_friend_button = $(this).children('.id_friend_button').attr('value');
        if (target_event) {
            $.ajax({
                type: 'POST',
                url: '/API/management_friends.php',
                data: { id_member :id_member , id_friend_button :id_friend_button , target_event :target_event},
                success: function(data){
                    $this.parent().html(data).delay(2500).fadeOut(200);
                },
                error: function(){
                    location.reload();
                }
            });
        };
    });

    //Filter category explore
    $('.filter_class').change(function() {
        var filter_friend_id = parseInt($('#explore_filter_friend').val());
        var filter_done_id = parseInt($('#explore_filter_done').val());
        var filter_category_id = parseInt($('#explore_filter_category').val());
        var objective_result = new Array();
            $.ajax({
                type: 'POST',
                url: '/API/explore_filter.php',
                data: { filter_category_id :filter_category_id , filter_friend_id :filter_friend_id, filter_done_id :filter_done_id},
                success: function(data){
                    $('.all_objectives_content').empty();
                    objective_result = JSON.parse(data);
                    alert(objective_result);
                    $('.all_objectives_content').html(data);

                },
                error: function(){
                    location.reload();
                }
        });
    });

});