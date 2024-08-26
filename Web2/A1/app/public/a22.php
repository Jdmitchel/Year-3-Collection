<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> Anime/Manga Trivia </h1>
    <?php
        $file = fopen('wordslist.txt', 'r');
        $words_and_clues = [];
        while (($line = fgetcsv($file)) !== FALSE) {
                $words_and_clues[] = $line;
        }
        fclose($file);

$redacted_word = [];
foreach ($words_and_clues as $pair) {
    $word = $pair[0];
    echo $word;
    $redacted_word[$word] = hideLetters($word);
}

$selected_word = array_rand($redacted_word, 5); // No need to flip and array_rand directly

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guess = str_split($_POST['guess']); // Convert guess to array of letters
    $response = checkGuess($guess, $redacted_word);
} else {
    displayForm($selected_word, $redacted_word);
}

function hideLetters($word) {
    $redacted_word = str_shuffle($word);
    return $redacted_word;
}

function displayForm($selected_word, $redacted_word) {
    echo "<form action='A1.php' method='post'>";
    echo "<h2>Guess the word!</h2>";
    foreach ($selected_word as $word) {
        echo "<p>Clue: " . $redacted_word[$word] . "</p>";
        echo "<input type='hidden' name='word[]' value='$word'>"; // Hidden input to pass selected words
    }
    echo "<input type='text' name='guess' required>";
    echo "<input type='submit' value='Guess'>";
    echo "<input type='submit' name='quit' value='Quit'>";
    echo "</form>";
}

function checkGuess($guess, $redacted_word) {
    $feedback = [];
    foreach ($guess as $letter) {
        $found = false;
        foreach ($redacted_word as $word => $redacted) {
            if (strpos($redacted, $letter) !== false) {
                $feedback[] = $letter;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $feedback[] = "*";
        }
    }
    return $feedback;
}
?>


</body>
</html>

