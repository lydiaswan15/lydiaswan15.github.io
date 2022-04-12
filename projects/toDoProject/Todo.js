import {qs, qsa, storeInLocal, getFromLocal}from "./utilities.js"

let totalList = [];


export default class Todo{

    constructor(){
    }

    createNewTodo(){
        //adds the text from there to the array of total items.

        let newTodoItem = qs('#text').value;
        const newTodo = {id: new Date().getTime(), content: newTodoItem, completed: false};

        totalList.push(newTodo);

        storeInLocal(totalList);

        format();

        return this.totalList;

    }
    
}


function format(){
    qs('#toDoDiv').innerHTML = "";

    totalList = getFromLocal();

    for(let i = 0; i < totalList.length; i++){
        //text

        let newContent = `
        <div class = 'item'>
        ${totalList[i].content}
        <div class = 'buttons'>
        <button class = 'remove' id = '${totalList[i].id}' >Remove</button>
        <button class = 'complete' id = ${totalList[i].id}>Complete</button>
        </div>
        </div>`;

       
        //adding the new content to the div on the HTML


        if (totalList[i].completed == true){
            newContent = `
                <div class = 'item completedItem'>
                    ${totalList[i].content}
                    <div class = 'buttons'>
                        <button class = 'remove' id = ${totalList[i].id} >Remove</button>
                        <button class = 'complete' id = ${totalList[i].id}>Complete</button>
                    </div>
                </div>`;

        }

        qs('#toDoDiv').innerHTML += newContent;
        
    }
    eventListeners(totalList);
 
}

function eventListeners(totalList){
    qsa('.remove').forEach(item =>{
        item.addEventListener('click', remove);
    });
    
    qsa('.complete').forEach(item =>{
        item.addEventListener('click', complete);
    });
}


function remove(e){
   
    let index = -1;
    totalList.forEach((item, i) =>{
        if(item.id == e.target.id){
            index = i;
        }
    })

    totalList.splice(index, 1);

    storeInLocal(totalList);
    
    format();
   //find the index of 
}

function complete(e){
    let index = -1;
    totalList.forEach((item, i) =>{
        if(item.id == e.target.id){
            index = i;
        }
    })

    totalList[index].completed = true;
    
    storeInLocal(totalList);

    format(); 
}

