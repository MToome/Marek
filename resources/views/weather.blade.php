<x-layout>

    <x-slot:heading>
        Weather forcast using YR.NO api
    </x-slot:heading>

    <p class="text-center">59.42, 24.74 : Kitseküla, Tallinn</p>

    <p class="text-center" id="ilmValja"></p>

    <script>
        const teabeLeht = 'https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=59.42&lon=24.74';

        const d = new Date();
        let diff = d.getTimezoneOffset();

        fetch(teabeLeht)
            .then(response => response.json())
            .then(data => {
                const ilmInfo = data;


                for (let i = 0; i < 7; i++) {
                    const tmpi = ilmInfo.properties.timeseries[i].data.instant.details.air_temperature;
                    const timi = ilmInfo.properties.timeseries[i].time;
                    const utch = parseInt(timi.slice(11, 13))
                    let h = utch - (diff / 60);

                    let dateform = "." + timi.slice(5, 7) + "." + timi.slice(0, 4);
                    let timeform = h + ":" + timi.slice(14, 16);
                    document.getElementById("ilmValja").innerHTML += tmpi + "°C at " + timeform + " " + dateform +
                        "<br>";
                }
            });
    </script>


</x-layout>
