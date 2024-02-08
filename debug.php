<?php 
function adition($x, $y){
    return $x + $y;
}

setcookie('adition', adition(3,5), time() + (86400 * 30), "/"); // 86400 = 1 day


echo($_COOKIE['adition']);

?>