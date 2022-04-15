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
                    header("Location: bottlelist.php?success");
                }
                else{
                    //error inserting
                    //echo "error inserting";
                    header("Location: bottlelist.php?success");
                }
            }
            else{
                //file is too large
                //echo $fileSize;
                $imgsize = filesize($img);
                //echo $imgsize;
                //echo "error file is too large";
                header("Location: bottlelist.php?large");
            }
        }
        else{
            //error in uploading file
            //echo "error file uploading";
            header("Location: bottlelist.php?error");
        }
    }
    else{
        //if file ext is not allowed
        //echo "error file extension is not allowed";
        header("Location: bottlelist.php?exterror");
    }
}
elseif(isset($_POST['submititem'])){
    $img = $_FILES['image'];// image file
    $item_name = $_POST['item_name']; // i will use it as bname(bottle name)
    $item_price = $_POST['item_price'];
    $item_stock = 0; // zero muna kasi d muna lalagyan nag stock
    // $item_stock = $_POST['item_stock'];
    $filename = $_FILES['image']['name'];
    $fileType = $_FILES['image']['type'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileTmpName = $_FILES['image']['tmp_name'];
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
                    header("Location: itemlist.php?success");
                }
                else{
                    //error inserting
                    //echo "error inserting";
                    header("Location: itemlist.php?success");
                }
            }
            else{
                //file is too large
               // echo $fileSize;
                //$imgsize = filesize($img);
                //echo $imgsize;
                //echo "error file is too large";
                header("Location: itemlist.php?large");
            }
        }
        else{
            //error in uploading file
            //echo "error file uploading";
            header("Location: itemlist.php?error");
        }
    }
    else{
        //if file ext is not allowed
        //echo "error file extension is not allowed";
        header("Location: itemlist.php?extnotallowed");
    }
}
elseif(isset($_POST['itemedit'])){
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name']; // i will use it as bname(bottle name)
    $item_price = $_POST['item_price'];
    $item_stock = 0; // zero muna kasi d muna lalagyan nag stock
    //$item_stock = $_POST['item_stock'];
    //file name and extension
    //file types allowed
    $result = $mydb->update_Item($item_name, $item_price, $item_stock, $item_id);
    if($result == "updated"){
        //success go to bottlelist
        header("Location: itemlist.php?success");
    }
    else{
        //error inserting
        header("Location: itemlist.php?failed");
        //echo "error updating";
    }
}
elseif(isset($_POST['editsubmit'])){
    $bottle_id = $_POST['bid'];
    $bname = $_POST['btype']; // i will use it as bname(bottle name)
    $bsize = $_POST['bsize'];
    $bvalue = $_POST['bcurrency'];
    $result = $mydb->update_BottleType($bvalue,$bottle_id);
    if($result == "updated"){
        //success go to bottlelist
        header("Location: bottlelist.php?success");
    }
    else{
        //error inserting
        header("Location: bottlelist.php?failed");
        //echo "error Updating";
    }
    //delete
}
else{
    // if post was empty or null
    header("Location: bottlelist.php?notset");
    //echo "error submit was not set";
}