<!DOCTYPE html>
<html>
  <body>
    <h1>UPDATE DATA TO DATABASE</h1>
    <ul>
      <form name="UpdateData" action="UpdateData.php" method="POST" >
        <li style="list-style: none;">User ID:</li><li style="list-style: none;"><input type="text" name="stuid" /></li>
        <li style="list-style: none;">Full Name:</li><li style="list-style: none;"><input type="text" name="fname" /></li>
        <li style="list-style: none;">Email:</li><li style="list-style: none;"><input type="text" name="email" /></li>
        <li style="list-style: none;">Address:</li><li style="list-style: none;"><input type="text" name="classname" /></li>
        <li style="list-style: none;"><input type="submit" /></li>
      </form>
    </ul>
    <?php
    // ini_set('display_errors', 1);
    // echo "Update database!";
    ?>
    <?php
      if (empty(getenv("DATABASE_URL"))){
          echo '<p>The DB does not exist</p>';
          $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
      }  else {
         $db = parse_url(getenv("DATABASE_URL"));
         $pdo = new PDO("pgsql:" . sprintf(
             "host=ec2-107-20-173-2.compute-1.amazonaws.com;port=5432;user=epjhznfybiofsdp;password=d710f945ed11c0ee09b1a7c5760479da13c43a2c7d58694bd38d4075d1f0c453;dbname=dg80gb8rdsb12",
              $db["host"],
              $db["port"],
              $db["user"],
              $db["pass"],
              ltrim($db["path"], "/")
         ));
      }  
      $sql = "UPDATE student SET fname = '$_POST[fname]', email = '$_POST[email]', classname = '$_POST[classname]' WHERE stuid = '$_POST[stuid]'";
            $stmt = $pdo->prepare($sql);
      if($stmt->execute() == TRUE){
          echo "Record updated successfully.";
      } else {
          echo "Error updating record. ";
      }
    ?>
  </body>
</html>
