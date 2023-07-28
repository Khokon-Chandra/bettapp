<?php

include 'header.php';
include 'db.php';

?>
    <main class="app-content">
        <div class="app-title" style="background: #AEB6BF;">
            <div>
                <h6><i class="fa fa-dashboard"></i> Total User Balance=
                    1093147.21 || Total Gaining Amount= 102256376 || Total Sending Amount= 228030841.86 || Total Saving Amount= 4442760.86
                    <span style="color: green"> || Total S Amount= 4025752.68</span>
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <!-- hidden-match -->
                        <div id="hidden-match" class="modal" style="">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hidden match</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body" id="hiddenContentShow">

                                    </div>
                                    <div class="modal-footer">

                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end Modal -->
                        <!-- Add league model -->
                        <div id="addLeague" class="modal" style=" ">
                            <div class="modal-dialog col-lg-5" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="phone">League Name:</label>
                                            <input name="leagueName" type="text" class="form-control leagueName" autofocus required="1">
                                        </div>
                                        <button type="submit" class="btn btn-info addLeagueSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add league Match model -->
                        <div id="addLeagueMatch" class="modal" style=" ">
                            <div class="modal-dialog col-lg-5" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="leagueNameInAddMatch"></label><br>
                                            <label for="phone">Match Name:</label>
                                            <input type="hidden" class="leagueId">
                                            <input type="text" class="form-control leagueMatchName" autofocus required="1">
                                        </div>
                                        <button type="submit" class="btn btn-info addLeagueMatchSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-success" href=""><i class="fa fa-refresh"></i>Refresh</a>
                        <a class="btn btn-primary icon-btn" href="" data-toggle="modal" data-target="#addLeague"><i class="fa fa-plus"></i>Add League</a>
                        <hr>
                        <div id="liveMatchFetch"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
   
   
<script>
    $(document).on('click', '.addLeagueSubmit', function(event) {
        event.preventDefault();
        var leagueName = $('.leagueName').val();
        var addLeague = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                addLeague: addLeague,
                leagueName: leagueName
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
                $("#addLeague").modal('hide');
            }
        });
    });
    $(document).on('click', '.leagueDelete', function(event) {
        event.preventDefault();
        var league_id = $(this).attr('id');
        var leagueDelete = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                leagueDelete: leagueDelete,
                league_id: league_id
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
            }
        });
    });
    $(document).on('click', '.leagueAriaHide', function(event) {
        event.preventDefault();
        var league_id = $(this).attr('id');
        var leagueAriaHide = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                leagueAriaHide: leagueAriaHide,
                league_id: league_id
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
            }
        });
    });
    $(document).on('click', '.leagueAriaShow', function(event) {
        event.preventDefault();
        var league_id = $(this).attr('id');
        var leagueAriaShow = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                leagueAriaShow: leagueAriaShow,
                league_id: league_id
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
            }
        });
    });
    $(document).on('click', '.addLeagueMatch', function(event) {
        event.preventDefault();
        var league_id = $(this).attr('id');
        var FetchLeagueName = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                FetchLeagueName: FetchLeagueName,
                league_id: league_id
            },
            success: function(data) {
                $(".leagueId").val(league_id);
                $('.leagueNameInAddMatch').text(data);
            }
        });
    });
    $(document).on('click', '.addLeagueMatchSubmit', function(event) {
        event.preventDefault();
        var league_id = $('.leagueId').val();
        var leagueMatchName = $('.leagueMatchName').val();
        var addLeagueMatch = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                addLeagueMatch: addLeagueMatch,
                leagueMatchName: leagueMatchName,
                league_id: league_id
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
                $("#addLeagueMatch").modal('hide');
                $(".leagueMatchName").val();
            }
        });
    });
    $(document).on('click', '.leagueMatchDelete', function(event) {
        event.preventDefault();
        var leagueMatch_id = $(this).attr('id');
        var leagueMatchDelete = 0;
        $.ajax({
            method: "POST",
            url: "bettingPanelLeagueAction.php",
            data: {
                leagueMatchDelete: leagueMatchDelete,
                leagueMatch_id: leagueMatch_id
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
            }
        });
    });
</script>