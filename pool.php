<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Links for google fonts. -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400i&display=swap" rel="stylesheet">
  <!-- Links for custom stylesheets -->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="custom.css">
  <!-- Links for bootstrap realted stylesheets and jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Services</title>
  <style>
    /*Responsible for displaying the li items vertically on smaller devices.*/
    @media only screen and (min-width: 360px) and (max-width: 768px) {
      .collapse ul li a {
        display: block;
        text-align: left;
      }
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand mx-auto" href="./Aboutus.html">OppidanUtils</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto nav-pills pull-right">
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
        <li class="nav-item">
          <a class="btn btn-dark" href="new-business_o.html">Register a business</a>
          <!-- <a class="btn btn-dark" href="#">Services</a> -->
          <a class="btn btn-dark" href="./Aboutus.html">About Us</a>
          <a class="btn btn-dark" href="./Contactus.html">Contact Us</a>
        </li>
      </ul>
      <a href="login.php?logout='1'" class="btn btn-success btn-md">
        <span class="glyphicon glyphicon-log-out"></span> Log out
      </a>
    </div>
  </nav>
  <!-- <script>
  var l=document.getElementById("bod");
  l.onload=links;
  
  function links(){
    window.location="electrician_jpnagar.php";
  }
  </script> -->
</head>

<?php
  echo '<body class="cont">
  <div class="cont">
    <h1>Pool related services nearby</h1>
    <img src="pool.jpg" alt="Gym">
  </div>';
?>

</html>

<?php
//include("login.php");
if(!(isset($_SESSION))){ session_start();}
try{
    $db = mysqli_connect('localhost', 'root', '');
}
catch(Exception $ex)
{
    echo "sql couldn't connect";
}


if(mysqli_select_db($db,'wtproject'))
{
    echo "<script> console.log('Sucessfully connected');</script>";
}

 //$address=$user['address'];
//  $address="blah";


//  $address="";
//      $_SESSION['addres']=$address;
    // $_COOKIE['x']=$address;
// echo "<h1 style='color:springgreen;'".$address."</h1>";
// $query="SELECT * FROM business WHERE area='$address'";
// $queryb="SELECT * FROM new_business WHERE area='$address'";
$query="SELECT * FROM business ";
$queryb="SELECT * FROM new_business ";

$result =$db->query($query);
$resultb =$db->query($queryb);
echo"<table id='table'><tr><th>Name</th>
      <th>Address</th>
      <th>area</th>
    </tr>";
if($resultb->num_rows >0)
{
while($detailb= mysqli_fetch_array($resultb))
{
  // if ($detailb['area']===$address)
  //if ($detailb['area']==="J.P.nagar")

	//{
    if ($detailb['business_type']=="Pool");
		{
		// 	 echo "<body id='bod' >";	
		// echo "<div class='cont'>";
		// echo "<table id='table' class='cont'>";
             echo "<tr>";
             echo "<td>". $detailb['business_name']."</td>";
             echo "<td>". $detailb['address']."</td>";
             echo "<td>". $detailb['area']."</td>";
             echo "</tr>";
			//  echo "</table>";
			// echo "</div>";
			//  echo "</body>";
			 
            /*?> <tr><td> <?php $detail['business_name']; ?> </td></tr>
            <tr><td> <?php $detail['address']; ?> </td></tr>
            <tr><td> <?php $detail['area']; ?> </td></tr>
            <?php*/
   // }
}}}
if($result->num_rows >0)
{
while($detail= mysqli_fetch_array($result))
{

    // if ($detail['area']===$address)  
    //if ($detail['area']==="J.P.nagar") 
    //{
        if ($detail['service']=="Pool")
        {
      // echo "<body id='bod' >";	
		// echo "<div  class='cont'>";
		// echo "<table id='table' class='cont'>";
             echo "<tr>";
             echo "<td>". $detail['name']."</td>";
             echo "<td>". $detail['address']."</td>";
             echo "<td>". $detail['area']."</td>";
             echo "</tr>";
			// echo "</table>";
			//  echo "</div>";
			//  echo "</body>";
			  //  }
}}}
echo"</table></body>";
exit();

