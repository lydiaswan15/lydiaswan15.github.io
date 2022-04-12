import {eventListeners} from "./eventListeners.js";
import {getFullDate, getCurrentDay, getTodayDate} from "./date.js"

export function format(weekList){
   
    document.querySelector('#listOfTodaysTasks').innerHTML = "";
    
    const dayOfWeek = getCurrentDay();
    const fullDate = getFullDate();

    //adding all the tasks to the this day section    
        for(let i = 1; i < weekList.length; i++){
            let currentIndex = weekList[i];
            let totalItems = '';
            if(currentIndex.name == dayOfWeek){
                let title = fullDate;
                for(let j = 0; j < currentIndex.tasks.length; j++){
                    console.log('hello');
                    let content = currentIndex.tasks[j].content; 
                    const item = `
                    <section class = "oneTask">
                    <section class = "content">
                    <p>${content}</p>
                    </section>
                    <button class = "remove" id = ${currentIndex.tasks[j].id}>Remove</button>
                    </section>
                    `
                    totalItems += item;
                }
                document.getElementById('listOfTodaysTasks').innerHTML += totalItems;

        }
    }
    
    //Adding tasks to the weekly section of the pate

         
        for(let i = 1; i < weekList.length; i++){
            let currentIndex = weekList[i];
            let totalItems = '';
            for(let j = 0; j < currentIndex.tasks.length; j++){
                let content = currentIndex.tasks[j].content; 
                const item = `
                <section class = "oneTask">
                <section class = "content"
                <p>${content}</p>
                </section>
                <button class = "remove" id = ${currentIndex.tasks[j].id}>Remove</button>
                </section>
                `
                totalItems += item;
            }
            let className = currentIndex.name + "Tasks";
            document.getElementById(className).innerHTML = totalItems;

        }
        eventListeners(weekList);
    
}


        