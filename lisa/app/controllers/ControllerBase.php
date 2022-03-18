<?php
declare(strict_types=1);
date_default_timezone_set('Asia/Bangkok');

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{
  public function beforeExecuteRoute() 
  {
    if(!$this->session->has("access_token") && (($this->dispatcher->getControllerName() != "user" ))) return $this->response->redirect('lisa/user/login');
    else return;
  }
  public function initialize() 
  { 
    $this->assets
      ->collection('styles')
      ->addCss('lisa/font-awesome/css/font-awesome.css')
      ->addCss('lisa/css/bootstrap.min.css')
      ->addCss('lisa/css/dropzone.css')
      ->addCss('lisa/css/style.css')
      ->addCss('lisa/css/cropper.min.css')
      ->addCss('lisa/css/font-awesome.css')
      ->addCss('lisa/css/boostrap.css');

    $this->assets
      ->collection('scripts')
      ->addJs('lisa/js/jquery.min.js')
      ->addJs('lisa/js/bootstrap.min.js')
      ->addJs('lisa/js/dropzone.js')
      ->addJs('lisa/js/cropper.min.js')
      ->addJs('lisa/js/popper.min.js')
      ->addJs('lisa/js/main.js')
      ->addJs('lisa/js/font-awesome.js')
      ->addJs('lisa/js/sweetalert.js');

    $this->view->setVars([
      // "token" => $this->session->get("token"),
      // "refresh_token" => $this->session->get("refresh_token"),
      // "viewProfile" => $this->session->get("viewProfile"),
      // "admin" => $this->session->get("adminPermiss"),
      // "status" => $this->session->get("statusUser"),
      "documentPage" => $this->session->get("documentPage"),
      "access_token" => $this->session->get("access_token"),
      "expires_token" => $this->session->get("expires_token"),
      "permission" => $this->session->get("permission"),
      "picture" => $this->session->get("picture"),
      "refresh_token" => $this->session->get("refresh_token"),
      "access_token" => $this->session->get("access_token"),
      "userId" => $this->session->get("userId"),
      "username" => $this->session->get("username"),
      ]);
  }

  public function curlApi($url,$method,$field,$token = 'nonToken')
  {
    $curl = curl_init();
    
  if ($token != 'nonToken') {
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:5000/' . $url,
        // CURLOPT_URL => 'http://192.168.3.90:5000/'.$url,
        //http://127.0.0.1:5000/ https://document-flask-api.herokuapp.com/
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS =>$field,
        CURLOPT_HTTPHEADER => array(
          'Authorization: Bearer '.$token,
          'Content-Type: application/json'
        ),
        CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
      ));

    } else {
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:5000/' . $url,
        // CURLOPT_URL => '192.168.3.90:5000/'.$url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_POSTFIELDS => $field,
        CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json'
        ),
        CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
      ));
    }
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    return $result;
  }

  public function curlApiImg($pictureName)
  {
    $token = $this->session->get("access_token");
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://127.0.0.1:5000/account/profile',
    // CURLOPT_URL => 'http://192.168.3.90:5000/account/profile',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array('picture'=> new CURLFILE("http://localhost/lisa/uploads/".$pictureName)),
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$token
    ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    return $result;
  }

  public function curlApiFile($url,$arrayFile)
  {
    $token = $this->session->get("access_token");
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:5000/' . $url,
  // CURLOPT_URL => 'http://192.168.3.90:5000/'.$url,
  // CURLOPT_URL => '
  // https://document-flask-api.herokuapp.com/upload',
  //  CURLOPT_URL => 'http://localhost/lisa/' . $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $arrayFile,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$token
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
$result = json_decode($response);
return $result;
  }


public function curlApiExtract($url,$arrayFile)
{
  set_time_limit(0);
  $token = $this->session->get("access_token");
  $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:5000/'.$url,
// CURLOPT_URL => 'http://192.168.3.90:5000/'.$url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 400,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS => $arrayFile,
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$token,
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
$result = json_decode($response);
return $result;
}

public function tokenRefresh()
{
  $refresh_token = $this->session->get("refresh_token");
  $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:5000/refresh',
  // CURLOPT_URL => 'http://192.168.3.90:5000/refresh',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer ' . $refresh_token
  ),
));

$response = curl_exec($curl);
curl_close($curl);
echo $response;
$result = json_decode($response);
return $result;
}
}

