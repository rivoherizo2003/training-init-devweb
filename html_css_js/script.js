/* var a;
console.log("valeur de a est: " + a);

let x;
let y;
console.log("valeur de x: " + x);
console.log("valeur de y: " + y);

const orderStatus = "PENDING";
let isConnected = false; //false or true

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
    fokontany: "manjakaray",
  },
};

console.log(
  "person => " +
    person.toerana +
    " " +
    person.firstname +
    " " +
    person.adresy.ville
);

let student = {
  note: 10.5,
  class: "1ere annee",
  isMajor: false,
};

if (student.isMajor === false) {
  console.log("Congrats!!!");
}

//compteur de 1 à 10
for (let i = 0; i <= 10; i++) {
  console.log("Tour = " + i);
}

//compte à rebours de 10 à 1
for (let k = 10; k >= 0; k--) {
  console.log("Compte à rebours: " + k);
}

console.log("Decollage!!!");

//pair ou impair
for (let j = 0; j <= 10; j++) {
  console.log(j + "/2 = " + j / 2);
  console.log(j + " % 2 = " + (j % 2));
  if (j % 2 === 0) {
    console.log(j + " est un nombre pair");
  } else {
    console.log(j + " est un nombre impair");
  }
}

//multiplication
let multi = 7;
let result = "";
const divMultiElmHtml = document.getElementById("div-multi");
for (let x = 0; x <= 10; x++) {
    result = result + "<p>" + multi + " x " + x + " = " + multi * x + "</p>";
}
divMultiElmHtml.innerHTML = result;
//nom de variable
// camelCase ou snake_case
// camelCase , div_multi

const testElmdiv = document.getElementsByClassName("test");

console.log(testElmdiv)

for (let i = 0; i < testElmdiv.length; i++) {
    testElmdiv[i].innerHTML = result;
}

let total = 0;
for(let i = 0; i<=100; i++){
  total = total + i;
}
console.log("total="+total); */

// let result = "";
// let line = "";
// for(let i = 0;i<=10;i++){
//   line = line + "*";
//   result = result + line + "\n";
// }

// console.log("Result=>");
// console.log(result);
// console.log("GOAL => ");
// console.log("*\n**\n***\n");

// for(let i = 1; i <= 20; i++){
//   if(i % 3 === 0 && i % 5 === 0){
//     console.log("FizzBuzz "+i);
//   } else if(i % 3 === 0){
//     console.log("Fizz " + i);
//   } else if(i % 5 === 0){
//     console.log("Buzz " + i);
//   } else {
//     console.log(i);
//   }
// }
const fact = 64;
let result = 1;

for (let i = 1; i <= fact; i++) {
  result = result * i;
  // pour i = 1 result = 1 * 1 => 1;
  // pour i = 2 result = 1 * 2 => 2;
  // pour i = 3 result = 2 * 3 => 6
  // ....
}

// console.log("Facto de "+fact+" = "+result);

// let k = 1;
// do {
//   if(k === 5){
//     break;
//   }
//   console.log(k);
//   k++;
// } while (k <= 10);

// console.log("===========");
// let w = 1;
// while (w<=5) {
//   console.log(w);
//   w++;
// }

// let abc = ['a', 'b', 'c', 'x'];
// console.log("length="+abc.length);
// for(let k = 0; k<abc.length; k++){
//   console.log("k="+k+" => " +abc[k]);
//   if(abc[k] === 'a'){
//     console.log("hello");
//   }
// }

// console.log(abc[2]);
// console.log(abc[1]);

function factoWithReturn(nbr) {
  let result = 1;

  for (let i = 1; i <= nbr; i++) {
    result = result * i;
    // pour i = 1 result = 1 * 1 => 1;
    // pour i = 2 result = 1 * 2 => 2;
    // pour i = 3 result = 2 * 3 => 6
    // ....
  }

  return result;
}

function displayFactoriel() {
  const txtFactis = document.getElementById("factis");

  const divFacto = document.getElementById("facto");
  divFacto.innerHTML = factoWithReturn(txtFactis.value);
}

// let rep = factoWithReturn(6);
// console.log("Rep="+rep);
// let p = rep * 2;
// console.log("=> "+p);

// function carr(nombre){
//   let x= nombre * nombre;

//   return x;
// }

// console.log("carr=>"+carr(12));

// console.log("facto with return ="+factoWithReturn(7));

// console.log("facto + carre "+carr(factoWithReturn(3)));
// let n = factoWithReturn(3);
// let z = carr(n);
// console.log(z);

// function add(x, y){
//   return x + y;
// }

// console.log("addition "+add(2,3));

function tsyMireturn() {
  let x = 1;
  let y = 3;
  let z = x + y;
  console.log("z=>" + z);
}

tsyMireturn();

function manaoBonjour() {
  return "Hello ";
}

console.log(manaoBonjour() + "Rakoto");
console.log(manaoBonjour() + "rabe");
console.log(manaoBonjour() + "rasoa");

let bj = manaoBonjour();

function mention(moyenne) {
  if (moyenne < 10) {
    return "Incapable";
  }

  if (moyenne === 10) {
    return "Saika tsy afaka";
  }

  return "afaka";
}

let m = mention(7);
console.log(m);

function buildHTMLMutli(multi) {
  let result = "";
  for (let x = 0; x <= 10; x++) {
    result = result + "<p>" + multi + " x " + x + " = " + multi * x + "</p>";
  }
  console.log(result);
  
  return result;
}

function displayMulti() {
  const divMultiElmHtml = document.getElementById("div-multi");
  const txtFactis = document.getElementById("factis");
  const reponseMultiHtml = buildHTMLMutli(txtFactis.value);

  divMultiElmHtml.innerHTML = reponseMultiHtml;
}
