<?php
	require_once "./search/search.php";

	$uid = $_GET["uid"];
	$number = $_POST["searchNumber"];
	$digifriend = $_POST["digifriendNumber"];
	
	if((!empty($uid))&&(!empty($number))){
		$search = new Search($uid, $number);
		
		$numSearchs = $search->countSearchs();
		
		if(!empty($digifriend)){
			if($numSearchs > 0){
				$areDigifriends = $search->isDigifriend($digifriend);
			}
		}
	}
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Checking page</title>
	</head>
    
    <body>
    <h2>Hello User: <?php echo $uid; ?></h2>
    
    <?php if((empty($number))&&(empty($digifriend))) { ?>
	    <p>
	    	With the following form you can type a Number and check if you have already 
	    	searched it and, even, check if a second number is between its Digifriends.
	    </p>
	<?php } else if (empty($digifriend)) { ?>
		<p>
	    	You have searched the number <?php echo $number?> in the last month 
	    	<?php echo $numSearchs ?> times.
	    </p>
	<?php } else { ?>
		<?php if($numSearchs == 0) { ?>
			<p>
		    	You have never searched the number <?php echo $number?> in the last month,
		    	so we can't tell you if they are digifriends.
		    </p>
		<?php } else {?>
			<?php if($areDigifriends) {?>
				<p>
			    	Yes, the numbers <?php echo $number?> and <?php echo $digifriend?> 
			    	are digifriends.
		    	</p>
			<?php } else  {?>
				<p>
		    		No, the numbers <?php echo $number?> and <?php echo $digifriend?> 
			    	are not digifriends.
		    	</p>
			<?php } ?>
		<?php } ?>
	<?php } ?>
    
    <form action="check.php?uid=<?php echo $uid; ?>" method="POST" >
  			Number to check: <input type="text" name="searchNumber" value="<?php echo $number?>"/><br/>
  			Digifriend: <input type="text" name="digifriendNumber" value="<?php echo $digifriend?>" /><br/>
  			<br/>
      		<input type="submit" value="Search" />
		</form >
    </body>
</html>