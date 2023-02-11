addEventListener("DOMContentLoaded", function (e) {
    // Tüm sayfa yüklendiğinde

    Array.prototype.remove = function () {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    }

    let btnAddTaskList = document.querySelector("#btnAddTaskList");
    let btnCompletedTask = document.querySelector("#btnCompletedTask");
    let btnRemoveTask = document.querySelector("#btnRemoveTask");
    let btnSelectAll = document.querySelector("#btnSelectAll");
    let btnClearList = document.querySelector("#btnClearList");


    let newTaskName = document.querySelector("#newTaskName");
    let taskListUl = document.querySelector("#taskListUl");
    let completedListUl = document.querySelector("#completedListUl");

    let taskList = [];
    let completedTaskList = [];
    let selectedList = [];

    btnAddTaskList.addEventListener("click", function (event) {
       // event.preventDefault();
        if (newTaskName.value == null || newTaskName.value == ''){
            alert("New Task Name Boş");
        }
        else
        {
            createLiElement();
        }


    });

    btnSelectAll.addEventListener("click", function (event) {
        console.log(selectedList);
        console.log(taskList);


        if (taskList.length > selectedList.length)
        {
            taskList.forEach(function (value, index, array) {
                let selectInput = document.querySelector("#input-" + value);

                let xCheck = selectedList.indexOf(value);
                if (xCheck === -1){
                    selectedList.push(value);
                    selectInput.checked = true;
                }
            });
        }
        else
        {
            taskList.forEach(function (value, index, array) {
                let selectInput = document.querySelector("#input-" + value);

                if (selectInput.checked) {
                    selectInput.checked = false;

                    let removeItemIndex = selectedList.indexOf(value);
                    if (removeItemIndex !== -1) {
                        selectedList.splice(removeItemIndex, 1);
                    }
                }
            });
        }
    });

    btnRemoveTask.addEventListener("click", function (event) {

        if (!selectedList.length)
        {
            alert("Seçili bir task yok");
        }
        selectedList.forEach(function (value, index, array) {
            let wrapperLiElement = document.querySelector("#wrapper-li-" + value);
            wrapperLiElement.remove();

            taskList.remove(value);
        });
        selectedList = [];
    });

    btnCompletedTask.addEventListener("click", function (event) {

        if (!selectedList.length)
        {
            alert("Seçili task yok");
        }
        else
        {
            completedTaskList = selectedList.concat(completedTaskList);
            console.log(completedTaskList);
            completedTaskList.forEach(function (value, index, array) {

                let label = document.querySelector('label[for="input-' + value + '"]');

                createCompletedElement(label.innerText);

                let deleteLi = document.querySelector("#wrapper-li-" + value);
                deleteLi.remove();

                selectedList.remove(value);
                taskList.remove(value);
            });
        }
    });

    btnClearList.addEventListener("click", function (event) {
       let liList = document.querySelectorAll(".completed-li");

       liList.forEach(function (value, key, parent) {
           value.remove();
       });

       completedTaskList = [];
    });

    function inputChangeAction(inputID)
    {
        let check = selectedList.indexOf(inputID);

        if (check === -1)
        {
            selectedList.push(inputID);
            // console.log(selectedList);
        }
        else
        {
            selectedList.remove(inputID);
            // console.log(selectedList);
        }
    }
    function createLiElement()
    {
        let inputID = taskList.length + 1;

        taskList.push(inputID);


        let li = document.createElement("li");
        li.className = "list-group-item task-list-item px-3";
        li.id = "wrapper-li-" + inputID;
        /**
         * wrapper-li-1
         * wrapper-li-2
         * wrapper-li-3
         */

        let inputElement = document.createElement("input");
        inputElement.type = "checkbox";
        inputElement.className = "select-task me-3 select-task";
        inputElement.id = "input-" + inputID;
        inputElement.onchange = function (){
            inputChangeAction(inputID);
        };

        let label = document.createElement("label");
        label.setAttribute("for", "input-" + inputID)
        label.innerText = newTaskName.value;

        let iElement = document.createElement("i");
        iElement.className = "fa fa-2x fa-trash text-primary float-end trashed";

        li.appendChild(inputElement);
        li.appendChild(label);
        li.appendChild(iElement);

        taskListUl.appendChild(li);
    }

    function createCompletedElement(lblText)
    {
        let completedLi = document.createElement("li");
        completedLi.className = "list-group-item task-list-item px-3 completed-li";

        let completedLabel = document.createElement("label");
        completedLabel.innerText = lblText;

        completedLi.appendChild(completedLabel);

        completedListUl.appendChild(completedLi);
    }




});