<?php include 'database.php';?>
<?php session_start(); 
  // $date =  date('d');

  // if(($date<14)||($date>15)){
  //    header('Location: index.php');
  // }

  // else 
    if($_SESSION["name"]==''){
    header('Location: index.php');
    die();
  }

  // else{
  //    header('Location: index.php');
  //    die();
  // }

?>
</!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8 ">
        <title>Nutcracker| Techkriti</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="jquery.js"></script>
    <style type="text/css">
        li{
margin:0 5px;

}
ul{
display: flex;
    justify-content: center;
}
        #logout{
          width: 100px;
          background-color: blue;
          color: white;
          padding: 11px;
          text-align: center;
          border-radius: 4px;
          position: absolute;
          right: 10px;
          top: 10px;
        }
        .top{
          display: block;
          margin: auto;
        }
                .top{
          display: block;
          margin: auto;
        }
        .container li{
          width: 300px;
          height: 300px;
          background-color: grey;
          display: inline-block;
          overflow: hidden;
          position: relative;
        }
        li img{
          height: 300px;
            position: absolute;
            transition: 0.4s ease-in;
            opacity: 0.4;
        }
        li a{
          position: absolute;
          width: 300px;
          height: 300px;
          font-size: 30px;
          text-align: center;
          top: 0px;
          bottom: 0px;
          left: 0px;
          color: white;
          right: 0px;
          margin: auto;
        }
        li:hover img{
            -webkit-transform: rotate(30deg);
            -moz-transform: rotate(30deg);
            -ms-transform: rotate(30deg);
            -o-transform: rotate(30deg);
            transform: rotate(30deg);
            transform: scale(1.2);
            transition: 0.4s ease-in;
            opacity: 1;
        }

    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Nutcracker 17</h1>
        </div>
    </header>
        <main>
        <div class="top">
          <a id="logout" href="logout.php">LOG OUT</a>
        </div>
        <div class="container">
            <ul>
              <li>
      
                 <img src="img/physics.jpg">
                 <a href="que.php?subject=physics">Physics</a>
              </li>
              <li>
                <img src="img/chemistry.jpg">
                <a href="que.php?subject=chemistry">chemistry</a>
              </li>
              <li>
                <img src="img/maths.jpg">
                <a href="que.php?subject=maths">maths</a>
              </li>
            </ul>
            </div>
            <div class='container' style="margin:5% auto" >
            <div style="font-size:20px;">Rules:</div>
              <div>
      
                <p>&rtrif;There are three subjects.You can attempt all three but one at a time.</p>
              </div>
              <div>
      
                <p>&rtrif;Read all the questions carefully and provide answers in the given box.</p>
              </div>
               <div>
      
                <p>&rtrif;Time alloted for competition is from 14th march 00:00 to 15th March 23:59.</p>
              </div>
               <div>
      
                <p style='color:red;'>&rtrif;You can submit your answers only once so be careful while submitting you answer.You cannot go back.</p>
              </div>
                <div>
      
                <p>&rtrif;Chemistry and Physics scores will be updated after the completion of competition and will be informed</p>
              </div>
               <div>
      
                <p>&rtrif;For question number 9 and 10 ,name your file as '&lt;yourtechid&gt;_subject_questionnum.jpg (example: 10003_Maths_10.jpg) '</p>
              </div>
               <div>
      
                <p>&rtrif;Contact us at scimatex@techkriti.org</p>
              </div>

            </div>
        
    </main>
</body>
</html>           
