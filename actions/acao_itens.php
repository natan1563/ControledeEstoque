<?php
require_once 'functions/page.php';
require_once 'functions/search.php';

if(isset($_GET['q']) and !empty($_GET['q'])){
	search();
}else{
	page('index');
}

?>