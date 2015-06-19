<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Setter</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myStyle.css" rel="stylesheet">
    <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script src="js/myScript.js"></script>
    <script src="js/iframeUpload.js"></script>
	<script type="text/javascript">
		jQuery(function(){
			iframeUpload.init();
		});
	</script>

</head>

<body>

    <?php
    	session_start();
		$_SESSION['myGender'] = $_REQUEST['myGender'];
	    $_SESSION['myEvent'] = $_REQUEST['myEvent'];
        include "navigation.html";
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        	<div class="pages"  id="page1">
	            <div class="col-lg-12 text-center">
	               <h1>All set!</h1>
				</div>
			</div>
			</div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-filestyle.min.js"></script>

</body>

</html>
