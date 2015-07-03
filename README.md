SMS Gateway
===========

### Requirements

This gateway uses PHP Requests module (https://github.com/rmccue/Requests) for sending the request - Install with composer

```
curl -sS https://getcomposer.org/installer | php
php composer.phar install
```

In your composer.json
```
{
    "require": {
        "rmccue/requests": ">=1.0"
    }
}
```


### Usage

```
  $phone_number = '254722200200';
  $text = 'Hello world';  

  # obtain these from your account manager
  $channel_id = '12345';   
  $password = '12345';
  $service_id = '12345';

  $response = send_sms($phone_number, $text, $channel_id, $password, $service_id);
```