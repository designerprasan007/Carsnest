$('.main_img').on('click', function(){
	 $("#main_img").click();
})

$('.other_img').on('click', function(){
	 $("#other_img").click();
})
				    		

// edit modal data
$('.edit_modal_btn').on('click', function(){
	// alert('clicked');
	  var table = $("table tbody");
    table.find('tr').each(function (i) {
    var $tds = $(this).find('td'),
      car_id = $tds.eq(0).text(),
      car_name = $tds.eq(1).text(),
      price = $tds.eq(2).text();
      $('#car_edit_id').val(car_id);
      $('#car_edit_name').val(car_name);
      $('#car_edit_price').val(price);
    });
})
// delete modal
$('.delete_modal_btn').on('click', function(){
  // alert('clicked');
    var table = $("table tbody");
    table.find('tr').each(function (i) {
    var $tds = $(this).find('td'),
      car_id = $tds.eq(0).text();
      car_name = $tds.eq(1).text();
      $('#car_delete_id').val(car_id);
      $('#car_delete_name').val(car_name);
    });
})
