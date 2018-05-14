<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>View Todo</title>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
	
	<body>
		<div class="container">
			<div class="span10 offset 1">
				<div class="row">
					<h3><strong>View Todo</strong></h3>
				</div>

				<div class="form-horizontal">
					<div class="control-group">
						<label class="control-label">Name:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $Todo->name; ?>
								</label>
							</div>
					</div>

					<div class="control-group">
						<label class="control-label">Email Address:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $Todo->email; ?>
								</label>
							</div>
					</div>

					<div class="control-group">
						<label class="control-label">Mobile Number:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $Todo->phone; ?>
								</label>
							</div>
					</div>
					<br>
					<div class="form-actions">
						<a class="btn btn-default" href="index.php">Back</a>
					</div>
			</div>
		</div>
	</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>