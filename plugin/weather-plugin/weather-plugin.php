<?php
/*
Plugin Name: Weather Plugin
Description: Display weather information based on user location.
Version: 1.0
Author: Prabhu
*/

// Plugin functions
function get_weather_data($latitude, $longitude) {
    $api_key = '119da46e5f44d9c2ce8ea32f2b49283a';
    $location = "$latitude,$longitude";
    $url = "http://api.weatherstack.com/current?access_key=$api_key&query=$location";

    $response = wp_safe_remote_get($url);

    if (is_wp_error($response)) {
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return $data;
}

function display_weather() {
    // Get the user's latitude and longitude using JavaScript
    // These values will be dynamically obtained from the user's location
    echo "<div id='weather-data' style='font-size: 20px; background-color: #f0f0f0; padding: 30px; border-radius: 5px;'></div>";

    echo "
    <script>
    navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Pass the coordinates to the server to fetch weather data
        jQuery.ajax({
            url: '" . admin_url('admin-ajax.php') . "',
            type: 'POST',
            data: {
                action: 'get_weather_data',
                latitude: latitude,
                longitude: longitude
            },
            success: function(response) {
                // Handle the response as needed
                if (response && !response.error) {
                    var temperature = response.current.temperature;
                    var description = response.current.weather_descriptions[0];
                    var placeName = response.location.name;
                    var country = response.location.country;
                    var timeZone = response.location.timezone_id;
                    var localTime = response.location.localtime;
                    var windSpeed = response.current.wind_speed;
                    var windDirection = response.current.wind_dir;
                    var pressure = response.current.pressure;
                    var humidity = response.current.humidity;
                    var feelsLike = response.current.feelslike;
                    var uvIndex = response.current.uv_index;
                    var visibility = response.current.visibility;

                    var weatherData = '<p>City: ' + placeName + '</p>';
                    weatherData += '<p>Country: ' + country + '</p>';
                    weatherData += '<p>Time Zone: ' + timeZone + '</p>';
                    weatherData += '<p>Local Time: ' + localTime + '</p>';
                    weatherData += '<p>Temperature: ' + temperature + '°C</p>';
                    weatherData += '<p>Weather: ' + description + '</p>';
                    weatherData += '<p>Wind Speed: ' + windSpeed + ' km/h</p>';
                    weatherData += '<p>Wind Direction: ' + windDirection + '</p>';
                    weatherData += '<p>Pressure: ' + pressure + ' hPa</p>';
                    weatherData += '<p>Humidity: ' + humidity + '%</p>';
                    weatherData += '<p>Feels Like: ' + feelsLike + '°C</p>';
                    weatherData += '<p>UV Index: ' + uvIndex + '</p>';
                    weatherData += '<p>Visibility: ' + visibility + ' km</p>';
                    
                    document.getElementById('weather-data').innerHTML = weatherData;
                } else {
                    document.getElementById('weather-data').innerHTML = 'Unable to fetch weather data.';
                }
            }
        });
    });
    </script>
    ";
}

function weather_shortcode() {
    ob_start();
    display_weather();
    return ob_get_clean();
}
add_shortcode('weather', 'weather_shortcode');

// AJAX request handling
add_action('wp_ajax_get_weather_data', 'get_weather_data_callback');
add_action('wp_ajax_nopriv_get_weather_data', 'get_weather_data_callback');

function get_weather_data_callback() {
    $latitude = sanitize_text_field($_POST['latitude']);
    $longitude = sanitize_text_field($_POST['longitude']);

    $weather_data = get_weather_data($latitude, $longitude);

    if ($weather_data && isset($weather_data['current']['temperature']) && isset($weather_data['current']['weather_descriptions'][0])) {
        // Return the weather data as JSON
        wp_send_json($weather_data);
    } else {
        // Handle the error or return an error response
        wp_send_json(array('error' => 'Unable to fetch weather data.'));
    }

    // Make sure to exit after sending the JSON response
    wp_die();
}
?>
