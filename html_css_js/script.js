var a;
console.log("valeur de a est: " + a);

let x;
let y;
console.log("valeur de x: " + x);
console.log("valeur de y: " + y);

const orderStatus = "PENDING";
let isConnected = false;//false or true

//array
let colors = ["yellow", "green", "black", "brown"];
console.log(colors);

//object
let person = {
    lastname: "Rakoto",
    firstname: "be",
    age: 50,
    toerana: "lavitra be",
    adresy: {
        ville: "tana",
        fokontany: "manjakaray"
    }
};

console.log("person => "+ person.toerana + " " + person.firstname + " "+person.adresy.ville);

let student = {
    note: 10.5,
    class: "1ere annee",
    isMajor: false
};

if(student.isMajor === false){
    console.log("Congrats!!!");
}