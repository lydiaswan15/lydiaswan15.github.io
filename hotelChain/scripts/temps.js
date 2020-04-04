const baraquilla = 'https://api.openweathermap.org/data/2.5/weather?id=3002552&APPID=ab49a57826e1d796047632c5f039fe78&units=imperial';
    fetch(baraquilla)
        .then((response) => response.json())
        .then((jsonObject) => {
            let f, t, c;
            t = jsonObject.main.temp;
            s = jsonObject.wind.speed;
    
            if(t<=50 && s >= 3){
                c = 35.74 + 0.6215 * t - 35.75 * Math.pow(s, 0.16) + 0.4275 * t * Math.pow(s, 0.16);
                c = Math.floor(c);
            }else{
                c = 'N/A';
            }
    
        
            document.querySelector('#baraquilla-current-temp').textContent = t;
            document.querySelector('#baraquilla-wind-chill').textContent = c;
            document.querySelector('#baraquilla-wind-speed').textContent = s + " mph";
    
        });


        const hawaii = 'https://api.openweathermap.org/data/2.5/weather?id=5856194&APPID=ab49a57826e1d796047632c5f039fe78&units=imperial';
    fetch(hawaii)
        .then((response) => response.json())
        .then((jsonObject) => {
            let f, t, c;
            t = jsonObject.main.temp;
            s = jsonObject.wind.speed;
    
            if(t<=50 && s >= 3){
                c = 35.74 + 0.6215 * t - 35.75 * Math.pow(s, 0.16) + 0.4275 * t * Math.pow(s, 0.16);
                c = Math.floor(c);
            }else{
                c = 'N/A';
            }
    
        
            document.querySelector('#hawaii-current-temp').textContent = t;
            document.querySelector('#hawaii-wind-chill').textContent = c;
            document.querySelector('#hawaii-wind-speed').textContent = s + " mph";
    
        });

        const logan = 'https://api.openweathermap.org/data/2.5/weather?id=5779068&APPID=ab49a57826e1d796047632c5f039fe78&units=imperial';
        fetch(logan)
            .then((response) => response.json())
            .then((jsonObject) => {
                let f, t, c;
                t = jsonObject.main.temp;
                s = jsonObject.wind.speed;
        
                if(t<=50 && s >= 3){
                    c = 35.74 + 0.6215 * t - 35.75 * Math.pow(s, 0.16) + 0.4275 * t * Math.pow(s, 0.16);
                    c = Math.floor(c);
                }else{
                    c = 'N/A';
                }
        
            
                document.querySelector('#logan-current-temp').textContent = t;
                document.querySelector('#logan-wind-chill').textContent = c;
                document.querySelector('#logan-wind-speed').textContent = s + " mph";
        
            })

        