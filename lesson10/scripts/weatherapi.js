const apiURL = 'http://api.openweathermap.org/data/2.5/weather?id=5604473&APPID=ab49a57826e1d796047632c5f039fe78';

fetch(apiURL)
    .then((response)=> response.json())
    .then((jsonObject) => {
        console.log(jsonObject);
        document.getElementById('current-temp').textContent = jsonObject.main.temp;
        const imagesrc = 'https://openweathermap.org/img/w/' + jsonObject.weather[0].icon + '.png';
        const description = jsonObject.weather[0].description;

        document.getElementById('imagesrc').textContent = imagesrc;
        document.getElementById('icon').setAttribute('src', imagesrc);
        document.getElementById('icon').setAttribute('atl', description);

    })

