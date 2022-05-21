<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>會員登入系統</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        
        <script type="text/javascript">
            function check_(){
                if(document.myForm.UserAccount.value.length==0){
                    alert("請輸入帳號");
                }
                else if(document.myForm.UserPassword.value.length==0){
                    alert("請輸入密碼");
                }
                else{
                    myForm.submit();
                }
            };
            
        </script>
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
                max-width: 340px;
            }
        </style>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
        <form method="post" action="checkpassword.php" name="myForm">
            
            
            <table align="center" class="centerblock" >
                <td align="center">
                    <p>
                    歡迎來到會員登入系統，請在下方輸入帳號和密碼。
                    </p>
                    <div class="input-group">
                        <span class="input-group-addon " >
                            <i class="glyphicon glyphicon-user" ></i>
                        </span>
                        <input name="UserAccount" class="form-control" type="text"  maxlenght="30" size="30" placeholder="請輸入帳號" ><br>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" >
                            <i class="glyphicon glyphicon-lock" ></i>
                        </span>
                        <input name="UserPassword" class="form-control" type="text"  maxlenght="30" size="30" placeholder="請輸入密碼" ><br>
                    </div>
                    <br>
                    <input type="button" class="btn btn-success" value="立即登入" onclick="check_()">
                    <input type="reset"  class="btn btn-primary" value="重新輸入" >
                    <a href="join.html" class="btn btn-warning">立即註冊</a>
                    <a href="forget_password.html" class="btn btn-danger">忘記密碼</a>
                    
                </td>
            </table>
            
        </form>
    </body>
    
</html>


