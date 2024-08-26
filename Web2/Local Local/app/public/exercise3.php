<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3</title>
</head>
<body>
    <?php
        function LionelRichie(){
            static $sing = 1;
            if ($sing == 1){
                echo "You're once...";
            }
            if($sing == 2){
                echo "Twice...";
            }
            if($sing == 3){
                echo "Three times a lady";
            }
            $sing++;
        }

        //LionelRichie();
        //LionelRichie();
        //LionelRichie();
    ?>

    <h1>Lionel Richie - Three times a lady</h1>
    <p> <?php LionelRichie(); ?> </p>
    <p> <?php LionelRichie(); ?> </p>
    <p> <?php LionelRichie(); ?> </p>
    
</body>
</html>