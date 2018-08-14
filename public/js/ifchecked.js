
$("#grades").hide();
$("#tribes").hide();
$("#leaders").hide();


$( "input[name='allTree']" ).on( "change", function( event ) {
    var value = $(this).val();
    if(value == "N") {
      $("#grades").show();
      $("#tribes").show();
        $("#leaders").show();
    }
    else {
      $("#grades").hide();
      $("#tribes").hide();
        $("#leaders").hide();
    }

});
//
// $("#editButton").hide();
// auth = new Auth();
// if(auth.user.rules == 'leadership')
//     $("#editButton").show();