<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>會員註冊系統</title>
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
        
        <form method="post" action="change_data.php" name="myForm">
            
            
            <div class="panel panel-primary centerblock">
                <div class="panel-heading">
                    <h3 class="panel-title">歡迎來到會員資料更改</h3>
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
                        /*
                        echo '帳號: '.$user->account.'<br>';
                        echo '密碼: '.$user->password.'<br>';
                        echo '姓名: '.$user->name.'<br>';
                        echo '生日: '.$user->year.'-'.$user->month.'-'.$user->day.'<br>';
                        echo '電話: '.$user->homephone.'<br>';
                        echo '手機: '.$user->cellphone.'<br>';
                        echo '電子郵件: '.$user->email.'<br>';*/
                        
                    ?>
                        <tr >
                            <td  align="left" width="50%">帳號: <?php echo $user->account; ?></td>
                            <td  align="left">
                                無法更改
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="50%">密碼: <?php echo $user->password; ?></td>
                            <td  align="left">
                                <input name="UserPassword" type="text"  maxlenght="20" size="20" placeholder="請輸入密碼" value = "<?php echo $user->password; ?>">
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="50%">姓名: <?php echo $user->name; ?></td>
                            <td  align="left">
                                <input name="UserName" type="text"  maxlenght="20" size="20" placeholder="請輸入姓名" value = "<?php echo $user->name; ?>">
                            </td>
                        </tr>
                        
                        <tr >
                            <td  align="left" width="50%">生日: <?php echo $user->year.'-'.$user->month.'-'.$user->day; ?></td>
                            <td  align="left">
                                <input name="UserYear" type="text"  maxlenght="4" size="2" value = "<?php echo $user->year; ?>">-
                                <input name="UserMonth" type="text"  maxlenght="2" size="2" value = "<?php echo $user->month; ?>">-
                                <input name="UserDay" type="text"  maxlenght="2" size="2" value = "<?php echo $user->day; ?>">
                                
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="50%">電話: <?php echo $user->homephone; ?></td>
                            <td  align="left">
                                <input name="UserPhone" type="text"  maxlenght="10" size="10" value = "<?php echo $user->homephone; ?>">
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="50%">行動電話: <?php echo $user->cellphone; ?></td>
                            <td  align="left">
                                <input name="UserCellphone" type="text"  maxlenght="20" size="20" value = "<?php echo $user->cellphone; ?>">
                            </td>
                        </tr>
                        <tr >
                            <td  align="left" width="50%">E-mail: <?php echo $user->email; ?></td>
                            <td  align="left">
                                <input name="UserMail" type="text"  maxlenght="20" size="20" value = "<?php echo $user->email; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                            </td>
                            <td align="center" >
                            <input type="submit" class="btn btn-success" value="儲存">
                            </td>
                            <td></td>
                        </tr>
                    
                    </table>
                </div>
            </div>
            
        </form>
    </body>
    
</html>