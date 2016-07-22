<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Redis DataBase Backup And Restore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1 class="text-center">Redis Database Backup and Restore</h1>
    </div>
	<?php
	try {
    $redis->connect();
    ?>
	    <p class="lead">Host : <small><?php echo $host ?></small></p>
	<p class="lead">Port : <small><?php echo $port  ?></small></p>
    

    <div class="row">
    
	  <div class="col-md-12 form-group">
	  <p class="lead"><strong>Export </strong></p>
	  <form action="export.php" method="post">
	  <input type="submit" value="Export" class="btn btn-primary" name="submit">
	  </form>
	  </div>
      <div class="col-md-12 form-group">
	  <p class="lead"><strong>Import </strong></p>
	  <form action="import.php" method="post" enctype="multipart/form-data">
			<span class="btn btn-primary ">
            <input type="file" name="upload" id="upload">
			</span>
            <input type="submit" value="Import" class="btn btn-primary" name="submit">
			 </form>
      </div>
      
    </div>
	<?php
}
catch (Exception $e) {
    ?>
			<div class="row">
			<div class="panel panel-danger">
				<div class="panel-body">
					Cannot Connect to Redis Database check Host And Port No
				</div>
				<div class="panel-footer">
					<p class="lead">Host : <?php echo $host ?></p>
					<p class="lead">Port : <?php echo $port  ?></p>
				</div>
			</div>
		</div>
	
	<?php
}
?>

  </div>

  <footer class="footer">
    <div class="container">
     <p class="text-muted text-center" >Copyright 2016 Niralar.</p>
    </div>
  </footer>

</body>

</html>














