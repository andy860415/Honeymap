<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>TEST</title>
       <meta http-equiv=Refresh content=2;url=PHPPage.php>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="shortcut icon" href=http://www.freshdesignweb.com/wp-content/themes/fv24/images/icon.ico />
    <link rel="stylesheet" type="text/css" href="styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
   <body>

<!-----------------PHP---------------------->

 <?php
   
  
$con = mysql_connect("localhost", "LJW11688", "");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    $db_selected = mysql_select_db("test",$con);
 
    $result1 = mysql_query("SELECT Tempurature from data",$con);
  //  $rs1=mysql_fetch_row($result1);  溫度

    $result2 = mysql_query("SELECT Datetmp from data",$con);
   // $rs2=mysql_fetch_row($result2);   溫度時間

    $result3 = mysql_query("SELECT Humidity from data",$con);
   // $rs3=mysql_fetch_row($result3);   濕度

    $result4 = mysql_query("SELECT Datehum from data",$con);
   // $rs4=mysql_fetch_row($result4);   濕度時間
    mysql_close($con);
?>
<!-----------------PHP---------------------->
   
   <div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                <a href="" target="_blank">Home</a>
                <span class="right">
                </span>
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
            </header>       
     <!-- start header here-->
	<header>
<div id="fdw-pricing-table">
    <div class="plan plan1">
        <div class="header">TEMPURATURE</div>
        <div class="data">
            <!--      PHP     -->
        <?php  
          for($i=1;$i<=mysql_num_rows($result1);$i++)
          {     
              $temp1=mysql_fetch_row($result1);
              $temp2=mysql_fetch_row($result2);
              $rs1[$i]=$temp1[0];
              $rs2[$i]=$temp2[0];
          }
            while(!($rs1[$i])) $i--;
          echo $rs1[$i].°C."<br>".$rs2[$i];
         ?>
         </div>  
        <div class="monthly"></div>    
        <div class="bar" id="bar1"></div>
        <ul>
          <?
            for($j=1;$j<20;$j++)
            {   
                if($rs1[$i-$j])
                echo $rs1[$i-$j].°C. "<br>".$rs2[$i-$j]; 
            }
            ?>
               <!--      PHP     -->
        </ul>
    </div>
    <div class="plan plan3">
        <div class="header">HUMIDITY</div>
        <div class="data">   <!--      PHP     -->
        <?php  
          for($i=1;$i<=mysql_num_rows($result3);$i++)
          {     
              $temp3=mysql_fetch_row($result3);
              $temp4=mysql_fetch_row($result4);
              $rs3[$i]=$temp3[0];
              $rs4[$i]=$temp4[0];
          }
          ;
            while(!($rs3[$i])) $i--;
          echo $rs3[$i].°C."<br>".$rs4[$i];
         ?>
         </div>  
        <div class="monthly"></div>    
        <div class="bar" id="bar1"></div>
        <ul>
          <?
            for($j=1;$j<20;$j++)
            {   
                if($rs3[$i-$j])
                echo $rs3[$i-$j].°C. "<br>".$rs4[$i-$j]; 
            }
            ?>
               <!--      PHP     --></div>
        
    <div class="plan plan4">
        <div class="header">PRESSURE</div>
        <div class="data">DATA</div>
        <div class="monthly"></div>
        <div class="bar" id="bar4"></div>
        <ul>
            <li></li>
            <li></li>
            <li></li>
			<li></li>			
        </ul>
    </div>
</div>
	</header><!-- end header -->
    
</div>


    </body>
</html>

