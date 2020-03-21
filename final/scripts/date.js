
let d = new Date;

    let year = d.getFullYear();
    let month = d.getMonth();
    let date = d.getDate();
    let day = d.getDay();


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


    document.getElementById("date").innerHTML = "Lydia Swanson | CIT 230 | " + month + " " + date + ", " + year;

    //Five Day Forcast Information

    for(i = 1; i < 6; i++){
    
        day = day + i;
        if(day == 7){day = 0;}
        switch(day){
            case 7: day = "Sunday"; 
            case 0: day = "Sunday"; break;
            case 8: day = "Monday"; 
            case 1: day = "Monday"; break;
            case 9: day = "Tuesday"; 
            case 2: day = "Tuesday"; break;
            case 10: day = "Wednesday"; 
            case 3: day = "Wednesday"; break;
            case 11: day = "Thursday"; 
            case 4: day = "Thursday"; break;
            case 12: day = "Friday"; 
            case 5: day = "Friday"; break;
            case 13: day = "Saturday"; 
            case 6: day = "Saturday"; break;
        }
        const dayID = "day" + i + "Name";
        
        document.getElementById(dayID).innerHTML = day;

        day = d.getDay();
    }