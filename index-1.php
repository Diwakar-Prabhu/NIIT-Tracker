<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<style>

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
width: 100%;
padding: 15px;
margin: 5px 0 22px 0;
display: inline-block;
border: none;
background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
background-color: #ddd;
outline: none;
}

/* Overwrite default styles of hr */
hr {
border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
background-color: #4CAF50;
color: white;
padding: 16px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
opacity: 0.9;
}

.registerbtn:hover {
opacity: 1;
}

/* Add a blue text color to links */
a {
color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
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
<body id="page2">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<div class="right">
					<nav>
						<ul id="menu">
                            <li><a href="index.php">Home</a></li>
                            <li id="menu_active"><a href="index-1.php">Laundry</a></li>
                            <li><a href="index-2.php">Webinars/Seminars</a></li>
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
Clothes were mismatched after laundry?
<br>
Use this section to submit your details and you can see details of those who have mismatched clothes as well.
<?php
    if(isset($_POST['submit'])){
        echo "
        <table>
        <h5>Details of ppl who have mismatched clothes</h5>
        <tr>
        <th>Name</th>
        <th>Number</th>
        </tr>";
        $conn = mysqli_connect("localhost","root","","NIIT tracker");
        if($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }
        $sql="SELECT DISTINCT student.Name, student.Phone FROM student INNER JOIN Laundry ON student.Card_NO=Laundry.Card_No";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result -> fetch_assoc()){
                echo "<tr><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Name"] . "</td><td style='border: 1px solid #ddd;padding: 3px;'>" . $row["Phone"] . "</td></tr>";
            }}
        $conn->close();
    }
?>
</table>
</div>
		</article>
		<article class="col2 pad_left1">
			<h6>Please fill in this form to find your lost clothes.</h6>
			<div class="wrapper">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="container">
<hr>

<label for="items"><b>No of items</b></label>
<input type="text" placeholder="no of items" name="items" id="items" required>

<label for="cardNumber"><b>Card number</b></label>
<input type="text" placeholder="Enter card number" name="cardNumber" id="cardNumber" required>

<hr>
<input type="submit" class="registerbtn" name="submit" value="Mismatch">
</div>

</form>
<?php
    if(isset($_POST['submit'])){
        $items = $_POST['items'];
        $cardNumber = $_POST['cardNumber'];
        
        $conn = mysqli_connect("localhost","root","","NIIT tracker");
        if($conn->connect_error){
            die("Connection failed:" .$conn->connect_error);
        }
        $sql="INSERT INTO Laundry (No_of_Clothes, Card_No) VALUES ($items,$cardNumber)";
        
        if(mysqli_query($conn, $sql)){
            //echo "Data added successfully.";
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
<div class="body2">
	<div class="main">
<!--footer -->
		<footer>
            &copy;2020 NIIT University
		</footer>
<!-- / footer -->
	</div>
</div>
</body>
</html>
