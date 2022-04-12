export function qs(query) {
    return document.querySelector(query);
  }
  
  export function qsa(query) {
    return document.querySelectorAll(query);
  }
  
  export function bindTouch(selector, callback) {
    qs(selector).addEventListener("touchend", e => {
      //e.preventDefault();
      console.log("touch", this);
      callback();
    });
    qs(selector).addEventListener("click", function(e) {
      callback();
      console.log("click", this);
    });
  }

  export function storeInLocal(item){
    localStorage.clear();
    localStorage.setItem('toDoList', JSON.stringify(item));
}

export function getFromLocal(){
    return JSON.parse(localStorage.getItem('toDoList'));
}
  
  export const apiKey = "sadasdasfdadsfefsd";