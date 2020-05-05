$(document).ready(function(){
 
    $('#tourUnDate').datepicker({
      startDate: new Date(),
        multidate: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          daysOfWeekHighlighted: "0,6"
      });
      $('.selectpicker').selectpicker();
      // $.post("./dbManage/GetCountrySelect.php",{
      //   wholelanguages:"yes"
      // }).then(function(data){
      //   var langArray = JSON.parse(data)
      
      //   $.each(langArray,function(index){
      //     $('.selectpicker').append("<option value = '"+langArray[index]+"'>"+langArray[index]+"</option>");
      //   })
        
      // });
    //for countryselect List
    $("#tourState").html("<option>-Select Country First-</option>");
    $("#tourCity").html("<option>-Select State First-</option>");
    $("#tourState").prop("disabled",true);
    $("#tourCity").prop("disabled",true);
    getCountryList();
    // getLangList();
    $("#tourCountry").on('change',function(){
      $("#tourState").html("<option>Please wait...</option>");
      
      $.post("./dbManage/GetCountrySelect.php",{
        selectedCountry:$(this).find(':selected').val()
      }).then(function(data){
        $("#tourState").prop("disabled",false);
        $("#tourState").html(data);
        
        if($("#tourState").find(":selected").text() === "No State")
        {
            
          $("#tourCity").html("<option>Please wait...</option>");
              $.post("./dbManage/GetCountrySelect.php",{ 
                noState:$("#tourCountry").val()
              }).then(function(data){
                $("#tourCity").prop("disabled",false);
                $("#tourCity").html(data);
              
              });
       
        }
        else{
          $("#tourState").on('change',function(){
            $("#tourCity").html("<option>Please wait...</option>");
            
            $.post("./dbManage/GetCountrySelect.php",{
              selectedState:$(this).find(':selected').val()
            }).then(function(data){
              $("#tourCity").prop("disabled",false);
              $("#tourCity").html(data);
            
            });
          });
        }
        
      });
    });
   
    
})
function getCountryList(){
  $.post("./dbManage/GetCountrySelect.php",{
    wholecountries:"yes"
  }).then(function(data){
   $("#tourCountry").html(data);
  });
}
// function getLangList(){
//   $.post("./dbManage/GetCountrySelect.php",{
//     wholelanguages:"yes"
//   }).then(function(data){
//     var langArray = JSON.parse(data)
  
//     $.each(langArray,function(index){
//       $('.selectpicker').append("<option value = '"+langArray[index]+"'>"+langArray[index]+"</option>");
//     })
//    $('.selectpicker').selectpicker();
//   });
// }