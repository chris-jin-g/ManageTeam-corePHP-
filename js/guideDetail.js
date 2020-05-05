$(document).ready(function(){
    $guideId = $("#guideId").val();
    getLeftDetail();
    getRightDetail();
    
    getTourList();
    function getLeftDetail(){
        $.post("./dbManage/GetDetailGuide.php",{
            leftInfo:$guideId
        }).then(function(data){
            if(data === "failed")
                $("#guideLeft").html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
            else
                $("#guideLeft").html(data);
        });
    }
    function getRightDetail(){
      
        $.post("./dbManage/GetDetailGuide.php",{
            rightInfo:$guideId
        }).then(function(data){
            if(data === "failed")
                $("#guideRight").html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
            else
                $("#guideRight").html(data);
        });
    }
    function getTourList(){
        $.post("./dbManage/GetDetailGuide.php",{
            tourList:$guideId
        }).then(function(data){
            if(data === "failed")
                $("#tourlist").html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
            else
                $("#tourlist").html(data);
        });
    }
})