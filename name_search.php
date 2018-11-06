<?php
    include('flatconn.php');



    if(isset($_POST['submit'])){
    	if(isset($_GET['assets'])){
  	    if(preg_match("/^[  a-zA-Z0-9.]+/", $_POST['name'])){
  		$name=$_POST['name'];
  		//connect  to the database
  		#$db=mysql_connect  ("servername", "username",  "password") or die ('I cannot connect to the database  because: ' . mysql_error());
  		//-select  the database to use
  		#$mydb=mysql_select_db("yourDatabase");
  		//-query  the database table
  		//$myData = DBcon(); 
		//$sql="SELECT ID, FirstName, LastName FROM Contacts WHERE FirstName LIKE '%" . $name .  "%' OR LastName LIKE '%" . $name ."%'";
		$sql = "select name,ipaddy,os,cidr,subnet from flat where name like '%" . $name . "%'";
  		//-run  the query against the mysql query function
  		$result=mysqli_query($conn,$sql);
  		echo "<tr>\n";
		echo "<table style=\"width:70%\" border=1>\n";
		echo "<th>Computer Name</th>\n";
		echo "<th>IP Address</th>\n";
		echo "<th>Operating System</th>\n";
		echo "<th>CIDR Notation</th>\n";
		echo "<th>Subnet</th>\n";
		echo "</tr>";
		//-create  while loop and loop through result set
  		while($row=mysqli_fetch_array($result)){
          	    $ID = $row['id'];
		    $COMPNAME  =$row['name'];
          	    $IP =$row['ipaddy'];
          	    $OS =$row['os'];
		    $CIDR = $row['cidr'];
  		    $SUBNET = $row['subnet'];
		    //-display the result of the array
  		    echo "<tr>\n";
		    echo "<td>" . $COMPNAME . "</td>\n";
		    echo "<td>" . $IP . "</td>\n";
		    echo "<td>" . $OS . "</td>\n";
		    echo "<td>" . $CIDR . "</td>\n";
		    echo "<td>" . $SUBNET . "</td>\n";
  		    echo "</tr>";
  		}
		echo "</table>\n";
  	    }
  	    else{
  	    	echo  "<p>Please enter a search query</p>";
  	    }  
    	}
    }
?>
