<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<style>
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
* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text],input[type=date],input[type=time] {
width: 60%;
padding: 5px;
    margin-left: 10px;
    margin-bottom:5px;
display: inline-block;
border: none;
background: #f1f1f1;
}

input[type=text]:focus ,input[type=date]:focus,input[type=time]:focus{
    background-color: #ddd;
outline: none;
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
<body id="page5">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<div class="right">
					<nav>
						<ul id="menu">
                            <li><a href="admin.php">Admin</a></li>
                        </ul>
					</nav>
				</div>
			</div>
		</header>
	</div>
</div>

<div class="main">

	<section id="content">

		<article class="col2 pad_left1">
			<h4>Sports Table</h4>
<div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<hr>

<label for="ItemName">Choose a sport</label>
<select id="ItemName" name="ItemName">
<option value="Basketball">Basketball</option>
<option value="Volleyball">Volleyball</option>
<option value="Cricket kits">Cricket kits</option>
<option value="Football">Football</option>
</select>
<br>
<label for="Count">Count</label>
<input type="number" value="Count" name="Count" id="Count">

<hr>
<input type="submit" class="registerbtn" name="sportSubmit"  id="sportSubmit" value="Submit">
</div>

</form>
<?php
    if(isset($_POST['sportSubmit'])){
        $ItemName = $_POST['ItemName'];
        $Count = $_POST['Count'];
        $conn = mysqli_connect("localhost","root","","NIIT tracker");
        if($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }
        $sql="UPDATE Sports_Items SET Count= Count+'$Count' WHERE ItemName='$ItemName'";
        
        if(mysqli_query($conn, $sql)){
            echo "Record added successfully.";
        }
        else{
            echo "ERROR: Could not able to execute" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
</div>
<h4>Student Table</h4>
<div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<hr>

<label for="studentName">Enter student name</label>
<input type="text" placeholder="Enter name" name="studentName" id="studentName" required>
<br>

<label for="EnrollmentID">Enrollment ID</label>
<input type="text" placeholder="Enter Enrollment ID" name="EnrollmentID" id="EnrollmentID" required>
<br>

<label for="phoneNumber">Phone Number</label>
<input type="text" placeholder="Enter Phone number" name="phoneNumber" id="phoneNumber" required>
<br>

<label for="cardNumber">Card Number</label>
<input type="text" placeholder="Enter Card number" name="cardNumber" id="cardNumber" required>
<br>

<hr>
<input type="submit" class="registerbtn" name="studentSubmit"  id="studentSubmit" value="Submit">
</div>

</form>
<?php
    if(isset($_POST['studentSubmit'])){
        $studentName = $_POST['studentName'];
        $EnrollmentID = $_POST['EnrollmentID'];
        $phoneNumber = $_POST['phoneNumber'];
        $cardNumber = $_POST['cardNumber'];
        $conn = mysqli_connect("localhost","root","","NIIT tracker");
        if($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }
        $sql="INSERT INTO student(Name, Enrollment_ID, Phone, Card_NO) VALUES ('$studentName','$EnrollmentID','$phoneNumber','$cardNumber')";
        
        if(mysqli_query($conn, $sql)){
            echo "Record added successfully.";
        }
        else{
            echo "ERROR: Could not able to execute" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
</div>

<h4>Events Table</h4>
<div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div>
<hr>

<label for="type">Choose a type</label>
<select id="type" name="type">
<option value="webinars">webinars</option>
<option value="Seminar">Seminar</option>
<option value="sports">sports</option>
</select>
<br>

<label for="eventName">Event name</label>
<input type="text" placeholder="Enter Event Name" name="eventName" id="eventName" required>
<br>
<label for="Date">Date</label>
<input type="date" name="Date" id="Date" required>
<br>
<label for="Time">Time</label>
<input type="time" name="Time" id="Time" required>
<br>
<label for="Location">Location</label>
<input type="text" placeholder="Enter Location" name="Location" id="Location" required>
<br>
<label for="ExtraInfo">Extra Information</label>
<input type="text" placeholder="Enter Extra Info" name="ExtraInfo" id="ExtraInfo" required>
<br>
<hr>
<input type="submit" class="registerbtn" name="eventSubmit"  id="eventSubmit" value="Submit">
</div>

</form>
<?php
    if(isset($_POST['eventSubmit'])){
        $type = $_POST['type'];
        $eventName = $_POST['eventName'];
        $Date = $_POST['Date'];
        $Time = $_POST['Time'];
        $ExtraInfo = $_POST['ExtraInfo'];
        $Location = $_POST['Location'];
        $conn = mysqli_connect("localhost","root","","NIIT tracker");
        if($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }
        $sql="INSERT INTO Events(Type, Event_Name, Date, Time, Location, Extra_Info) VALUES ('$type','$eventName','$Date','$Time','$Location','$ExtraInfo')";
        
        if(mysqli_query($conn, $sql)){
            echo "Record added successfully.";
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

</div>
<div class="body2">
	<div class="main">
		<footer>
			&copy;2020 NIIT University
		</footer>
	</div>
</div>
</body>
</html>
