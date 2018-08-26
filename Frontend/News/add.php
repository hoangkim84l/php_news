<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" /> 
  <script src="main.js"></script>
</head>

<body>
  <?php
    include("../../Include/connection.php");
    if(isset($_POST['btnadd']))
{
	$id=$_POST['id'];
	$title=$_POST['title'];
	$intro=$_POST['intro'];
	$content=$_POST['content'];
	$meta_desc=$_POST['meta_desc'];
	$meta_key=$_POST['meta_key'];
	$created=$_POST['created'];
	$feature=$_POST['feature'];
	$taptin =$_FILES['image_link'];
	$image_link=$taptin['name'];
  $taptin=$_FILES['image_link'];
  if($taptin['type']=="image/jpg" || $taptin['type']=="image/jpeg" || $taptin['type']=="image/png" ||$taptin['type']=="image/gif")
    {
        if($taptin['size']<=614400)
        {
        copy($taptin['tmp_name'],"Image/".$taptin['name']);
          $image_link=$taptin['name'];
          $sq="select * from news where id='$id'";
          $result=mysqli_query($conn,$sq);
          if(mysqli_num_rows($conn,$result)>0)
              {
                echo "<script>alert('id is existed ')</script>";
                echo '<meta http-equiv="refresh" content="0;URL=add.php"/>';
              }
            else
              {
                $sql="insert into news values('$id','$title','$intro','$content','$meta_desc','$meta_key','$image_link','$created','$feature','$count_view')";
                mysqli_query($conn,$sql);
                echo "<script>alert('Add is successful!')</script>";
                echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
              }
          }
          else
              {
                echo "hinh co kich thuoc qua lon";
              }
      }
  

}
    ?>
    <form class="forminsert" id="formInsert" method="POST" action="" enctype="multipart/form-data">
      <fieldset>
        <legend>INSERT INFORMATION</legend>
        <p>
          <label for="id">ID</label>
          <input id="id" name="id" type="number" required>
        </p>
        <p>
          <label for="titile">Title</label>
          <input id="title" type="text" name="title" required>
        </p>
        <p>
          <label for="intro">Intro</label>
          <input id="ỉntro" type="text" name="intro" required>
        </p>
        <p>
          <label for="title">Content</label>
          <textarea name="content" id="title" cols="30" rows="10" required></textarea>
        </p>
        <p>
          <label for="meta_desc">Meta_desc</label>
          <input id="meta_desc" type="text" name="meta_desc">
        </p>
        <p>
          <label for="meta_key">Meta_key</label>
          <input id="meta_key" type="text" name="meta_key">
        </p>
        <p>
          <label for="image_link">Image_link</label>
          <input type="file" name="image_link" id="image_link" required>
        </p>
        <p>
          <label for="created">Created</label>
          <input id="created" type="date" name="created" required>
        </p>
        <p>
          <label for="feature">Feature</label>
          <input id="feature" type="text" name="feature" required>
        </p>
        <p>
          <input class="submit" type="submit" value="ADD" name="btnadd" id="btnadd">
        </p>
      </fieldset>
    </form>
    <script>
      $("#formInsert").validate();
    </script>
</body>

</html>