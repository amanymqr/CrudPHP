
<?php
    $sucess =0 ;
    $user   =0 ;

    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM registeration where username = '$username'";
        $result = mysqli_query($conn , $sql);
        if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
                // echo "user already exist";
                $user = 1;
            }else{
                $sql = "INSERT INTO registeration( username , password) values ('$username ', '$password')";
                $result = mysqli_query($conn ,$sql);
                    if($result){
                        // echo "sign up successfully ";
                        $sucess = 1;
                        header('location:login.php');
                    }else{
                        die(mysqli_error($conn));
                    };
            };
        }

    
    }



?>

<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Signup page</title>
    </head>
    <body>

        <div class="container">
            
    <?php
        if($user){
            echo '<div class="alert alert-danger my-5" role="alert">
            user already exist!
            </div>';
        }
    ?>

    <?php
    if($sucess){
        echo ' <div class="alert alert-primary my-5" role="alert">
        you are successfuly signed up
        </div>';
    }
    ?>
        <h1 class="py-5 text-center">Signup Form</h1>
        <form method="post" action="sign.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username"  placeholder="username" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password">
            </div>

            <button type="submit" value="submit" class="btn btn-primary w-100">sign up</button>
        </form>

        </div>

    </body>
</html>