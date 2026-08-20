const numbers = [1, 2, -3, 10, -20, 50];

function removeNegative(numbers, callbackNumber){
  let positiveNumbers = [];

  for(const number of numbers){
    if(callbackNumber(number)){
      positiveNumbers.push(number);
      // [1, 2, 10, 50]
    }
  }

  return positiveNumbers;
}

const isPositive = (number) => {
  return number >= 0;
}

const result = removeNegative(numbers, (number) => { return number >= 0 });

const result2 = removeNegative(numbers, (number) => { return number < 0});


document.getElementById("numbers").innerHTML = result;


document.getElementById("demo").innerHTML = result2;

let myPromise = new Promise((myResolve, myReject) => {
  
  // throw new Error("heart broke");
  
  //producing code
  setTimeout(() => {
    myResolve("I love you");
  }, 5000);
});

document.getElementById("promise").innerHTML = "I hate you";

//consuming code
myPromise.then(function(textPromise){
  document.getElementById("promise").innerHTML = textPromise;
}, function(error){
  document.getElementById("promise").innerHTML = error;
})

let carPagePromise = new Promise((myResolve, myReject) => {
  let httpRequest = new XMLHttpRequest();
  httpRequest.open("GET", "myCar.html");
  httpRequest.onload = function(){
    if(httpRequest.status === 200){
      myResolve(httpRequest.response);
    } else {
      myReject("File not found");
    }
  }

  httpRequest.send();
});

carPagePromise.then(
  function(content){
    document.getElementById("car-page").innerHTML = content;
  },
  function(content){
    document.getElementById("car-page").innerHTML = "ERROR" + content
  }
);