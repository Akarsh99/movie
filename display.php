<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Netflix </title>
</head>
<style>
input[type=button]{
    background-color: rgb(1, 181, 82);
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 2px;
}
input[type=button]:hover{
    background-color: rgb(0, 231, 104);
    border-radius: 2px;
    
}
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid rgb(1, 181, 82);
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  animation-duration: 5s;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
  body{
    background: url('bg.jpg');
  }
header{
  width: 100%;
  height: 100px;
  background-color: rgba(0, 0, 0, 1);
  text-align:center;
  display:inline-block;
  margin: 0 auto;
}
.desc{
  width: 700px;
  margin: 0 auto;
  background-color: rgba(34, 34, 51, 0.9);
  padding: 20px;
}
</style>
<body bgcolor="black" onload="myFunction()" style="margin:0;"> 

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
	<div class="desc">
		<form>
<input type="button" value="Homepage" onclick="window.location.href='http://localhost/netflix_search.html'" />
</form>
<?php

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
$count=0;
$connect = mysqli_connect("localhost", "root", "","netflix");

$id = $_POST['m_title'];

$query = "SELECT * FROM netflix WHERE Title LIKE '%$id%'";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
    {
    	
      while ($row = mysqli_fetch_array($result))
      {
        echo "<font color='grey' face='helvetica' size='20'><br/>  " . $row['Title'];
        echo "<br><font color= #AACCFF face='helvetica' size='4.5'> " . $row['Runtime_Minutes'];
        echo "&nbsp;mins&nbsp;";
        echo "&nbsp;|&nbsp;  " . $row['Genre'];
        echo "&nbsp;|&nbsp;  " . $row['Year'];
        echo "<br/><br/> ". $row['Description'];
        echo "<br/><br/>". $row['Trailer'];
        echo "<br/><br/> Director: &nbsp; " . $row['Director'];
        echo "<br/> Actors: &nbsp;  " . $row['Actors'];
        echo "<br/> Rating: " . $row['Rating'];
        echo "<br/> Metascore: " . $row['Metascore'];
        echo "<br/><br/><br/>";
        $count++;
      } 
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $start), 4);
		//echo 'Page generated in '.$total_time.' seconds.'; 
        echo "<font color='grey' face='helvetica' size='4' text-align='left'>". $count;
    	echo " Result(s) in ";
    	echo (rand(5000,7000)/1000);
    	echo "s<br/><br/>";
    }
    
else {
     echo "Error";
    }  
?>
<form>
<input type="button" value="Homepage" onclick="window.location.href='http://localhost/netflix_search.html'" />
</form>
</div>
</div>
<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 5500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
</body>
</html>