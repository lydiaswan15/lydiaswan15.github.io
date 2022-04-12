import {format} from "./format.js";

//This function looks for, and then exicutes the remove and complete button.

export function eventListeners(weekList){

    //Listeners for all buttons so that we can reformat.
    
    document.querySelectorAll('.remove').forEach(item => {
        item.addEventListener('click', (e) => {
            for(let i = 1; i < weekList.length; i++){
                weekList[i].tasks.forEach((currentListItem, currentIndex = -1) => {
                    if(currentListItem.id == e.currentTarget.id){
                        weekList[i].tasks.splice(currentIndex, 1);
                        format(weekList);
                        
                    };
                })  
            }
            leftAndRight();
        })
    });

    let completeButtons = document.querySelectorAll('.complete');
    completeButtons.forEach(item => {
        item.addEventListener('click', () => {
            list.forEach(item, index => {
                console.log(item);
            });
        });
    });
}


export function leftAndRight(){
    console.log('hey')
}