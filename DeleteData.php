<!DOCTYPE html>
<html>
  <body>
    <h1>DELETE DATA TO DATABASE</h1>
    <ul>
        <form name="DeleteData" action="DeleteData.php" method="POST" >
          <li style="list-style: none;">User ID:</li><li style="list-style: none;"><input type="text" name="stuid" /></li>
          <li style="list-style: none;"><input type="submit" /></li>
        </form>
    </ul>
    <?php
    // ini_set('display_errors', 1);
    // echo "Insert database!";
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
    $sql = "DELETE FROM student WHERE stuid = '$_POST[stuid]'";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute() == TRUE){
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: ";
    }
    ?>
  </body>
</html>
