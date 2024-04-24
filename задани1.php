<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Введите текст</title>
</head>
<body>
    <form method="post">
        <label for="inputText">Введите текст (задани 1 ):</label><br>
        <textarea id="inputText" name="inputText" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Поменять порядок букв в словах">
    </form>

    <?php
    function reverseWords($input) {
        $words = explode(' ', $input);
        $result = '';

        foreach ($words as $word) {
            $chars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
            $reversedWord = '';


            foreach ($chars as $key => $char) {
                if (ctype_upper($char)) {

                }
            }

            $reversedChars = array_reverse($chars);

            $reversedWord = implode('', $reversedChars);

            $result .= $reversedWord . ' ';
        }

        $result = rtrim($result);

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







