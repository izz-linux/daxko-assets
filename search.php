<?php
    include('flatconn.php');

    if (isset($_POST['submit'])) {
    	if (isset($_GET['assets'])) {
  	    
        $sql_searcher = 0;

        if (preg_match("/^[  a-zA-Z0-9]+/", $_POST['name'])){
  		    $name = $_POST['name'];
          $sql_searcher += 1;
        }

        if (preg_match("/^[  a-zA-Z0-9.]+/", $_POST['ip'])){
          $ipaddress = $_POST['ip'];
          $sql_searcher += 2;
        }

        if (preg_match("/^[  a-zA-Z]+/", $_POST['os'])){
          $osys = $_POST['os'];
          $sql_searcher += 4;
        }

        switch ($sql_searcher) {
          case 0:
            echo  "<h3>Please enter a search query</h3>";
            exit();
          case 1:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where name like '%" . $name . "%' order by subnet";
            break;
          case 2:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where ipaddy like '%" . $ipaddress . "%' order by subnet";
            break;
          case 3:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where name like '%" . $name . "%' order by subnet" . 
                    " and ipaddy like '%" . $ipaddress . "%'";
            break;
          case 4:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where os like '%" . $osys . "%' order by subnet";
            break;
          case 5:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where name like '%" . $name . "%'" . 
                    " and os like '%" . $osys . "%' order by subnet";
            break;
          case 6:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where ipaddy like '%" . $ipaddress . "%'" .
                    " and os like '%" . $osys . "%' order by subnet";
            break;
          case 7:
            $sql = "select name,ipaddy,os,cidr,subnet from flat where name like '%" . $name . "%'" . 
                    " and os like '%" . $osys . "%'" . " and ipaddy like '%" . $ipaddress . "%' order by subnet";
        }
        
        $result = mysqli_query($conn,$sql);
    		echo "<tr>\n";
    		echo "<table style=\"width:70%\" border=1>\n";
    		echo "<th>Computer Name</th>\n";
    		echo "<th>IP Address</th>\n";
    		echo "<th>Operating System</th>\n";
    		echo "<th>CIDR Notation</th>\n";
    		echo "<th>Subnet</th>\n";
    		echo "</tr>";
      	
        while ($row = mysqli_fetch_array($result)) {
          //$ID = $row['id'];
    	    $COMPNAME  = $row['name'];
          $IP = $row['ipaddy'];
          $OS = $row['os'];
    	    $CIDR = $row['cidr'];
    		  $SUBNET = $row['subnet'];
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
    }
      	
?>
