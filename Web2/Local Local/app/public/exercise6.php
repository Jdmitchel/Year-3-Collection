<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonus 2</title>
</head>
<body>
    <?php

        function distance(string $A, Sring $B): int{
            if(strlen($A) != strlen($B)){
                throw new Exception("Strings must be the same length");
            }
            $count = 0;
            $SA = str_split($A);
            $SB = str_split($B);
            for($i = 0; $i < count($SA); $i++){
                if($SA[$i] != $SB[$i]){
                    $count++;
                }
            }
            return $count;
        }

        function printColorDifference(string $A, string $B){
            $dist = distance($A, $B);
            if($dist == 0){
                echo "<p style='color: green'> $A </p>";
            }
            else{
                echo "<p style='color: red'> $A </p>";
            }
        }
</body>
</html>