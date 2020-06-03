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

</style>
</head>
<body id="page3">
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
                            <li id="menu_active"><a href="index-2.php">Webinars/Seminars</a></li>
                            <li><a href="index-3.php">Sports</a></li>
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
				<h6> Enhance your knowledge!</h6>
                <p>Get detials of seminars and webinars that are scheduled at NU so that you can plan accordingly.</p>

			</div>
		</article>
		<article class="col2 pad_left1">
<br>
			<h4>Seminars</h4>
			<div class="wrapper">
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
    $sql="SELECT `Event_Name`, `Date`, `Time`, `Location`, `Extra_Info` FROM `Events` WHERE Type='Seminar'";
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
			</div>
<br>
<h4>Webinars</h4>
<div class="wrapper">
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
    $sql="SELECT `Event_Name`, `Date`, `Time`, `Location`, `Extra_Info` FROM `Events` WHERE Type='webinars';";
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
</div>
			
			
			<div class="wrapper pad_bot1">
				
			</div>
		</article>
	</section>
<!-- / content -->
</div>
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
