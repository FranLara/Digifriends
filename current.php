<?php 
	require_once "./calculator/calculator.php";
	require_once "./search/search.php";
	require_once 'cron.php';
	
	$uid = $_GET["uid"];
	$number = $_POST["searchNumber"];
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Current search</title>
	</head>
	
    <body>
    	<h2>Hello (again) User: <?php echo $uid; ?></h2>
    	<?php if(!empty($number)){ ?>
    		<p>The result of the Digifriends search for the number <?php echo $number; ?> is:</p>
    	
	    	<?php 
	    		$search = new Search($uid, $number);
	    		$search->saveSearch();
	    	
	    		$calculator = new Calculator();
	    		$digifriends = $calculator->getDigifriends($number);
	    		
	    		if(!empty($digifriends)){
	    			foreach ($digifriends as $digifriend){
	    				echo "#" . $digifriend . " ";
	    			}
	    		}
	    	?>
	    <?php } else { ?>
	    	<p>You didn't type any number, so we can't give you a result for its Digifriends.</p>
	    <?php }?>
    	
    </body>
</html>