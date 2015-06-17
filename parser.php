<?php
    require_once 'PHPExcel.php';
    require_once 'PHPExcel/IOFactory.php';

    $myGender = $_REQUEST['myGender'];
    $myEvent = $_REQUEST['myEvent'];
    $myAnnotation = "Results after ".$myEvent." ".$myGender;

    $inputFileName = './uploads/team_pts.xls';

    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    //$objReader = PHPExcel_IOFactory::createReader('Excel2007');
    //$objPHPExcel = $objReader->load("./uploads/example1.xlsx");
    $worksheet  = $objPHPExcel->getSheet(0); 

    $endingCol = 43;
    $infoCols = $endingCol-3;
    $startingRow  = 9;
    
    $highestRow         = $worksheet->getHighestRow()-2;
    $highestColumn      = $worksheet->getHighestColumn();
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns          = ord($highestColumn) - 64;
    $worksheetTitle     = $worksheet->getTitle();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $myAnnotation?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myStyleResults.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>   
</head>

<body>

    <div class="container">

        <div class="row">

            <?php
                echo '<table class="table table-striped"><tr>';
                for ($row = $startingRow; $row <= $highestRow; ++ $row) {
                    if($row == $startingRow){
                        echo '<tr style="font-weight:bold;">';
                    }else{
                        echo '<tr>';
                    }
                    for ($col = 0; $col < $endingCol; ++ $col) {
                        if($col==0 || $col==1 || $col==42){
                            $cell = $worksheet->getCellByColumnAndRow($col, $row);
                            $val = $cell->getCalculatedValue();
                            $val = preg_replace('/\s+/', '', $val);
                            if($col==1){
                                echo '<td><img src="flags/'. $val .'.jpg" class="flag"></td>';    
                            }
                            echo '<td>' . $val .'</td>';
                        }
                    }
                    echo '</tr>';
                }
                echo '</table>';
                
            ?>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-filestyle.min.js"></script>

</body>

</html>
