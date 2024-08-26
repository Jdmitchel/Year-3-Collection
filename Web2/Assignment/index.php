<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment  1</title>
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

        $redacted_words = [];
        foreach ($words_and_clues as $pair){
            $word = $pair[0];
            $clue = $pair[1];
            $redacted_word = hideLetters($word);
            $redacted_words[$redacted_word] = $word;
        }

        $selected_words = array_rand($redacted_words,  5);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $guesses = $_POST['guesses'];
            $feedback = checkGuesses($guesses, $redacted_words);
        } else {
            $feedback = [];
        }

        if(isset($_POST['quit'])){ //quit the game
            echo "<h2>Thanks for playing!</h2>";
            exit;
        } else {
            displayForm($selected_words, $redacted_words, $feedback);
        }

        function hideLetters($word){
            $length = strlen($word);
            $hidden_word = '';
            for ($i =   0; $i < $length; $i++) {
                if (rand(0,   100) <   30) {
                    $hidden_word .= '*';
                } else {
                    $hidden_word .= $word[$i];
                }
            }
            return $hidden_word;
        }

        function displayForm($selected_words, $redacted_words, $feedback){
            echo "<form action='A1.php' method='post'>";
            echo "<h2>Guess the words!</h2>";
            foreach ($selected_words as $index => $word) {
                echo "<input type='text' name='guesses[]' required>";
                echo isset($feedback[$index]) ? "<p>Feedback: " . $feedback[$index] . "</p>" : '';
            }
            echo "<input type='submit' value='Guess'>";
            echo "<input type='submit' name='quit' value='Quit'>";
            echo "</form>";
        }

        function checkGuesses($guesses, $redacted_words){
            $feedback = [];
            foreach($guesses as $index => $guess){
                if(isset($redacted_words[$guess])){
                    $feedback[] = 'Correct!';
                } else {
                    $feedback[] = 'Incorrect.';
                }
            }
            return $feedback;
        }
    ?>

</body>
</html>
