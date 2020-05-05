$(document).ready(function(){
    
    

    getCountrySelect();

    function getCountrySelect(){
        $.get("./dbManage/GetCountrySelect.php",function(data){
            $("#countryselect").prepend(data);
        })
    
    }
})