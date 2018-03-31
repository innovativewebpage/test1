<?php
session_start();
$connect=mysql_connect("localhost","root","")or die("doesn't connect");
$db=mysql_select_db("lms",$connect) or die("doesn't connect");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>User Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="s1" value="Login">
                <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.html"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>


<?php
				if(isset($_POST['s1']))
				{
					extract($_POST);
							
					$qry=mysql_query("select * from librarian_registration where username='$username' and password='$password'");
					$no=mysql_num_rows($qry);
					$row=mysql_fetch_array($qry);
							
					if($no==1)
					{
						$_SESSION["librarian"]=$_POST["username"];
						
						header("location:display_student_info.php");
					}
					else
						{
							echo "<script>alert('Invalid Username or Password');</script>";
						}
				}
			?>
		

<div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>


</body>
</html>
