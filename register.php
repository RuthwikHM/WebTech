<?php
session_start();

// initializing variables
 $name="";
 $username = "";
 $email    = "";
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
    $name=$_POST['names'];
    $username = $_POST['username'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $address= $_POST['address'];
    $type= $_POST['type'];
//}
    

    
  $unique_entry= "SELECT * FROM registration_user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $unique_entry);
  $user = mysqli_fetch_assoc($result);
  if ($user)
   { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    //   echo "<script language='javascript'>";
    // echo 'alert("username already exists.Please try with another username"); window.location.refresh(); </script>';
     
    ?>
    <script language="javascript" type="text/javascript">
    alert("username already exists.Please try with another username");
    //window.location.refresh();
    setTimeout(() => {
        window.location = "signup.html";
    }, 1000);
    
    </script>
    <?php
    //header('location:signup.html');
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      ?>
    <script language="javascript" type="text/javascript">
    alert("email already exists.Please try with another email");
    //window.location.refresh();
    setTimeout(() => {
        window.location = "signup.html";
    }, 1000);
    
    </script>
    <?php
    }
  }

   //register user if there are no errors in the form
  if (count($errors) == 0) {
   
    $encrypted_password = md5($password);//encrypt the password before saving in the database
    $query = "INSERT INTO registration_user (name, email, address, type, username, password) VALUES ('$name','$email','$address','$type','$username','$encrypted_password')";
    mysqli_query($db, $query);
    
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    if($type==="Private")
    {
        header('location: home.html');
    }
    else{
        header('location: apartment.html');
    }
  }
  else{
    // include('errors.php');
  }


  ?>