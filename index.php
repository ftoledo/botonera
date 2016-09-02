<!doctype html>
<html>
<head>
    <style>
    audio { visibility: hidden; }
    button {
    outline: none;
    background: #3498db;
    background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
    background-image: -moz-linear-gradient(top, #3498db, #2980b9);
    background-image: -ms-linear-gradient(top, #3498db, #2980b9);
    background-image: -o-linear-gradient(top, #3498db, #2980b9);
    background-image: linear-gradient(to bottom, #3498db, #2980b9);
    -webkit-border-radius: 7;
    -moz-border-radius: 7;
    border-radius: 7px;
    border-style: hidden;
    text-shadow: 1px 1px 1px #666666;
    font-family: Arial;
    color: #ffffff;
    font-size: 22px;
    padding: 6px 16px 10px 16px;
    text-decoration: none;
    margin-bottom: 5px;
    margin-right: 0px;
    }

    button:hover {
      background: #3cb0fd;
      text-decoration: none;
    }
    button::-moz-focus-inner,
    input[type="button"]::-moz-focus-inner,
    input[type="submit"]::-moz-focus-inner {
     border: 1px dotted transparent;
    }
    </style>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php 
    $cnt_a = 0;
    $cnt_b = 0;
    $dir  ='sonidos';
    $archivos = array();
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if (is_file($dir.DIRECTORY_SEPARATOR.$file)) {
                array_push($archivos, $file);
            }
        }
        closedir($dh);
    }
    else {
        echo "cannot open dir $dir";
    }
    sort($archivos);
    ?>
</head>

<body>
    <h1>Botonera</h1>
    <h2><a href="https://github.com/ftoledo/botonera">https://github.com/ftoledo/botonera</a></h2>
    <?php foreach ($archivos as $file):?>
    <audio id='sonido<?php echo $cnt_a?>' src="<?php echo $dir.DIRECTORY_SEPARATOR.$file?>" preload="true">Tu navegador no soporta el elemento <code>audio</code>.</audio>
    <?php $cnt_a++?>
    <?php endforeach;?>
    <?php foreach ($archivos as $file):?>
    <?php $parts = pathinfo($file)?>
    <button onclick="document.getElementById('sonido<?php echo $cnt_b?>').play();"><?php echo preg_replace("/[-_]/i"," ",$parts['filename'])?></button>
    <?php $cnt_b++?>
    <?php endforeach;?>
  
</body>
