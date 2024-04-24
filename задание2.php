<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Введите текст</title>
</head>
<body>
    <form method="post">
        <label for="inputText">Введите текст (задани 2 ):</label><br>
        <textarea id="inputText" name="inputText" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Поменять порядок букв в словах">
    </form>

    <?php
    function reverseWords($input) {
        function reverseWord($word) {
            preg_match_all('/./u', $word, $chars);
            $reversedChars = array_reverse($chars[0]);

            $case = [];

            foreach ($chars[0] as $char) {
                if (mb_strtolower($char) == $char) {
                    $case[] = 'lower';
                } else {
                    $case[] = 'upper';
                }
            }

            $reversedWord = '';
            foreach ($reversedChars as $index => $char) {
                if ($case[$index] == 'lower') {
                    $reversedWord .= mb_strtolower($char);
                } else {
                    $reversedWord .= mb_strtoupper($char);
                }
            }
            return $reversedWord;
        }

        preg_match_all('/\b\w+\b|./u', $input, $matches);

        $result = '';

        foreach ($matches[0] as $word) {

            $reversed = reverseWord($word);

            $result .= $reversed;
        }

        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputText = $_POST["inputText"];
        $reversedText = reverseWords($inputText);
        echo "<p>Результат: $reversedText</p>";
    }
    ?>
</body>
</html>
