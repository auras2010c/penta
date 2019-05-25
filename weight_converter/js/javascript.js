	
$(document).ready(function() {

    $("#from").change(function() {
        var val = $(this).val();
        if (val == "grame") {
            $("#to").html("<option value='kilograme'>Kilograme</option>");
        } else if (val == "kilograme") {
            $("#to").html("<option value='grame'>Grame</option>");

        } else if (val == "minute") {
            $("#to").html("<option value='ore'>Ore</option>");

        }else if (val == 'ore') {
        	$("#to").html("<option value='minute'>Minute</option>");

        } else if (val == 'metri') {
        	$("#to").html("<option value='kilometri'>Kilometri</option>");

        }else if (val == 'kilometri') {
        	$("#to").html("<option value='metri'>Metri</option>");
        }
    });
});