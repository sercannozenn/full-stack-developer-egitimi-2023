/**
 *
 * Javascriptte Constructor Functionların Nedir?
 *
 * Örnek oluşturularak kalıtım yapılır.
 *
 *
 * 0 => Muhasebe
 * 1 => Developer
 * 2 => Team Lead - Developer
 * 3 => Normal Personel
 */

var Employee = function (firstName, lastName, departmentID, salary) {
    this.firstName = firstName;
    this.lastName = lastName;
    this.departmentID = departmentID;
    this.salary = salary;

    this.maasHesapla = function () {
        switch (this.departmentID)
        {
            case 0:
                return this.salary *= 0.20;
            case 1:
                let salary2 = (this.salary * 0.30) + this.salary;
                return salary2;
            case 2:
                return this.salary *= 0.40;
            default:
                return this.salary;

        }
    };
};

let employee1 = new Employee("Umut", "Sarı", 1, 2000);
let employee2 = new Employee("Recep", "Gökdemir", 3, 1000);

// Nesnenin kendine has fonksiyonlarını oluşturma.
Employee.prototype.calculateSalary = function () {
    switch (this.departmentID)
    {
        case 0:
            return this.salary *= 0.20;
        case 1:
            let salary2 = (this.salary * 0.30) + this.salary;
            return salary2;
        case 2:
            return this.salary *= 0.40;
        default:
            return this.salary;

    }
};

let message = function () {
  return this.firstName + " " + this.lastName + " aramıza hoş geldin";
};

console.log(message.call(employee1));
console.log(message.apply(employee2));

let messageBind = message.bind(employee1);
console.log(messageBind());

















let message2 = function (work1, work2) {
    return this.firstName + " " + this.lastName + " " + work1 + " ve " + work2 + " işleri atanmıştır";
};

console.log(message2.call(employee1,"Rapor Hazırla", "Sunum Yap"));
console.log(message2.apply(employee2,["Rapor Hazırla apply", "Sunum Yap apply"]));

let messageBind2 = message2.bind(employee1);
console.log(messageBind2("Rapor Hazırla", "Sunum Yap"));
