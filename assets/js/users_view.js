$(document).on('click', '.search_car', function(){
	var car_name =$('.car_name').val();
	var car_type = $('.car_type').val();
	var car_year = $('.car_year').val()
	 $.ajax({    
        url:'../controller/view_car_cont.php',
        type: 'post',
        data: {
        		car_name : car_name,
        		car_year : car_year,
        		car_type : car_type,
        		search : 'search'
        },
        success: function(data) {
        	console.log(data);
        }
      });   
		})
