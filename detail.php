<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CGV.id</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="shortcut icon" href="../clapperboard.png" type="image/x-icon">

    <style>
        body{
            background-image:url("../cgv.jpg");
            padding:0px;
            }
        header{
            width:100%;
            height:120px;
            background-image:url("../bg-top.png");
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
                 <img src="../logo.png" alt="logo" width=200px>
            </div>
        </div>
    </header>
    <div class="container">
    <br/>

    <div class="container card tampilan">
        <?php
                //jika tidak kosong,tampilkan
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $api_film = file_get_contents("https://api.themoviedb.org/3/movie/".$id."?api_key=70cdeab72720dc1a144f4d142a9189c6&language=en-US");
                    $json = json_decode($api_film,true);
                    $img = "https://image.tmdb.org/t/p/w500".$json['poster_path'];
                    if($json['poster_path'] == null){
                        $img = "../img_notfound.jpg.png";
                    }
                    $negara = $json['production_countries'];
                    if($negara == null ){
                        $negara = "-";
                    }
                    else {
                        $negara = $json['production_countries'][0]['name'];
                    }
                    $rilis = $json['release_date'];
                    $rilis = date_create($rilis);

                    $rating = $json['vote_average'];

                    $genre = $json['genres'];
                    if($genre == null ){
                        $genre = "-";
                    }
                    else {
                        $genre = $json['genres'][0]['name'];
                    }
                    $overview = $json['overview'];

                    
                    echo '
                        <div class="judul_tampilan">
                            <h3>'.$json['title'].'</h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-4">    
                                <div class="card">
                                    <img src="'.$img.'" height=400>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        Rilis Date
                                    </div>
                                    <div class="col-md-9">
                                        : '.date_format($rilis,"d F Y").'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Genre
                                    </div>
                                    <div class="col-md-9">
                                        : '.$genre.'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Negara
                                    </div>
                                    <div class="col-md-9">
                                        : '.$negara.'
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        Rating
                                    </div>
                                    <div class="col-md-9">
                                        : '.$rating.'
                                    </div>
                                </div><br><br><br>
                                <div class="row">
                                    <div class="col-md-3" style="font-weight:bold;font-size:24px;">
                                        Overview
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        '.$overview.'
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                    
                    

                }
                else{

                }
            
            ?>
        <div class="row">
            
        </div>
    </div>
    <?php
        echo $_GET['id'];
    ?>
</body>
</html>