<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// Get All Customers

//simple write api/customers and then the function and it willl perform that
$app->get('/api/customers',function(Request $request , Response $response){
	$sql = "SELECT * FROM customers";

	try{
		$db = new db();
		$db = $db->connect();
		$stmt  = $db->query($sql);
		$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($customers);
	}
	catch(PDOException $e){
		  echo '{"error": {"text": '.$e->getMessage().'}';
	}
});