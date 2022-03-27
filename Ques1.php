<!DOCTYPE html>  
    <html>  
    <head>  
    <style>  
    .error {color: #f50400;}  
    </style>  
    </head>  
    <body>    
      
    <?php  
    $nameErr = $emailErr = "";  
    $name = $email = ""; 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
           
        if (empty($_POST["name"])) {  
             $nameErr = "Name is required";  
        } else {  
            $name = input_data($_POST["name"]);  
                
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                    $nameErr = "Only Alphabets are allowed";  
                }  
        }  
        if (empty($_POST["email"])) {  
                $emailErr = "Email is required";  
        } else {  
                $email = input_data($_POST["email"]);  
               
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailErr = "Invalid email format";  
                }  
         }  
    }  
    function input_data($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    }  
    ?>  
<?php
   if(isset($_FILES['image'])){

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("pdf","png");

      if (empty ($_FILES['image'])) {  
        $errors[] = "file is required";  
        }
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]=" File type not supported,<b>Only PDF or PNG file are allowed</b>";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size should not be above than 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"upload_files/".$file_name);
         echo "<b>File Successfully Uploaded!</b>";
      }else{
         print_r($errors);
      }
   }
?>
      
    <h2>Register</h2>  
    <span class = "error">* required field </span>  
    <br><br>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype = "multipart/form-data">    
        Name:   
        <input type="text" name="name">  
        <span class="error">* <?php echo $nameErr; ?> </span>  
        <br><br>  
        E-mail:   
        <input type="text" name="email">  
        <span class="error">* <?php echo $emailErr; ?> </span>  
        <br><br>   
        Attach :
        <input type = "file" name = "image"/>
        <br><br>                           
        <input type="submit" name="submit" value="Submit">   
        <br><br>
                                     
    </form>  
      
    <?php  
        if(isset($_POST['submit'])) {  
        if($nameErr == "" && $emailErr == "" ) {  
            echo "<h3 color = #FF0001> </h3>";  
            echo "<h2>Your Input:</h2>";  
            echo "Name: " .$name;  
            echo "<br>";  
            echo "Email: " .$email;  
            echo "<br>";

        } else {  
            echo "<h3> <b>Please fill the form correctly.</b> </h3>";  
        }  
        }  
    ?>  
    </body>  
    </html>  