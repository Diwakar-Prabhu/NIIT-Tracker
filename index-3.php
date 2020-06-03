<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<style>
table{
border: 1px solid #ddd;
}
th{
    padding-top: 7px;
    padding-bottom: 7px;
    text-align: center;
    background-color: #2eb82e;
color: white;
border: 1px solid #ddd;
}
.registerbtn {
background-color: #4CAF50;
color: white;
padding: 10px 12px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 30%;
opacity: 0.9;
}

.registerbtn:hover {
opacity: 1;
}
select {
appearance: none;
outline: 0; 
width: 40%;
height: 100%;
color: black;
cursor: pointer;
border:1px solid black;
border-radius:3px;
}
</style>
</head>
<body id="page4">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<div class="right">
					<nav>
						<ul id="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="index-1.php">Laundry</a></li>
                            <li><a href="index-2.php">Webinars/Seminars</a></li>
                            <li id="menu_active"><a href="index-3.php">Sports</a></li>
                            </ul>
					</nav>
				</div>
			</div>
		</header>
	</div>
</div>
<div class="main">
	<div id="banner">
		<div class="text1">
			NIIT<span>Tracker</span><p>This website is your go to solution to track all the events at the university!</p>
		</div>
	</div>
</div>
<div class="main">
<!-- content -->
	<section id="content">
		<article class="col1">
			<div class="pad_1">
<br>
				<h7>This section allows you to check the availability of sports equipment in sports room so that you don't have to go there everytime just for checking.</h7>
<hr>
<p>You can also check the details of sport events happening at our NU!</p>
			    <table style="width:100%">

                    <?php
                        if(isset($_POST['submit'])){
                            echo "<meta http-equiv='refresh' content='0'>";
                        }
                            echo "<tr>
                            <th>Sport</th>
                            <th>Count</th>
                            </tr>";
                            $conn = mysqli_connect("localhost","root","","NIIT tracker");
                            if($conn->connect_error){
                                die("Connection failed:" .$conn->connect_error);
                            }
                            $sql="SELECT ItemName, Count FROM Sports_Items WHERE COUNT>0";
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                while($row = $result -> fetch_assoc()){
                                    echo "<tr><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["ItemName"] . "</td><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Count"] . "</td></tr>";
                                }}
                            $conn->close();
                        
                       ?>
                </table>
				
			</div>
		</article>
		<article class="col2 pad_left1">
<br>
<h4>Sport Events</h4><br>
<table style="width:100%">
<tr>
<th>Topic</th>
<th>Date</th>
<th>Time</th>
<th>Location</th>
<th>Extra info</th>
</tr>
<?php
    $conn = mysqli_connect("localhost","root","","NIIT tracker");
    if($conn->connect_error){
        die("Connection failed:" .$conn->connect_error);
    }
    $sql="SELECT `Event_Name`, `Date`, `Time`, `Location`, `Extra_Info` FROM `Events` WHERE Type='sports'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row = $result -> fetch_assoc()){
            echo "<tr><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Event_Name"] . "</td><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Date"] . "</td><td style='border: 1px solid #ddd;padding: 3px;'>"  . $row["Time"] . "</td><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Location"] . "</td><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Extra_Info"] . "</td></tr>";
        }}
    else{
        echo "No rows fetched";
    }
    $conn->close();
    ?>
</table>
<br>
<h6>Please submit the sport equipment you are taking:</h6>
You only get the sport items that are available in sports room below
			<div class="wrapper">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="container">
                        <hr>
                        
<label for="ItemName">Choose a sport:</label>
                        <select id="ItemName" name="ItemName">
                            <option value="Basketball">Basketball</option>
                            <option value="Volleyball">Volleyball</option>
                            <option value="Cricket kits">Cricket kits</option>
                            <option value="Football">Football</option>
                        </select>
                            
                            <hr>
                                <input type="submit" class="registerbtn" name="submit" value="Submit">
                    </div>
                    
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $ItemName = $_POST['ItemName'];
                        $conn = mysqli_connect("localhost","root","","NIIT tracker");
                        if($conn->connect_error){
                            die("Connection failed:" .$conn->connect_error);
                        }
                        $sql="UPDATE Sports_Items SET Count= Count-1 WHERE ItemName = '$ItemName'";
                        
                        if(mysqli_query($conn, $sql)){
                            echo "Data updated successfully.";
                        }
                        else{
                            echo "ERROR: Could not able to execute" . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                    }
                ?>
			</div>
		</article>
	</section>
<!-- / content -->
</div>
<br/><br/><br/><br/><br/>
<div class="body2">
	<div class="main">
<!-- footer -->
		<footer>
			            &copy;2020 NIIT University
		</footer>
<!-- / footer -->
	</div>
</div>
</body>
</html>
