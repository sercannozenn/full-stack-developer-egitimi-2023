let Employee = function (firstName, lastName, salary, experience, departmentID) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.salary = salary;
    this.experience = experience;
    this.departmentID = departmentID;
}

Employee.prototype.calculateSalary = function () {
    let salaryForDepartment;

    switch (this.departmentID)
    {
        case 0:
            salaryForDepartment = this.salary + (this.salary * 0.20);
            break;
        case 1:
            salaryForDepartment = this.salary + (this.salary * 0.30);
            break;
        case 2:
            salaryForDepartment = this.salary + (this.salary * 0.40);
            break;
        default:
            salaryForDepartment = this.salary;
    }

    return (this.experience * 100) + salaryForDepartment;

};

let Developer = function (firstName, lastName, salary, experience, projectName) {
    this.departmentID = 1;
    Employee.call(this, firstName, lastName, salary, experience, this.departmentID);
    
    this.projectName = projectName;
    this.development = function () {
        console.log(this.firstName + " " + this.lastName + " geliştirme yaptı.");
    }
};

let AccountManager = function (firstName, lastName, salary, experience, taskName) {
    this.departmentID = 0;

    Employee.call(this, firstName, lastName, salary, experience, this.departmentID);

    this.taskName = taskName;
    this.completedTask = function () {
        console.log(this.firstName + " " + this.lastName + " " + this.taskName + " görevini tamamladı.");
    };

}

Developer.prototype = Object.create(Employee.prototype);
AccountManager.prototype = Object.create(Employee.prototype);

Developer.constructor = Developer;
AccountManager.constructor = AccountManager;


let aygun = new Developer("Aygün", "Keçe", 3000, 5,"Randevu Sistemi");
let umut = new AccountManager("Umut", "Saro", 4000, 7,"Maaşları Hesapla");

console.log(aygun);
console.log(umut);

aygun.development();
umut.completedTask();

console.log(aygun.calculateSalary());
console.log(umut.calculateSalary());

console.log(aygun.firstName);