<?php

// uploading the image file (start)

if (isset($_POST['submit'])) {

    // getting the image info
    $file = $_FILES["file"];
    $fileName = $file["name"];
    $filetmp = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];

    $fileExtension = explode('.', $fileName[0]); // seperating the file name and the extension

    $fileActualExtension = strtolower(end($fileExtension)); // converting the uppercase file extensions to lowercase
    // JPEG => jpeg

    $allowed = array('jpg', 'jpeg', 'png'); // assigning the allowed file types

    // checking the file type
    if (in_array($fileActualExtension, $allowed)) {
        // checking for errors

        if ($fileError[0] === 0) {
            // checking the file size

            if ($fileSize[0] < 5000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExtension;  // providing a unique id
                $fileDestination = 'uploads/' . $fileNameNew; // assigning the new file destination
                move_uploaded_file($filetmp[0], $fileDestination); // moving the file to the new destination

                $sqlImg = "insert into images (imageName) values ('$fileNameNew');";
                $resultImage = mysqli_query($conn, $sqlImg);
            } else {
                //error file size
                echo "<script>alert('Invalid File Size!');</script>";
            }
        } else {
            //error uploading the file
            echo "<script>alert('Error '.$fileError[0]);</script>";
        }
    } else {
        //wrong file type
        echo "<script>alert('Invalid File type!');</script>";
    }
} else {
    header("Location: imageUploader.html?failed");
}

    // uploading the image file (end)