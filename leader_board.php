<?php include 'database.php';?>
<?php
 $phy ="SELECT * FROM leader ORDER BY phy1 DESC";
 $phy = mysqli_query($conn,$phy); 
 
  $chm ="SELECT * FROM leader ORDER BY chm1 DESC";
 $chm = mysqli_query($conn,$chm); 

  $mth ="SELECT * FROM leader ORDER BY mth1 DESC";
 $mth = mysqli_query($conn,$mth);  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nutcracker| Techkriti</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <script src="jquery.js"></script>
        <style type="text/css">
            body{
                background-color: #fafafa;
                width: 100%;
height: 100%;
    overflow-x: hidden;
            }
            table {
                    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 28%;
    margin: auto;
    display: table-cell;
    height: 100%;
/*                    display: inline-table;
*/            }
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
            main{

                 width:100%;
                height:100%
            }
        </style>
    </head>
    <body>
        <header>
            <div class="container">
                <h1><a href="index.php">Nutcracker 17</a></h1>
            </div>
        </header>
        <main> 
            <table>
              <tr>
                <th>Name</th>
                <th>Maths(marks out of 10)</th>
              </tr>

            <?php
                while ($row = mysqli_fetch_assoc($mth)) {
                    echo '<tr>';
                    echo '<td>'.$row['name'].'</td>'; 
                    echo '<td>'.$row['mth1'].'</td>'; 
                    echo '</tr>';
                }
            ?>
           
            </table>                                    
            <table >
              <tr>
                <th>Name</th>
                <th>Chemistry(marks out of 8)</th>
              </tr>
            <?php
                while ($row = mysqli_fetch_assoc($chm)) {
                    echo '<tr>';
                    echo '<td>'.$row['name'].'</td>'; 
                    echo '<td>'.$row['chm1'].'</td>'; 
                    echo '</tr>';
                }
            ?>
            </table>  
            <table >
              <tr>
                <th>Name</th>
                <th>Physics(marks out of 10)</th>
              </tr>
            <?php
                while ($row = mysqli_fetch_assoc($phy)) {
                    echo '<tr>';
                    echo '<td>'.$row['name'].'</td>'; 
                    echo '<td>'.$row['phy1'].'</td>'; 
                    echo '</tr>';
                }
            ?>
            </table>                                                
        </main>
    </body>
</html>
