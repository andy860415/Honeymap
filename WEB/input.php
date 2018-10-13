
        <?php
            
                 
            $servername = "localhost";
            $username = "LJW11688";
            $password = "";
            $dbname = "test";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }  
            
         // while(1){

            $handle = fopen("./Humidity.json","rb");
            $content = "";
            while (!feof($handle)) {
                $content .= fread($handle, 10000);
            }
            fclose($handle);


            $content = json_decode($content);
                $sql = "INSERT INTO data VALUES ('$content->Tempurature', '$content->Time','33.21', 'Sun Aug 12 21:36:16')";
                if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                } else {
                        echo "Error: ". mysqli_error($conn);
                }

              //  $count++;
               
          //      sleep(1);
            
         // }
             mysqli_close($conn);
        ?>
  