<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 >User Registration Form</h2>
  <hr>
  <p style="font-weight: lighter;color: gray;">please fill this form and submit to add a user record to the database</p>
  <form method="post" action="process.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label><br>
      <div class="radio">
        <label><input type="radio" name="gender" value="female">Female</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="gender" value="male">Male</label>
      </div>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="agree"> Recieved Emails From Us</label>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>

</body>
</html>