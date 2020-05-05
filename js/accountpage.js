$(document).ready(function(){
    $(".leftmenu").click(function(){
        $title = $(this).text();
        $("#title").html($title);
    })
    $('.datepicker').datepicker({
        // // startDate: new Date(),
        // // weekStart:1,
        // // color: 'red',
        // format: 'yyyy-mm-dd',
        // todayHighlight : true
        minDate:0,
        dateFormat:"yy-mm-dd"
    });
    writeInbox();
    writeOutbox();    
    WriteCountryList();
    writeOwnTourInfo();
    
    $("#owntourpart").hide();
    $("#invalidInput").hide();
    $("#updateBtn").hide();
 
    $("#showowntourpart").click(function(){
        $.post("./dbManage/OwnTour.php",{
            getCount:$("#userID").val()
        }).then(function(data){
            if(data < 3){
                $("#owntourpart").show();
                $("#buildorupdate").html("Build your own tour");
                $("#buildBtn").show();
                $("#updateBtn").hide();
            }
            else
                alert("You can't build new own tour anymore! \n Number of m aximum own tours is 3...");
        });
      
    });
    $("#sendNewMsg").click(function(){
        
        $str = "<option value = '0'>TourBuddySupport</optin>";
        $.each($recievemsgInfo,function(index){
            $str += "<option value='"+$recievemsgInfo[index].fromId+"'>"+$recievemsgInfo[index].fromName+"</option>";
        })
        $(".toSelect").html($str);

        $("#sendMsgModal").modal("show");
    })
    $("#msgSendBtn").click(function(){
        
        $.post("./dbManage/MessageSending.php",{
            newMessage:"yes",
            fromId:$("#userID").val(),
            toId:$(".toSelect").val(),
            content:$(".toContent").val()
        }).then(function(data){
            if(data === "success")
            {
                alert("Success to send new message!");
                writeOutbox();
            }
        })

    })

    $("#buildBtn").click(function(){
   

        if($("#ownTitle").val() && $("#userCountry2").val() && $("#userCity2").val() && $("#tourDuration").val() && $("#tourPeopleNum").val() && $("#tourPrice").val() && $("#expireDate").val())
         {
            
            $("#invalidInput").hide();
            $.post("./dbManage/OwnTour.php",{
                build:"yes",
                travelerID:$("#userID").val(),
                title:$("#ownTitle").val(),
                country:$("#userCountry2").val(),
                state:$("#userState2").val(),
                city:$("#userCity2").val(),
                duration:$("#tourDuration").val(),
                peopleNum:$("#tourPeopleNum").val(),
                price:$("#tourPrice").val(),
                date:$("#expireDate").val() 
            }).then(function(data){
                if(data === "success")
                {
                   writeOwnTourInfo();
                    $("#owntourpart").hide();
                    // $("#showowntourpart").hide();
                   
                }
            })
         }  
        else
            $("#invalidInput").show();
    });
    $("#updateBtn").click(function(){
   
        console.log(upId);
        if($("#ownTitle").val() && $("#userCountry2").val() && $("#userCity2").val() && $("#tourDuration").val() && $("#tourPeopleNum").val() && $("#tourPrice").val() && $("#expireDate").val())
         {
            
            $("#invalidInput").hide();
            $.post("./dbManage/OwnTour.php",{
                update:"yes",
                id:upId,
                title:$("#ownTitle").val(),
                country:$("#userCountry2").val(),
                state:$("#userState2").val(),
                city:$("#userCity2").val(),
                duration:$("#tourDuration").val(),
                peopleNum:$("#tourPeopleNum").val(),
                price:$("#tourPrice").val(),
                date:$("#expireDate").val() 
            }).then(function(data){
                if(data === "success")
                {
                   writeOwnTourInfo();
                    $("#owntourpart").hide();
                    // $("#showowntourpart").hide();
                   
                }
            })
         }  
        else
            $("#invalidInput").show();
    });
    $("#ownTourTitleSel").on("change",function(){
        console.log($("#ownTourTitleSel").find(":selected").val());
        $("#ownTourSelGuides").html("Guides bade to \""+$("#ownTourTitleSel").find(":selected").text()+"\"");
        $.post("./dbManage/OwnTour.php",{
            getGuides:$("#ownTourTitleSel").find(":selected").val()
        }).then(function(data){
            if(data){
                ownTourGuideInfo = JSON.parse(data);
                console.log(ownTourGuideInfo);
                writeOwnTourGuides();
            }
            else{
                $("#ownTourGuides").html("");
            }
            
        })
    });
    
    
});
function  WriteCountryList(){
    $.post("./dbManage/GetCountrySelect.php",{
        wholecountries:"yes"
    }).then(function(data){
       $("#userCountry").html(data);
       writeUserInfo();
       //for own tour build
       $("#userCountry2").html(data);
       
       $("#userCountry2").on('change',function(){
        $("#userState2").html("<option>Please wait...</option>");
        
        $.post("./dbManage/GetCountrySelect.php",{
          selectedCountry:$(this).find(':selected').val()
        }).then(function(data){
          $("#userState2").prop("disabled",false);
          $("#userState2").html(data);
          
          if($("#userState2").find(":selected").text() === "No State")
          {
              
            $("#userCity2").html("<option>Please wait...</option>");
                $.post("./dbManage/GetCountrySelect.php",{ 
                  noState:$("#userCountry2").val()
                }).then(function(data){
                  $("#userCity2").prop("disabled",false);
                  $("#userCity2").html(data);
                
                });
         
          }
          else{
            $("#userState2").on('change',function(){
                $("#userCity2").html("<option>Please wait...</option>");
                
                $.post("./dbManage/GetCountrySelect.php",{
                  selectedState:$(this).find(':selected').val()
                }).then(function(data){
                  $("#userCity2").prop("disabled",false);
                  $("#userCity2").html(data);
                
                });
              });
          }
    
        });
      });
    })
}
var $recievemsgInfo;
var $sendmsgInfo;
var ownTourInfo;
var ownTourGuideInfo;
var ownLocalTour;
var upId;
var $userInfo;
function writeInbox(){
    $.post("./dbManage/MessageSending.php",{
        inboxID:$("#userID").val()
    }).then(function(data){
        if(data === "failed")
            $("#inboxmsg").html("<h5 class='grey-text mt-4 mb-4'><strong>< < < No Recieved Messages > > ><strong></h5>");
        else{
            $recievemsgInfo = JSON.parse(data);
           

            $unreadCount = 0;

            $str = "<table class='table mt-4'>"+
            "<thead class='grey lighten-2'>"+
              "<tr>"+
                "<th scope='col'>Date</th>"+
                "<th scope='col'>From</th>"+
                "<th scope='col'></th>"+
                "<th scope='col'></th>"+
              "</tr>"+
            "</thead>"+
           "<tbody>";
            
            $.each($recievemsgInfo,function(index){
                if($recievemsgInfo[index].readed === "0")
                {
                    $unreadCount++;
                    if($recievemsgInfo[index].fromId ==="0")
                        $str += "<tr>"+
                            "<th scope='row' class='text-danger font-weight-bold' >"+$recievemsgInfo[index].date+"</th>"+
                            "<td class='text-danger font-weight-bold'>"+"TourBuddySupport"+"</td>"+
                            "<td class='tablebtn'><button onclick='showMessage("+ index+ ")' class='btn btn-default btn-sm'>view</button></td>"+
                            "<td class='tablebtn'><button onclick='delMessage("+ index+ ")' class='btn btn-grey btn-sm'>remove</button></td>"+
                        "</tr>";
                    else
                        $str += "<tr>"+
                            "<th scope='row' class='text-danger font-weight-bold' >"+$recievemsgInfo[index].date+"</th>"+
                            "<td class='text-danger font-weight-bold'>"+$recievemsgInfo[index].fromName+"</td>"+
                            "<td class='tablebtn'><button onclick='showMessage("+ index+ ")' class='btn btn-default btn-sm'>view</button></td>"+
                            "<td class='tablebtn'><button onclick='delMessage("+ index+ ")' class='btn btn-grey btn-sm'>remove</button></td>"+
                        "</tr>";
                }
                else
                {
                    if($recievemsgInfo[index].fromId ==="0")
                        $str += "<tr>"+
                        "<th scope='row'>"+$recievemsgInfo[index].date+"</th>"+
                        "<td>"+"TourBuddySupport"+"</td>"+
                        "<td class='tablebtn'><button onclick='showMessage("+ index + ")' class='btn btn-default btn-sm'>view</button></td>"+
                        "<td class='tablebtn'><button onclick='delMessage("+ index+ ")' class='btn btn-grey btn-sm'>remove</button></td>"+
                    "</tr>";
                    else
                        $str += "<tr>"+
                            "<th scope='row'>"+$recievemsgInfo[index].date+"</th>"+
                            "<td>"+$recievemsgInfo[index].fromName+"</td>"+
                            "<td class='tablebtn'><button onclick='showMessage("+ index + ")' class='btn btn-default btn-sm'>view</button></td>"+
                            "<td class='tablebtn'><button onclick='delMessage("+ index+ ")' class='btn btn-grey btn-sm'>remove</button></td>"+
                        "</tr>";
                   
                }
                
            });
            $str +="</tbody></table>";
            if($unreadCount !== 0)
                $("#unreadcount").html("( "+$unreadCount+" New Message )");
            $("#inboxmsg").html($str);
    
        }
        
    });
}
function writeOutbox(){
    $.post("./dbManage/MessageSending.php",{
        outboxID:$("#userID").val()
    }).then(function(data){
        if(data === "failed")
            $("#outboxmsg").html("<h5 class='grey-text mt-4 mb-4'><strong>< < < No Sent Messages > > ><strong></h5>");
        else{
            $sendmsgInfo = JSON.parse(data);
          
            $str = "<table class='table mt-4'>"+
            "<thead class='grey lighten-2'>"+
              "<tr>"+
                "<th scope='col'>Date</th>"+
                "<th scope='col'>To</th>"+
                "<th scope='col'></th>"+
                "<th scope='col'></th>"+
              "</tr>"+
            "</thead>"+
           "<tbody>";
            
            $.each($sendmsgInfo,function(index){
                if($sendmsgInfo[index].toId === "0")
                    $str += "<tr>"+
                        "<th scope='row'>"+$sendmsgInfo[index].date+"</th>"+
                        "<td>"+"TourBuddySupport"+"</td>"+
                        "<td class='tablebtn'><button onclick='showSentMessage("+ index+ ")' class='btn btn-default btn-sm'>view</button></td>"+
                        "<td class='tablebtn'><button onclick='delSentMessage("+ index+ ")' class='btn btn-grey btn-sm'>remove</button></td>"+
                    "</tr>";
                else
                $str += "<tr>"+
                                "<th scope='row'>"+$sendmsgInfo[index].date+"</th>"+
                                "<td>"+$sendmsgInfo[index].toName+"</td>"+
                                "<td class='tablebtn'><button onclick='showSentMessage("+ index+ ")' class='btn btn-default btn-sm'>view</button></td>"+
                                "<td class='tablebtn'><button onclick='delSentMessage("+ index+ ")' class='btn btn-grey btn-sm'>remove</button></td>"+
                            "</tr>";
            });
            $str +="</tbody></table>";
            $("#outboxmsg").html($str);
    
        }
        
    });
}
function writeLocalTours(country,state,city){
    console.log(country + ":"+ state + ":"+city);
    $.post("./dbManage/OwnTour.php",{
        getLocalTours:"yes",
        country:country,
        state:state,
        city:city,
        guideId:$("#userID").val()
    }).then(function(data) {
        if (data) {
            ownLocalTour = JSON.parse(data);
            console.log(ownLocalTour);
            var str = "";
         
            $.each(ownLocalTour,function(index){
                if(ownLocalTour[index].state){
                    str += '<div class="card text-center border-default mb-3" style="max-width: 20rem;">'+
                    '<div class="card-header text-default h4">'+ ownLocalTour[index].title +'</div>'+
                    '<div class="card-body">'+
                        
                        '<h5 class="text-info">'+ownLocalTour[index].city+', '+ownLocalTour[index].state+', '+ownLocalTour[index].country+'</h5>'+'<hr>'+
                        '<h4 class="card-title text-warning">'+ownLocalTour[index].price+'$'+'</h4>'+
                        '<h5 class="text-success">'+ownLocalTour[index].duration+' (Hours)'+'</h5>'+
                        '<h5 class="text-success">'+ownLocalTour[index].peopleNum+' (People)'+'</h5>'+'<hr>'+
                        '<p class="card-text text-danger">'+ 'Expire Date:'+ ownLocalTour[index].date+'</p>'+
                    '</div>'+
                  
                    '<button onclick = "showInterest('+index+')" class="btn btn-warning">Show interest</button>'+
                '</div>';
                }
                else{
                    str += '<div class="card text-center border-default mb-3" style="max-width: 20rem;">'+
                    '<div class="card-header text-default h4">'+ ownLocalTour[index].title +'</div>'+
                    '<div class="card-body">'+
                        
                        '<h5 class="text-info">'+ownLocalTour[index].city+', '+ownLocalTour[index].country+'</h5>'+'<hr>'+
                        '<h4 class="card-title text-warning">'+ownLocalTour[index].price+'$'+'</h4>'+
                        '<h5 class="text-success">'+ownLocalTour[index].duration+' (Hours)'+'</h5>'+
                        '<h5 class="text-success">'+ownLocalTour[index].peopleNum+' (People)'+'</h5>'+'<hr>'+
                        '<p class="card-text text-danger">'+ 'Expire Date:'+ ownLocalTour[index].date+'</p>'+
                    '</div>'+
                   
                    '<button onclick = "showInterest('+index+')" class="btn btn-warning">show interest</button>'+
                '</div>';
                }
                
            });
            $("#localTours").html(str);
        }
        else
            $("#localTours").html("<h4 class='text-warning'>No Local Tours</h4>");
        
    });
}
function writeOwnTourInfo(){
    $.post("./dbManage/OwnTour.php",{
        getOwnTour:"yes",
        userID:$("#userID").val()
    }).then(function(data){
        if(data){
            // $("#showowntourpart").hide();
            
            ownTourInfo = JSON.parse(data);
            console.log(ownTourInfo);
            var str = "";
            var selStr = "";
            $.each(ownTourInfo,function(index){
                if(ownTourInfo[index].state){
                    str += '<div class="card text-center border-default mb-3" style="max-width: 20rem;">'+
                    '<div class="card-header text-default h4">'+ ownTourInfo[index].title +'</div>'+
                    '<div class="card-body">'+
                        
                        '<h5 class="text-info">'+ownTourInfo[index].city+', '+ownTourInfo[index].state+', '+ownTourInfo[index].country+'</h5>'+'<hr>'+
                        '<h4 class="card-title text-warning">'+ownTourInfo[index].price+'$'+'</h4>'+
                        '<h5 class="text-success">'+ownTourInfo[index].duration+' (Hours)'+'</h5>'+
                        '<h5 class="text-success">'+ownTourInfo[index].peopleNum+' (People)'+'</h5>'+'<hr>'+
                        '<p class="card-text text-danger">'+ 'Expire Date:'+ ownTourInfo[index].date+'</p>'+
                    '</div>'+
                    '<button onclick = "updateOwnTour('+index+')" class="btn btn-default">update tour</button>'+
                    '<button onclick = "removeOwnTour('+index+')" class="btn btn-grey">remove</button>'+
                '</div>';
                }
                else{
                    str += '<div class="card text-center border-default mb-3" style="max-width: 20rem;">'+
                    '<div class="card-header text-default h4">'+ ownTourInfo[index].title +'</div>'+
                    '<div class="card-body">'+
                        
                        '<h5 class="text-info">'+ownTourInfo[index].city+', '+ownTourInfo[index].country+'</h5>'+'<hr>'+
                        '<h4 class="card-title text-warning">'+ownTourInfo[index].price+'$'+'</h4>'+
                        '<h5 class="text-success">'+ownTourInfo[index].duration+' (Hours)'+'</h5>'+
                        '<h5 class="text-success">'+ownTourInfo[index].peopleNum+' (People)'+'</h5>'+'<hr>'+
                        '<p class="card-text text-danger">'+ 'Expire Date:'+ ownTourInfo[index].date+'</p>'+
                    '</div>'+
                    '<button onclick = "updateOwnTour('+index+')" class="btn btn-default">update tour</button>'+
                    '<button onclick = "removeOwnTour('+index+')" class="btn btn-grey">remove</button>'+
                '</div>';
                }
                selStr += '<option value="'+ownTourInfo[index].id+'">'+ownTourInfo[index].title+'</option>';
            })
            $("#owntourcard").html(str);
            $("#ownTourTitleSel").html(selStr);
            $("#ownTourSelGuides").html("Guides bade to \""+ownTourInfo[0].title+"\"");
            $("#owntourpart").hide();
            $.post("./dbManage/OwnTour.php",{
                getGuides:ownTourInfo[0].id
            }).then(function(data){
                if(data)
                {
                    ownTourGuideInfo = JSON.parse(data);
                    console.log(ownTourGuideInfo);
                    writeOwnTourGuides();
                }
             
            })
        }else{
            $("#owntourcard").html("");
            // console.log(ownTourInfo);
            ownTourInfo = [];
            $("#owntourpart").hide();
            // $("#showowntourpart").show();
        }
            
    });
    
}
function writeOwnTourGuides(){
    var str = "";

    $.each(ownTourGuideInfo,function(index){
        str +="<div class='card mb-4 hovercard' style='max-width:17rem'>"+
        "<div class='cardheader'></div>"+
        "<div class='avatar'><img src='./img/guiders/"+ownTourGuideInfo[index].imgpath+"'></div>"+
        "<div class='info'>"+
        "<h4 class='text-dark'><strong>"+ownTourGuideInfo[index].guideName+"</strong></h4>"+
        "<hr>";
        for(var i=0; i<5; i++ ){
            if(i < ownTourGuideInfo[index].raiting)
                str+= "<span class='fa fa-star checked'></span>";
            else
                str+= "<span class='fa fa-star'></span>";

        }
        str+="<span class='grey-text'> ("+ownTourGuideInfo[index].guideNum+" visits)</span>";

        str+= "<hr>"+           
                "<i class='fas fa-address-book' style = 'font-size:20px'></i>"+
                       "<h6> <strong>"+ownTourGuideInfo[index].city+", "+ownTourGuideInfo[index].country+"</strong></h6>"+
                       "<i class='fas fa-language' style = 'font-size:30px'></i>";
        // $.post("./dbManage/OwnTour.php",{
        //     getGuideLang:ownTourGuideInfo[index].reg_id
        // }).then(function(data){
            
        //     str += "<h6><i><strong>"+data+"</strong></i></h6>";
            
        // });
        $.ajax({
            type: 'POST',
            url: "./dbManage/OwnTour.php",
            data: {getGuideLang:ownTourGuideInfo[index].reg_id},
            async:false
          }).done(function(data){
            str += "<h6><i><strong>"+data+"</strong></i></h6>";
          });
        str+="</div></div>";
        
    });
    $("#ownTourGuides").html(str);
}
function updateOwnTour(index){
    $("#owntourpart").show();
    $("#buildorupdate").html("Update your own tour");
    $("#buildBtn").hide();
    $("#updateBtn").show();
    // console.log(ownTourInfo[index].id);
    upId = ownTourInfo[index].id;
    
}
function removeOwnTour(index){
    // console.log(ownTourInfo[index].id);
    $.post("./dbManage/OwnTour.php",{
        remove:ownTourInfo[index].id
    }).then(function(data){
        if(data === "success")
            writeOwnTourInfo();
    });
}
function showInterest(index) {
    console.log($("#userID").val() + ":" + ownLocalTour[index].id);
    $.post("./dbManage/OwnTour.php",{
        showInterest:"yes",
        guideId:$("#userID").val(),
        ownTourId:ownLocalTour[index].id
    }).then(function(data){
        if(data === "success"){
            alert("Success!");
            writeLocalTours($userInfo.country,$userInfo.state,$userInfo.g_city);
        }
        else{
            alert("Failed!");
        }
    }); 
    
}
function showMessage(index){
 
    $("#basicExampleModal .modal-body").html($recievemsgInfo[index].content);
    $("#basicExampleModal").modal("show");
    $.post("./dbManage/MessageSending.php",{
        readedID:$recievemsgInfo[index].id
    }).then(function(data){
        if(data === "success"){
            $("#unreadcount").html("");
            writeInbox();
        }
           
    });
}
function showSentMessage(index){
 
    $("#basicExampleModal .modal-body").html($sendmsgInfo[index].content);
    $("#basicExampleModal").modal("show");
}


