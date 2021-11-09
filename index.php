<?php 
  
  session_start();
  include 'includes/header.php';
  require_once("db/connection.php");

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SLT-Map</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#SigninModal">Administrator</button>
  </div>
</nav>

<?php

  if (isset($_SESSION["status"])) {
    ?>

      <br>
      <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Hey! : </strong><?php echo $_SESSION["status"]; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

    <?php

    unset($_SESSION["status"]);

  }

?>

<center>
  <!-- <iframe src="https://www.google.com/maps/d/embed?mid=18ZUMdmSLrSvO11T4ays8QK3_Z26GjHgs" width="99%" height="400"></iframe> -->
</center>

<div class="container-fluid">
  <div class="card" style="width: 100%;">
    <div class="card-body">
      <center>
        <h5 class="card-title">Details Table</h5>
      </center>
      <div class="container">
        <div class="row">
          <div class="col-sm">
              <div class="form-group">
                <label>City</label>
                <select class="form-control form-control-sm" id="CitySelect">
                  <option>Select City</option>
                  <?php

                    //first query (that you want to select)
                    $query_one = "SELECT * FROM tb_city;";
                    //query execute
                    $result = mysqli_query($conn, $query_one);
                    //Add while loop for first column data display and after display next column
                    while ($row = mysqli_fetch_array($result)) {
                      //data
                      ?>

                        <option value="<?= $row['CityId'] ?>"><?php echo $row["CityId"], " | ", $row["City"]; ?></option>

                      <?php
                    }

                  ?>

                </select>
              </div>
          </div>
          <div class="col-sm">
              <div class="form-group">
                <label>Location</label>
                <select class="form-control form-control-sm" id="LocationSelect">
                  <option>Select Location</option>
                </select>
              </div>
          </div>
          <div class="col-sm">
              <div class="form-group">
                <label>Cable Size</label>
                <!-- <div id="CableSize"></div> -->
                <input type="text" class="form-control form-control-sm" id="CableSize" placeholder="0" disabled>
              </div>
          </div>
          <div class="col-sm">
              <div class="form-group">
                <label>Core No</label>
                <input type="number" class="form-control form-control-sm" id="CoreNo" placeholder="1" max="0" min="1">
              </div>
          </div>
          <div class="col-sm">
              <div class="form-group">
                <label for="exampleFormControlInput1">Cable Size</label>
                  <table>
                      <tr>
                        <td><input type="radio" name="color" value="#3498DB" /></td>
                        <td><input type="radio" name="color" value="#E67E22" /></td>
                        <td><input type="radio" name="color" value="#2ECC71" /></td>
                        <td><input type="radio" name="color" value="#A04000" /></td>
                        <td><input type="radio" name="color" value="#85929E" /></td>
                        <td><input type="radio" name="color" value="#FDFEFE" /></td>
                        <td><input type="radio" name="color" value="#E74C3C" /></td>
                        <td><input type="radio" name="color" value="#17202A" /></td>
                      </tr>
                      <tbody>
                        <tr>
                          <td><div class="color-box" style="background-color:#3498DB;"></div></td>
                          <td><div class="color-box" style="background-color:#E67E22;"></div></td>
                          <td><div class="color-box" style="background-color:#2ECC71;"></div></td>
                          <td><div class="color-box" style="background-color:#A04000;"></div></td>
                          <td><div class="color-box" style="background-color:#85929E;"></div></td>
                          <td><div class="color-box" style="background-color:#FDFEFE;"></div></td>
                          <td><div class="color-box" style="background-color:#E74C3C;"></div></td>
                          <td><div class="color-box" style="background-color:#17202A;"></div></td>
                        </tr>
                      </tbody>
                    </table>
              </div>
          </div>
        </div>
      </div>
      <div class="container-fluid" style="overflow: scroll;">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Date</th>
              <th style="width:100px;">Core No</th>
              <th>Dist</th>
              <th>Loss</th>
              <th>Status</th>
              <th style="width:500px;">Remarks</th>
              <th>Status</th>
              <th>Loss</th>
              <th>Dist</th>
              <th style="width:100px;">Core No</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php

                //first query (that you want to select)
                $query_three = "SELECT * FROM tb_sender;";
                //query execute
                $result = mysqli_query($conn, $query_three);
                //Add while loop for first column data display and after display next column
                while ($row = mysqli_fetch_array($result)) {
                  //data
                  ?>

                    <td><?php echo $row["Date"]; ?></td>
                    <td><?php echo $row["Core_No"]; ?></td>
                    <td><?php echo $row["Distination"]; ?></td>
                    <td><?php echo $row["Loss"]; ?></td>
                    <td><?php echo $row["Status"]; ?></td>
                    <td><?php echo $row["Remarks"]; ?></td>
                    <td><?php echo $row["D_Status"]; ?></td>
                    <td><?php echo $row["D_Loss"]; ?></td>
                    <td><?php echo $row["D_Distination"]; ?></td>
                    <td><?php echo $row["D_Core_NO"]; ?></td>
                    <td><?php echo $row["D_Date"]; ?></td>

                  <?php
                }

              ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="SigninModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Administrator Sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" name="SignInForm" action="actions/signin.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="id">User ID</label>
            <input type="number" class="form-control" name="InputID" id="InputID" placeholder="Enter id">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
                  
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

</script>


<?php include 'includes/footer.php' ?>