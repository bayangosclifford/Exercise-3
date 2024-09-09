<?php
$file_path1 = "get-taylor.txt";
$file_path2 = "get-chappell.txt";

$file_lines1 = file($file_path1);
$file_lines2 = file($file_path2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['lyrics'])) {
        $selected_lyrics = $_POST['lyrics'][0]; 
        switch ($selected_lyrics) {
            case "alltoowell":
                if (file_exists($file_path1)) {
                    echo "<h2>This file exists.</h2>";
                    foreach ($file_lines1 as $line) {
                        echo nl2br(htmlspecialchars($line)) . "<br>";
                    }
                } else {
                    echo "<p>The file '$file_path1' does not exist.</p>";
                }
                break; 

            case "hottogo":
                if (file_exists($file_path2)) {
                    echo "<h2>This file exists.</h2>";
                    foreach ($file_lines2 as $line) {
                        echo nl2br(htmlspecialchars($line)) . "<br>";
                    }
                } else {
                    echo "<p>The file '$file_path2' does not exist.</p>";
                }
                break; 

            case "others":
                if (!empty($_POST['other_lyrics'])) {
                    $user_input = htmlspecialchars($_POST['other_lyrics']);
                    $user_lyrics_file = "others.txt"; 
                    file_put_contents($user_lyrics_file, $user_input); 
                    echo "<h2>User Provided Lyrics</h2>";
                    echo "<p>" . nl2br($user_input) . "</p>";
                    echo "<p>Your lyrics have been saved to <strong>" . $user_lyrics_file . "</strong>.</p>";
                } else {
                    echo "<p>No lyrics provided for 'Others'.</p>";
                }
                break; 

            default:
                echo "<p>Invalid selection.</p>";
                break; 
        }
    } else {
        echo "<p>No option selected.</p>";
    }
} else {
    echo "<p>Form not submitted.</p>";
}
?>
