//infomation for Fish Haven

    const fishHavenURL = 'http://api.openweathermap.org/data/2.5/weather?id=5607916&APPID=ab49a57826e1d796047632c5f039fe78';
    fetch(fishHavenURL)
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
    
            document.querySelector('#fish-current-condition').textContent = jsonObject.weather[0].main;
            document.querySelector('#fish-current-temp').textContent = t;
            document.querySelector('#fish-high-temp').textContent = jsonObject.main.temp_max;
            document.querySelector('#fish-wind-chill').textContent = c;
            document.querySelector('#fish-humidity').textContent = jsonObject.main.humidity + "%";
            document.querySelector('#fish-wind-speed').textContent = s + " mph";
    
        })
    
        const sodaSpringsForcastURL = 'http://api.openweathermap.org/data/2.5/forecast?id=5607916&APPID=ab49a57826e1d796047632c5f039fe78';
    
        fetch(sodaSpringsForcastURL)
        .then((response) => response.json())
        .then((jsonObject) => {
    
            for(i = 1; i < 6; i++){
                const imgId = "#fish-day" + i + "Img";
                const pId = '#fish-day' + i;
                const imgURL = 'https://openweathermap.org/img/w/' + jsonObject.list[i].weather[0].icon + '.png';
                document.querySelector(imgId).setAttribute('src', imgURL);
                document.querySelector(imgId).setAttribute('alt', jsonObject.list[i].weather[0].main);
                document.querySelector(pId).innerHTML = jsonObject.list[i].main.temp + ' \u00B0 F'
           
            }
    
    
        })

        const fishHavenEventsURL = 'https://byui-cit230.github.io/weather/data/towndata.json';
    fetch(fishHavenEventsURL)
        .then((response) => response.json())
        .then((jsonObject) => {
            document.querySelector('#fishHavenEvents').innerHTML = jsonObject.towns[2].events;
    
        })

