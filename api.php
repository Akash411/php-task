<?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $name = $_POST['name']; 
    $sub1 = $_POST['subject1']; 
    $sub2 = $_POST['subject2']; 
    $sub3 = $_POST['subject3']; 

    $average = ($sub1 + $sub2 + $sub3) / 3;
  
    if (!empty($name))  
        echo "name => ".$name."<br>"; 
    if(!empty($sub1)) 
        echo "subject 1 => ".$sub1."<br>";
    if(!empty($sub1)) 
        echo "subject 2 => ".$sub2."<br>";
    if(!empty($sub3)) 
        echo "subect 3 => ".$sub3."<br>"; 

        echo "<strong>average marks $average <br></strong>";
        // mysql data
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $dbname = "personality_traits_db";
        
        // Create connection
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $conn = new mysqli($servername, $username, $password, $dbname);
        

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else {
            echo "<h1>Mysql connected!</h1>";

            // insert record of student
            $insertQuery = "INSERT INTO student_marks (name, subject1, subject2, subject3) VALUES ('$name', $sub1, $sub2, $sub3)";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<strong>New record created successfully! </strong><br>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }   
            
            // personality traits 
            $sql = "SELECT pt.trait 
                    FROM student_marks sm
                    INNER JOIN grades g ON $average BETWEEN g.min_mark AND g.max_mark
                    INNER JOIN personality_traits pt ON g.grade BETWEEN pt.min_grade AND pt.max_grade
                    WHERE sm.name = '$name'";
                
        $result = $conn->query($sql);

        if ($result === false) {
            echo "Error executing the query: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $personalityTrait = $row['trait'];
                echo "<strong>Personality Trait: $personalityTrait</strong>";
            } else {
                echo "No personality trait found for $name";
            }
        }
        }
    }



  } 
?>


