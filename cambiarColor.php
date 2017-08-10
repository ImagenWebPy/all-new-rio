<?php

$img = '';
if (!empty($_POST)) {
    $color = $_POST['color'];
//    switch ($color) {
//        case 'rojo':
//            $img = '<img src="img/kia-rio-' . $color . '.jpg" class="img-responsive">';
//            break;
//        case 'blanco':
//            $img = '<img src="img/kia-rio-' . $color . '.jpg" class="img-responsive">';
//            break;
//    }
    $img = '<img src="img/kia-rio-' . $color . '.jpg" class="img-responsive">';
}
echo json_encode($img);
