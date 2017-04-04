<?php include 'database.php';?>
<?php session_start(); 
  
  $date =  date('d');

  if(($date<14)||($date>15)){
     header('Location: index.php');
  } 

  if($_GET['subject']){
     $_SESSION['subject'] = $_GET['subject'];
  }    

  if($_SESSION["name"]==''){
    header('Location: index.php');
  }

?>
</!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8 ">
        <title>Nutcracker| Techkriti</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <script src="jquery.js"></script>
    <style type="text/css">
        .questions span{
          font-size: 25px;
        }
        .questions h2{
          display: inline;
        }
        #ninten{
          display: none;
          width: 60%;
          position: relative;
          margin: auto;
          text-align: center;
        }
        .questions{
          position: relative;
        }
        .questions #quess{
          display: block;
          width:800px;
          margin: auto;
        }
        .file{
              position: absolute;
            top: 100px;
            left: 0px;
            right: 0px;
        }
        #load{
              position: absolute;
            width: 200px;
            left: 0px;
            right: 0px;
            margin: auto;
           top: 60px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
          var subject = '<?php echo $_SESSION['subject']; ?>';
          console.log(subject);
          subject = "subject="+subject;
    	      $.ajax({
                url: "process.php", 
                type: 'POST',
                data:subject,
                beforeSend: function(){
                   $("#load").css('display','block');
                 },
                 complete: function(){
                   $("#load").css('display','none');
                 },
                success: function(result){
                   console.log(result==="done");
                       if(result==='"done"'){
                          window.location.assign('done.php');         
                       }
                       else{
                        result = JSON.parse(result);
                        console.log(result);
                        if((parseInt(result.points)+1==9)||(parseInt(result.points)+1==10)){
                             $('#compiler').css('display','none');
                             $('#ninten').css('display','block');
                        }
                         $(".questions #quess").attr('src','file/'+result.ques+'.png');
                         $(".questions h2").html(parseInt(result.points)+1);
                       }
                }
            });
        });
        function run(){
              $('#runn').css('pointer-events','none');
              var subject = '<?php echo $_SESSION['subject']; ?>';
              var num = $(".questions h2").text();
              var text = $('#output').val();
              console.log(text);
              text = text.replace(/\s/g,"+");
              var dataString="num="+num+"&data="+text+"&subject="+subject;
              $.ajax({
                    url: "compiler/output.php",
                    data:dataString,
                    type:'POST',
                                      beforeSend: function(){
                     $("#load").css('display','block');
                   },
                   complete: function(){
                     $("#load").css('display','none');
                   },
                    success: function(result){
                      

                       window.location.assign('que.php');         
                     /* if(result==='correct'){
                        // $('#compiler .result').html('<span class="right">correct</span>');
                          window.location.assign('que.php');         
                       }*/
                      /*if(result === 'wrong'){
                        $('#runn').css('pointer-events','initial');
                        $('#compiler .result').html('<span class="wrong">Incorrect</span>');
                      }*/
                    }
                });
            } 

          function run1(){
            $('#runn1').css('pointer-events','none');            
            var file_data = $('#fileToUpload').prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
             $.ajax({
               url: 'compiler/output1.php', 
                cache: false,
                contentType: false,
                dataType: 'text', 
                processData: false,
                data: form_data,                         
                type: 'post',
                  beforeSend: function(){
                     $("#load").css('display','block');
                   },
                   complete: function(){
                     $("#load").css('display','none');
                   },
                success: function(result){
                      if(result==='correct'){
                        // $('#compiler .result').html('<span class="right">correct</span>');
                          window.location.assign('que.php');         
                       }
                      if(result=='error'){
                        $('#runn').css('pointer-events','initial');
                        $('#ninten .file').html('<span class="wrong">Please upload only jpg/jpeg file</span>');
                      }                      
                  }
            });
          }  



    </script>
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
          <a style="top: 100px" id="logout" href="choose.php">Attempt other subject</a>
        </div>
        <div class="container questions">
            <span>Question: </span><h2></h2>
            <img id="quess" src="" />
            <img id="load" src="load.gif">
            <p></p>
        </div>
        <form method="post" id="ninten" enctype="multipart/form-data">
            <p style="color: red">Please upload jpg/jpeg/gif file only</p>
            <p style="color: red">File name should be in the format of "&lt;tech_id&gt;_subject_ques.jpg" (ex. "1000_physics_9.jpg") </p>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input id="runn1" onclick="run1();" type="button" value="Upload Image" name="submit">
            <span class="file"></span>
        </form>

        <div id="compiler">
          <br>
          <input type="text" id="output" name="output" value="" placeholder="type your answer here" />

          <p id="buttons" style="position: relative;">
            <input id="runn" type="button" value="Submit" onclick="run();"/>
         </p>
          <span style="display: flex;position: relative;top: 60px;" class="result"></span>
        </div>

    </main>
</body>
<script type="text/javascript">

</script>
</html>
