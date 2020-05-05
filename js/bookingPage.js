//set your publishable key
Stripe.setPublishableKey('pk_test_b5TfPTMmJhxxP5blXq9sHDWb00RXbOU7FZ');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" 
+ token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function(){

   $('.datepicker').datepicker({
      minDate:0,
      dateFormat:"yy-mm-dd",
      changeMonth: true,
      changeYear: true
  }); 
   
  var titleAndPrice;
   var price;
   var unableDates = [];
   var userID = $("#userID").val();
   var tourID = $("#tourID").val();
   console.log(userID +":"+ tourID);
   $.post("./dbManage/GetTour.php",{
      getTitleAndPrice:$("#tourID").val()
   },function(data){
      titleAndPrice = JSON.parse(data);
      // console.log(titleAndPrice['title']);
      $("#tourTitle").html(titleAndPrice['title']);
      $price = titleAndPrice['price'].slice(0,titleAndPrice['price'].length-1);
      $("#tourPrice").html($price+"$");
      price = Number($price);
      
   });
   $.post("./dbManage/GetTour.php",{
      getUnDates:$("#tourID").val()
   },function(data){
      unableDates = JSON.parse(data);
      var str = "";
      $.each(unableDates, function(index){
         str += unableDates[index] + ", ";
      });
      $("#tourUnDate").html(str.slice(0, str.length-2));
   });
   
   $("#currency").on("change",function(){
      switch($(this).find(":selected").val())
      {
         case "USD":
            $("#tourPrice").html(price+"$");
            
            break;
         case "AUD":
            
            $("#tourPrice").html((price*1.48).toFixed(0)+"$");
            break;
         case "INR":
            $("#tourPrice").html((price*70.8).toFixed(0)+"₹");
            break;
         case "GBP":
            $("#tourPrice").html((price*0.8).toFixed(0)+"£");
            break;
         case "EUR":
            $("#tourPrice").html((price*0.91).toFixed(0)+"€");
            break;
      }
   });
  
   //on form submit
   $("#paymentFrm").submit(function(event) {
      //disable the submit button to prevent repeated clicks
      $('#payBtn').attr("disabled", "disabled");
      
      //create single-use token to charge the user
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
      
      //submit from callback
      return false;
  });
});

