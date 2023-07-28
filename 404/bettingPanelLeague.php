<?php

include 'header.php';
include './side.php';
?>
<main class="app-content">
    <div class="app-title" style="background: #ddd;">
        <div>
            <h6 class="mb-0"><i class="fa fa-dashboard"></i> Dashboard</h6>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <h6>Total User Balance</h6>
                <h5>3093</h5>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <h6>Total Gaining Amount</h6>
                <h5>3093</h5>
            </div>
        </div>



        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <h6>Total Sending Amount</h6>
                <h5>3093</h5>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body">
                <h6>Total Saving Amount</h6>
                <h5>3093</h5>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body ">
                <h6>Total S Amount</h6>
                <h5>3093</h5>
            </div>
        </div>
    </div>


    <section class="modal_list_container">
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
                        <h5>Add New League</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="addLeagueSubmit" method="POST" action="action/AddLeague.php" class="modal-body">
                        <div class="form-group">
                            <label for="phone">League Name:</label>
                            <input name="leagueName" type="text" class="form-control leagueName" autofocus required="1">
                        </div>
                        <button type="submit" class="btn btn-info ">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add league Match model -->
        <div id="addLeagueMatch" class="modal" style=" ">
            <div class="modal-dialog col-lg-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Add Team to League</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="addLeagueMatchSubmit" method="POST" action="action/AddTeam.php" class="modal-body">
                        <input type="hidden" name="league_id" id="league_id">
                        <div class="form-group">
                            <label class="leagueNameInAddMatch"></label><br>
                            <label for="phone">Match Name:</label>
                            <input type="text" name="name" class="form-control leagueMatchName" autofocus required="1">
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">League List</h5>
            <div>
                <a class="btn btn-success btn-sm" href=""><i class="fa fa-refresh"></i>Refresh</a>
                <a class="btn btn-primary icon-btn btn-sm" href="" data-toggle="modal" data-target="#addLeague"><i class="fa fa-plus"></i>Add League</a>
            </div>
        </div>

        <div class="card-body">

            <div id="liveMatchFetch">
                <?php include 'leagueContent.php' ?>
            </div>
        </div>
    </div>

</main>

<?php include 'footer.php' ?>
<script>
    $(document).on('click', '.addTeam', function() {
        $('#league_id').val($(this).data('id'));
    })

    $(document).on('submit', '#addLeagueSubmit', function(event) {
        event.preventDefault();
        var leagueName = $('.leagueName').val();
        var addLeague = 0;

        $.ajax({
            method: "POST",
            url: $(this).attr('action'),
            data: {
                addLeague: addLeague,
                name: leagueName
            },
            success: function(data) {
                $("#liveMatchFetch").load('leagueContent.php');
                $("#addLeague").modal('hide');
            }
        });
    });
    $(document).on('click', '.deleteLeague', function(event) {
        event.preventDefault();
        var league_id = $(this).data('id');
        var leagueDelete = 0;
        $.ajax({
            method: "POST",
            url: "action/DeleteLeague.php",
            data: {
                id: league_id
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

    $(document).on('submit', '#addLeagueMatchSubmit', function(event) {
        event.preventDefault();
        var league_id = $('#league_id').val();
        var leagueMatchName = $('.leagueMatchName').val();
        var addLeagueMatch = 0;
        var url = $(this).attr('action');
        $.ajax({
            method: "POST",
            url: url,
            data: {
                name: leagueMatchName,
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