<?php include './view/layouts/header.php' ?>
<div class="col-12">
    <h1><strong>CRUD app - Todo List</strong></h1>
</div>
<div class="col-6">
    <a href="index.php?op=new" class="btn btn-success">Create</a>
    <a href="index.php?op=calendar" class="btn btn-primary">Show Calendar</a>
</div>

<div class="col-12 mt-2">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><a href="?orderby=name">Work Name</a></th>
            <th><a href="?orderby=email">Start Date</a></th>
            <th><a href="?orderby=phone">End Date</a></th>
            <th><a href="?orderby=status">Status</a></th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($todos as $todo) : ?>
            <tr>
                <td><?php echo htmlentities($todo->work_name); ?></td>
                <td><?php echo htmlentities(date('m/d/Y', strtotime($todo->start_date))); ?></td>
                <td><?php echo htmlentities(date('m/d/Y', strtotime($todo->end_date))); ?></td>
                <td><?php
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
                    } ?></td>
                <td>
                    <a class="btn btn-info" href="index.php?op=show&id=<?php echo $todo->id; ?>">View</a>
                    <a class="btn btn-success" href="index.php?op=edit&id=<?php echo $todo->id; ?>">Update</a>
                    <a class="btn btn-danger" href="index.php?op=delete&id=<?php echo $todo->id; ?>">Delete Todo</a>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include './view/layouts/footer.php' ?>

