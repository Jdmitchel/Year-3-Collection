<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            text-align: center;
            background-color: #b3d9f5;
            background-image:  repeating-radial-gradient( circle at 0 0, transparent 0, #b3d9f5 20px ), repeating-linear-gradient( #f5cfb3, #08080b );
            background-blend-mode: overlay;
        }

        form {
            
        }

        form #Questions {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form input {
            margin: 10px;
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
            box-shadow: 2px 2px 5px grey;
        }

        form input[type="submit"] {
            background-color: rgba(255, 255, 255, 0.8);
            font-weight: bold;
            font-size: 1.2em;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: rgba(106, 188, 243, 0.55);
        }

        h1 {
            font-size: 4em;
            color: rgba(0, 0, 0, 0.8);
            font-family: canada-type-gibson, sans-serif;
            font-weight: 700;
            text-shadow: 2px 2px 5px grey;
        }

        font p {
            font-size: 1.5em;
            color: rgba(0, 0, 0, 0.8);
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
        }

        img {
            width: 300px;
            height: 250px;
            margin: 20px;
        }

    </style>
</head>
<body>



    <h1> Anime Trivia </h1>
    <?php  
        function readWordList($filename) {
            $wordList = array();
            $file = fopen($filename, "r");
            while(!feof($file)) {
                $line = fgets($file);
                $line_array = explode(",", $line, 2);
                $wordList[$line_array[0]] =  $line_array[1];
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
            echo '<form method="post" id="Questions">';
            foreach($selectedWords as $index) {
                echo "<p>Word: {$redactedWords[$index]['redacted']}<br>Clue: {$redactedWords[$index]['clue']}</p>";
                echo "<input type='text' name='$index' required>";
            }
            echo "<br><br><input type='submit' value='Submit'>";
            echo "<input type ='submit' name='quit' value='Quit'>";
            echo '</form>';
        }
        
        function checkGuesses($redactedWords, $userGuesses) {
            $results = array();
            foreach(array_keys($_POST) as $key) {
                if($key == $_POST[$key]) {
                  $string = "Correct! The answer is " . $key;
                  array_push($results, $string);
                } else {
                  $string = "Your guess was " . $_POST[$key] . ". The correct answer was " . $key;
                  array_push($results, $string);
                }
            }
            echo "<img src='TK.gif' alt='Tokyo Ghoul'>";
            return $results;
        }
        

        function playGame($redactedWords) {
            if($_SERVER["REQUEST_METHOD"] == "POST") {
              $userGuesses = $_POST;
              $results = checkGuesses($redactedWords, $userGuesses);
              foreach($results as $result) {
                  echo "<p>$result</p>";
              }

              echo "<form method='get'><input type='submit' value='Play Again'></form>";
            }
            else{
              displayForm($redactedWords);
            }
          }
        

        $wordList = readWordList('wordlist.txt');
        $redactedWords = storeRedactedWords($wordList);
        playGame($redactedWords);

    ?>
    
</body>
</html>
