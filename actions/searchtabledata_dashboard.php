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
        $ID = $row['ID'];
        $S_Date = $row["Date"];
        $S_Core_No = $row["Core_No"];
        $S_Distination = $row["Distination"];
        $S_Loss = $row["Loss"];
        $S_Status = $row["Status"];
        $S_CoreColor = $row['CoreColor'];
        $S_Remarks = $row["Remarks"];
        $D_Remarks = $row["D_Remarks"];
        $D_Status = $row["D_Status"];
        $D_CoreColor = $row['D_CoreColor'];
        $D_Loss = $row["D_Loss"];
        $D_Distination = $row["D_Distination"];
        $D_Core_NO = $row["D_Core_NO"];
        $D_Date = $row["D_Date"];

        $val1 = "<tr>
                <td>".$S_Date."</td>
                <td>".$S_Core_No."</td>
                <td>".$S_Distination."</td>
                <td>".$S_Loss."</td>
                <td>".$S_Status;

        if(isset($S_CoreColor)){
            $val1 .= "<div class='color-box' style='background-color:".$S_CoreColor."'></div>";
        };

        $val1 .= "</td>
                <td>".$S_Remarks."</td>
                <td>".$D_Remarks."</td>
                <td>".$D_Status;

        if(isset($D_CoreColor)){
            $val1 .= "<div class='color-box' style='background-color:".$D_CoreColor."'></div>";
        };  

        $val1 .= "</td>
                <td>".$D_Loss."</td>
                <td>".$D_Distination."</td>
                <td>".$D_Core_NO."</td>
                <td>".$D_Date."</td>";

        //Get Location ID
        $Get_LocationId = $Location_ID;// Location ID *

        //Find Location name
        $query_location = "select * from tb_locations where LocationID = ".$Get_LocationId.";";
        //query execute
        $L_result = mysqli_query($conn, $query_location);
        //get Data
        $L_row = mysqli_fetch_array($L_result);
        //data
        //Get City ID
        $GetCity_ID = $L_row['CityID'];// City ID *
        $GetLocation_Name = $GetCity_ID." ".$L_row['Location'];// Location Name *

        //Find Location name
        $query_city = "select * from tb_city where CityId = ".$GetCity_ID.";";
        //query execute
        $C_result = mysqli_query($conn, $query_city);
        //get Data
        $C_row = mysqli_fetch_array($C_result);
        //data
        $GetCity_Name = $GetCity_ID." ".$C_row['City'];// City Name *


        $val1 .= "<td>
                <button type='button' class='btn btn-danger' onclick='DeleteDetails(".$ID.");'><i class='bi bi-trash-fill'></i></button>
                &nbsp;
                <button type='button' class='btn btn-success' id='btn_Update' 
                    onclick='
                        UpdateDetails(
                            ".$ID.",
                            ".$GetCity_Name.",
                            ".$GetLocation_Name.",
                            ".$S_Date.",
                            ".$S_Core_No.",
                            ".$S_Distination.",
                            ".$S_Loss.",
                            ".$S_Status.",
                            ".$S_CoreColor.",
                            ".$S_Remarks.",
                            ".$D_Remarks.",
                            ".$D_Status.",
                            ".$D_CoreColor.",
                            ".$D_Loss.",
                            ".$D_Distination.",
                            ".$D_Core_NO.",
                            ".$D_Date."
                        );'>
                    <i class='bi bi-arrow-counterclockwise'></i>
                </button>
                </td>
                </tr>";

        echo $val1;

    }
?>