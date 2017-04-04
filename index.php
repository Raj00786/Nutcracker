<?php session_start();
  
  $date =  date('d');
  if(($date<14)||($date>15)){
     if($date<14){
       $_SESSION['timeout']='pre';      
     }
     else{
       $_SESSION['timeout']='post';            
     }
  } 
 else{
   $_SESSION['timeout']='';            
   if($_SESSION["name"]!=''){
      if($_SESSION["subject"]!=''){
       header('Location: que.php');    
      }
      else
      {
       header('Location: choose.php');
       }
      }
      else{
       $_SESSION["name"]='';
     }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nutcracker| Techkriti</title>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8 ">
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script src="jquery.js"></script>
        <style type="text/css">
            body{
                background-color: #fafafa
            }
          header>div{
             width: 60%;
            display: flex;
            margin: auto;
          }
          ul{
            position: relative;
          }
          ul a{
            position: absolute;
            right: 100px;
            background-color: blue;
            padding: 10px;
            color: white;
            border-radius: 5px;
          }
          header a{
             width: 20%;
            margin: auto;
            width: 100px;
            background-color: blue;
            color: white;
            padding: 11px;
            text-align: center;
            border-radius: 4px;
          }
          header h1{
             width: 70%;
          }
          form input{
            width: 75%!important;
          }
          form label{
            width: 25%;
          }
          form>div{
            display: flex;
            padding: 10px;
          }
          form{
            width: 60%;
            background-color: white;
            margin: auto;
            border-radius: 5px;
            padding: 15px;
          }
          #login{
            width: 100%!important;
            padding: 3px;
            cursor: pointer;
          }
        </style>
        <script type="text/javascript">
            $(function(){
                var timeout = '<?php echo $_SESSION["timeout"]; ?>';
                 console.log(timeout);
                if(timeout=='pre'){
                   $('main .container').html('<h1>Not started Yet will start on 14th march 2017 00:00 </h1>')
                }
                if(timeout=='post'){
                   $('main .container').html('<h1>Successfully completed,Try next year</h1>')
                }
                $('#login').on('click',function(){
                var username = $('#username').val();
                var password = $('#password').val();
                var dataString = "username="+username+"&pass="+password;
                $.ajax({
                      url: 'login.php',
                      data:dataString,   
                      type: 'POST',
                      dataType: "json",              
                      success: function(data){
                           if(data!='false'){
                               location.href = "choose.php";
                           }
                           else{
                            console.log('not logged');
                           }
                      }
                });
            });
            })
        </script>
    </head>
    <body>
        <header>
            <div>
                <h1>Nutcracker 17</h1>
                <a href="leader_board.php">Leader Board</a>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Instructions:</h2>
                <ul>
                    <li><strong>Number of Questions: 10</strong></li>
                    <li><strong>Type: </strong>8 questions are integer type and 2 are subjective</li>
                    <li><strong>Time: </strong>From 14th March 00:00- 15th March 23:59pm </li>
                </ul>
                <form >
                    <div>
                      <label for="username">Username</label>
                      <input id="username" type="text" name="username">
                    </div>
                    <div>
                       <label for="password">Password</label>
                       <input id="password" type="password" name="password">
                    </div>
                    <div>
                      <input type="button" id="login" value="Login" name="login">
                    </div>
                </form>
            
            </div>
        </main>
    </body>
</html>
