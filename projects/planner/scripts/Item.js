let oneDayList = [];
const weekList = [
    {
        name: undefined,
    } , 
    {
        name: "Sunday",
        number: 0, 
        current: false, 
        tasks: []
    } , 
    
    {
        name: "Monday",
        number: 1, 
        current: false, 
        tasks: []
    } , 
    {
        name: "Tuesday",
        number: 2, 
        current: false, 
        tasks: []
    } , 
    {
        name: "Wednesday",
        number: 3, 
        current: false, 
        tasks: []
    } , 
    {
        name: "Thursday",
        number: 4, 
        current: false, 
        tasks: []
    } , 
    {
        name: "Friday",
        number: 5, 
        current: false, 
        tasks: []
    } , 
    {
        name: "Saturday",
        number: 6, 
        current: false, 
        tasks: []
    } , ];
import {format} from "./format.js";
import {eventListeners} from "./eventListeners.js";

export default class Item{

    Item(){}

    createNewItem(){
        const contentInfomation = document.getElementById('itemId').value;
        let weekDropDownMenu = document.getElementById('weekDropDownMenu');
        let selectedOption = weekDropDownMenu.options[weekDropDownMenu.selectedIndex].text;
       
        const newItem = {id: new Date().getTime(), content: contentInfomation, dayOfWeek: selectedOption}

        weekList.forEach(item => {
            if(item.name == newItem.dayOfWeek){
                item.tasks.push(newItem);
                format(weekList);
            }  
        })
        eventListeners(weekList);
    }

}

