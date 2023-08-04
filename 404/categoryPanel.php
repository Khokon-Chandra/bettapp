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


    <section class="modal_list_container">

        <!-- Add league model -->
        <div id="addCategory" class="modal" style=" ">
            <div class="modal-dialog col-lg-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Add New Category</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="addCategorySubmit" method="POST" action="action/category/AddCategory.php" class="modal-body">
                        <div class="form-group">
                            <label for="phone">Category Name:</label>
                            <input name="categoryName" type="text" class="form-control categoryName" autofocus required="1">
                        </div>
                        <button type="submit" class="btn btn-info ">Submit</button>
                    </form>
                </div>
            </div>
        </div>



        <div id="editCategory" class="modal" style=" ">
            <div class="modal-dialog col-lg-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Update Category</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="editCategorySubmit" method="POST" action="action/category/UpdateCategory.php" class="modal-body">
                        <input type="hidden" id="category_id">
                        <div class="form-group">
                            <label for="phone">Category Name:</label>
                            <input name="categoryName" id="title" type="text" class="form-control" autofocus required="1">
                        </div>
                        <button type="submit" class="btn btn-info ">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </section>


    <div class="card">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Category List</h5>
            <div>
                <a class="btn btn-success btn-sm" href=""><i class="fa fa-refresh"></i>Refresh</a>
                <a class="btn btn-primary icon-btn btn-sm" href="" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i>Add Category</a>
            </div>
        </div>

        <div class="card-body">

            <div id="liveMatchFetch">
                <?php include 'loadCategoryContent.php' ?>
            </div>
        </div>
    </div>

</main>

<?php include 'footer.php' ?>
<script>
    $(document).on('click', '.editCategory', function() {

        $('#category_id').val($(this).data('id'));

        $('#title').val($(this).data('title'));

    })

    $(document).on('submit', '#addCategorySubmit', function(event) {

        event.preventDefault();

        var categoryName = $('.categoryName').val();

        var addCategory = 0;

        $.ajax({
            method: "POST",
            url: $(this).attr('action'),
            data: {
                addCategory: addCategory,
                title: categoryName
            },
            success: function(data) {
                $("#liveMatchFetch").load('loadCategoryContent.php');
                $("#addCategory").modal('hide');
            },

            error: function(error) {
                alert(error.responseText);
            }
        });

    });


    $(document).on('submit', '#editCategorySubmit', function(event) {

        event.preventDefault();


        $.ajax({
            method: "POST",
            url: $(this).attr('action'),
            data: {
                category_id: $('#category_id').val(),
                title: $('#title').val()
            },
            success: function(data) {
                $("#liveMatchFetch").load('loadCategoryContent.php');
                $("#editCategory").modal('hide');
            },
            error: function(error) {
                alert(error.responseText);
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
</script>