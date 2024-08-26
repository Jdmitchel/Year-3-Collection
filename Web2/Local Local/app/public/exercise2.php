<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise</title>
</head>
<body>
    <?php date_default_timezone_set('UTC');
    $date = date("d/m/y");
    $Name = "Jardel";
    $fave = "Vanilla";
    $age = 22;
    ?>

    <h1> My Name is <?php echo $Name; ?></h1>
    <h2> Todays date</h2>
    <p> <?php echo $date; ?> </p>
    <h3> My favorite ice cream is <?php echo $fave; ?> </h3>
    <h4> I am <?php echo $age; ?> years old </h4>
</body>
</html>