function delMessage(index){
    $.post("./dbManage/MessageSending.php",{
        deleteID:$recievemsgInfo[index].id
    }).then(function(data){
        if(data === "success"){
            writeInbox();
        }
           
    });
}
function delSentMessage(index){
    $.post("./dbManage/MessageSending.php",{
        deleteID:$sendmsgInfo[index].id
    }).then(function(data){
        if(data === "success"){
            writeOutbox();
        }
           
    });
}
function writeUserInfo(){
    
    $.post("./dbManage/MessageSending.php",{
        userInfoID:$("#userID").val()
    }).then(function(data){ 
 
        $userInfo = JSON.parse(data);
        console.log($userInfo);
        writeLocalTours($userInfo.country,$userInfo.state,$userInfo.g_city);
        $("#userName").val($userInfo.name);
        $("#userSex").val($userInfo.sex);
        // $("#userCity").val($userInfo.g_city);
        $("#userCountry").val($userInfo.country);
        $("#userState").append("<option value='"+$userInfo.state+"'>"+$userInfo.state+"</option>");
        $("#userCity").append("<option value='"+$userInfo.g_city+"'>"+$userInfo.g_city+"</option>");
        
        // $("#userCountry option[value=India]").attr('selected',true);
        $("#userAddress").val($userInfo.g_address);
        $("#userZip").val($userInfo.g_zip);
        $("#userHomePhone").val($userInfo.g_homephone);
        $("#userCellPhone").val($userInfo.g_cellphone);
        $("#userEmail").val($userInfo.email);

        $("#userCountry").on('change',function(){
            $("#userState").html("<option>Please wait...</option>");
            
            $.post("./dbManage/GetCountrySelect.php",{
              selectedCountry:$(this).find(':selected').val()
            }).then(function(data){
              $("#userState").prop("disabled",false);
              $("#userState").html(data);
              
              if($("#userState").find(":selected").text() === "No State")
              {
                  
                $("#userCity").html("<option>Please wait...</option>");
                    $.post("./dbManage/GetCountrySelect.php",{ 
                      noState:$("#userCountry").val()
                    }).then(function(data){
                      $("#userCity").prop("disabled",false);
                      $("#userCity").html(data);
                    
                    });
             
              }
              else{
                $("#userState").on('change',function(){
                    $("#userCity").html("<option>Please wait...</option>");
                    
                    $.post("./dbManage/GetCountrySelect.php",{
                      selectedState:$(this).find(':selected').val()
                    }).then(function(data){
                      $("#userCity").prop("disabled",false);
                      $("#userCity").html(data);
                    
                    });
                  });
              }
        
            });
          });
        $("#updateInfo").click(function(){
           $.post("./dbManage/MessageSending.php",{
               update:"yes",
               id:$("#userID").val(),
               name:$("#userName").val(),
               sex:$("#userSex").val(),
               city:$("#userCity").val(),
               state:$("#userState").val(),
               country:$("#userCountry").val(),
               address:$("#userAddress").val(),
               zip:$("#userZip").val(),
               homephone:$("#userHomePhone").val(),
               cellphone:$("#userCellPhone").val(),
               email:$("#userEmail").val()
           }).then(function(data){
                if(data === "success"){
                    $(".successMsg").html("Update Success!");
                    setTimeout(function(){$(".successMsg").html(""); }, 2000);
                }
           });
        })
    });
}