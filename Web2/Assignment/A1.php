<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 1</title>
</head>
<body>
    <h1> Anime/Manga Trivia </h1>

    <?php
        $file = fopen('wordslist.txt', 'r');
        $words_and_clues = [];
        while(($line = fgetcsv($file)) !== FALSE){
            $words_and_clues[] = $line;
        }
        fclose($file);

        $redacted_word = [];
        foreach ($words_and_clues as $pair){
            $word = $pair[0];
            $clue = $pair[1];
            $redacted_words = hideLetters($word);
            $redacted_word[$redacted_words] = $word;
        }

        $selected_word = array_rand(array_flip($redacted_word),5);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $guess = $_POST['guess'];
            $response = checkGuess($guess, $redacted_word);
        }else{
            displayForm($selected_word, $redacted_word);
        }

        if(isset($_POST['quit'])){ //quit the game
            echo "<h2>Thanks for playing!</h2>";
            exit;
        } else {
            displayForm($selected_word, $redacted_word);
        }

        function hideLetters($word){
            $redacted_word = str_shuffle($word);
            return $redacted_word;
        }

        function displayForm($selected_word, $redacted_word){
            echo "<form action='A1.php' method='post'>";
            echo "<h2>Guess the word!</h2>";
            echo "<p>Clue: " . $redacted_word[$selected_word] . "</p>";
            echo "<input type='text' name='guess' required>";
            echo "<input type='submit' value='Guess'>";
            echo "<input type='submit' name='quit' value='Quit'>";
            echo "</form>";
        }

        function checkGuess($guess, $redacted_word){
            $feedback = [];
            foreach($guess as $index => $letter){
                if(isset($redacted_word[$letter])){
                    $feedback[] = $letter;
                } else {
                    $feedback[] = "*";
                }
            }
            return $feedback;
        }
    ?>

</body>
</html>