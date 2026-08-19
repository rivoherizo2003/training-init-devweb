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

function isPositive(number){
  return number >= 0;
}

const result = removeNegative(numbers, isPositive);

document.getElementById("numbers").innerHTML = result;