<?php include 'database.php';?>
<?php session_start(); 
  if($_SESSION["name"]==''){
    header('Location: index.php');
  }
  $name= $_SESSION["name"];
  $select_query ="SELECT * FROM leader WHERE name='$name'";  
  $select_result = mysqli_query($conn,$select_query); 
  $select  = mysqli_fetch_assoc($select_result);
  $phy = $select['phy'];
  $chm = $select['chm'];
  $mth = $select['mth'];
   
  if(($phy==='10')||($chm==='10')||($mth==='10')){
  }
  else{
    header('Location: index.php');    
  }
?>
</!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8 ">
        <title>Nutcracker| Techkriti</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <style type="text/css">
          header>div{
             width: 60%;
            display: flex;
            margin: auto;
          }
          .container {
             text-align: center;
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
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Nutcracker 17</h1>
            <a href="leader_board.php">Leader Board</a>
        </div>
    </header>
    <main>
        <div class="top">
          <a id="logout" href="logout.php">LOG OUT</a>
          <a style="top: 100px" id="logout" href="choose.php">Attempt other subject</a>
        </div>
        <div class="container">
               <h1>You have completed Nutcracker successfully</h1>
               <h2>You can check your score in leaderboard</h2>
               <h2>Final Results and details about 2nd round will be mailed to you soon</h2>
        </div>
    </main>
</body>
</html>           
