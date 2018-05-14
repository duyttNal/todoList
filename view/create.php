<?php require './view/layouts/header.php' ?>
<div class="col-md-4 offset-md-4">
<h3><strong>Create a Todo</strong></h3>
<div></div>
<?php
if ($errors) {
    echo '<ul class="errors">';
    foreach ($errors as $field => $error) {
        echo '<li>' . htmlentities($error) . '</li>';
    }
    echo '</ul>';
}
?>


<form class="form-horizontal" action="" method="post">
    <div class="control-group">
        <label class="control-label">Work Name</label>
        <div class="controls">
            <input type="text" class="form-control" name="work_name" placeholder="Name"
                   value="<?php echo htmlentities($work_name); ?>">
            <span class="help-inline"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">Start Date</label>
        <div class="controls">
            <input type="text" class="form-control" id="from" name="start_date" placeholder="State Date"
                   value="<?php echo htmlentities($start_date); ?>">
            <span class="help-inline"></span>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">End Date</label>
        <div class="controls">
            <input type="text" class="form-control" id="to" name="end_date" placeholder="End date"
                   value="<?php echo htmlentities($end_date); ?>">
            <span class="help-inline"></span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Status</label>
        <div class="controls">
            <select class="form-control" name="status" id="exampleSelect1">
                <option value="1">Planning</option>
                <option value="2">Doing</option>
                <option value="3">Complete</option>
            </select>
        </div>
    </div>
    <br>
    <div class="form-actions">
        <input type="hidden" name="form-submitted" value="1">
        <button type="submit" class="btn btn-success">Create</button>
        <a class="btn btn-default" href="index.php">Back</a>
    </div>
</form>
</div>

<?php require './view/layouts/footer.php' ?>
