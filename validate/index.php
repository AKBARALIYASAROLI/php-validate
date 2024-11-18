<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<?php
  echo "<pre>";
  print_r($_SERVER);
  echo "</pre>";
  echo $_SERVER["PHP_SELF"];
 
?>
<form method = "post">
       <table>
          <tr>
             <td>Name:</td>
             <td><input type = "text" name = "name"></td>
          </tr>
          <tr>
             <td>E-mail: </td>
             <td><input type = "email" name = "email"></td>
          </tr>
          <tr>
             <td>Website:</td>
             <td><input type = "url" name = "website"></td>
          </tr>
          <tr>
             <td>Classes:</td>
             <td><textarea name = "comment" rows = "5" cols = "40"></textarea></td>
          </tr>
          <tr>
             <td>Gender:</td>
             <td>
                <input type = "radio" name = "gender" value = "female" checked="checked">Female
                <input type = "radio" name = "gender" value = "male">Male
             </td>
          </tr>
          <td>
             <input type = "submit" name = "submit" value = "Submit"> 
          </td>
       </table>
    </form>
    <?php
       $name = $email = $gender = $comment = $site = "";
 
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST["name"];
          $email = $_POST["email"];
          $name = $_POST["name"];
          $comment = $_POST["comment"];
          $gender = $_POST["gender"];
          $site = $_POST["website"];
       }
       echo "<h2>Your given values are as:</h2>";
       echo $name;
       echo "<br>";
 
       echo $email;
       echo "<br>";
 
       echo $site;
       echo "<br>";
 
       echo $comment;
       echo "<br>";
 
       echo $gender;
    ?>
</body>
</html>
