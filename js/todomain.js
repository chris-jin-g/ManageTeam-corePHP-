var action_type = 'todoread';
var team_id;

(function($) {
    $('[data-toggle="tooltip"]').tooltip();
    var form = $("#signup-form");
    $("input[type='text'].question-input").blur(function() {
        $(".active-fieldset label.status-label").removeClass("label-focus");
        $(".active-fieldset input.question-input").attr("placeholder", $(".active-fieldset input.question-input").attr("hiddenholder"));
    })
    .focus(function() {
        $(".active-fieldset label.status-label").addClass("label-focus");
        $(".active-fieldset input.question-input").removeAttr("placeholder");
    });
    $("input[type='text'].note-input").blur(function() {
        $(".active-fieldset label.status-label").removeClass("label-focus");
        $(".active-fieldset input.note-input").attr("placeholder", $(".active-fieldset input.note-input").attr("hiddenholder"));
    })
    .focus(function() {
        $(".active-fieldset label.status-label").addClass("label-focus");
        $(".active-fieldset input.note-input").removeAttr("placeholder");
    });
    $("#add-team-btn").click(function() {
        action_type = 'create';
        modal_show();        
    });
    $('input[type=radio]').change(function() {
        if (this.value == 'sad') {
            $(".note-input").removeClass("note-hide");
        }
        else if (this.value == 'smile') {
            $(".note-input").addClass("note-hide");
        }
    });
    $("#signup-form button.next-step").click(function() {
        var currentInput = $(".team-modal").find(".active-fieldset input").val();
        if(currentInput != "") {
            $(".active-fieldset span").removeClass("error-msg");
            var currentIndex = $(".team-modal").find("fieldset").index($(".team-modal").find(".active-fieldset"));
            if(currentIndex < 2){                
                $(".team-modal").find("fieldset").removeClass("active-fieldset");
                $(".team-modal").find("fieldset:nth-child("+(currentIndex+2)+")").addClass("active-fieldset");
                $("#signup-form button.prev-step").removeClass("btn-hide");
            }
        } else {            
            var currentIndex = $(".team-modal").find("fieldset").index($(".team-modal").find(".active-fieldset"));
            if(currentIndex == 1){
                if($("input[type='checkbox']").is(':checked')) {
                    $(".team-modal").find("fieldset").removeClass("active-fieldset");
                    $(".team-modal").find("fieldset:nth-child("+(currentIndex+2)+")").addClass("active-fieldset");
                    $("#signup-form button.prev-step").removeClass("btn-hide");
                } else {
                    $(".active-fieldset span").addClass("error-msg");
                }              
            } else {
                $(".active-fieldset span").addClass("error-msg");
            }
        }
        
        if(currentIndex == 1) {
            $("#signup-form button.next-step").addClass("btn-hide");
            $("#signup-form button.form-confirm").removeClass("btn-hide");
        }            
    });
    $("#signup-form button.prev-step").click(function() {
        var currentIndex = $(".team-modal").find("fieldset").index($(".team-modal").find(".active-fieldset"));
        if(currentIndex > 0 ){
            $(".team-modal").find("fieldset").removeClass("active-fieldset");
            $(".team-modal").find("fieldset:nth-child("+currentIndex+")").addClass("active-fieldset");
        }
        $("#signup-form button.form-confirm").addClass("btn-hide");
        $("#signup-form button.next-step").removeClass("btn-hide");
        if(currentIndex == 1) {
            $("#signup-form button.prev-step").addClass("btn-hide");
        }
    });
    $(".close-modal").click(function(){
        $(".team-modal").addClass("team-modal-hide");
        $(".team-modal").removeClass("team-modal-show");
        $("form input[type='text']").val("");
        $("form input[type='text']").removeAttr("class");
        $("form input[type='text']").removeAttr("aria-invalid");
        $("fieldset span").removeClass('error-msg');
    })
    $("#signup-form button.form-confirm").click(function() {
        var currentInput = $(".team-modal").find(".active-fieldset input").val();
        if(currentInput != "") {
            $(".active-fieldset span").removeClass("error-msg");
            var team_name = $("#signup-form input[name='team_name']").val();
            var team_target1 = $("#signup-form input[name='team_target_1']").val();
            var team_target2 = $("#signup-form input[name='team_target_2']").val();
            var team_target3 = $("#signup-form input[name='team_target_3']").val();
            var team_id = $("#signup-form input[name='team_id']").val();
            var date = new Date();
            var currentTimestamp = date.toISOString().split('T')[0]; 
	        var team_escalation = $("#signup-form input[name='team_escalation']").val();
            var team_outcome = $("#signup-form input[name='team_outcome']").val();
            var team_target = [team_target1, team_target2, team_target3].filter(Boolean).join(", ");

            if(action_type == 'edit') {
                $.ajax({
                    url : 'ajax/update.php',
                    type: 'post',
                    data: {team_id: team_id, team_target: team_target, team_escalation: team_escalation, team_outcome: team_outcome, currentTimestamp: currentTimestamp},
                    success : function(response) {
                        if(response.status == "success") {
                            $(".team-modal").addClass("team-modal-hide");
                            $(".team-modal").removeClass("team-modal-show");
                            $("form input[type='text']").val("");
                            $("form input[type='text']").removeAttr("class");
                            $("form input[type='text']").removeAttr("aria-invalid");
                            
                            $("i[idx='"+team_id+"']").parent().parent().find('div.team-name h4').html(team_name);
                            
                            $("i[idx='" + team_id + "']").parent().parent().find('div span ul li.team-target-1').html(team_target1);
                            $("i[idx='" + team_id + "']").parent().parent().find('div span ul li.team-target-2').html(team_target2);
                            $("i[idx='" + team_id + "']").parent().parent().find('div span ul li.team-target-3').html(team_target3);
                            $("i[idx='" + team_id + "']").parent().parent().find('div span ul li.team-target-1').removeClass('no-target');
                            $("i[idx='" + team_id + "']").parent().parent().find('div span ul li.team-target-2').removeClass('no-target');
                            $("i[idx='" + team_id + "']").parent().parent().find('div span ul li.team-target-3').removeClass('no-target');
                           
                            $("i[idx='"+team_id+"']").parent().parent().find('div.team-escalation h4 span').html(team_escalation);

                            $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome h4 span').html(team_outcome);

                            $(".main-container").find(('i[data-toggle="tooltip"]')).tooltip();                    
                        }
    
                    }                
                });
            }            
        } else {
            $(".active-fieldset span").addClass("error-msg");
        }        


    });

})(jQuery);
function edit_card(e) {
    team_id = $(e).attr('idx');
    modal_show(team_id);
    action_type = 'edit';
}
function remove_card(e) {
    team_id = $(e).attr('idx');
    $.ajax({
        url : 'ajax/crud.php',
        type : 'post',
        data : {action:'delete',team_id: team_id},
        success : function(response) {
            response = JSON.parse(response);
            if(response.status == "success") {
                $("i[idx='"+team_id+"']").parent().parent().remove();                 
            }
        }                
    });
}
function modal_show(id) {
    $(".team-modal").removeClass("team-modal-hide");
    $(".team-modal").addClass("team-modal-show");
    $(".team-modal").find("fieldset").removeClass("active-fieldset");
    $(".team-modal").find("fieldset:first-child").addClass("active-fieldset");
    $("#signup-form button.next-step").removeClass("btn-hide");
    $("#signup-form button.prev-step").addClass("btn-hide");
    $("#signup-form button.form-confirm").addClass("btn-hide");
    if(id) {
        var team_name = $("i[idx='" + id + "']").parent().parent().find('div.team-name h4').html();
        var team_id = $("i[idx='" + id + "']").parent().parent().find('div.team-name #team-id').val();

        var team_target1 = $("i[idx='" + id + "']").parent().parent().find('div span ul li.team-target-1').html();
        var team_target2 = $("i[idx='" + id + "']").parent().parent().find('div span ul li.team-target-2').html();
        var team_target3 = $("i[idx='" + id + "']").parent().parent().find('div span ul li.team-target-3').html();

        var team_escalation = $("i[idx='"+id+"']").parent().parent().find('div.team-escalation h4 span').html();
        var team_metrics = $("i[idx='"+id+"']").parent().parent().find('div.team-metrics h4 span').html();
        var team_outcome = $("i[idx='"+id+"']").parent().parent().find('div.team-outcome h4 span').html();
        var status_result = $("i[idx='"+id+"']").parent().parent().find('div.team-outcome').attr('status');
        $("input[type='checkbox']").prop('checked', false);
        $("input[name='team_target_1']").val($.trim(team_target1));
        $("input[name='team_target_2']").val($.trim(team_target2));
        $("input[name='team_target_3']").val($.trim(team_target3));
        $("input[name='team_id']").val(team_id);
        $("input[name='team_escalation']").val($.trim(team_escalation));
        $("input[name='team_outcome']").val($.trim(team_outcome));
    }
}


