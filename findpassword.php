
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>顯示密碼</title>
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
            $UserName = $_POST["UserName"];
            $UserCellphone = $_POST["UserCellphone"];
            $UserMail = $_POST["UserMail"];

            require_once("dbtools.inc.php");
            $link = create_connection();
            $sql = "SELECT * FROM users WHERE account='$UserAccount' AND name='$UserName' AND cellphone='$UserCellphone' AND email='$UserMail'";
            $findaccount = execute_sql($link,"Portfolio_1",$sql);

            if(mysqli_num_rows($findaccount)==0){
                mysqli_free_result($findaccount);
                mysqli_close($link);
                ?>
                <div class="panel panel-danger centerblock">
                    <div class="panel-heading">
                        <h3 class="panel-title">密碼找回失敗</h3>
                    </div>
                    <div class="panel-body">
                        失敗原因:資料錯誤
                        <br><br>
                        <a href="forget_password.html" class="btn btn-danger">返回填寫</a>
                    </div>
                </div>
                <?php
                /*
                echo "<script type='text/javascript'>
                    alert('資料填寫錯誤')
                    history.back();
                    </script>";*/
            }
            else{
                
                $sql = "SELECT password FROM users WHERE account='$UserAccount'";
                $returnpasswd = mysqli_query($link,$sql);
                $A = mysqli_fetch_object($returnpasswd);
                ?>
                <div class="panel panel-success centerblock">
                        <div class="panel-heading">
                            <h3 class="panel-title">密碼如下</h3>
                        </div>
                        <div class="panel-body">
                            <p align='center'> <?php echo $A->password ?> </p>
                            <a href="index.php" class="btn btn-primary">返回登入</a>
                        </div>
                    
                    </div>
                <?php
                /*echo "<p align='center'> 密碼為: $A->password <br><a href='index.php'>返回登入</a></p>";*/
                mysqli_free_result($findaccount);
                mysqli_close($link);
            }
        ?>
        
        
    </body>
    
    
</html>








