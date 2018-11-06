<?php 

    include('flatconn.php');

    if (isset($_POST['submit'])) {
      if (isset($_GET['addme'])) {
        
        if (preg_match("/^(DX)[0-9]{3}$/", strtoupper($_POST['name']))) {       
          $name = strtoupper($_POST['name']);
        }
	      else {
	        echo "Something went wrong by trying to add " . strtoupper($_POST['name']);
        }
        if (preg_match("/^[0-9.]+/", $_POST['ip'])) {
          $ipaddress = $_POST['ip'];
        }
        else {
          echo "Something went wrong by trying to add " . $name . " with IP Address = " . $_POST['ip']; 
        }
        if (preg_match("/^[a-zA-Z]+/", $_POST['os'])) {
          $osys = $_POST['os'];
        }
        else {
          echo "Something went wrong by trying to add " . $name . " during OS selection";
        }

        if (substr($ipaddress, 0, 5) == "10.22") {
          $cidr = "10.22.0.0/16";
          $subnet = "255.255.0.0";
        }

        switch (substr($ipaddress, 0, 8)) {
          case "10.139.1":
            $cidr = "10.139.10.0/23";
            $subnet = "255.255.254.0";
          break;

          case "10.139.7":
            $cidr = "10.139.7.112/29";
            $subnet = "255.255.255.248";
          break;

          case "10.139.8":
            $cidr = "10.139.8.0/24";
            $subnet = "255.255.255.0";
          break;
        }

        $sql = "insert into flat (name,ipaddy,os,cidr,subnet) 
                values ('" . $name . "','" . $ipaddress . "','" . $osys . "','" . $cidr . "','" . $subnet . "')";

        $result = mysqli_query($conn,$sql);
        if ($result) {
          echo "<h3>" . $name . " was added Successfully!";
        }
        else {
          echo "Something was wrong with updating the DB - " . $sql;
        }
      }
    }     
?>
