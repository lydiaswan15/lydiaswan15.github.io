let d = new Date();

//creates a new date and returns a string of the day of the week. 
export function getCurrentDay(){
    let dayOfWeek = d.getDay();

    switch(dayOfWeek){
        case 0: dayOfWeek = "Sunday"; break;
        case 1: dayOfWeek = "Monday"; break;
        case 2: dayOfWeek = "Tuesday"; break;
        case 3: dayOfWeek = "Wednesday"; break;
        case 4: dayOfWeek = "Thursday"; break;
        case 5: dayOfWeek = "Friday"; break;
        case 6: dayOfWeek = "Saturday"; break;
    }

    return dayOfWeek;
}

export function getTodayMonth(){
    let month = d.getMonth();

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

    return month;

}

//return the string for the day of the week, and the date. 
export function getFullDate(){
    let day = getCurrentDay();
    let date = d.getDate();
    let year = d.getFullYear();
    let month = getTodayMonth();

    let dayString = day + " " + month + " " + date + ", " + year;
    return dayString;
}

export function getTodayDate(){
    return d.getDate();
}

