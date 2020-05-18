<?php 


if(isset($_GET['url']))
{
	include_once '../app/bootstrap.php';
	
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	//Create db object
	$db = new Db();
	$conn = $db->connect();

	//Create Model currrency
	$currency = new Currency($conn);

	//Get auth
    $auth = new User();
    //Get url
	$url = $_GET['url'];
	$url = explode('/', $url);
	
	if($url[0] == 'currencies')
	{
		$token = getBearerToken();
		$checked = $auth->verifyToken($token);

		if($checked)
		{
			$currency->setPagNum(4);
			(isset($url[1]) && $url[1]>0) ? $currencies = $currency->paginate($url[1]) : $currencies = $currency->all();
			
			http_response_code(200);
			echo json_encode($currencies);
		}
		else 
		{
			http_response_code(401);
			echo json_encode(array(
				'Token do not match' => 'Login and get token'
			));
		}
		
	}

	else if($url[0] == 'currency')
	{
		$token = getBearerToken();
		$checked = $auth->verifyToken($token);

		if($checked)
		{
			$currency = $currency->find($url[1]);

			if($currency == false)
				$currency = "No currency found with this id";

			http_response_code(200);
			echo json_encode($currency);
		}
		else {
			http_response_code(401);
			echo json_encode(array(
				'Token do not match' => 'Login and get token'
			));
		}
		
	}

	else if($url[0] == 'login')
	{

		$user = $_SERVER['PHP_AUTH_USER'];
		$password = $_SERVER['PHP_AUTH_PW'];

		if($user=="admin" && $password=="adminpass")
		{
			
			$token = $auth->getToken();
			http_response_code(200);
			echo json_encode(array(
				'token' => $token
			));
		}
		else{
			http_response_code(401);
			echo json_encode(array(
				'Not match' => 'Cridentials do not match'
			));
		}

	}

	else if($url[0] == 'update')
	{
		$currency->updateAll();
		http_response_code(200);
		echo json_encode(array(
			'Updated' => 'All records has been updated'
		));
	}

	
}



function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }


function getBearerToken() {
    $headers = getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}
