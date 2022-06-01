<?php

function GetJson()
{
    $jsonString = file_get_contents('jsonFile.json');
    $data = json_decode($jsonString, true);
    return $data;
}
function WriteJson($data)
{
    file_put_contents('jsonFile.json', json_encode($data));
}

$data = GetJson();

foreach ($data as $key => $entry) {
    echo'<p>' . $key .  '</p>';
}

 echo'
<form action="user_check.php" method="get">
ID: <input type="text" name="id"><br>
<input type="submit">
</form>
<p id="counter"></p>

<script>
var currentDateObj = new Date();
var numberOfMlSeconds = currentDateObj.getTime();
var addMlSeconds = 60 * 60 * 1000;
var countDownDate = new Date(numberOfMlSeconds + addMlSeconds).getTime();

var x = setInterval(function() {

    var now = new Date().getTime();

    var distance = countDownDate - now;

    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    console.log(Math.floor((1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    document.getElementById("counter").innerHTML = minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("counter").innerHTML = "EXPIRED";
    }
}, 1000);

</script>';