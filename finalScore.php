<?php
    session_start();
    require_once 'PHPExcel.php';
    require_once 'PHPExcel/IOFactory.php';

    

    $myGender = $_SESSION['myGender'];
    $myEvent = $_SESSION['myEvent'];



    $myAnnotation = $myEvent." ".$myGender;

    $inputFileName = './uploads/team_pts.xls';
    //$inputFileName = '../../../Dropbox/ETCH 2L results/team_pts.xls';

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
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/myStyleResults.css" rel="stylesheet">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>   
</head>

<body>

    <div class="container">
        <div class="myHeader">
            <table>
                <tr>
                    <th rowspan="2" width="35%">
                        <img src="logo/ETC2LeagueStaraZagora15.png" width="100%" class="logo">
                    </th>
                    <td class="after">
                        <a></a>
                    </td>
                </tr>
                <tr>
                    <td class="myAnnotation">
                        <a style="font-size:140%;">Final Results</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="myTable">
            <?php
                echo '<table class="resultsTable">';
                for ($row = $startingRow; $row <= $highestRow; ++ $row) {
                    echo '<tr>';
                    for ($col = 0; $col < $endingCol; ++ $col) {
                        if($col==0 || $col==1 || $col==42){
                            $cell = $worksheet->getCellByColumnAndRow($col, $row);
                            $val = $cell->getCalculatedValue();
                            $val = preg_replace('/\s+/', '', $val);
                            if($col==0){
                                echo '<td class="rank"><a>' . $val .'</a></td>';
                            }
                            if($col==1){
                                echo '<td class="flag"><img src="flags/'. $val .'.jpg" class="flag"></td><td class="country"><a>' . $val .'</a></td>';
                            }
                            if($col==42){
                                echo '<td class="points"><a>' . $val .'</a></td>';
                            }
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
    <script src="js/myScript.js"></script>

</body>

</html>
