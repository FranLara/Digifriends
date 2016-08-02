<?php require_once "./calculator/calculator.php";?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Current search</title>
	</head>
	
    <body>
    	<h2>Hello (again) User: <?php echo $_GET["uid"]; ?></h2>
    	<?php if(!empty($_POST["searchNumber"])){ ?>
    		<p>The result of the Digifriends search for the number <?php echo $_POST["searchNumber"]; ?> is:</p>
    	
	    	<?php 
	    		$calculator = new Calculator();
	    		$digifriends = $calculator->getDigifriends($_POST["searchNumber"]);
	    		
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