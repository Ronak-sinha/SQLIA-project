<?php
require "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SQL Injection demo">

  <title>SQL Injection Demo</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="header hidden-xs">
      <ul class="nav nav-pills pull-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Standard Login<b class="caret"></b></a>
          <ul class="nav dropdown-menu">
            <li><a href="login1.php">Vulnerable</a></li>
            <li><a href="login2.php">Secure</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Books Search<b class="caret"></b></a>
          <ul class="nav dropdown-menu">
            <li><a href="books1.php">Vulnerable</a></li>
            <li><a href="books2.php">Secure</a></li>
          </ul>
        </li>

      </ul>
      <h3 class="textnav"><a href="index.php" style="color: white;">SQL-Injection Demo</a></h3>
    </div>
    <?php include("mobile-navbar.php"); ?>

    <div class="jumbotron3s">
    <h3 class="text-center"><span class="label label-danger">
        Vulnerable Search</span></h3><br>

    <div class="row">
      <div class="col-sm-10">
        <form class="form-inline" role="form" action="books1.php" method="GET">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Book title</label>
            <input type="text" name="title" class="form-control" placeholder="Book title">
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Book author</label>
            <input type="text" name="author" class="form-control" placeholder="Book author">
          </div>
          <button type="submit" class="btn btn-success">Search</button>
        </form>
      </div>
      <div class="col-sm-2">
        <span class="visible-xs">&nbsp;</span>
        <a href="books1.php?all=1"><button type="button" class="btn btn-info">All books</button></a>
      </div>
    </div>

    <br>

    <table class="table table-bordered">
      <tr>
        <th>#ID</th>
        <th>Title</th>
        <th>Author</th>
      </tr>
      <?php
      $query = null;
      if (@$_GET['all'] == 1) {
        $query = "SELECT * FROM books;";
      } else if (@$_GET['title'] || @$_GET['author']) {
        $query = sprintf(
          "SELECT * FROM books WHERE title = '%s' OR author = '%s';",
          $_GET['title'],
          $_GET['author']
        );
      }

      if ($query != null) {
        $result = mysqli_query($connection, $query);

        while (($row = mysqli_fetch_row($result)) != null) {
          printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[1], $row[2]);
        }
      }
      ?>
    </table>

    <hr>
    <div class="row">
      <div class="col-sm-12">
        <h4>Query Executed:</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="highlight">
          <pre><?= $query ?></pre>
        </div>
      </div>
    </div>
  </div>

    <hr>
    <div class="jumbotron3">
    <div class="row">
      <div class="col-sm-12">
        <h4>Vulnerability:</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="highlight">
        <pre>
Pass <strong>' union select * from users where '1'='1</strong> as author to get all users data.
The same result is obtained by using url <a href="books1.php?author='+UNION+SELECT+*+FROM+users+WHERE '1'='1"><strong>books1.php?author='+UNION+SELECT+*+FROM+users+WHERE '1'='1</strong></a>.<br>
Pass <strong>' union select * from books where '1'='1</strong> as author to get all books data.
The same result is obtained by using url <a href="books1.php?author='+union+select+*+from+books+where '1'='1"><strong>books1.php?author='+union+select+*+from+books+where '1'='1</strong></a>.<br>
          </pre>
        </div>
      </div>
    </div>
  </div>

    <br>


    <?php include("footer.php"); ?>
  </div><!-- /container -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>