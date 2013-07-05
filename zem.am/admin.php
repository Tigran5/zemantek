<!DOCTYPE html
           PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN"
           "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-
transitional.dtd">
<html xmls="http://www.w3.org//1999/xhtml">		
<head>

<Title>Zemantek</Title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type"text/css" />

</head>

<body>
<div class="wraper">

<!-----------Header--------------->

    <div class="header">
     <?php include "php/header.php"?>

    </div>

<!----------Soc------------>
<div class="soc">

<!----------FB----------->

      <div class="fb">
      <?php include "php/fb.php"?>
      </div>

<!-----------------G+-------------->


<!--------tweeter---------------->
<div class="tweet">
<?php include "php/tweet.php" ?>
</div>
</div>
<div class="cent">
<!-----------Buttons--------------->
        <div class="butts">
        <?php include "php/buttons.php"?>
        </div>

</div>




<!--------------------Login and password--------------------------->




<div class="sub">
<?php  include"php/text_box.php"   ?>
</div>




<?php
start_session();
class login{
$con=mysqli_connect("localhost", "root", " ", "zemantek" );
mysql_select_db("zemantek") or die("Couldn't select database.");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if (isset($_POST['login']) && isset($_POST['password']))
{
    $login = mysql_real_escape_string($_POST['login']);
    $password = md5($_POST['password']);

    // делаем запрос к Ѕƒ
    // и ищем юзера с таким логином и паролем

    $query = "SELECT `id`
            FROM `log_pass`
            WHERE `login`='{$login}' AND `password`='{$password}'
            LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());

    // если такой пользователь нашелс€
    if (mysql_num_rows($sql) == 1) {
        // то мы ставим об этом метку в сессии (допустим мы будем ставить ID пользовател€)

        $row = mysql_fetch_assoc($sql);
        $_SESSION['id'] = $row['id'];

        // не забываем, что дл€ работы с сессионными данными, у нас в каждом скрипте должно присутствовать session_start();
    }
    else {
        die('“акой логин с паролем не найдены в базе данных. » даЄм ссылку на повторную авторизацию.');
    }
}

mysqli_close($con);
}
?>





<!-----------Footer------------------------>



<div class="footer">
<?php include "php/footer.php" ?>
</div>
</div>




</body>
</html>






















<?php


$con=mysqli_connect("localhost", "root", "", "zemantek" );

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


$sql="INSERT INTO form1 (id, inp)
VALUES
('$_POST[id]','$_POST[inp]')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);
?>

