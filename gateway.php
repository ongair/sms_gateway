<?php

require 'vendor/autoload.php';
  
Requests::register_autoloader();

/**
 * This method is called to send an sms to a number by 
 * passing in the phone number, text and additional configuration
 */
function send_sms($to, $message, $channel_id, $password, $service_id) {
  $url = 'https://dragon.brainstorm.co.uk:1089/Gateway/';
  $xml = "<?xml version=\"1.0\"?>
    <methodCall>
      <methodName>EAPIGateway.SendSMS</methodName>
      <params>
        <param>
          <value>
            <struct>
              <member>
                <name>Numbers</name>
                <value>{$to}</value>
              </member>
              <member>
                <name>SMSText</name>
                <value>{$message}</value>
              </member>
              <member>
                <name>Password</name>
                <value>{$password}</value>
              </member>
              <member>
                <name>Service</name>
                <value>
                  <int>{$service_id}</int>
                </value>
              </member>
              <member>
                <name>Receipt</name>
                <value>N</value>
              </member>
              <member>
                <name>Channel</name>
                <value>{$channel_id}</value>
              </member>
              <member>
                <name>Priority</name>
                <value>Urgent</value>
              </member>
              <member>
                <name>MaxSegments</name>
                <value>
                  <int>2</int>
                </value>
              </member>
            </struct>
          </value>
        </param>
      </params>
    </methodCall>";

  $headers = array('content-type' => 'text/xml;charset=utf8');

  try
  {
    $response = Requests::post($url, $headers, $xml);
    return $response->success;
  }
  catch(Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    return false;
  }
}