window.onload = function getDay(){

    let d = new Date;

    let year = d.getFullYear();
    let month = d.getMonth();
    let date = d.getDate();


    switch(month){
        case 0: month = "January"; break;
        case 1: month = "February"; break;
        case 2: month = "March"; break;
        case 3: month = "April"; break;
        case 4: month = "May"; break;
        case 5: month = "June"; break;
        case 6: month = "July"; break;
        case 7: month = "August"; break;
        case 8: month = "September"; break;
        case 9: month = "October"; break;
        case 10: month = "November"; break;
        case 11: month = "December"; break;
    }

    document.getElementById("date").innerHTML = month + " " + date + ", " + year;

    
}

window.onload = function findingBannerDay(){
    let d = new Date;
    let day = d.getDay();
    console.log(d.getDay());
    if(day == 5){
        document.querySelector('#banner').style.display = 'flex';
    }
}



