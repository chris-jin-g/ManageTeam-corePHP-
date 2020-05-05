var action_type = 'create';
var team_id;
(function($) {
    calculate_score();
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
            if(currentIndex < 3){                
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
        
        if(currentIndex == 3) {
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
            var team_target = $("#signup-form input[name='team_target']").val();
	    var team_metrics = $("#signup-form input[name='team_metrics']").val();
            var team_outcome = $("#signup-form input[name='team_outcome']").val();
            var status_result = $("#signup-form input[name='question']:checked").val();
            var note_text = $("#signup-form input[name='sad-note']").val();
            var statusClassName = "";
            if(status_result == "smile") 
                statusClassName = "green-answer";
            else if(status_result == "sad")
                statusClassName = "red-answer";
            if($("input[type='checkbox']").is(':checked')){
                noObjectStatus = 1;
                targetClassName = "no-target";
                team_target = "No objectives set with the team";
            }            
            else {
                noObjectStatus = 0;
                targetClassName = "";
            }
            if(action_type == 'create') {
                $.ajax({
                    url : 'ajax/crud.php',
                    type : 'post',
                    data : {action:'create',team_name: team_name, team_target:team_target, team_metrics:team_metrics, team_outcome:team_outcome, status_result: status_result, noObjectStatus: noObjectStatus, note_text: note_text},
                    success : function(response) {
                        response = JSON.parse(response);
                        if(response.status == "success") {
                            $(".team-modal").addClass("team-modal-hide");
                            $(".team-modal").removeClass("team-modal-show");
                            $("form input[type='text']").val("");
                            $("form input[type='text']").removeAttr("class");
                            $("form input[type='text']").removeAttr("aria-invalid");
                            var html = 
                                "<div class='team-group' >"+
                                    "<div class='group-avatar'>"+
                                        "<img class='avatar-img' alt='Group Icon' src='images/group-img.png'>"+
                                    "</div>"+
                                    "<div class='team-name'>"+
                                        "<h4>"+team_name+"</h4>"+
                                    "</div>"+
                                    "<br>"+
                                    "<div class='team-target' status='"+noObjectStatus+"'>"+
                                        "<h4><b>OKRs:</b><span class='"+targetClassName+"'> "+team_target+"</span></h4>"+
                                    "</div>"+
				    "<div class='team-metrics'>"+
                                        "<h4><b>Metrics:</b><span> "+team_metrics+"</span></h4>"+
                                    "</div>"+
                                    "<div class='team-outcome' status='"+status_result+"'>"+
                                        "<h4><b>Outcomes:</b> <span class='"+statusClassName+"'>"+team_outcome+"</span></h4>"+
                                    "</div>"+
                                    "<div class='card-button'>"+
                                        "<i class='fa fa-edit edit-btn' data-toggle='tooltip' data-placement='bottom' title='Edit' idx='"+response.team_id+"' onclick='edit_card(this)'></i>"+
                                        "<i class='fa fa-remove remove-btn' data-toggle='tooltip' data-placement='bottom' title='Remove' idx='"+response.team_id+"' onclick='remove_card(this)'></i>"+
                                    "</div>"+
                                "</div>";
                            $(".main-container").append(html);
                            $(".main-container").find(('i[data-toggle="tooltip"]')).tooltip();                    
                        } else{
    
                        }
    
                    }                
                });
            } 
            else if(action_type == 'edit') {
                $.ajax({
                    url : 'ajax/crud.php',
                    type : 'post',
                    data : {action:'edit',team_id: team_id,team_name: team_name, team_target:team_target, team_metrics:team_metrics, team_outcome:team_outcome, status_result: status_result, noObjectStatus: noObjectStatus, note_text: note_text},
                    success : function(response) {
                        response = JSON.parse(response);
                        if(response.status == "success") {
                            $(".team-modal").addClass("team-modal-hide");
                            $(".team-modal").removeClass("team-modal-show");
                            $("form input[type='text']").val("");
                            $("form input[type='text']").removeAttr("class");
                            $("form input[type='text']").removeAttr("aria-invalid");
                            
                            $("i[idx='"+team_id+"']").parent().parent().find('div.team-name h4').html(team_name);

                            if(noObjectStatus == 0) {
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-target h4 span').html(team_target);
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-target h4 span').removeClass('no-target');
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-target').attr('status', noObjectStatus);
                            }
                            else if(noObjectStatus == 1) {
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-target h4 span').html("No objectives set with the team");
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-target h4 span').addClass('no-target');
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-target').attr('status', noObjectStatus);
                            }
                            $("i[idx='"+team_id+"']").parent().parent().find('div.team-metrics h4 span').html(team_metrics);


                            if(status_result == 'smile') {
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome h4 span').removeAttr('class');
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome h4 span').addClass('green-answer');
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome').attr('status', status_result);
                            } 
                            else if(status_result == 'sad') {
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome h4 span').removeAttr('class');
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome h4 span').addClass('red-answer');
                                $("i[idx='"+team_id+"']").parent().parent().find('div.team-outcome').attr('status', status_result);
                            }
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
        var team_name = $("i[idx='"+id+"']").parent().parent().find('div.team-name h4').html();
        var team_target = $("i[idx='"+id+"']").parent().parent().find('div.team-target h4 span').html();
        var team_metrics = $("i[idx='"+id+"']").parent().parent().find('div.team-metrics h4 span').html();
        var team_outcome = $("i[idx='"+id+"']").parent().parent().find('div.team-outcome h4 span').html();
        var noObjectStatus = $("i[idx='"+id+"']").parent().parent().find('div.team-target').attr('status');
        var status_result = $("i[idx='"+id+"']").parent().parent().find('div.team-outcome').attr('status');
        $("input[name='team_name']").val(team_name);
        if(noObjectStatus == 0){
            $("input[type='checkbox']").prop('checked', false);
            $("input[name='team_target']").val(team_target);
        } else {
            $("input[type='checkbox']").prop('checked', true);
            $("input[name='team_target']").val("");
        }            
	$("input[name='team_metrics']").val(team_metrics);
        if(status_result == 'sad') {
            $("input#question2").prop("checked", true);
        }
        else if(status_result == 'smile') {
            $("input#question1").prop("checked", true);
        }
        $("input[name='team_outcome']").val(team_outcome);
    }
}
function calculate_score() {
    $.ajax({
        url : 'ajax/calc_score.php',
        type : 'post',
        data : {action:'calc_score'},
        success : function(response) {
            response = JSON.parse(response);
            if(response.status == "success") {
                $("i[idx='"+team_id+"']").parent().parent().remove();                 
            }
        }                
    });
}



