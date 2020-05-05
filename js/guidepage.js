$(document).ready(function(){
    
    //for datepicker
    $('.datepicker').datepicker({
        // // startDate: new Date(),
        // // weekStart:1,
        // // color: 'red',
        // format: 'yyyy-mm-dd',
        // todayHighlight : true
        minDate:0,
        dateFormat:"yy-mm-dd"
    });
    var dateFormat = "yy-mm-dd",
    from = $( "#fromDate" )
      .datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        to.datepicker( "option", "minDate", getDate( this ) );
      }),
    to = $( "#toDate" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3
    })
    .on( "change", function() {
      from.datepicker( "option", "maxDate", getDate( this ) );
    });

  function getDate( element ) {
    var date;
    try {
      date = $.datepicker.parseDate( dateFormat, element.value );
    } catch( error ) {
      date = null;
    }

    return date;
  }
    // $('#langList').multiselect();
    var $guideList = $("#guideList");
    var wantPlace = $("#tourGoInput").val();
    $wantPlaceArray = wantPlace.split(",");
    
    goCityName = $wantPlaceArray[0];
    goCountryName = $wantPlaceArray[2];
    
    getLangList();
    getGuideList(goCityName,goCountryName,$(".finalfromdate").val(),$(".finaltodate").val());
    getCompanyList();
    getGuideCountNum();
    getCountryCountNum();

    $("#tourGoList").hide();
    $("#invalidInput").hide();
    $("#tourGoInput").focus(function(){
       
        $("#invalidInput").hide();
    })
    $("#tourGoInput").keyup(function(){
         
        $.post("./dbManage/GetTour.php", {
            tourWanted:$("#tourGoInput").val()
        }).then(function(data){
            if(data === "failed")
                $("#tourGoList").hide();
            else{
                $listObjArray = JSON.parse(data);
                $("#tourGoList").html("");
                $.each($listObjArray,function(index){
                    if($listObjArray[index].state)
                    $str = "<div class = 'forHover' onclick = 'addToInput("+index+")' style='border-bottom:1px solid grey; padding:5px'>"+
                   "<span class='h6'>"+ $listObjArray[index].city+"</span>"+", "+
                   "<span class='h6 font-weight-light'>"+ $listObjArray[index].state+"</span>"+", "+
                    "<spna class='h6 grey-text'>"+$listObjArray[index].country+"</span>"+
                    "</div>";
                    else
                    $str = "<div class = 'forHover' onclick = 'addToInput("+index+")' style='border-bottom:1px solid grey; padding:5px'>"+
                   "<span class='h6'>"+ $listObjArray[index].city+"</span>"+", "+
                    "<spna class='h6 grey-text'>"+$listObjArray[index].country+"</span>"+
                    "</div>";

                    $("#tourGoList").append($str);   
                })      
                $("#tourGoList").show();
                // console.log($listObjArray);
            }
        
        })
        
        // console.log($(this).val());
    });
    $(".finalgobtn").click(function(){
        console.log(goCityName+":"+goStateName+":"+goCountryName+":"+$(".finalfromdate").val()+":"+$(".finaltodate").val());
        if(goCityName&&goCountryName){
            $.post("./dbManage/GetGuideList.php",{
                newFind:"yes",
                goCityNameStr:goCityName,
                goStateNameStr:goStateName,
                goCountryNameStr:goCountryName,
                goFromDateStr:$(".finalfromdate").val(),
                goToDateStr:$(".finaltodate").val()
            }).then(function(data){
                if(data === "failed")
                    $guideList.html("<h3 class='card text-center text-danger' ><strong>No matching Guides found!</strong></h3>");
                else{
                    $guideList.html(data);
                    $("#tourWhere").html("in "+goCityName);
                }
                
            });
        }else{
            $("#invalidInput").show();
        }
        $("#sorttxt").html("");
        $filterSearchStr = "";
       
    })
    var $filterSearchStr = "";
    $("#searchbtn").click(function(){
        if(goCityName&&goCountryName){
        $filterSearchStr = "";
        var $keySearch = $("#keySearch").val();
        var $fromDate = $("#fromDate").val();
        var $toDate = $("#toDate").val();
        var $specialInterest = $("input[name='specialInterest']:checked"). val();
        var $localArea = $("input[name='localArea']:checked").val();
        var $tourDuration = $("input[name='tourDuration']:checked").val();
        // alert($keySearch+"---"+$fromDate+"---"+$toDate+"---"+$specialInterest+"---"+
        // $localArea+"---"+$tourDuration);

       
        var $langList = $("#langList option:selected").val();
        var $companyList = $("#companyList option:selected").val();
        // if(!$fromDate) alert("tourduration is null"); 
        if($keySearch)
            // alert("detail LIKE '%"+ $keySearch+"%' OR title LIKE '%"+$keySearch+"%'");
            $filterSearchStr += " (detail LIKE '%"+ $keySearch+"%' OR title LIKE '%"+$keySearch+"%') AND";
        if($fromDate || $toDate)
            // alert("unableDate NOT IN ('"+$fromDate+"','"+$toDate+"')");
            $filterSearchStr += " unableDate NOT IN ('"+$fromDate+"','"+$toDate+"') AND";
        if($specialInterest)
            if($specialInterest !== "any")
                $filterSearchStr += " "+$specialInterest +"= '1' AND";
            else
                $filterSearchStr += "";
        if($localArea)
            if($localArea !== "any")
                $filterSearchStr += " "+$localArea+" = '1' AND";
            else
                $filterSearchStr += "";
        if($tourDuration){
            switch($tourDuration)
            {
                case "any":
                        $filterSearchStr += "";
                        break;
                case "upto5":
                        $filterSearchStr += " period <= '5' AND";
                        break;
                case "more5upto10":
                        $filterSearchStr += " period >= '5' AND period <= '10' AND";
                        break;
                case "more10":
                        $filterSearchStr += " period >= '10' AND";
                        break;
            }

        }
        if($langList)
            $filterSearchStr +=" language = '"+ $langList+"' AND";
        if($companyList)
            $filterSearchStr +=" company = '"+ $companyList+"' AND";

        if($filterSearchStr !== "")
        {
            $filterSearchStr = $filterSearchStr.substr(0,$filterSearchStr.length-3);
           $filterSearchStr = "WHERE" + $filterSearchStr + " and tourinfo.city = \'"+goCityName+"\' and tourinfo.state = \'"+goStateName+"\' and tourinfo.country = \'" + goCountryName + "\'" ;
              
            console.log($filterSearchStr);
            
        }else{
            
            $filterSearchStr = "WHERE tourinfo.country =\'"+ goCountryName + "\' and tourinfo.state =\'"+ goStateName + "\' and tourinfo.city = \'"+goCityName+"\'";
            console.log($filterSearchStr);
          
        }
        $.post("./dbManage/GetGuideList.php",{
            filterSearchStr:$filterSearchStr
        }).then(function(data){
            if(data === "failed")
                $guideList.html("<h3 class='card text-center text-danger' ><strong>No matching guides found!</strong></h3>");
            else
                $guideList.html(data);
        });
        $("#sorttxt").html("");
        }
    })
    
    
    $("#sortRaiting").click(function(){

        if(goCityName&&goCountryName){
           
            $.post("./dbManage/GetGuideList.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                if(data === "failed")
                    $guideList.html("<h3 class='card text-center text-danger' ><strong>No matching guides found!</strong></h3>");
                else{
                    $guideList.html(data);
                    $("#sorttxt").html("(Sort by Raiting)");
                }
            
            });
        }
    })
    $("#sortGuideCount").click(function(){
        if(goCityName&&goCountryName){
            $.post("./dbManage/GetGuideList.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                if(data === "failed")
                    $guideList.html("<h3 class='card text-center text-danger' ><strong>No matching guides found!</strong></h3>");
                else{
                    $guideList.html(data);
                    $("#sorttxt").html("(Sort by Guided Count)");
                }
            });
        }
       
    })
  
    
    function getLangList(){
        $.get("./dbManage/GetLangList.php",function(data){
          
            $("#langList").html(data);
        
        })
        
    }
    function getCompanyList(){
        $.get("./dbManage/GetCompanyList.php",function(data){
          
            $("#companyList").html(data);
        
        })
        
    }
    
    function getGuideList(gocity,gocountry,fromDate,toDate){
        // alert(gocity+":"+gocountry+":"+fromDate+":"+toDate);
        if(gocity&&gocountry){
            $.post("./dbManage/GetGuideList.php",{
                newFind:"yes",
                goCityNameStr:gocity,
                goCountryNameStr:gocountry,
                goFromDateStr:fromDate,
                goToDateStr:toDate
            }).then(function(data){
                if(data === "failed")
                    $guideList.html("<h3 class='card text-center text-danger' ><strong>No matching Guides found!</strong></h3>");
                else{
                    $guideList.html(data);
                    $("#tourWhere").html(gocity);
                }
                
            });
        }
    }
    
})
var $listObjArray;
var goCityName,goCountryName,goStateName;
function addToInput(index){
    if($listObjArray[index].state)
        $("#tourGoInput").val($listObjArray[index].city + "," + $listObjArray[index].state + "," + $listObjArray[index].country);
    else
        $("#tourGoInput").val($listObjArray[index].city +"," + $listObjArray[index].country);
  
    $("#tourGoList").hide();
    goCityName = $listObjArray[index].city;
    goCountryName = $listObjArray[index].country;
    goStateName = $listObjArray[index].state;
}
function getGuideCountNum(){
    $.post("./dbManage/GetTour.php", {
        guideCount:"yes"
    }).then(function(data){
        $(".guideCountNum").html(data+" ");
    })
}
function getCountryCountNum(){
    $.post("./dbManage/GetTour.php", {
        guideCountryCount:"yes"
    }).then(function(data){
        $(".countryCountNum").html(data+" ");
    })
}