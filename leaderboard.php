<html>
    <head>
        <title>Recent Scores</title>
    </head>
<body style="background-color:black"><center><div><h1 id="rs" style="color:white;">Recent Scores</h1></div>
<?php
if (isset($_GET['name'])) {
$name = $_GET['name'];}
if (isset($_GET['score'])) {
$score = $_GET['score'];}
echo ("<h1 style='color:white;'>".$name.": ".$score."</h1>");
$run = 0;
$master = "";
if ($file = fopen("scores.txt", "r")) {
while(!feof($file)) {
$line = fgets($file);
$line = str_replace("\n","",$line);
if($run < 7){
    echo $line;
        $master = $master.$line."\n";
}
$run +=1;
}}
unlink("scores.txt");
$myFile = "scores.txt";
$fh = fopen($myFile, 'w+') or die("can't open file");
$stringData = "<h2 style='color:white;'>".$name.": ".$score."</h2>\n";
fwrite($fh, $stringData);
fwrite($fh, $master);
fclose($fh);
?>
<script>
window.setTimeout(function(){window.location.href = "index.html"},10000);//in 10 seconds, redirect back to the games main page.
</script>
    <p> </p><p style="color:grey">you will be returned to your game shortly.</p></center>
</body>
</html>