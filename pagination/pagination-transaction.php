<?php
    //define total number of results you want per page  
    $results_per_page = 10;
    
    //find the total number of results stored in the database  
    $query = "select * from transaction";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);
    
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);
    
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }
    
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page; 
    
     //retrieve the selected results from database   
    //  $query = "SELECT *FROM alphabet LIMIT " . $page_first_result . ',' . $results_per_page;  
    //  $result = mysqli_query($conn, $query);  

    // ##########################################################

?>