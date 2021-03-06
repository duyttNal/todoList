<?php require './view/layouts/header.php' ?>
    <div class="col-md-4 offset-md-4">
        <h3><strong>Update Todo</strong></h3>
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
                <input type="text" class="form-control" name="work_name" placeholder="Work name"
                       value="<?php echo htmlentities($todo->work_name); ?>">
                <span class="help-inline"></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Start date</label>
            <div class="controls">
                <input type="text" class="form-control" id="from" name="start_date" placeholder="Start Date"
                       value="<?php echo htmlentities(date('m/d/Y', strtotime($todo->start_date))); ?>">
                <span class="help-inline"></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">End Date</label>
            <div class="controls">
                <input type="text" class="form-control" id="to" name="end_date" placeholder="End date"
                       value="<?php echo htmlentities(date('m/d/Y', strtotime($todo->end_date))); ?>">
                <span class="help-inline"></span>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Status</label>
            <div class="controls">
                <select class="form-control" name="status" id="exampleSelect1">
                    <option <?php if ($todo->status == 1) echo 'selected="selected"' ?> value="1">Planning</option>
                    <option <?php if ($todo->status == 2) echo 'selected="selected"' ?> value="2">Doing</option>
                    <option <?php if ($todo->status == 3) echo 'selected="selected"' ?> value="3">Complete</option>
                </select>
            </div>
        </div>

        <br>
        <div class="form-actions">
            <input type="hidden" name="form-submitted" value="1">
            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-default" href="index.php">Back</a>
        </div>
    </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function () {
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1
                    })
                    .on("change", function () {
                        to.datepicker("option", "minDate", getDate(this));
                    }),
                to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                    .on("change", function () {
                        from.datepicker("option", "maxDate", getDate(this));
                    });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });
    </script>
<?php require './view/layouts/footer.php' ?>