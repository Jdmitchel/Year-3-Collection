<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 4</title>
</head>
<body>
    <?php
        $names =array("Lou", "Sid", "Jim", "Frank");
        $leng = count($names);

        /* for ($i = 0; $i < $leng; $i++){
            echo $names[$i];
            echo "<br>";
        } */

        echo "The game will be played by ". $leng ." players. " . $names[0] . " and " . $names[1] . " will be paired and " . $names[2] . " and " . $names[3] . " will be paired.";
        ?>
</body>
</html>