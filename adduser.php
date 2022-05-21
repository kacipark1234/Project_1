
   
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>新增帳號</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
            html{
                 height: 100%;
            }
            body{
                background-image: url(index_background.jpg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-attachment: fixed;
                height: 100%;
            }
            .centerblock {
                float: none;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20%;
                text-align: center;
                max-width: 400px;
            }
            td{
                padding:2px;
            }
        </style>
    </head>
    <body>
        <?php
            require_once("dbtools.inc.php");
            $UserAccount = $_POST["UserAccount"];
            $UserPassword = $_POST["UserPassword"];
            $UserName = $_POST["UserName"];
            $UserBirthdayYear = $_POST["UserBirthdayYear"];
            $UserBirthdayMonth = $_POST["UserBirthdayMonth"];
            $UserBirthdayDay = $_POST["UserBirthdayDay"];
            $PhoneNumber = $_POST["LestPhoneNumber"];
            $CellPhoneNumber = $_POST["CellPhoneNumber"];
            $UserEmail = $_POST["UserEmail"];

            $link = create_connection();
            $sql = "SELECT * FROM users WHERE account = '$UserAccount'";
            $result = execute_sql($link,"Portfolio_1",$sql);

            if(mysqli_num_rows($result)!=0){
                mysqli_free_result($result);
                ?>
                <div class="panel panel-danger centerblock">
                    <div class="panel-heading">
                        <h3 class="panel-title">註冊失敗</h3>
                    </div>
                    <div class="panel-body">
                        失敗原因:此帳號有人註冊
                        <br><br>
                        <a href="join.html" class="btn btn-danger">返回註冊</a>
                    </div>
                </div>
                <?php
            }
            else{
                mysqli_free_result($result);

                $sql = "INSERT INTO users(account,password,name,year,month,day,homephone,cellphone,email) VALUES('$UserAccount','$UserPassword','$UserName','$UserBirthdayYear','$UserBirthdayMonth','$UserBirthdayDay','$PhoneNumber','$CellPhoneNumber','$UserEmail')";
                $result = execute_sql($link,"Portfolio_1",$sql);
                ?>
                    <div class="panel panel-success centerblock">
                        <div class="panel-heading">
                            <h3 class="panel-title">註冊成功，資料如下</h3>
                        </div>
                        <div class="panel-body">
                            帳號: <?php echo $UserAccount . '<br>' ?>
                            密碼: <?php echo $UserPassword . '<br>' ?>
                            姓名: <?php echo $UserName . '<br>' ?>
                            生日: <?php echo $UserBirthdayYear .'-'. $UserBirthdayMonth .'-'. $UserBirthdayDay . '<br>' ?>
                            電話: <?php echo $PhoneNumber . '<br>' ?>
                            手機: <?php echo $CellPhoneNumber . '<br>' ?>
                            E-Mail: <?php echo $UserEmail . '<br>' ?>
                            <br><br>
                            <a href="index.php" class="btn btn-primary">前往登入</a>
                        </div>
                    
                    </div>
                <?php

            }
            mysqli_close($link);
        ?>
        
        
    </body>
    
</html>




















