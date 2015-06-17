<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Index</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myStyle.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>	
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
        include "navigation.html";
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        	<div class="pages"  id="page1">
	            <div class="col-lg-12 text-center">
	               <h1>Results after:</h1>
	               <br>
					<form id="mainForm">
						<table class="table borderless">
							<tr>
								<td class="col-md-3">
									<select class="form-control" id="gendSelect">
										<option value="Select">--SELECT--</option>
										<option value="Men">Men</option>
										<option value="Women">Women</option>
									</select>
								</td>

								<td class="col-md-3">
									<select class="form-control" id="eventSelect">
										<option value="Select" class="select">--SELECT--</option>
									</select>
								</td>
							</tr>

							<tr>
								<td class="col-md-3">
								</td>

								<td class="col-md-2">
									<button type="submit" id="sbmtBttn2" class="btn btn-default" style="float:right">DISPLAY RESULTS</button>
								</td>
							</tr>
						</table>
					</form>
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
