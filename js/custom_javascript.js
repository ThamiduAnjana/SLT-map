$(document).on('change', '#CitySelect', function(){
    var CityID = document.getElementById('CitySelect').value;
    // alert(CityID);
    $.ajax({
      url:'actions/cityselect.php',
      method:'POST',
      data:{City_ID:CityID},
      success:function(data){
        $('#LocationSelect').html(data);
      }
    });
  });

  $(document).on('change', '#LocationSelect', function(){
    var LocationID = document.getElementById('LocationSelect').value;
    // alert(CityID);
    $.ajax({
      url:'actions/locationselect.php',
      method:'POST',
      data:{Location_ID:LocationID},
      success:function(data){
        $('#CableSize').val(data);
        $("#CoreNo").attr({
           "max" : data,
           "min" : 1
        });
      }
    });
  });

  $(document).on('keydown', '#CoreNo', function(){
    var max = document.getElementById('CoreNo').max;
    var input = document.getElementById('CoreNo').value;
    var id = document.getElementById('CoreNo');
    if(input > max){
      id.classList.add("inputborder-w");
      id.classList.remove("inputborder-n");
    }else{
      id.classList.add("inputborder-n");
      id.classList.remove("inputborder-w");
    }
    
  });