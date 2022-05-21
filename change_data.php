<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>更新帳號</title>
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
    

            session_start();
            $UserAccount = $_SESSION['ID'];
            $UserPassword = $_POST["UserPassword"];
            $UserName = $_POST["UserName"];
            $UserYear = $_POST["UserYear"];
            $UserMonth = $_POST["UserMonth"];
            $UserDay = $_POST["UserDay"];
            $UserPhone = $_POST["UserPhone"];
            $UserCellphone = $_POST["UserCellphone"];
            $UserMail = $_POST["UserMail"];


            /*echo $UserAccount.'<br>';
            echo $UserPassword.'<br>';
            echo $UserName.'<br>';
            echo $UserYear.'<br>';
            echo $UserMonth.'<br>';
            echo $UserDay.'<br>';
            echo $UserPhone.'<br>';
            echo $UserCellphone.'<br>';
            echo $UserMail.'<br>';*/
            
            require_once("dbtools.inc.php");
            $link = create_connection();
            $sql = "UPDATE users SET password = '$UserPassword', name = '$UserName', year = '$UserYear',month = '$UserMonth',day = '$UserDay',homephone = '$UserPhone',cellphone = '$UserCellphone', email = '$UserMail' WHERE account = '$UserAccount'";

            $result = execute_sql($link,"Portfolio_1",$sql);
        ?>
        <div class="panel panel-success centerblock">
            <div class="panel-heading">
                <h3 class="panel-title">資料已被更新</h3>
            </div>
            <div class="panel-body">
                帳號: <?php echo $UserAccount . '<br>' ?>
                密碼: <?php echo $UserPassword . '<br>' ?>
                姓名: <?php echo $UserName . '<br>' ?>
                生日: <?php echo $UserYear .'-'. $UserMonth .'-'. $UserDay . '<br>' ?>
                電話: <?php echo $UserPhone . '<br>' ?>
                手機: <?php echo $UserCellphone . '<br>' ?>
                E-Mail: <?php echo $UserMail . '<br>' ?>
                <br><br>
                <a href="userfunction.php" class="btn btn-primary">返回會員功能</a>
                
            </div>
            
        </div>
        
        <?php 
            mysqli_free_result($result);
            mysqli_close($link); 
        ?>
    </body>
    
</html>






















