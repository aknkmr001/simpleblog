<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID,postTitle,postCont,postDate From blog_posts Where postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exsists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>Blog - <?php echo $row['postTitle'];?></title>
	<link rel="stylesheet" href="style/normalize.css">
	<link rel="stylesheet" href="style/main.css">
</head>
<body>
	<div id="wrapper">

		<h1>Blog</h1>
		<hr />
		<p><a href="./">Blog Index</a></p>

			<?php
				echo '<div>';
					echo '<h1>'.$row['postTitle'].'</h1>';
					echo '<p>Posted on '.date('jS M Y',strtotime($row['postDate'])).'</p>';
					echo '<p>'.$row['postCont'].'</p>';
				echo '</div>';
			?>
	</div>
	
</body>

</html>
