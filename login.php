<?php
session_start();
$username="";
$pass="";
$address="";
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

$username=$_POST['usname'];
$pass = $_POST['passwd'];
$encpass=md5($pass);
$query="SELECT * FROM registration_user WHERE username='$username' AND password='$encpass' LIMIT 1";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);
if ($user) { 
    if ($user['username'] === $username) 
    {
        if($user['password']===$encpass)
        {   //$_SESSION['addres']=$user['address'];
           ?> <script>
           /*document.cookie="x="+<?php $user['address'];
           ?>;*/
           alert("Welcome to oppidan utils, <?php echo $user['username']?> ");</script>
           <?php 

           
           if($user['type']=="Private")
            {
                //header('location: home.html');?>
    <script language="javascript" type="text/javascript">
    setTimeout(() => {
        <?php // $user['address'];
        ?>
        <?php $_SESSION['addres']=$user['address'] ; 
        //$_SESSION['addres']=$result['address'] ;?>
        window.location = "home.html";
    }, 500);
    
    </script>
    <?php
            }
            else{
                //header('location: apartment.html');
                ?>
    <script language="javascript" type="text/javascript">
    
    setTimeout(() => {
        window.location = "apartment.html";
    }, 500);
    
    </script>
    <?php
            }
            }
        }
    }
    else{
        //<script>message("wrong username or password");
        //window.location.refresh();
        //</script>
        ?>
    <script language="javascript" type="text/javascript">
    alert("wrong username and password credentials");
    //window.location.refresh();
    setTimeout(() => {
        window.location = "login.html";
    }, 500);
    
    </script>
    <?php

// header('location: login.html');
    }

    if (isset($_GET['logout'])) {
        $user['log']=0;
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.html");
    }


?>