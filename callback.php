<?php

  if(isset($_POST)) {
    $sender = new Sender($_POST);
    $sender->getTable();
  }

  class Sender {
    private $name;
    private $phone;
    private $ip;
    private $key;
    private $url = 'http://alfashops.ru/scripts/test_task/api_sample.php';
    private $response;

    public function __construct($data) {
      $this->name  = $data['name'];
      $this->phone = $data['phone'];
      $this->ip    = $this->getClientIP();
      $this->key   = $this->getApiKey();
      $this->response = $this->sendLead();
    }

    public function getTable() {
      ini_set( 'error_reporting', E_ALL );
      ini_set( 'display_errors', true );
      include 'table.php';
    }

    private function sendLead() {
      $paramList = array();
      $paramList['method'] = 'send_lead';
      $paramList['name']   = $this->name;
      $paramList['phone']  = $this->phone;
      $paramList['ip']     = $this->ip;
      $paramList['key']    = $this->key;
      $response = $this->sendPostRequest($paramList);
      return json_decode($response);
    }

    private function getClientIP() {
      $ip = '';
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else {
        $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
    }

    private function getApiKey() {
      $paramList = array();
      $paramList['method'] = 'get_api_key';
      return $this->sendPostRequest($paramList);
    }

    private function sendPostRequest($params) {
      $result = file_get_contents($this->url, false, stream_context_create(array(
        'http' => array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => http_build_query($params)
        )
      )));
      return $result;
    }
  } 

?>  
