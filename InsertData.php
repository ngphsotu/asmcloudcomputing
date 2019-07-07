<!DOCTYPE html>
<html>
    <head>
        <title>Insert data to PostgreSQL with php - creating a simple web application</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            li {
            list-style: none;
            }
        </style>
    </head>
    <body>
        <h1>INSERT DATA TO DATABASE</h1>
        <h2>Enter data into User table</h2>
        <ul>
            <form name="InsertData" action="InsertData.php" method="POST" >
                <li style="list-style: none;">User ID:</li><li style="list-style: none;"><input type="text" name="stuid" /></li>
                <li style="list-style: none;">Full Name:</li><li style="list-style: none;"><input type="text" name="fname" /></li>
                <li style="list-style: none;">Email:</li><li style="list-style: none;"><input type="text" name="email" /></li>
                <li style="list-style: none;">Address:</li><li style="list-style: none;"><input type="text" name="classname" /></li>
                <li style="list-style: none;"><input type="submit" /></li>
            </form>
        </ul>
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
            if($pdo === false){
                 echo "ERROR: Could not connect Database";
            }
            //Khởi tạo Prepared Statement
            //$stmt = $pdo->prepare('INSERT INTO student (stuid, fname, email, classname) values (:id, :name, :email, :class)');
            //$stmt->bindParam(':id','SV03');
            //$stmt->bindParam(':name','Ho Hong Linh');
            //$stmt->bindParam(':email', 'Linhhh@fpt.edu.vn');
            //$stmt->bindParam(':class', 'GCD018');
            //$stmt->execute();
            //$sql = "INSERT INTO student(stuid, fname, email, classname) VALUES('SV02', 'Hong Thanh','thanhh@fpt.edu.vn','GCD018')";
            $sql = "INSERT INTO student(stuid, fname, email, classname)"
                    . " VALUES('$_POST[stuid]','$_POST[fname]','$_POST[email]','$_POST[classname]')";
            $stmt = $pdo->prepare($sql);
            //$stmt->execute();
            if (is_null($_POST[stuid])) {
                echo "StudentID must be not null";
            }
            else
            {
                if($stmt->execute() == TRUE){
                    echo "Record inserted successfully.";
                } else {
                    echo "Error inserting record: ";
                }
            }
        ?>
    </body>
</html>