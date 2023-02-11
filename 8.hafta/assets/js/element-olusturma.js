/**
 * Single Element Select
 * Tekli Element Seçme
 */

// let btnAddTaskList = document.getElementById("btnAddTaskList");
// console.log(btnAddTaskList);
// console.log(btnAddTaskList.classList);
// console.log(btnAddTaskList.className);
// console.log(btnAddTaskList.innerText);
// console.log(btnAddTaskList.innerHTML);
// console.log(btnAddTaskList.textContent);
//
// // btnAddTaskList.innerText = "Buton Değişti";
// // btnAddTaskList.innerText = "<b>Buton Değişti</b>";
// // btnAddTaskList.innerHTML = "<b>Buton Değişti</b>";
//
// // btnAddTaskList.hidden = false;
// // btnAddTaskList.style.fontWeight = "bold";
// // btnAddTaskList.style.color = "red";
//
// btnAddTaskList.className += " test";
// btnAddTaskList.classList.add("text-danger", "test2");
// // let classNames = btnAddTaskList.className;
// // classNames = classNames.replace("test2", "");
// // btnAddTaskList.className = classNames;
// btnAddTaskList.classList.remove("test2");

// let btnAddTaskList = document.querySelector("#btnAddTaskList");
// let btnAddTaskList = document.getElementById("btnAddTaskList");

// console.log(btnAddTaskList);



// console.log(classNames);

/**
 * Multiple Select
 */

// var multiple = document.getElementsByClassName("w-100");
// var multiple = document.getElementsByTagName("span");
// var multiple = document.querySelectorAll(".btn");
//
// console.log(multiple);
// console.log(multiple[0].innerText);
// console.log(multiple[0].innerHTML);
// console.log(multiple[0].textContent);
//
// var multiple2 = document.querySelectorAll("a.btn-success");
// console.log(multiple2)


/**
 * Element Oluşturma İşlemi
 */

var spanElement = document.createElement("span");
console.log(spanElement);
// spanElement.classList.add("btn", "btn-danger", "w-50");
spanElement.innerText = "Kaydet";
spanElement.setAttribute("data-id", "20");
spanElement.setAttribute("class", "btn btn-danger w-50");
console.log(spanElement.innerText);

var createTaskRow = document.querySelector("#createTaskRow");
var txtTaskName = document.querySelector("#txtTaskName");
createTaskRow.appendChild(spanElement);
console.log(createTaskRow.children);
// createTaskRow.children[0].remove();
// createTaskRow.removeChild(spanElement);
createTaskRow.children[0].remove();
















































