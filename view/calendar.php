<?php include './view/layouts/header.php' ?>
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
<link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<div class="col-12">
    <h1><strong>Calendar - Todo List</strong></h1>
</div>
<div class="col-6">
    <a href="index.php" class="btn btn-primary">Back</a>
</div>

<div class="col-12 mt-2 mb-5">
    <div id='calendar'></div>
</div>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
<script>
    jq223 = jQuery.noConflict(false);
</script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script>

    jq223(document).ready(function() {

        jq223('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php foreach ($todos as $todo) : ?>
                <?php echo '{';?>
                <?php echo "title: '$todo->work_name',";?>
                <?php echo "start: '$todo->start_date',";?>
                <?php echo "end: '$todo->end_date',";?>
                <?php echo '},';?>
                <?php endforeach;?>
            ]
        });

    });

</script>
<?php include './view/layouts/footer.php' ?>

