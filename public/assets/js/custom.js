$(document).ready(function(){
    $("#half-day").change(function(){
        if($(this).prop("checked") == true){
            $("#end-date-div").hide();
            $("#hour-time-div").show();
            $("#end-date").attr('disabled','disabled');
            $("#start-time").removeAttr('disabled');
            $("#end-time").removeAttr('disabled');
        }
        else if($(this).prop("checked") == false){
            $("#end-date-div").show();
            $("#hour-time-div").hide();
            $("#end-date").removeAttr('disabled');
            $("#start-time").attr('disabled','disabled');
            $("#end-time").attr('disabled','disabled');
        }
    });
});