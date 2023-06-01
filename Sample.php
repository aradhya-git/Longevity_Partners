<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> BookIt Review Page </title>
	<style>
	body {
  background: #2980b9;
  color: #FFF;
  font-family: Helvetica;
  text-align: center;
  margin: 0;
}
	</style>
</head>
<body>
	<center>
    <h1>BookIt Review</h1>
    
    <?php
    if (!isset($_POST['submit'])){
    ?>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "post">
    	<label for="fname">First Name:</label><br>
        <input type="text" name="fname"><br>
        <label for="lname">Last Name:</label><br>
        <input type="text" name="lname"><br/>
        <label for="email">Email-Address:</label><br>
        <input type="text" name="email"><br/>
        <label for="twitterh">Twitter-Handle:</label><br>
        <input type="text" name="twitterh"><br/>
        
        <label for="books">Choose a Book:</label><br>
        <select name="books" id="books">
          <option value="Book1">Book1</option>
          <option value="Book2">Book2</option>
          <option value="Book3">Book3</option>
          <option value="Book4">Book4</option>
          <option value="Bookn">Bookn</option>
        </select>
        </br>
        <label for="Score">Give Score:</label><br>
        <select name="score" id="score">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <br>
        <label for="Score">Comment:</label><br><input type="text" name="Comment"><br>
        <br>
        <input type="submit" value="submit" >
    </form>
    
    <?php
    } else{
    try {
    	$db = new PDO(sqlite: BookIt);
    	$sql = "INSERT INTO Commentator(First_Name, Last_Name, Email_Address, Twitter_Handle) VALUES(:fname, :lanme, :email, :twitterh)";
    	
    	$stmt = $db->prepare($sql);
    	
    	$fname = filter_input(INPUT_POST, 'fname');
    	$stmt -> bindValue(':fname', $fname, PDO::PARAM_STR);
    	
    	$lname = filter_input(INPUT_POST, 'lname');
    	$stmt -> bindValue(':lname', $lname, PDO::PARAM_STR);
    	
    	$email = filter_input(INPUT_POST, 'email');
    	$stmt -> bindValue(':email', $email, PDO::PARAM_STR);
    	
    	$twitterh = filter_input(INPUT_POST, 'twitterh');
    	$stmt -> bindValue(':twitterh', $twitterh, PDO::PARAM_STR);
    	
    	$success = $stmt->execute();
    	
    	if(success){
    		echo "Your Comment Has been Submitted";
    	}else{
    		echo "Sorry something went wrong";
    	}
   
   $db = null;
   } catch (PDOException $e) {
   print "We had an error: " . $e -> getMessage() . "<br/>";
   die();
   }
}
?>   
    </center>
   
</body>
</html>