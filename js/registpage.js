$(document).ready(function(){
    makeCountryList();
    $("#userState").html("<option>-Select Country First-</option>");
    $("#userCity").html("<option>-Select State First-</option>");
    $("#userState").prop("disabled",true);
    $("#userCity").prop("disabled",true);
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
    if($("#guideAct option:selected").val() !== "Guider"){
        
        $("#guidePart").hide();

        // $("html").css("height","1000px");
        // $("body").css("height","1000px");
        // $("header").css("height","1000px");
        // $(".view").css("height","1000px");

        $('#guideAct').on('change', function() {
           
            if($(this).find(":selected").val() === "Guider"){
                $("#affilPart").show();
                $("#guidePart").show();
               
                $("#orangeForm-address").prop("required",true);
                $("#orangeForm-zip").prop("required",true);
                $("#orangeForm-homephone").prop("required",true);
                $("#orangeForm-cellphone").prop("required",true);
                $("#orangeForm-sky").prop("required",true);
                $("#affiliateURL").prop("required",false);
                $("#affiliateFurther").prop("required",false);
                $(".forAffil").hide();
                // $("html").css("height","1400");
                // $("body").css("height","1400");
                // $("header").css("height","1400");
                // $(".view").css("max-height","1400");
            }else if($(this).find(":selected").val() === "Affiliate"){
                $("#guideOraffiliate").html("Become an Affiliate");
                $("#affilPart").hide();
                $(".forAffil").show();
                $("#guidePart").show();
            
                $("#orangeForm-address").prop("required",true);
                $("#orangeForm-zip").prop("required",true);
                $("#orangeForm-homephone").prop("required",true);
                $("#orangeForm-cellphone").prop("required",true);
                $("#orangeForm-sky").prop("required",true);
                $("#affiliateURL").prop("required",true);
                $("#affiliateFurther").prop("required",true);
            }
            else{
                $("#guidePart").hide();
             
                $("#orangeForm-address").prop("required",false);
                $("#orangeForm-zip").prop("required",false);
                $("#orangeForm-homephone").prop("required",false);
                $("#orangeForm-cellphone").prop("required",false);
                $("#orangeForm-sky").prop("required",false);
                $("#affiliateURL").prop("required",false);
                $("#affiliateFurther").prop("required",false);
                // $("html").css("height","1000");
                // $("body").css("height","1000");
                // $("header").css("height","1000");
                // $(".view").css("height","1000");
            }
               
        });
    }
        
 
    
})
function makeCountryList(){
    $.post("./dbManage/GetCountrySelect.php",{
        wholecountries:"yes"
      }).then(function(data){
       $("#userCountry").html(data);
    });
}