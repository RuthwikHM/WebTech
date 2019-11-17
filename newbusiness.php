<?php
session_start();

// initializing variables
 $name="";
 $username = "";
 $email    = "";
 $address="";
$errors = array(); 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// connect to the database
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

//if (isset($_POST['submit'])) {
    // receive all input values from the form
    // $name=mysqli_real_escape_string($db, $_POST['names']);
    $name=$_POST['name'];
    $username = $_POST['username'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $address= $_POST['address'];
    $type= $_POST['type'];
    $area= $_POST['area'];
//}
    

    
  $unique_entry= "SELECT * FROM new_business WHERE username='$username'  LIMIT 1";
  $result = mysqli_query($db, $unique_entry);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    //   echo "<script>alert(' username already exists');</script>";
    ?>
    <script language="javascript" type="text/javascript">
    alert("username already exists.Please try with another username");
    //window.location.refresh();
    setTimeout(() => {
        window.location = "new-business_o.html";
    }, 1000);
    
    </script>
    <?php
    }

    
  }

   //register user if there are no errors in the form
  if (count($errors) == 0) {
   
    $encrypted_password = md5($password);//encrypt the password before saving in the database
    $query = "INSERT INTO new_business ( business_name, email, address ,area, business_type, username, password) VALUES ('$name','$email','$address','$area','$type','$username','$encrypted_password')";
    mysqli_query($db, $query);
    
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.html');
  }
  else{
    // include('errors.php');
  }


  ?>