//5ea0eb80f3a15a09ff9a04a3095f5265
<?php
class OpenWeatherMapAPI {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getWeatherByCity($city) {
        $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid={$this->apiKey}";

        $response = file_get_contents($url);

        $data = json_decode($response);

        $temp = $data->main->temp - 273.15;

        return $temp;
    }
}

$apiKey = '5ea0eb80f3a15a09ff9a04a3095f5265';

$api = new OpenWeatherMapAPI($apiKey);

$city = 'São Gonçalo';

$temperature = $api->getWeatherByCity($city);

echo "Temperatura atual: " . $temperature . "°C";