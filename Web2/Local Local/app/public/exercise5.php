<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extra Task</title>
    <style> td.halfnhalf{
        background: linear-gradient(to top right, #FF5733 49.5%, #C70039 50.5%);
        color: white;
    }
    .black{
        background-color: black;
    }
    </style>
</head>
<body>

    <form action="exercise5.php" method="post">
        <label for="number">Enter a number: </label>
        <input type="number" name="number" id="number">
        <input type="submit" value="Submit">
    </form>


    <table width="400px" height="400px" cellspacing="2px" cellpadding="10px" border="5px">

    <?php

    $n = $_POST["number"];

        for ($i = 1; $i <= $n; $i++){
            echo "<tr>";
            for ($j = 1; $j <= $n; $j++){
                if (($i + $j) % 2 == 0){
                    echo "<td class='halfnhalf'> </td>";
                }
                else{
                    echo "<td class='black'> </td>";
                }
            }
            echo "</tr>";
        }
    ?>
    </table>
</body>
</html>