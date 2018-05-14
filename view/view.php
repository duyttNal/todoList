<?php require './view/layouts/header.php' ?>
    <div class="col-md-4 offset-md-4">
    <h3><strong>View Todo</strong></h3>


    <div class="form-horizontal">
        <div class="control-group">
            <label class="control-label">Work Name:</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo $todo->work_name; ?>
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Start Date:</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo date('m/d/Y', strtotime($todo->start_date)) ?>
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">End Date:</label>
            <div class="controls">
                <label class="checkbox">
                    <?php echo date('m/d/Y', strtotime($todo->end_date)); ?>
                </label>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Status:</label>
            <div class="controls">
                <label class="checkbox">
                    <?php
                    switch ($todo->status) {
                        case 1:
                            echo '<span class="badge badge-primary">Planning</span>';
                            break;
                        case 2:
                            echo '<span class="badge badge-secondary">Doing</span>';
                            break;
                        default:
                            echo '<span class="badge badge-success">Complete</span>';
                            break;
                    } ?>
                </label>
            </div>
        </div>
        <br>
        <div class="form-actions">
            <a class="btn btn-default" href="index.php">Back</a>
        </div>
    </div>
<?php require './view/layouts/footer.php' ?>