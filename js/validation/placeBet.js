$("#stakeAmount").keyup(function () {
    var stakeAmount = $(this).val();
    var betRate = $("#betRate").val();
    $("#stakeAmountView").text(stakeAmount);
    var st = stakeAmount * betRate;
    $("#possibleAmount").text(st.toFixed(2));
});
$("#placeBet").on("click", function () {
    var match = $("#match").val();
    var matchBet = $("#matchBet").val();
    var betRate = $("#betRate").val();
    var stakeAmount = $("#stakeAmount").val();
    var betId = $("#betId").val();
    var matchId = $("#matchId").val();
    var betTitleId = $("#betTitleId").val();

    $("#placeBet").addClass("hideplace");
    $("#load").removeClass("load");
    $.ajax({
        method: "POST",
        url: "placeBet.php",
        data: {
            match: match,
            matchBet: matchBet,
            betRate: betRate,
            stakeAmount: stakeAmount,
            betId: betId,
            matchId: matchId,
            betTitleId: betTitleId
        },
        success: function (data) {

            if (data !== "") {

                $("#errorPlaceBet").removeClass("errorPlaceBet");
                $("#PlaceBetText").text(data);
                $("#placeBet").removeClass("hideplace");
                $("#load").addClass("load");
            } else {
        
                
                $(".betForm").hide();
                location.reload();
            }
        }
    });
    /*  setTimeout(
     function () {
     
     },1);*/
});
$(document).on('click', '.data-show', function () {
//$("#data-show").on("click", function () {
    var bettingTitle = $(this).attr('bettingTitle');

    var bettingSubTitle = $(this).attr('bettingSubTitle');
    var BettingSubTitleOption = $(this).attr('BettingSubTitleOption');
    var gameType = $(this).attr('gameType');
    var gameStatus = $(this).attr('gameStatus');

    $("#stakeAmount").val(100.00);
    if (gameStatus == 1) {

        $("#gameLiveOrUpcoming").text('Live');
        $("#gameLiveOrUpcoming").css("background", "#de0079");

    } else {
        $("#gameLiveOrUpcoming").text('Upcoming');
        $("#gameLiveOrUpcoming").css("background", "#de0079");
    }

    if (gameType == 1) {
        $('#gameLogo').attr('src', './img/1393757333.png');
    } else if(gameType == 2){
        $('#gameLogo').attr('src', './img/ka-pl.png');
    }
    else if(gameType == 3){
        $('#gameLogo').attr('src', './img/b_ball.png');
    }
    else if(gameType == 4){
        $('#gameLogo').attr('src', './img/boxing.png');
    }
    else if(gameType == 5){
        $('#gameLogo').attr('src', './img/tenis.png');
    }
    else if(gameType == 6){
        $('#gameLogo').attr('src', './img/tabletennis.png');
    }
    else if(gameType == 7){
        $('#gameLogo').attr('src', './img/badminton.png');
    }
    //alert(bettingTitle + " " + bettingSubTitle + " " + BettingSubTitleOption);
    $.ajax({
        method: "POST",
        url: "fetchData.php",
        dataType: 'json',
        data: {
            bettingTitle: bettingTitle,
            bettingSubTitle: bettingSubTitle,
            BettingSubTitleOption: BettingSubTitleOption
        },
        success: function (data) {
            // alert(data.BettingSubTitleOption);
            $("#BettingSubTitleOption").text(data.BettingSubTitleOption);
            $("#bettingSubTitle").text(data.bettingSubTitle);
            $("#betRateShow").text(data.betRate);
            $("#bettingTitle").text(data.bettingTitle);
            /* set hidden value*/
            $("#match").val(data.bettingSubTitle);
            $("#matchBet").val(data.BettingSubTitleOption);
            $("#betRate").val(data.betRate);
            $("#betId").val(BettingSubTitleOption);
            $("#matchId").val(bettingTitle);
            $("#betTitleId").val(bettingSubTitle);

            var st = data.betRate * 100.00;
            $("#possibleAmount").text(st.toFixed(2));
        }
    });


});