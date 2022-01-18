<?php
require "mydb.php";
$mydb = new myDb;
if(isset($_POST['submit'])){
    $img = $_FILES['image'];// image file
    $bname = $_POST['btype']; // i will use it as bname(bottle name)
    $bsize = $_POST['bsize'];
    $bvalue = $_POST['bcurrency'];
    $filename = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    print_r($img);
    //file name and extension
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    //file types allowed
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){// in bytes = 10 MB 
                //upload file to upload_img folder
                $fileNameNew = uniqid('', true). ".".$fileActualExt;
                $filedestination = 'upload_img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $filedestination);
                //connect to database and insert img data and img directory
                $result = $mydb->add_BottleType($bname, $bvalue, $bsize, $fileNameNew);
                if($result == "inserted"){
                    //success go to bottlelist
                    echo "success";
                    header("Location: bottlelist.php?success");
                }
                else{
                    //error inserting
                    echo "error inserting";
                }
            }
            else{
                //file is too large
                echo $fileSize;
                $imgsize = filesize($img);
                echo $imgsize;
                echo "error file is too large";
            }
        }
        else{
            //error in uploading file
            echo "error file uploading";
        }
    }
    else{
        //if file ext is not allowed
        echo "error file extension is not allowed";
    }
}
elseif(isset($_POST['submititem'])){
    $img = $_FILES['image'];// image file
    $item_name = $_POST['item_name']; // i will use it as bname(bottle name)
    $item_price = $_POST['item_price'];
    $item_stock = $_POST['item_stock'];
    $filename = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    print_r($img);
    //file name and extension
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    //file types allowed
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){// in bytes = 10 MB 
                //upload file to upload_img folder
                $fileNameNew = uniqid('', true). ".".$fileActualExt;
                $filedestination = 'upload_img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $filedestination);
                //connect to database and insert img data and img directory
                $result = $mydb->add_Item($item_name, $item_price, $item_stock, $fileNameNew);
                if($result == "inserted"){
                    //success go to bottlelist
                    echo "success";
                    header("Location: itemlist.php?success");
                }
                else{
                    //error inserting
                    echo "error inserting";
                }
            }
            else{
                //file is too large
                echo $fileSize;
                $imgsize = filesize($img);
                echo $imgsize;
                echo "error file is too large";
            }
        }
        else{
            //error in uploading file
            echo "error file uploading";
        }
    }
    else{
        //if file ext is not allowed
        echo "error file extension is not allowed";
    }
}
elseif(isset($_POST['itemedit'])){
    $img = $_FILES['image'];// image file
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name']; // i will use it as bname(bottle name)
    $item_price = $_POST['item_price'];
    $item_stock = $_POST['item_stock'];
    $filename = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    print_r($img);
    //file name and extension
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    //file types allowed
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){// in bytes = 10 MB 
                //upload file to upload_img folder
                $fileNameNew = uniqid('', true). ".".$fileActualExt;
                $filedestination = 'upload_img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $filedestination);
                //connect to database and insert img data and img directory
                $result = $mydb->update_Item($item_name, $item_price, $item_stock, $fileNameNew, $item_id);
                if($result == "updated"){
                    //success go to bottlelist
                    echo "success";
                    header("Location: itemlist.php?success");
                }
                else{
                    //error inserting
                    echo "error updating";
                }
            }
            else{
                //file is too large
                echo $fileSize;
                $imgsize = filesize($img);
                echo $imgsize;
                echo "error file is too large";
            }
        }
        else{
            //error in uploading file
            echo "error file uploading";
        }
    }
    else{
        //if file ext is not allowed
        echo "error file extension is not allowed";
    }
}
elseif(isset($_POST['editsubmit'])){
    $bottle_id = $_POST['bid'];
    $img = $_FILES['image'];// image file
    $bname = $_POST['btype']; // i will use it as bname(bottle name)
    $bsize = $_POST['bsize'];
    $bvalue = $_POST['bcurrency'];
    $filename = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    print_r($img);
    //file name and extension
    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    //file types allowed
    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){// in bytes = 10 MB 
                //upload file to upload_img folder
                $fileNameNew = uniqid('', true). ".".$fileActualExt;
                $filedestination = 'upload_img/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $filedestination);
                //connect to database and insert img data and img directory
                $result = $mydb->update_BottleType($bname, $bvalue, $bsize, $fileNameNew,$bottle_id);
                if($result == "updated"){
                    //success go to bottlelist
                    echo "success";
                    header("Location: bottlelist.php?success");
                }
                else{
                    //error inserting
                    echo "error Updating";
                }
            }
            else{
                //file is too large
                echo $fileSize;
                $imgsize = filesize($img);
                echo $imgsize;
                echo "error file is too large";
            }
        }
        else{
            //error in uploading file
            echo "error file uploading";
        }
    }
    else{
        //if file ext is not allowed
        echo "error file extension is not allowed";
    }
}
else{
    // if post was empty or null
    echo "error submit was not set";
}