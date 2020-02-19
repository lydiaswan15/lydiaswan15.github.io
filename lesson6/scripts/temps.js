//Temp information

let f, t, s;
t = 50;
s = 10;
console.log("testing");

if(t<=50 && s >= 3){
    f = 35.74 + 0.6215 * t - 35.75 * Math.pow(s, 0.16) + 0.4275 * t * Math.pow(s, 0.16);
    document.querySelector('#wind-chill').innerHTML = f.toFixed(2) + '&deg;';
}

else{
    f = 'N/A';
    document.querySelector('wind-chill').innerHTML = f;
}

document.querySelector('#current-temp').innerHTML =`${t}&deg;`;
document.querySelector('#wind-speed').innerHTML = s + 'mph';



//

