<?php 
 
include "db_conn.php";



if (isset($_POST['uname'])) {

    $uname = $_POST['uname'];

          
    $sql = "SELECT * FROM users WHERE user_name='$uname'";

    $result = mysqli_query($conn, $sql);

  

   if (mysqli_num_rows($result) == 1) {

         $row = mysqli_fetch_assoc($result);

         echo json_encode($row);

       

     }
    else {

       $response = ['data'=>'No data match in our records'];
        
         echo json_encode($response);

     }


}

else {
    
    $sql = "SELECT * FROM users";

    $result = mysqli_query($conn, $sql);

    //Add all records to an array
    $rows = array();
    
    while($row = $result->fetch_array()){
        $rows[] = $row;
    }
   
    //Return result to jTable
    $qryResult = array();
   // $qryResult['logs'] = $rows;
   //  echo json_encode($qryResult);

   $data = [ 'name' => 'God', 
             'age' => -1 , 
             'data'=>$rows ];

 echo json_encode($data);

}



?>