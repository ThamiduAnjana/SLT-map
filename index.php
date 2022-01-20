<!-- import -->
<?php 
  
  session_start();
  include 'includes/header.php';
  require_once("db/connection.php");

  //$page = 1;

  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 1;
  }

?>
<!-- import end -->

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
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
<!-- navbar end -->

<!-- alert -->
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
<!-- alert end -->

<!-- google map -->
<center>
  <iframe src="https://www.google.com/maps/d/embed?mid=18ZUMdmSLrSvO11T4ays8QK3_Z26GjHgs" width="99%" height="400"></iframe>
</center>
<!-- google map end -->

<div class="container-fluid">
  <div class="card" style="width: 100%;">
    <div class="card-body">
      <center>
        <h5 class="card-title">Details Table</h5>
      </center>
      <div class="container">
          <div class="row">
            <!-- input city -->
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
            <!-- input location -->
            <div class="col-sm">
                <div class="form-group">
                  <label>Location</label>
                  <select class="form-control form-control-sm" id="LocationSelect">
                    <option>Select Location</option>
                  </select>
                </div>
            </div>
            <!-- input cable size -->
            <div class="col-sm">
                <div class="form-group">
                  <label>Cable Size</label>
                  <!-- <div id="CableSize"></div> -->
                  <input type="text" class="form-control form-control-sm" id="CableSize" placeholder="0" disabled>
                </div>
            </div>
            <!-- input core no -->
            <div class="col-sm">
                <div class="form-group">
                  <label>Core No</label>
                  <input type="number" class="form-control form-control-sm" id="CoreNo" placeholder="1" max="0" min="1">
                </div>
            </div>
            <!-- input color -->
            <div class="col-sm">
              <div class="form-group">
                <label>Color Size</label>
                <!-- form -->
                <form>
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
                </form>
                <!-- form end -->
              </div>
            </div>
            <!-- button search -->
            <div class="col-sm">
                <div class="form-group">
                  <label>Action</label><br>
                  <button class="btn btn-primary btn-sm" id="btn_search"><i class="bi bi-search"></i> Search</button>
                  <button class="btn btn-danger btn-sm btn_hidden" id="btn_reset"><i class="bi bi-reset"></i> Reset</button>
                </div>
            </div>
          </div>
      </div>
      <!-- table -->
      <div class="container-fluid" style="overflow: scroll;">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th style="width:70px;">Core</th>
              <th>Dist</th>
              <th>Loss</th>
              <th>Status</th>
              <th style="width:400px;">Remarks</th>
              <th style="width:400px;">D.Remarks</th>
              <th>D.Status</th>
              <th>D.Loss</th>
              <th>D.Dist</th>
              <th style="width:70px;">D.Core</th>
              <th>D.Date</th>
            </tr>
          </thead>
          <!-- table body normal with pagination -->
          <tbody id="tb_search">
            <?php

                $num_per_page = 10;
                $start_from = ($page - 1)*10;
                // echo $start_from." ".$num_per_page;

                //three query (that you want to select)
                $query_three = "SELECT * FROM tb_sender limit $start_from,$num_per_page;";
                //query execute
                $resultt = mysqli_query($conn, $query_three);
                //Add while loop for column data display and after display next column
                while ($row = mysqli_fetch_assoc($resultt)) {
                  //data
                  ?>

                    <tr>
                      <td><?php echo $row["Date"]; ?></td>
                      <td><?php echo $row["Core_No"]; ?></td>
                      <td><?php echo $row["Distination"]; ?></td>
                      <td><?php echo $row["Loss"]; ?></td>
                      <td>
                        <?php echo $row["Status"]; 
                          if(isset($row['CoreColor']) And $row['CoreColor'] != "null"){
                            echo "<div class='color-box' style='background-color:".$row['CoreColor']."'></div>";
                          }
                        ?>
                      </td>
                      <td><?php echo $row["Remarks"]; ?></td>
                      <td><?php echo $row["D_Remarks"]; ?></td>
                      <td>
                        <?php echo $row["D_Status"]; 
                          if(isset($row['D_CoreColor']) And $row['D_CoreColor'] != "null"){
                            echo "<div class='color-box' style='background-color:".$row['D_CoreColor']."'></div>";
                          }
                        ?> 
                      </td>
                      <td><?php echo $row["D_Loss"]; ?></td>
                      <td><?php echo $row["D_Distination"]; ?></td>
                      <td><?php echo $row["D_Core_NO"]; ?></td>
                      <td><?php echo $row["D_Date"]; ?></td>
                    </tr>

                  <?php
                }

              ?>
          </tbody>
        </table>
      </div>
      <!-- table end -->
      <br>
      <!-- pagination -->
      <?php 

        //4 query (that you want to select)
        $query_f = "SELECT * FROM tb_sender;";
        //query execute
        $resultf = mysqli_query($conn, $query_f);
        //get number of rows
        $tot_records = mysqli_num_rows($resultf);

        $tot_page = ceil($tot_records/$num_per_page);
        // echo $tot_records." ".$tot_page;

      ?>
      <div id="page_pagination">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <?php 

              if($page>1){
                echo "<li class='page-item'>
                        <a class='page-link' href='index.php?page=".($page-1)."' aria-label='Previous'>
                          <span aria-hidden='true'>&laquo;</span>
                          <span class='sr-only'>Previous</span>
                        </a>
                      </li>";
              }


              for($i=1; $i<=$tot_page;$i++){

                echo "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>";
                
              }

              if(($i-1)>$page){
                echo "<li class='page-item'>
                        <a class='page-link' href='index.php?page=".($page + 1)."' aria-label='Next'>
                          <span aria-hidden='true'>&raquo;</span>
                          <span class='sr-only'>Next</span>
                        </a>
                      </li>";
              }

              // echo $i." ".$page;

            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
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
<!-- modal end -->

<!-- js -->
<script type="text/javascript" src="js/custom_javascript.js"></script>

<!-- footer -->
<?php include 'includes/footer.php' ?>