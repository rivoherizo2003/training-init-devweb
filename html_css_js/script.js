//MCD 
//Entité => Person(nom, prénom)

class Person{
  constructor(lastname, firstname){
    console.log("constructor");
    this.lastname = lastname;
    this.firstname = firstname;
  }
}
//instanciation class(appel constructor) => objet
const person1 = new Person("randria", "koto");
const person2 = new Person("rasoa", "kely");
console.log(person1);


console.log("person1 => " + person1.lastname  + " " + person1.firstname)

console.log("person2 => " + person2.lastname  + " " + person2.firstname)

const persons = [person1, person2];

for(const person of persons){
  console.log(person.lastname + " " +person.firstname);
}