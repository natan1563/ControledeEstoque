<?php
require_once 'functions/page.php';

if (isset($_GET['q']) and !empty($_GET['q'])){
	search('att');
} else{
	page('att');
}

?>