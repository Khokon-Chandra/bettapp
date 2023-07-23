setInterval(function () {
    $.ajax({
        url: "refresh.php",
        success: function (data) {

            if (data === "1") {
                $("#liveContent").load('content.php');
                $("#upcomingContent").load('upcomingMatch.php');
            }
        }
    });
}, 40000);
$("#all").on("click", function () {

    $("#liveContent").load('content.php');
    $("#upcomingContent").load('upcomingMatch.php');
});
$("#football").on("click", function () {

    $("#liveContent").load('football.php');
     $("#upcomingContent").load('upcomingFootball.php');
});
$("#cricket").on("click", function () {

    $("#liveContent").load('cricket.php');
     $("#upcomingContent").load('upcomingCricket.php');
});
$("#basketball").on("click", function () {

    $("#liveContent").load('basketball.php');
   $("#upcomingContent").load('upcomingBasket.php');
});
$("#horse").on("click", function () {

    $("#liveContent").load('horse.php');
   $("#upcomingContent").load('upcominghorse.php');
});
$("#boxing").on("click", function () {

    $("#liveContent").load('boxing.php');
   $("#upcomingContent").load('upcomingboxing.php');
});
$("#tenis").on("click", function () {

    $("#liveContent").load('tenis.php');
   $("#upcomingContent").load('upcomingtenis.php');
});
$("#badminton").on("click", function () {

    $("#liveContent").load('badminton.php');
  // $("#upcomingContent").load('upcomingbadminton.php');
});