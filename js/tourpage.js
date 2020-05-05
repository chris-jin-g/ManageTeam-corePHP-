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
    var $tourlist = $("#tourlist");
    var wantPlace = $("#tourGoInput").val();
    $wantPlaceArray = wantPlace.split(",");
    
    goCityName = $wantPlaceArray[0];
    goCountryName = $wantPlaceArray[2];
    getTourList(goCityName,goCountryName,$(".finalfromdate").val(),$(".finaltodate").val());
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
            $.post("./dbManage/GetTour.php",{
                newFind:"yes",
                goCityNameStr:goCityName,
                goStateNameStr:goStateName,
                goCountryNameStr:goCountryName,
                goFromDateStr:$(".finalfromdate").val(),
                goToDateStr:$(".finaltodate").val()
            }).then(function(data){
                if(data === "failed")
                    $tourlist.html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
                else{
                    $tourlist.html(data);
                    $("#tourWhere").html(" in "+goCityName);
                }
                
            });
        }else{
            $("#invalidInput").show();
        }
        $("#sorttxt").html("");
        $filterSearchStr = "";
       
    })
  
   
    getLangList();

    getTourCountNum();
    getCountryCountNum();
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
    
            if($filterSearchStr !== "")
            {
                $filterSearchStr = $filterSearchStr.substr(0,$filterSearchStr.length-3);
                $filterSearchStr = "WHERE" + $filterSearchStr + " and city = \'"+goCityName+"\' and state = \'"+goStateName+"\' and country = \'" + goCountryName + "\'" ;
                
               console.log($filterSearchStr);
                $.post("./dbManage/GetTour.php",{
                    filterSearchStr:$filterSearchStr
                }).then(function(data){
                    if(data === "failed")
                        $tourlist.html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
                    else
                        $tourlist.html(data);
                });
            }else{
               
                $filterSearchStr = "WHERE country =\'"+ goCountryName + "\' and state = \'"+goStateName+"\' and city = \'"+goCityName+"\'";
                console.log($filterSearchStr);
                $.post("./dbManage/GetTour.php",{
                    filterSearchStr:$filterSearchStr
                }).then(function(data){
                    if(data === "failed")
                        $tourlist.html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
                    else
                        $tourlist.html(data);
                });
            }
            $("#sorttxt").html("");
            }
            
        })
    
    $("#sortPriceASC").click(function(){
        console.log($filterSearchStr);
        if(goCityName&&goCountryName){
            $.post("./dbManage/GetTour.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                $tourlist.html(data);
                $("#sorttxt").html("(Sort by Price)");
            });
        }
     
    })
    
    $("#sortPriceDESC").click(function(){

        if(goCityName&&goCountryName){
            $.post("./dbManage/GetTour.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                $tourlist.html(data);
                $("#sorttxt").html("(Sort by Price)");
            });
        }
    })
    $("#sortRaiting").click(function(){
        if(goCityName&&goCountryName){
            $.post("./dbManage/GetTour.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                $tourlist.html(data);
                $("#sorttxt").html("(Sort by Raiting)");
            });
        }
    })
    $("#sortPeopleNum").click(function(){
       
        if(goCityName&&goCountryName){
            $.post("./dbManage/GetTour.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                $tourlist.html(data);
                $("#sorttxt").html("(Sort by Number of People)");
            });
        }
    })
    $("#sortPeriod").click(function(){
        if(goCityName&&goCountryName){
        
            $.post("./dbManage/GetTour.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                $tourlist.html(data);
                $("#sorttxt").html("(Sort by hours)");
            });
        }
    })
    $("#sortVisitNum").click(function(){
      
        if(goCityName&&goCountryName){
            $.post("./dbManage/GetTour.php",{
                sort: "yes",
                sortType:$(this).attr("id"),
                sortCountry:goCountryName,
                sortState:goStateName,
                sortCity:goCityName,
                fromDate:$("#fromDate").val(),
                toDate:$("#toDate").val(),
                withFilter:$filterSearchStr
            }).then(function(data){
                $tourlist.html(data);
                $("#sorttxt").html("(Sort by Visited Count)");
            });
        }
    })
  
    function getTourList(gocity,gocountry,fromDate,toDate){
        console.log(gocity+":"+gocountry+":"+fromDate+":"+toDate);
       if(gocity&&gocountry){
           $.post("./dbManage/GetTour.php",{
               newFind:"yes",
               goCityNameStr:gocity,
               goCountryNameStr:gocountry,
               goFromDateStr:fromDate,
               goToDateStr:toDate
           }).then(function(data){
               if(data === "failed")
                   $tourlist.html("<h3 class='card text-center text-danger' ><strong>No matching tours found!</strong></h3>");
               else{
                   $tourlist.html(data);
                   $("#tourWhere").html(" in " + gocity);
               }
               
           });
       }
   }
    function getLangList(){
        $.get("./dbManage/GetLangList.php",function(data){
           
            $("#langList").html(data);
        
        })
        
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

function getTourCountNum(){
    $.post("./dbManage/GetTour.php", {
        tourCount:"yes"
    }).then(function(data){
        $(".tourCountNum").html(data+" ");
    })
}
function getCountryCountNum(){
    $.post("./dbManage/GetTour.php", {
        countryCount:"yes"
    }).then(function(data){
        $(".countryCountNum").html(data+" ");
    })
}