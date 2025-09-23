<script>
    const teabeLeht = 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=59.42&lon=24.74';

    const CACHE_KEY = "WeatherDataMT"

    // Function to get weather data and convert it to json
    async function weatherData() {
        const response = await fetch(teabeLeht);
        const data = await response.json();
        return data;
    };

    async function getInfo() {

        // Deffine cache
        const cached = localStorage.getItem(CACHE_KEY);

        // Check if date is allready stored
        // Limiting request amount
        if (cached) {
            const {
                data,
                timestamp
            } = JSON.parse(cached);
            const age = (Date.now() - timestamp) / 1000; // makes it to seconds
            if (age < 600) {  // 600 sec is 10 min
                return data;
            }
        }

        const ilmInfo = await weatherData();
        let result = [];

        for (let i = 0; i < 7; i++) {

            const tmpi = ilmInfo.properties.timeseries[i].data.instant.details.air_temperature;
            const timi = ilmInfo.properties.timeseries[i].time;

            const dateObj = new Date(timi);

            let dateform = dateObj.toLocaleDateString("en-GB"); // Converts to local date format
            let timeform = dateObj.toLocaleTimeString("en-GB", { // Converts
                 hour: "2-digit",
                 minute: "2-digit"
                });

            let output = tmpi + "°C at " + timeform + " " + dateform ;
            result.push(output); // Adds every line to result array
        }

        // Stores data locally to cache
        localStorage.setItem(CACHE_KEY, JSON.stringify({
            data: result,
            timestamp: Date.now()
        }));

        return result;
    }

    getInfo().then(data => {
        document.getElementById("tempOut").innerHTML = data.join("<br>");
    });
</script>
