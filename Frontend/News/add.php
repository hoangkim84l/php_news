<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css" /> 
  <script>
function kt(){
	var id = document.fadd.id;
	var title = document.fadd.title;
	var intro = document.fadd.intro;
	var content = document.fadd.content;
	var meta_desc = document.fadd.meta_desc;
	var meta_key = document.fadd.meta_key;
	var image_link = document.fadd.image_link;
	var created = document.fadd.created;
	var feature = document.fadd.feature;
	if(id.value=="")
	{
		document.getElementById('blid').innerHTML="<font color='#F7E683'>id khong duoc rong</font>";
		id.focus();
		return false;	
	}else{
		document.getElementById('blid').innerHTML="";
		}
	if(title.value=="")
	{
		document.getElementById('bltitle').innerHTML="<font color='#F7E683'>title khong duoc rong</font>";
		title.focus();	
		return false;	
	}else{
		document.getElementById('bltitle').innerHTML="";
		}
	if(intro.value=="" )
	{
		document.getElementById('blintro').innerHTML="<font color='#F7E683'>intro khong duoc rong</font>";
		intro.focus();	
		return false;	
	}else{
		document.getElementById('blintro').innerHTML="";
		}
	if(content.value=="")
	{
		document.getElementById('blcontent').innerHTML="<font color='#F7E683'>content khong duoc rong</font>";
		content.focus();	
		return false;	
	}else{
		document.getElementById('blcontent').innerHTML="";
		}
	if(meta_desc.value=="")
	{
		document.getElementById('blmeta_desc').innerHTML="<font color='#F7E683'>meta_desc khong duoc rong</font>";
		meta_desc.focus();	
		return false;	
	}else{
		document.getElementById('blmeta_desc').innerHTML="";
		}
	if(meta_key.value=="")
	{
		document.getElementById('blmeta_key').innerHTML="<font color='#F7E683'>meta_key khong duoc rong</font>";
		meta_key.focus();	
		return false;	
	}else{
		document.getElementById('blmeta_key').innerHTML="";
		}
	if(image_link.value=="")
	{
		document.getElementById('blimage_link').innerHTML="<font color='#F7E683'>image_link khong duoc rong</font>";
		image_link.focus();	
		return false;	
	}else{
		document.getElementById('blimage_link').innerHTML="";
		}
	if(created.value=="")
	{
		document.getElementById('blcreated').innerHTML="<font color='#F7E683'>created khong duoc rong</font>";
		created.focus();	
		return false;	
	}else{
		document.getElementById('blcreated').innerHTML="";
		}
	if(feature.value=="")
	{
		document.getElementById('blfeature').innerHTML="<font color='#F7E683'>feature khong duoc rong</font>";
		feature.focus();	
		return false;	
	}else{
		document.getElementById('blfeature').innerHTML="";
		}
	}
	</script>
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
    <form action="" method="POST" enctype="multipart/form-data" name="fadd" id="fadd" onsubmit="return kt();">
      <fieldset>
        <legend>INSERT INFORMATION</legend>
        <p>
          <label for="id">ID</label>
          <input id="id" name="id" type="number" >
          <div id="blid"></div>
        </p>
        <p>
          <label for="titile">Title</label>
          <input id="title" type="text" name="title" >
          <div id="bltitle"></div>
        </p>
        <p>
          <label for="intro">Intro</label>
          <input id="ỉntro" type="text" name="intro">
          <div id="bliintro"></div>
        </p>
        <p>
          <label for="title">Content</label>
          <textarea name="content" id="title" cols="30" rows="10" ></textarea>
          <div id="blcontent"></div>
        </p>
        <p>
          <label for="meta_desc">Meta_desc</label>
          <input id="meta_desc" type="text" name="meta_desc">
          <div id="blmeta_desc"></div>
        </p>
        <p>
          <label for="meta_key">Meta_key</label>
          <input id="meta_key" type="text" name="meta_key">
          <div id="blmeta_key"></div>
        </p>
        <p>
          <label for="image_link">Image_link</label>
          <input type="file" name="image_link" id="image_link" >
          <div id="blimage_link">
        </p>
        <p>
          <label for="created">Created</label>
          <input id="created" type="date" name="created">
          <div id="blcreated"></div>
        </p>
        <p>
          <label for="feature">Feature</label>
          <input id="feature" type="text" name="feature" >
          <div id="blfeature"></div>
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