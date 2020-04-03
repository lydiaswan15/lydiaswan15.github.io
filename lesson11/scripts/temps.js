//Temp information for Preston
const weatherURL = 'https://api.openweathermap.org/data/2.5/weather?id=5604473&APPID=ab49a57826e1d796047632c5f039fe78&units=imperial';
fetch(weatherURL)
    .then((response) => response.json())
    .then((jsonObject) => {
        let f, t, c;
        t = jsonObject.main.temp;
        s = jsonObject.wind.speed;

        if(t<=50 && s >= 3){
            c = 35.74 + 0.6215 * t - 35.75 * Math.pow(s, 0.16) + 0.4275 * t * Math.pow(s, 0.16);
        }else{
            c = 'N/A';
        }

        document.querySelector('#current-condition').textContent = jsonObject.weather[0].main;
        document.querySelector('#current-temp').textContent = t;
        document.querySelector('#high-temp').textContent = jsonObject.main.temp_max;
        document.querySelector('#wind-chill').textContent = c;
        document.querySelector('#humidity').textContent = jsonObject.main.humidity + "%";
        document.querySelector('#wind-speed').textContent = s + " mph";

    })

    const forcastURL = 'https://api.openweathermap.org/data/2.5/forecast?id=5604473&APPID=ab49a57826e1d796047632c5f039fe78&units=imperial';

    fetch(forcastURL)
    .then((response) => response.json())
    .then((jsonObject) => {

        for(i = 1; i < 6; i++){
            const imgId = "#day" + i + "Img";
            const pId = '#day' + i;
            const imgURL = 'https://openweathermap.org/img/w/' + jsonObject.list[i].weather[0].icon + '.png';
            document.querySelector(imgId).setAttribute('src', imgURL);
            document.querySelector(imgId).setAttribute('alt', jsonObject.list[i].weather[0].main);
            document.querySelector(pId).innerHTML = jsonObject.list[i].main.temp + ' \u00B0 F';  
        }


    })

    const prestonEventsURL = 'https://byui-cit230.github.io/weather/data/towndata.json';
    fetch(prestonEventsURL)
        .then((response) => response.json())
        .then((jsonObject) => {
            document.querySelector('#prestonEvents').innerHTML = jsonObject.towns[3].events;
    
        })


