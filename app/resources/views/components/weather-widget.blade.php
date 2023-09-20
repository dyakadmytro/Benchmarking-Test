<div class="card">
    <div class="card-body">
        <h5 class="card-title">Your IP weather</h5>
        <p class="card-text">
            <strong>Temperature: </strong>{{ $weatherData->temp }}  <br>
            <strong>Min Temperature: </strong>{{ $weatherData->temp_min }}  <br>
            <strong>Max Temperature: </strong>{{ $weatherData->temp_max }}  <br>
            <strong>Pressure: </strong>{{ $weatherData->pressure }} hPa <br>
            <strong>Humidity: </strong>{{ $weatherData->humidity }}% <br>
        </p>
    </div>
</div>
