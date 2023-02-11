/**
 * Event Listener
 * Etkinliği Dinle
 */



var btnAddTaskList = document.querySelector("#btnAddTaskList");
var btnCompleted = document.querySelector("#btnCompleted");
var createTaskCard = document.querySelector("#createTaskCard");
var txtTaskName = document.querySelector("#txtTaskName");
var sehirler = document.querySelector("#sehirler");


// btnAddTaskList.addEventListener("click", function (event) {
//     event.preventDefault();
//     console.log("tıklandı");
//     console.log(event);
// });

btnAddTaskList.addEventListener("click", btnClick);
btnCompleted.addEventListener("click", btnClick);

function btnClick(event)
{
    event.preventDefault();
    console.log("tıklandı");

    // Tıklama nerden geldi?
    console.log(event.target);
    let clickElementID = event.target.getAttribute("id");

    if (clickElementID == "btnAddTaskList")
    {
        // alert("btnAddTaskList tıklandı");
    }
    else if (clickElementID == "btnCompleted")
    {
        // alert("btnCompleted tıklandı");
    }
}


// btnAddTaskList.addEventListener("mouseup", function (event) {
//     // console.log("Buton tıklaması kaldırıldığı an");
//     console.log("up");
// });

// btnAddTaskList.addEventListener("mouseenter", function (event) {
//     console.log("enter");
// });
//
// btnAddTaskList.addEventListener("mouseout", function (event) {
//     console.log("out");
// });
// btnAddTaskList.addEventListener("mousedown", function (event) {
//     console.log("down");
// });
//
// btnAddTaskList.addEventListener("mouseleave", function (event) {
//     console.log("leave");
// });
//
// btnAddTaskList.addEventListener("mouseover", function (event) {
//     console.log("over");
// });

// btnAddTaskList.addEventListener("dblclick", function (event) {
//     console.log("dblClick");
// });

// createTaskCard.addEventListener("mousemove", function (event) {
//     console.log("x Koordinatı: " + event.offsetX);
//     console.log("Y Koordinatı: " + event.offsetY);
// });


/**
 * Keyboard Events
 */

let body = document.querySelector("body");

body.addEventListener("keypress", function (event) {
    console.log("keypress");
    // console.log(event.key);
    // console.log(event.ctrlKey);
});

// body.addEventListener("keydown", function (event) {
//     console.log("keydown");
//     console.log(event.key);
// });
//
// body.addEventListener("keyup", function (event) {
//     console.log("keyup");
// });


// txtTaskName.addEventListener("focus", function (event) {
//     console.log("focus");
// });

txtTaskName.addEventListener("change", function (event) {
    console.log("change");
});
let self = this;
sehirler.addEventListener("change", function (event) {
    console.log("şehirler change");
    console.log(this.value);
});

txtTaskName.addEventListener("paste")








































