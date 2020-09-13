<?php
session_start();
if (!$_SESSION['username']) {
	header('http://localhost/carsnest/views/login.php');
};
require_once('../controller/view_car_cont.php');
$all_car = All_Car();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add car</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
      crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/css/add_car.css">
</head>
<body>
<div class="container-fluid pt-3">
	<!-- Modal -->
<div class="modal fade" id="add_new_car" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLongTitle">Car Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    	<form method="post" action="../controller/add_car_cont.php" enctype="multipart/form-data">
	      <div class="modal-body">
    		  <div class="form-group row">
				    <label for="title_car" class="col-md-4 col-form-label">Title of the Car</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="title_car" name="title_car">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="image" class="col-md-4 col-form-label">Main Image</label>
				    <div class="col-md-8">
				    	<p class="main_img"><button type="button" class="btn btn-danger px-4">Upload</button>
				    		<input type="file" id="main_img" name="main_img" style="display: none">
				    		<span class="pl-2"><small>Max size not more then 10mb</small></span>
				    	</p>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="image" class="col-md-4 col-form-label">Add Ohter Image</label>
				    <div class="col-md-8">
				    	<p class="other_img"><button type="button" class="btn btn-danger px-4">Upload</button>
				    		<input type="file" id="other_img" name="other_img[]" multiple style="display: none">
				    		<span class="pl-2"><small>Max size not more then 8mb</small></span>
				    	</p>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="car_price" class="col-md-4 col-form-label">Price</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="car_price" name="car_price">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="pur_date" class="col-md-4 col-form-label">Year of Purchase</label>
				    <div class="col-md-8">
				      <input type="date" class="form-control" id="pur_date" name="pur_date">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="kms_driven" class="col-md-4 col-form-label">Kms Driven</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="kms_driven" name="kms_driven">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="type_fuel" class="col-md-4 col-form-label">Type of Fuel</label>
				    <div class="col-md-8">
				    	 <select id="type_fuel" class="form-control" name="fuel_type">
					        <option selected>Petrol</option>
					        <option>Diesel</option>
					        <option>Hybrid</option>
					        <option>Electric</option>
     						</select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="transmission" class="col-md-4 col-form-label">Transmission</label>
				    <div class="col-md-8">
				    	 <select id="transmission" class="form-control" name="transmission">
					        <option selected>Auto</option>
					        <option>Manual</option>
     						</select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="location" class="col-md-4 col-form-label">Location</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="location" name="location">
				    </div>
				  </div>
				   <div class="form-group row">
				    <label for="color_int" class="col-md-4 col-form-label">Color Of Interior</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="color_int" name="color_int">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="color_ext" class="col-md-4 col-form-label">Color Of Exterior</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="color_ext" name="color_ext">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="reg_state" class="col-md-4 col-form-label">Registration State</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="reg_state" name="reg_state">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="type_ins" class="col-md-4 col-form-label">Registration State</label>
				    <div class="col-md-8">
				    	<textarea type="text" class="form-control" id="type_ins" name="type_ins"></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="specification" class="col-md-4 col-form-label">Specification</label>
				    <div class="col-md-8">
				    	<textarea type="text" class="form-control" id="specification" name="specification"></textarea>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="store_new_car" class="btn btn-primary">Save</button>
	      </div>
	    </form>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new_car">
	<i class="fas fa-cart-plus"></i>
</button>
<!-- table for car data -->

<table>
	<thead>
		<tr>
			<th>Car ID</th>
			<th>Car name</th>
			<th>Car Price</th>	
			<th>Car location</th>	
			<th>Action</th>	
		</tr>
	</thead>
	<tbody>
		<?php foreach ($all_car as $key): ?>
			<tr>
				<td><?php echo $key['id'];?></td>
				<td><?php echo $key['car_name'];?></td>
				<td><?php echo $key['price'];?></td>
				<td><?php echo $key['location'];?></td>
				<td>
					<div class="row">
						<div class="col">
							<button  type="button" class="btn btn-primary edit_modal_btn" data-toggle="modal" data-target="#edit_modal">edit</button>
						</div>
						<div class="col">
							<button class="btn btn-danger delete_modal_btn" data-toggle="modal" data-target="#delete_modal">delete</button>
						</div>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>	
</table>

<!-- edit modal -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../controller/add_car_cont.php" method="POST">
	      <div class="modal-body">
	      	<input type="text" name="car_edit_id" id="car_edit_id">
	      	<input type="text" name="car_edit_name" id="car_edit_name">
	      	<input type="text" name="car_edit_price" id="car_edit_price">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="edit_car" class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!-- delete modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    	<form method="POST" action="../controller/add_car_cont.php">
	      <div class="modal-body">
					<input type="text" name="delete_car_id" id="car_delete_id">	      		
					<input type="text" name="delete_car_name" id="car_delete_name">	      		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="delete_car" class="btn btn-danger">Delete</button>
	      </div>
    	</form>
    </div>
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/add_car.js"></script>
</body>
</html>

