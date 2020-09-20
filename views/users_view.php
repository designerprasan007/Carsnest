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
	</body>
</html>