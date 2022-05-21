
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>會員刪除資料</title>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        
        </script>
        
    </head>
    <body>
        <div class="panel panel-primary centerblock">
                <div class="panel-heading">
                    <h3 class="panel-title">歡迎來到會員資料刪除系統</h3>
                </div>
                <div class="panel-body">
                    <table>
                    <?php
                        
                        session_start();
                        $value = $_SESSION['ID'];
                        //echo $value;
                        require_once("dbtools.inc.php");
                        $link = create_connection();
                        $sql = "SELECT * FROM users WHERE account = '$value'";
                        $result = execute_sql($link,"Portfolio_1",$sql);
                        //echo mysqli_num_rows($result);
                        $user = mysqli_fetch_object($result);
                        mysqli_free_result($result);
                        
                        function myFunction() {
                            
                        }
                        if (isset($_GET['name'])) {
                            
                            myFunction();
                        }
                        if($_GET['name']==1){
                            $link1 = create_connection();
                            $nl = null;
                            $sql1 = "UPDATE users SET year = '$nl' , month = '$nl',day = '$nl' WHERE account = '$value'";
                            $result1 = execute_sql($link1,"Portfolio_1",$sql1);
                            $_GET['name']=0;
                            
                            mysqli_close($link1);
                        }
                        if($_GET['name']==2){
                            $link1 = create_connection();
                            $nl = null;
                            $sql1 = "UPDATE users SET homephone = '$nl' WHERE account = '$value'";
                            $result1 = execute_sql($link1,"Portfolio_1",$sql1);
                            $_GET['name']=0;
                            mysqli_close($link1);
                        }
                        if($_GET['name']==3){
                            $link1 = create_connection();
                            $nl = null;
                            $sql1 = "UPDATE users SET cellphone = '$nl' WHERE account = '$value'";
                            $result1 = execute_sql($link1,"Portfolio_1",$sql1);
                            $_GET['name']=0;
                            mysqli_close($link1);
                        }
                        if($_GET['name']==4){
                            $link1 = create_connection();
                            $nl = null;
                            $sql1 = "UPDATE users SET email = '$nl' WHERE account = '$value'";
                            $result1 = execute_sql($link1,"Portfolio_1",$sql1);
                            $_GET['name']=0;
                            mysqli_close($link1);
                        }
                        if($_GET['name']==5){
                            $link1 = create_connection();
                            $nl = null;
                            $sql1 = "DELETE FROM users WHERE account = $value";
                            $result1 = execute_sql($link1,"Portfolio_1",$sql1);
                            $_GET['name']=0;
                            mysqli_close($link1);
                        }
                        mysqli_close($link);
                    ?>
                        <tr >
                            <td  align="left" width="70%">生日: <?php echo $user->year.'-'.$user->month.'-'.$user->day; ?></td><td></td>
                            <td  align="right">
                                
                                <a href='deletedate.php?name=1' class="btn btn-danger">刪除</a>
                                
                        </tr>
                        <tr >
                            <td  align="left" width="70%">電話: <?php echo $user->homephone; ?></td><td></td>
                            <td  align="right">
                                <a href='deletedate.php?name=2' class="btn btn-danger">刪除</a>
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="70%">行動電話: <?php echo $user->cellphone; ?></td><td></td>
                            <td  align="right">
                                <a href='deletedate.php?name=3' class="btn btn-danger">刪除</a>
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="70%">E-mail: <?php echo $user->email; ?></td>
                            <td></td>
                            <td  align="right">
                                <a href='deletedate.php?name=4' class="btn btn-danger">刪除</a>
                            </td>
                        </tr>
                        <tr >
                            <td width="50%">
                                <a href="userfunction.php" class="btn btn-primary">返回會員功能</a>
                            </td>
                            <td >
                                <a href="index.php" class="btn btn-primary">返回登入畫面</a>
                            </td>
                            <td>
                                <a href='deletedate.php?name=5' class="btn btn-danger">刪除帳號</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php 
                mysqli_close($link1);
            ?>
    </body>
    
</html>