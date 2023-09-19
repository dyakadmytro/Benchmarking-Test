<div class="card">
    <div class="card-header bg-warning">
        Weather in {{ $weatherData['name'] }}
    </div>
    <div class="card-body">
        <h5 class="card-title">Description: {{ $weatherData['weather'][0]['description'] }}</h5>
        <p class="card-text">
            <strong>Main: </strong>{{ $weatherData['main']['temp'] }}  <br>
            <strong>Feels Like: </strong>{{ $weatherData['main']['feels_like'] }}  <br>
            <strong>Min Temperature: </strong>{{ $weatherData['main']['temp_min'] }}  <br>
            <strong>Max Temperature: </strong>{{ $weatherData['main']['temp_max'] }}  <br>
            <strong>Pressure: </strong>{{ $weatherData['main']['pressure'] }} hPa <br>
            <strong>Humidity: </strong>{{ $weatherData['main']['humidity'] }}% <br>
            <strong>Visibility: </strong>{{ $weatherData['visibility'] }}m <br>
            <strong>Wind Speed: </strong>{{ $weatherData['wind']['speed'] }} m/s <br>
            <strong>Cloudiness: </strong>{{ $weatherData['clouds']['all'] }}% <br>
        </p>
    </div>
</div>
