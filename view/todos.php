<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>CRUD App </title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1><strong>CRUD app - Todo List</strong></h1>
			</div>

			<div class="row">
				<p>
					<a href="index.php?op=new" class="btn btn-success">Create</a>
				</p>	
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
						<?php foreach ($Todos as $Todo) : ?>
							<tr>
								<td><?php echo htmlentities($Todo->work_name);  ?></td>
								<td><?php echo htmlentities($Todo->start_date); ?></td>
								<td><?php echo htmlentities($Todo->end_date); ?></td>
								<td><?php
                                    switch ($Todo->status) {
                                        case 1:
                                            echo '<span class="badge badge-primary">Planning</span>';
                                            break;
                                        case 2:
                                            echo '<span class="badge badge-secondary">Doing</span>';
                                            break;
                                        default:
                                            echo '<span class="badge badge-success">Success</span>';
                                            break;
                                    }?></td>
								<td>
									<a class="btn btn-info" href="index.php?op=show&id=<?php echo $Todo->id; ?>">View</a>
									<a class="btn btn-success" href="index.php?op=edit&id=<?php echo $Todo->id; ?>">Update</a>
									<a class="btn btn-danger" href="index.php?op=delete&id=<?php echo $Todo->id; ?>">Delete Todo</a>
								</td>

							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>

