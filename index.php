<?php  
    //Connect
    $insert = false;
    $update = false;
    $delete = false;    
    $servername = "localhost";
      $username = "root";
      $password= "";
      $database= "login";
      
     $conn = mysqli_connect($servername, $username, $password, $database);
    if(!$conn){
      die("Sorry we failed to connect: ". mysqli_connect_error());
    }
   
    if(isset($_GET['delete'])){
      $sno = $_GET['delete'];
      $delete = true;
      $sql = "DELETE FROM `login` WHERE `Sr` = $sno";
      $result = mysqli_query($conn, $sql);
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(isset($_POST['snoEdit'])){
          $Sr =   $_POST["snoEdit"];      
          $name = $_POST["nameEdit"];
          $email = $_POST["emailEdit"];
          $phone = $_POST["phoneEdit"];
          $review = $_POST["reviewEdit"];

          $sql = "UPDATE `login` SET `name` = '$name',`email` = '$email', `phone` = '$phone' , `review` = '$review' WHERE `login`.`Sr` = $Sr;";
          $result = mysqli_query($conn,$sql);
          if($result){
            $update = true;
        }
        else{
            echo "We could not update the record successfully";
        }
      }
      else{
      $name = $_POST["name"];
      $email = $_POST["email"];
      $phone = $_POST["phone"];
      $review = $_POST["review"];

    $sql = "INSERT INTO `login` (`name`,`email`,`phone`,`review`) VALUES('$name','$email','$phone','$review')";
    $result = mysqli_query($conn,$sql);
      if($result){
        $insert = true;
      }
      else{
        echo "The record was not inserted".
        mysqli_error($conn);

      }
    }
  }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourism WebSite</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Demo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>

<body>

    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
        Edit modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
  <form id="registrationForm" action="/crud/index.php" method="post">
      <input type ="hidden" name = "snoEdit" id = "snoEdit">
      <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="nameEdit" name="nameEdit">
      <small id="nameError"></small>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="emailEdit" name="emailEdit">
      <small id="emailError"></small>
    </div>

    <div class="form-group">
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phoneEdit" name="phoneEdit">
      <small id="phoneError"></small>
    </div>

    <div class="form-group">
      <label for="review">Review:</label>
      <input type="text" id="reviewEdit" name="reviewEdit">
      <small id="reviewError"></small>
    </div>

    <button type="submit" id="button">Submit</button>
  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>

  <h2>Incredible !ndia</h2>

  <form id="registrationForm" action="/crud/index.php" method="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
      <small id="nameError"></small>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
      <small id="emailError"></small>
    </div>

    <div class="form-group">
      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone">
      <small id="phoneError"></small>
    </div>

    <div class="form-group">
      <label for="review">Review:</label>
      <input type="text" id="review" name="review">
      <small id="reviewError"></small>
    </div>

    <button type="submit" id="button">Submit</button>
  </form>

  <div class="phpcontainer">
    <table class="table">
      <thead>
        <tr>          
          <th scope="col">Sr</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col" style="width: 300px;">Review</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>

      <tbody>
<?php 
$sql = "SELECT Sr, name, email, review FROM `login`";
$result = mysqli_query($conn, $sql);
$sno=0;
while($row = mysqli_fetch_assoc($result)) {
    $sno = $sno+1;
    echo "<tr>
    <th scope='row'>". $sno . "</th>
            <td>" .  $row['name'] . "</td>
            <td>" .  $row['email'] . "</td>
            <td>" .  $row['review'] . "</td>
            <td>
            <button class = edit 'btn btn-sm btn-primary' id = ".$row['Sr'].">Edit</button> <button class = delete 'btn btn-sm btn-primary' id =d".$row['Sr'].">Delete</button>
            </td>
          </tr>";
}
?>

      </tbody>
    </table>
  </div>
  <script>
            edits = document.getElementsByClassName('edit');
            Array.from(edits).forEach((element)=>{
              element.addEventListener("click",(e)=>{
                  console.log("edit");
                  tr = e.target.parentNode.parentNode;
                  name= tr.getElementsByTagName("td")[0].innerText;
                  email = tr.getElementsByTagName("td")[1].innerText;
                  phone=tr.getElementsByTagName("td")[2].innerText;
                  review=tr.getElementsByTagName("td")[3].innerText;
                  console.log(name);
                  nameEdit.value = name;
                  emailEdit.value = email;
                  phoneEdit.value = phone;
                  reviewEdit.value =review;
                  snoEdit.value = e.target.id;
                  $('#editModal').modal('toggle');
              })
            })

            deletes = document.getElementsByClassName('delete');
            Array.from(deletes).forEach((element)=>{
              element.addEventListener("click",(e)=>{
                  console.log("edit");
                  sno= e.target.id.substr(1,);
              
                  if(confirm("Do you want to Delete the Entry?")){
                    console.log("yes");
                    window.location=`/crud/index.php?delete=${sno}`;
                  }
                  else{
                    console.log("no")
                  }
                })
            })
        </script>
</body>

<script type="text/javascript" src="script.js"></script>
</html>
