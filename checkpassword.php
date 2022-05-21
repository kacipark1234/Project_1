
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>帳號登入成功</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            
            $UserAccount = $_POST["UserAccount"];
            $UserPassword = $_POST["UserPassword"];
            require_once("dbtools.inc.php");
            $link = create_connection();
            $sql = "SELECT * FROM users WHERE account = '$UserAccount'";
            $result = execute_sql($link,"Portfolio_1",$sql);
            $sql = "SELECT * FROM users WHERE account = '$UserAccount' AND password = '$UserPassword'";
            $checkpassword = execute_sql($link,"Portfolio_1",$sql);
            if(mysqli_num_rows($result)==0){
                mysqli_free_result($result);
                mysqli_free_result($checkpassword);
                mysqli_close($link);
                ?>
                <div class="panel panel-danger centerblock">
                    <div class="panel-heading">
                        <h3 class="panel-title">登入失敗</h3>
                    </div>
                    <div class="panel-body">
                        失敗原因:此帳號未被註冊
                        <br><br>
                        <a href="index.php" class="btn btn-danger">返回登入</a>
                    </div>
                </div>
                <?php
                /*
                echo "<script type='text/javascript'>
                        alert('此帳號未被註冊')
                        history.back();
                    </script>";*/
            }
            else if(mysqli_num_rows($checkpassword)!=0){
                
                $user = mysqli_fetch_object($checkpassword);
                
                mysqli_free_result($result);
                mysqli_free_result($checkpassword);
                mysqli_close($link);
                ?>
                    <div class="panel panel-success centerblock">
                        <div class="panel-heading">
                            <h3 class="panel-title">登入成功</h3>
                        </div>
                        <div class="panel-body">
                            歡迎會員
                            <?php echo $user->name; 
                                session_start();
                                $_SESSION['ID'] = $user->account;
                            ?>
                            <br><br>
                            
                            <a href="userfunction.php" class="btn btn-primary">前往會員功能專區</a>
                            
                            <a href="index.php" class="btn btn-danger">返回登入</a>
                        </div>
                    </div>
                <?php
            }
            else{
                mysqli_free_result($result);
                mysqli_free_result($checkpassword);
                mysqli_close($link);
                ?>
                <div class="panel panel-danger centerblock">
                    <div class="panel-heading">
                        <h3 class="panel-title">登入失敗</h3>
                    </div>
                    <div class="panel-body">
                        失敗原因:密碼錯誤
                        <br><br>
                        <a href="index.php" class="btn btn-danger">返回登入</a>
                    </div>
                </div>
                <?php
                /*echo "<script type='text/javascript'>
                        alert('密碼錯誤')
                        history.back();
                    </script>";*/
            }
        ?>
        
        
    </body>
    
</html>