<?php
	require('config/config.php');
	require('config/db.php');
?>

<?php include('inc/header.php'); ?>
	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    <th scope="col">Log Date and Time</th>
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                  
                <?php 
                $servername = "sql6.freesqldatabase.com";
                $username = "sql6479364";
                $password = "pTxPv14Dyr";
                $dbname = "sql6479364";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT PID,lastname,firstname,address,logdt FROM PERSON";
                $result = $conn->query($sql);
                
                if (!empty($result) && $result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo  "<tr><td>" . $row["PID"]. "</td><td>" . $row["firstname"]. "</td><td> " . $row["lastname"] . "</td><td>" . 
                          $row["address"] . "</td><td>" . $row["logdt"] . "</td></tr>";
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();
                ?>
                </tbody>
            </div>
        </table>
        <br/>
        <button type="button" class="btn btn-dark btn-sm" onclick="document.location='index.php'">Contract Tracing Form</button>
        <button type="button" style="float: right;" class="btn btn-dark btn-sm" onclick="document.location='guestbook-login.php'">Logout</button>
</div>
<?php include('inc/footer.php'); ?>