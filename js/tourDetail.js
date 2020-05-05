$(document).ready(function(){
   $tourId = $("#tourID").val();
   $("#beforeBook").hide();
   $("#bookTour").click(function(){
        if($("#userID").val()){
            var userID = $("#userID").val();
            var tourID = $("#tourID").val();
            var url = "booking.php?userID=" + encodeURIComponent(userID) + "&tourID=" + encodeURIComponent(tourID);
            window.location.href = url;
        }
        else
            $("#beforeBook").show();
    });
    
    writeTour();
    writeTourTitle();
    writeDetailInfo();
    writeRaiting();
    writeGuide();
    writeExtraInfo();
   
    function writeTour(){
            $.post("./dbManage/GetDetailTour.php",{
                tourId:$tourId
            }).then(function(data){
                if(data === "failed")
                    $("#tourDetail").html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
                else
                    $("#tourDetail").html(data);
            });
    }
    function writeTourTitle(){
        $.post("./dbManage/GetDetailTour.php",{
            tourTitle:$tourId
        }).then(function(data){
            if(data === "failed")
                $("#tourTitle").html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
            else
                $("#tourTitle").html(data);
        });
    }
    function writeDetailInfo(){
        $.post("./dbManage/GetDetailTour.php",{
            detailInfo:$tourId
        }).then(function(data){
            if(data === "failed")
                $("#detailInfo").html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
            else
                $("#detailInfo").html(data);
        });
    }
    function writeRaiting(){
        $.post("./dbManage/GetDetailTour.php",{
            raitingInfo:$tourId
        }).then(function(data){
            if(data === "failed")
                $("#raitingPart").html("No rates you got");
            else
                $("#raitingPart").html(data);
        });
    }
    function writeGuide(){
        $.post("./dbManage/GetDetailTour.php",{
            guideInfo:$tourId
        }).then(function(data){
            if(data === "failed")
                $("#guidefortour").html("No Guide");
            else
                $("#guidefortour").html(data);
        });
    }
})

function writeExtraInfo(){
    $.post("./dbManage/GetDetailTour.php",{
        extraTourInfo:$tourId
    }).then(function(data){
       
        $extraInfo = JSON.parse(data);
        console.log($extraInfo);

        $("#tourSchedule").html($extraInfo.schedule);
        $("#tourTransportation").html($extraInfo.transport);
        console.log($extraInfo.recentraiting + ":" +$extraInfo.recentreview);
        if($extraInfo.recentraiting !== "0" && $extraInfo.recentreview !=="")
        {
            $reviewStr = "<div class='card border-secondary  mb-3'>"+
                        " <div class='card-header'>";
            for($i=0; $i<5; $i++ ){
                if($i < $extraInfo.recentraiting)
                    $reviewStr +="<span class='fa fa-star checked'></span>";
                else
                    $reviewStr +="<span class='fa fa-star'></span>";
                
            }
            $reviewStr += "</div><div class='card-body'>"+
                "<span class='card-title h5'>"+$extraInfo.recentTravelerName +"</span>"+
                "<span class='p style='margin-left:5px'> ("+$extraInfo.recentTravelerCountry+" )</span>"+
                "<p class='card-text mt-2'>"+ $extraInfo.recentreview +"</p>"+
                "</div>"+
            "</div>";
        
            $("#tourReview").html($reviewStr);
        }
        else  
            $("#tourReview").html("<h5 class='grey-text mt-4 mb-4'><strong>< < < No Recieved Feedback > > ><strong></h5>");

    })
}