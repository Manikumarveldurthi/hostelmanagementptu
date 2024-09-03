<?php
session_start();
require 'includes/config.inc.php';

class WeatherFetcher {
    protected $apiUrl;
    protected $apiKey;

    public function __construct($apiKey) {
        $this->apiUrl = 'http://api.openweathermap.org/data/2.5/weather';
        $this->apiKey = $apiKey;
    }

    protected function buildUrl($location) {
        $url = $this->apiUrl;
        $url .= '?q=' . urlencode($location);
        $url .= '&units=metric'; 
        $url .= '&appid=' . $this->apiKey;
        return $url;
    }

    public function fetchWeather($location) {
        $url = $this->buildUrl($location);
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
        ));
        
        $response = curl_exec($curl);
        
        if (curl_errno($curl)) {
            echo 'Error:' . curl_error($curl);
        }
        
        curl_close($curl);
        
        if ($response) {
            $weatherData = json_decode($response, true);
            
            if (isset($weatherData['main']['temp'])) {
                return $weatherData;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}

class CityWeatherFetcher extends WeatherFetcher {
    private $location;

    public function __construct($location, $apiKey) {
        parent::__construct($apiKey);
        $this->location = $location;
    }

    public function displayWeather() {
        $weatherData = $this->fetchWeather($this->location);
        
        if ($weatherData) {
            $temperature = $weatherData['main']['temp'];
            $description = $weatherData['weather'][0]['description'];
            
            $windSpeed = $weatherData['wind']['speed'];
            $humidity = $weatherData['main']['humidity'];
            $location = isset($weatherData['name']) ? $weatherData['name'] : 'Unknown Location';

            echo "<h2>Weather in {$location}</h2>";
            echo "<p>Temperature: {$temperature} &#8451;</p>";
            echo "<p>Description: {$description}</p>";
            echo "<p>Wind Speed: {$windSpeed} m/s</p>";
            echo "<p>Humidity: {$humidity}%</p>";
        } else {
            echo 'Weather data not available.';
        }
    }
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $apiKey = '63c020e1cad6925e7159af544c53289f'; 

    $cityWeatherFetcher = new CityWeatherFetcher($location, $apiKey);
    $cityWeatherFetcher->displayWeather();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Fetcher</title>
</head>
<body>
    <form method="post" action="">
        <label for="location">Enter City:</label>
        <input type="text" id="location" name="location" required>
        <button type="submit">Get Weather</button>
    </form>
</body>
</html>
