<!DOCTYPE html>
<html>
    <body>
        <h1>DATABASE CONNECTION</h1>
        <?php
            ini_set('display_errors', 1);
            echo "Hello Cloud computing class 0819!";
        ?>
        <?php
            if (empty(getenv("DATABASE_URL"))){
                echo '<p>The DB does not exist</p>';
                $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
            }  else {
                 echo '<p>The DB exists</p>';
                 echo getenv("dbname");
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
            $sql = "SELECT * FROM student ORDER BY stuid";
            $stmt = $pdo->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
            echo '<p>User information:</p>';
            foreach ($resultSet as $row) {
            	echo $row['stuid'];
                    echo "    ";
                    echo $row['fname'];
                    echo "    ";
                    echo $row['email'];
                    echo "    ";
                    echo $row['classname'];
                    echo "<br/>";
            }
        ?>
    </body>
</html>
