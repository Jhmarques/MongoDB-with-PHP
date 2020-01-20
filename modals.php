
<!-- LOGIN Modal -->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">


    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login with username and password</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

                      <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" name="admin" value = "yes"> Login as admin 
                        </label>
                      </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" name ="login" value="Submit">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>


<?php
    $status = (isset($_POST["admin"])) ? "admin" : "notadmin";
    if(isset($_POST["login"])) {
        $username = $userClass->checkInput($_POST["username"]);
        $password = $userClass->checkInput($_POST["password"]);
    
        if(empty($username) || empty($password)) {
            echo "<script>
                $(document).ready(function() {
                    $('#loginError').modal('show');
                });
            </script>";
        }
        else {
            switch($status) {
                case "admin":
                    $userClass->checkAdmin($username, $password);
                    break;
                case "notadmin":
                    $userClass->login($username, $password);
                    break;
                default:
                    "";
                    break;
            }
        }
    }
?>


<!-- REGISTER Modal -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Your Account</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">

                      <div class="form-group">
                        <label for="email">Choose Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Choose Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                      </div>
                      <div class="form-group">
                        <label for="pwd">Enter E-mail:</label>
                        <input type="text" class="form-control" id="pwd" name = "email">
                      </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" name = "register" value="Submit">Submit</button>
        </form>
      </div>
    </div>

  </div>
</div>


<!-- PHP Register Modal -->
<?php
    if(isset($_POST["register"])) {
        $username = $userClass->checkInput($_POST["username"]);
        $password = $userClass->checkInput($_POST["password"]);
        $email = $userClass->checkInput($_POST["email"]);
    }

    if(empty($username) || empty($password) || empty($email)) {
        $error = true;
    }
    else {
        $userClass->register($username, $password, $email);
        unset($error);
    }

    if(isset($error) && isset($_POST["register"])) {
        echo "<script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>";
    }
?>



<!--error modal-->
<div id="errorModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Your Account</h4>
      </div>
      <div class="modal-body">
        <p> All fields are required !!! <p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok, i got the ideea </button>
      </div>
    </div>

  </div>
</div>


<!--error modal for Login-->
<div id="loginError" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content login-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login Error</h4>
      </div>
      <div class="modal-body">
        <p> All fields are required !!! <p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok, i got the ideea </button>
      </div>
    </div>

  </div>
</div>



<!-- ADMIN Modal -->
<div id="adminModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content ADMIN-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Admin Modal</h4>
      </div>
      <div class="modal-body">
        <form action="admin/books_admin.php" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="title">INSERT NEW BOOK TITLE:</label>
                        <input type="text" class="form-control" name="book">
                      </div>
                      <div class="form-group">
                        <label for="category">BOOK CATEGORY:</label>
                        <input type="text" class="form-control" name="category">
                      </div>
                      <div class="form-group">
                        <label for="author">BOOK AUTHOR:</label>
                        <input type="text" class="form-control" name="author">
                      </div>
                      <div class="form-group">
                        <label for="amount">BOOK PRICE: </label>
                        <input type="text" class="form-control" name = "price">
                      </div>
                      <div class="form-group">
                        <label for="amount">BOOK DESCRIPTION: </label>
                        <input type="text" class="form-control" name = "description">
                      </div>
                      <div class="form-group">
                        <label for="amount">BOOK IMG: </label>
                        <input type="file" class="form-control" name = "cover_img">
                      </div>
                  
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
          <button type="submit" class="btn btn-default" name = "insert_book" value="Submit">INSERT</button>
        </form>
      </div>
    </div>

  </div>
</div>



<!-- ORDERS Modal -->
<div id="ordersModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content ADMIN-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Orders Modal</h4>
      </div>
      <div class="modal-body">
        <form action="index.php" method="post" enctype="multipart/form-data">

                      <div class="form-group"  style="overflow: scroll; height: 300px;">
                        <label for="title">All the books:</label><br>
                      </div>
                  
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="empty_cart" value="Submit" >Empty Cart</button>
          <button type="submit" class="btn btn-default" name = "newOrder" value="Submit">Confirm Order</button>
        </form>
      </div>
    </div>

  </div>
</div>
  

 <!--Confirmation Modal-->

<div id="confirmationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmation Order Modal</h4>
      </div>
      <div class="modal-body">
        <form action="ajax/refresh_index.php" method="post">

                      <div class="form-group">
                        <label for="userData">Thank you!</label><br>
                      </div>

                      <div class="form-group">
                        <label for="address">Shipping Address</label><br>
                      </div>
                      <div class="form-group">
                        <label for="total">Total Price</label><br>
                      </div>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-default" name ="ok" value="Submit">OK</button>
        </form>
      </div>
    </div>
  </div>
</div>

