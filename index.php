<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="clapperboard.png" type="image/x-icon">
    <title>CGV.id</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background-image:url("cgv.jpg");
            padding:0px;
            }
        header{
            width:100%;
            height:120px;
            background-image:url("bg-top.png");
        }
        .tampilan{
            margin-top:50px;
            padding:50px;   
        }
    </style>

</head>
<body>
    <header class="container-fluid">
        <div class="container">
            <div class="img_logo" style="width:200px; margin:0px auto; padding-top:20px;">
                 <img src="logo.png" alt="logo" width=200px>
            </div>
        </div>
    </header>
    <div class="container">
    <br/>
   
	<div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                    
                    <br></div>
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm" action="">
                                <div class="card-body row no-gutters align-items-center">
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Cari film tontonan kamu" name="film">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-danger" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
    </div>

    <div class="container card tampilan">
        <div class="judul_tampilan">
            <h3>Hasil Pencarian</h3>
            <hr>
        </div>
        <div class="row">
            <?php
                //jika tidak kosong,tampilkan
                if(isset($_GET['film'])){
                    $film=$_GET['film'];
                    $api_film = file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=70cdeab72720dc1a144f4d142a9189c6&language=en-US&query=".$film."&include_adult=false");
                    $json = json_decode($api_film,true);     
                    
                    if(count($json['results'])==0){
                        echo "<div class='container'>
                                <div class='text-center ' style='width=100%'>
                                    <img src='not_found.png' >
                                </div>
                              </div>
                        ";
                    }

                    foreach($json['results'] as $data){
                        $img=$data['poster_path'];
                        $judul=$data['title'];
                        $id=$data['id'];
                        if($img != null ){
                            echo '
                            <a href="detail.php/?id='.$id.'" class="col-md-4 card">
                               <div class="text-center">
                                    <img src="https://image.tmdb.org/t/p/w500'.$img.'" height=400>
                                </div> 
                                <h6 style="text-align:center; padding: 20px;">'.$judul.' </h6>

                            </a>
                        ';
                        }
                        else {
                            echo '
                            <a href="detail.php/?id='.$id.'" class="col-md-4 card">
                               <div class="text-center">
                                    <img src="img_notfound.jpg.png" height=400>
                                </div> 
                                <h6 style="text-align:center; padding: 20px;">'.$judul.' </h6>

                            </a>
                        ';
                        }
                        

                        // echo 'gambar= '.$img.' wow';
                    }

                }
                else{

                }
            
            ?>
        </div>
    </div>
</body>
</html>