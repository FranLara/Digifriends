<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Type your Number X</title>
	</head>
    <body>
    	<h2>Hello User: <?php echo $_GET['uid'] ?></h2>
    	<p>In the following form you can type the Number that you want to find its Digifriends.</p>
    	
    	<form action="current.php?uid=<?php echo $_GET['uid'] ?>" method="POST" >
  			Number: <input type="text" name="usuario" />
      		<input type="submit" value="Search" />
		</form >
    </body>
</html>