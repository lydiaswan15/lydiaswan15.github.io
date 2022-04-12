import Todo from "./Todo.js";

const myTodo = new Todo();

document.querySelector('#addNewButton').addEventListener('click', myTodo.createNewTodo);


