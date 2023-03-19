<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h2 class="text-center my-5">
            Lists of clients
        </h2>
        <a href="create.php" class="btn btn-primary mb-4" role="button">New Client</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
    <?php

            
            include "connect.php";
            $sql = "SELECT * FROM clients";
            $result = $conn->query($sql);
            if(!$result){
                die("invalid query".$conn->error);
            }

            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['address']."</td>
                    <td>
                    
                    <td>
                    
                    <a class='btn  btn-primary btn-sm' href='edit.php?id=" . $row['id'] . "'>edit</a>
                    <a class='btn btn-danger btn-sm' href='delete.php?id=" . $row['id'] . "'>delete</a>
                    </td>
                    
        
                    </tr>
                    ";
            }
            
    ?>
            </tbody>

        </table>
    </div>

    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>