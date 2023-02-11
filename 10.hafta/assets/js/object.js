// Object Nesne Tanımlama/Oluşturma

let person = {};
person.firstName = "Sercan";
person.lastName = "Özen";

let person2 = {
    firstName: "Umut",
    lastName:  "Sarı",
    get firstNameUpperCase(){
        return this.firstName.toUpperCase();
    },
    get fullName(){
        return this.firstName + ' ' + this.lastName;
    },
    getirFullName: function (){
        return this.firstName + ' ' + this.lastName;
    },
    set firstNameGuncelle(value){

        value = value.replace(/\\n*/g, "");
        // value = value.style.textTransform = "capitalize";

        this.firstName = value;
    }
}
// person2.firstNameGuncelle("\nsercan");

let person3 = new Object();
person3.firstName = "Aygün";
person3.lastName = "Keçe";


console.log(person2);
// console.log(person.firstName);
// console.log(person['firstName']);


