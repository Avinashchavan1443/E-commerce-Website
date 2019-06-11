<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style type="text/css">
		#h2 {
			/*position: relative;
			left: 40%;*/
			display: flex;
			justify-content: center;
			font-family: helvetica;
			font-size: 35px;
			text-transform: uppercase;
			width: 100%;
		}
		#h1 {
			position: relative;
			left: 35%;
			font-family: helvetica;
			font-size: 28px;
			text-transform: uppercase;
			width: 500px;
		}
		form {
			display: block;
		    margin-left: auto;
    		margin-right: auto;
    		width: 75%;
    		font-family: helvetica;
    		/*border: 2px solid black;*/
		}
		#input {
			width: 90%;
			height: 40px;
		}
		#sub {
			height: 50px;
			width: 70px;
		}
		.rad {
			font-family: helvetica;
			font-size: 15px;
		    margin-left: auto;
    		margin-right: auto;
    		margin-bottom: 3%;
    		margin-top: 2%;
    		width: 8%;
		}
		table {
			font-family: helvetica;
			font-size: 17px;
			/*border: 2px solid black;*/
			display: block;
		    margin-left: auto;
    		margin-right: auto;
    		width: 75%;
		}
		/*tbody {
			width: 100%;
		}*/
		tr {
			height: 55px;
			width: 100%;
			border: 2px solid black;
		}
		tr:hover {
			background-color: DarkGray;
			
		}
		tr:nth-child(odd) {
			background-color: LightGray;
		}
		tr:nth-child(odd):hover {
			background-color: DarkGray;
		}
		td,th {
			margin-left: 50px;
			text-align: center;
			/*border: 2px solid black;
			height: 55px;*/
			width: 15%;
			max-width: 100%;
			padding: 10px;
		}
	</style>
	<!--<script src="angular.js"></script>-->
</head>
<body>
	<h2 id="h2">Admin Panel</h2>
	<form action="admin3.php" method="POST" name="myForm"> 
		<input type="radio" class="rad" name="type" value="SELECT" >SELECT</input>
		<input type="radio" class="rad" name="type" value="UPDATE" >UPDATE</input>
		<input type="radio" class="rad" name="type" value="INSERT" >INSERT</input>
		<input type="radio" class="rad" name="type" value="CREATE" >CREATE</input>
		<input type="radio" class="rad" name="type" value="DELETE" >DELETE</input>
		<input type="radio" class="rad" name="type" value="DROP" >DROP</input>
		<input type="text" name="query" id="input" placeholder="Type Query Here" required></input>
		<input type="submit" id="sub" value="Run"/>
	</form>
	<?php
		$host='localhost';
		$user='root';
		$pass='';
		$db='E-Commerce_try';
		
		$con=mysqli_connect($host,$user,$pass,$db);
		if($con)
			//echo "Connection Successful<br /><br /><br />";
		
		if(!empty($_POST['query']))
		{	
			$sql=$_POST['query'];
			$type=$_POST['type'];
			$result=mysqli_query($con,$sql);
		
			if(!$result)
			{
				echo "Query UnSuccessful".mysqli_error($result) ;
				exit();
			}
				
				
			echo "<br /><br /><br />";
			echo "<h1 id='h1'>Query Successful</h1>";
			
			if($type=="SELECT")
				{
					$row = mysqli_fetch_array($result);
					if(empty($row))
					{
						echo "<h1 id='h1'>No results returned</h1>";
						exit();
					}
					
					//echo $row;
					//print_r($row);
					echo "<table><tr>";
					$i=0;
					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
							echo "<th>".$key."</th>";
						$i=$i+1;
					}
					echo "</tr><tr>";
					$i=0;
					
					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
							echo "<td>".$value."</td>";
						$i=$i+1;
					}
					echo "</tr>";
					$i=0;
					
					while ($row = mysqli_fetch_array($result)) {					
						echo "<tr>";
						//print_r($row);
						$i=$i+1;
						
						foreach($row as $key=>$value) 
						{
							if($i%2!=0)
								echo "<td>".$value."</td>";
							$i=$i+1;
						}
						$i=0;
						echo "</tr>";
						
					}
				
					echo "</table><br /><br /><br />";
					mysqli_free_result($result);
			}
			
				/* free result set */
			//mysqli_free_result($result);
		}
				
		
		
    mysqli_close($con);
			
	?>
</body>
</html>




				
