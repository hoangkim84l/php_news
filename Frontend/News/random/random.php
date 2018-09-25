<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<?php
if(isset($_POST['submit']))
echo(rand(1000, 1000000) . "<br>");
?>
<form action="" method="post" >
<input class="submit btn btn-danger" type="submit" value="submit" name="submit" id="submit">
</form>
</body>
</html>