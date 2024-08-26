<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> Trivia </h1>
    <?php  
        function readWordList($filename) {
            $wordList = array();
            $file = fopen($filename, "r");
            while(!feof($file)) {
                $word = fgets($file);
                $clue = fgets($file);
                $wordList[$word] =  $clue;
            }
            fclose($file);
            return $wordList;
        }

        function hideLetters($word) {
            $length = strlen($word);
            $hidden = "";
            for($i =   0; $i < $length; $i++) {
                if(rand(0,   100) <   30) {
                    $hidden .= "_";
                } else {
                    $hidden .= $word[$i];
                }
            }
            return $hidden;
        }

        function storeRedactedWords($wordList) {
            $redactedWords = array();
            foreach($wordList as $word => $clue) {
                $redacted = hideLetters($word);
                $redactedWords[$word] = array('clue' => $clue, 'redacted' => $redacted);
            }
            return $redactedWords;
        }

        function displayForm($redactedWords) {
            $selectedWords = array_rand($redactedWords, 5);
            echo '<form method="post">';
            foreach($selectedWords as $index) {
                echo "<p>{$redactedWords[$index]['clue']}: {$redactedWords[$index]['redacted']}</p>";
                echo "<input type='text' name='$index' required>";
            }
            echo "<input type='submit' name='submit' value='Submit'>";
            echo '</form>';
        }
        
        function checkGuesses($redactedWords, $userGuesses) {
            $results = array();
            foreach($userGuesses as $index => $guess) {
                if(isset($redactedWords[$index]['word']) && $guess === $redactedWords[$index]['word']) {
                    $results[] = "Correct!";
                } else {
                    $results[] = "Incorrect.";
                }
            }
            return $results;
        }
        

        function playGame($redactedWords) {
            do {
                displayForm($redactedWords);
                if(isset($_POST['submit'])) {
                    foreach (array_keys($_POST) as $key)
                    $userGuesses = $_POST;
                    $results = checkGuesses($redactedWords, $userGuesses);
                    foreach($results as $result) {
                        echo "<p>$result</p>";
                    }
                }
                echo "<form method='post'><input type='submit' name='playAgain' value='Play Again'></form>";
            } while(isset($_POST['playAgain']));
        }
        

        $wordList = readWordList('wordlist.txt');
        $redactedWords = storeRedactedWords($wordList);
        playGame($redactedWords);

    ?>
    
</body>
</html>
