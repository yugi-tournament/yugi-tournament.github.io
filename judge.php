<?php
session_start();

if(isset($_POST['submit_pass']) && $_POST['pass'])
{
    $pass=$_POST['pass'];
    if($pass=="123")
    {
        $_SESSION['password']=$pass;
    }
}

if(isset($_POST['page_logout']))
{
    unset($_SESSION['password']);
}
if(isset($_POST['timer']))
{
    $time = $_POST['timer'];
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
        $data[$key][0]['time'] = "$time";
    }

    WriteJson($data);
}
?>

<html>
<head>
</head>
<body>
<div id="wrapper">

    <?php
    if(isset($_SESSION['password']))
    {
        if($_SESSION['password']=="123") {
            ?>
            <h1>Start timer</h1>
            <form method="post" action="" id="timer">
                <input type="text" name="timer" value="">
                <input type="submit" name="timer_submit" value="START TIMER">
            </form>
            <form method="post" action="" id="logout_form">
                <input type="submit" name="page_logout" value="LOGOUT">
            </form>
            <?php
        }
    }
    else
    {
        ?>
        <form method="post" action="" id="login_form">
            <h1>LOGIN TO PROCEED</h1>
            <input type="password" name="pass" placeholder="password">
            <input type="submit" name="submit_pass" value="SUBMIT">
        </form>
        <?php
    }
    ?>

</div>
</body>
</html>