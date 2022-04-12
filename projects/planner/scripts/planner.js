import Item from './Item.js';
import {getFullDate, getTodayDate} from "./date.js";
import {leftAndRight} from "./eventListeners.js";



let item = new Item();
document.getElementById('newItemButton').addEventListener('click', item.createNewItem);

//Adding event listeners to the right and left buttons that move the screen depending on the direction. 
//first right button
let fullText = document.querySelector('body');
function rightButtons(){
let rightButtons = document.querySelectorAll('.rightButtons');

rightButtons.forEach((item) =>{
    item.addEventListener('click', ()=>{
        fullText.classList.add('rightMove');
        leftAndRight();
    })
});

//second right button

let rightButton2 = document.querySelector('#rightButton2');

rightButton2.addEventListener('click', ()=>{
    fullText.classList.add('rightMove2');
    
});
}

//left Button

let leftButton2 = document.querySelector('#leftButton2');

leftButton2.addEventListener('click', ()=>{
    fullText.classList.add('leftMove2');
    fullText.classList.remove('rightMove');
    rightButtons();
});

//Adding the date to the opening page. 
 
    //Getting today's date and adding that.
    const fullDate = getFullDate();
    const todayDate = getTodayDate();

    document.getElementById('todayDate').innerHTML = fullDate;
    document.getElementById('todaysDatePageOne').innerHTML = todayDate;

 rightButtons();








