<?php 

	require_once("../db/connection.php");

	$Location_ID = $_POST['Location_ID'];
    $Core_No = $_POST['Core_No'];
    $Color = $_POST['Color'];

    //echo $Location_ID." ".$Core_No." ".$Color;

	//first query (that you want to select)
    $query = "select * from tb_sender where LocationID ='".$Location_ID."' and Core_No =".$Core_No." and CoreColor ='".$Color."';";
    //echo $query;
    //query execute
    $result = mysqli_query($conn, $query);
    //Add while loop for first column data display and after display next column
    while ($row = mysqli_fetch_assoc($result)) {
        //data
        $val1 = "<tr>
                <td>".$row["Date"]."</td>
                <td>".$row["Core_No"]."</td>
                <td>".$row["Distination"]."</td>
                <td>".$row["Loss"]."</td>
                <td>".$row["Status"];

        if(isset($row['CoreColor'])){
            $val1 .= "<div class='color-box' style='background-color:".$row['CoreColor']."'></div>";
        };

        $val1 .= "</td>
                <td>".$row["Remarks"]."</td>
                <td>".$row["D_Remarks"]."</td>
                <td>".$row["D_Status"];

        if(isset($row['D_CoreColor'])){
            $val1 .= "<div class='color-box' style='background-color:".$row['D_CoreColor']."'></div>";
        };  

        $val1 .= "</td>
                <td>".$row["D_Loss"]."</td>
                <td>".$row["D_Distination"]."</td>
                <td>".$row["D_Core_NO"]."</td>
                <td>".$row["D_Date"]."</td>
                </tr>";

        echo $val1;

    }
?>