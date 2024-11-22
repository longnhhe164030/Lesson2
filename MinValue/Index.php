<!DOCTYPE html>
<html>
    <head>
     Smallest value in array:
    </head>
    <body>
        <?php
        function minValue($arr){
            $min = $arr[0];
            $index = 0;
            for($i = 1; $i < count($arr); $i++){
                if($arr[$i] < $min){
                    $min = $arr[$i];
                    $index = $i;
                }
        }
        return $min;
    }
    $array = [0,5,10,-6,7,-10,20];
    $minValue = minValue($array);
    echo "Array:";
    for($i = 0; $i < count($array); $i++){
        echo $array[$i]. " , ";
    }
    echo "<br>Smallest value in array is: " .$minValue . "." ;
        ?>
    </body>
</html>
