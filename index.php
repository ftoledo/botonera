<!doctype html>
<html>
<head>
    <style>
    body { width: 90%; }
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
    font-size: 18px;
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
    p.titulo {
      margin: 0px;
    }
    /* Cloud */ 
    hr.style-two { border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0)); }

    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

 <?php 

	function dirToArray($dir) {

	   $result = array();

	   $cdir = scandir($dir);
	   foreach ($cdir as $key => $value)
	   {
		  if (!in_array($value,array(".","..")))
		  {
			 if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
			 {
				$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
			 }
			 else
			 {
				$result[] = $value;
			 }
		  }
	   }

	   return $result;
	} 
	$cnt_a = 0;
	$cnt_b = 0;
	$sounds_dir  ='sonidos';
	$archivos = dirToArray($sounds_dir);
?>
</head>

<body>
<?php
?>
    <h1>Botonera</h1>
    <?php foreach ($archivos as $dir => $files):?>
    <?php natcasesort($files)?>
		<p class="titulo"><?php echo preg_replace("/[-_]/i"," ",$dir) ?></p>
		<hr class="style-two"/> 

		<?php foreach ($files as $file): ?>
			<audio id='sonido<?php echo $cnt_a?>' src="<?php echo $sounds_dir.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$file?>" preload="true">Tu navegador no soporta el elemento <code>audio</code>.</audio>
			<?php $cnt_a++?>
		<?php endforeach;?>
		<?php foreach ($files as $file):?>
			<?php $parts = pathinfo($file)?>
			<button onclick="document.getElementById('sonido<?php echo $cnt_b?>').play();"><?php echo preg_replace("/[-_]/i"," ",ucfirst($parts['filename']))?></button>
			<?php $cnt_b++?>
		<?php endforeach;?>

	<?php endforeach;?>
	<a href="https://github.com/ftoledo/botonera"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>

  
</body>
