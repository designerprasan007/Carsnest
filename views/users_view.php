<?php
session_start();
require_once('../controller/view_car_cont.php');
$all_car = All_Car();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cars Nest</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
	      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
	      crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../assets/css/add_car.css">
	</head>
	<body>
		<form>
		  <div class="form-row">
		    <div class="col">
		      <input type="text" class="form-control car_name" placeholder="Car Name">
		    </div>
		    <div class="col">
	    	  <select id="inputState" class="form-control car_type">
		        <option value="sedan">Sedan</option>
		        <option value="suv">SUV</option>
		        <option value="tuv">TUV</option>
		      </select>
		    </div>
		     <div class="col">
		      <input type="number" class="form-control car_year" placeholder="Year">
		    </div>
		    <div class="col">
		    	<button class="btn btn-success search_car" type="button" name="search">Search</button>
		    </div>
		  </div>
		</form>
		<?php foreach ($all_car as $car): ?>
			<div class="card py-5" style="width: 18rem;">
			  <img src="../assets/img/<?php echo $car['main_img'] ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <p>
			    	Car Name: <?php echo $car['car_name']; ?>
			    </p>
			    <p>Year: <?php echo $car['purchase_date']; ?></p>
			    <p>price: <?php echo $car['price']; ?></p>
			    <p>kms_driven: <?php echo $car['kms_driven']; ?></p>
			    <p>fuel_type: <?php echo $car['fuel_type']; ?></p>
			    <p>transmission: <?php echo $car['transmission']; ?></p>
			    <div class="text-center">
			    	<a href="car_view.php?car_id=<?php echo $car['id']; ?>">
			    		<button class="btn btn-success btn-sm">View</button>
			    	</a>
			  	</div>
			  </div>
			</div>	
		<?php endforeach; ?>

		<!-- scripts -->
		<!-- bootstrap -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- jquery script -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- own script -->
		<script type="text/javascript" src="../assets/js/users_view.js"></script>
	</body>
</html>