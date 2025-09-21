<script>
    const teabeLeht = 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=59.42&lon=24.74';

    const d = new Date();
    let diff = d.getTimezoneOffset();

    const CACHE_KEY = "WeatherDataMT"

    async function weatherData() {
        const response = await fetch(teabeLeht);
        const data = await response.json();
        return data;
    };



    async function getInfo() {

        const cached = localStorage.getItem(CACHE_KEY);

        if (cached) {
            const {
                data,
                timestamp
            } = JSON.parse(cached);
            const age = (Date.now() - timestamp) / 1000;
            if (age < 300) {
                return data;
            }
        }

        const ilmInfo = await weatherData();
        let result = [];

        for (let i = 0; i < 7; i++) {

            const tmpi = ilmInfo.properties.timeseries[i].data.instant.details.air_temperature;
            const timi = ilmInfo.properties.timeseries[i].time;
            const utch = parseInt(timi.slice(11, 13))

            let h = utch - (diff / 60);

            let dateform = timi.slice(8, 10) + "." + timi.slice(5, 7) + "." + timi.slice(0, 4);
            let timeform = h + ":" + timi.slice(14, 16);

            let output = tmpi + "°C at " + timeform + " " + dateform + "<br>";
            result.push(output);
        }

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
