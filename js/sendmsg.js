$(document).ready(function(){

    $("#inputerror").hide();
    $toId = $("#getToId").val();
    $fromId = $("#getFromId").val();
    
    //get this guide's information
    $.post("./dbManage/MessageSending.php",{
        guideID:$toId
    }).then(function(data){
        $guideInfo = JSON.parse(data);
        console.log($guideInfo);
        $("#sendMsg").prop("disabled", true);
        $(".guidename").html($guideInfo.guideName);
        $(".guidecity").html($guideInfo.city);
        $(".guidecountry").html($guideInfo.country);

        for($i=0; $i<5; $i++ ){
            if($i < $guideInfo.raiting)
                $(".guideraiting").append("<span class='fa fa-star checked'></span>");
            else
                $(".guideraiting").append("<span class='fa fa-star'></span>");
          

        }
        $visitStr = "<span class='grey-text'> (" +$guideInfo.guideNum+ " visits)</span>"
        $(".guideraiting").append($visitStr);
        
        $("#avatar").attr("src","./img/guiders/"+$guideInfo.imgpath);

    });

    $("#sendMsg").click(function(){
        if(!$("#content").val())
            $("#inputerror").show();
        else{
            $("#inputerror").hide();
           
            $.post("./dbManage/MessageSending.php",{
                toId:$toId,
                fromId:$fromId,
                content:$("#content").val()
            }).then(function(data){
                if(data === "success")
                    alert("SUCCESS! Message sent to "+$guideInfo.guideName);
                else
                    alert("FAILED! Message not sent to "+$guideInfo.guideName);
            });
        }
       
    })

})