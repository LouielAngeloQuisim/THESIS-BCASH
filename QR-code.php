<?php
    if(isset($_POST['submit'])){
        $data = $_POST['data'];
        $hash_data = password_hash($data, PASSWORD_DEFAULT);
        if($_POST['width'] != ""){
            $width = $_POST['width'];
        }
        else{
            $width = "250";
        }
        if($_POST['height'] != ""){
            $height = $_POST['height'];
        }
        else{
            $height = "250";
        }
        $url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$hash_data}";
        $output["img"] = $url;
        echo $url;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                Login Form
            </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container py-5">
            <div class="row">
                <div class = "col-md-5 col-12 shadow bg-white border mx-auto p-4">
                    <h2 class="text-center fw bold ">QR CODE</h2>
                    <?php 
                        if(isset($output)){
                    ?>
                    <div class="mb-3">
                        <img src="<?php echo $output["img"];?>" alt="QR Code" width="50%" height="50%">
                    </div>
                    <?php }?>
                    <form action="" method ="post">
                        <div class ="form-group mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="text" class="form-control" name="data" id = "data" placeholder ="Ex: hello world" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="width" class="form-label">width</label>
                                <input type="number" class="form-control" id = "width" name="width" placeholder="Ex: 250px" > 
                            </div>
                            <div class="col-6">
                                <label for="height" class="form-label">width</label>
                                <input type="number" class="form-control" id = "height" name="height" placeholder="Ex: 250px" > 
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" name="submit" class="btn btn-primary">Generate qr code</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>