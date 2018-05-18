<?php
$diretorio = "../../upload_album/";


if (!is_dir($diretorio)){ [
echo "Pasta $diretorio nao existe";
} 


else { echo "A Pasta Existe<br>";


			$ficheiro = isset($_FILES['ficheiro']) ? $_FILES['ficheiro'] : FALSE;

				for ($k = 0; $k < count($ficheiro['name']); $k++)
					{
					   $destino = $diretorio."/".$ficheiro['name'][$k];

					    if (move_uploaded_file($ficheiro['tmp_name'][$k], $destino)) {echo "MOVEUUUUUU<br>"; }

					    else {echo "NAOOOO MOVEU";}
					}		



} // fecha else