import hello from "../../person.js";
// product.js
// bills.js
// customer.js

hello.func1();
hello.func2();
document.getElementById("btn1").addEventListener("click", function () {
  pageLoader("page1.html");
});

function myDisplayerPage(content) {
  document.getElementById("div-page").innerHTML = content;
}

function myDisplayerErrorPage(content) {
  document.getElementById("div-page-error").innerHTML = content;
}

//SPA : Single Page Application
document.getElementById("btn2").addEventListener("click", function () {
  pageLoader("page2.html");
});

document.getElementById("btn3").addEventListener("click", function () {
  pageLoader("page3.html");
  localStorage.setItem("username", "Dan lee");
});

document.getElementById("btn4").addEventListener("click", function () {
  pageLoaderAsync("pagedsds4.html");
  //pageLoaderAsyncCustom is not defined
});

async function pageLoaderAsync(pageUrl) {
  document.getElementById("div-page").innerHTML = "Loading...";
  let myPromise = new Promise(function (onSuccess, onError) {
    let request = new XMLHttpRequest();
    request.open("GET", pageUrl); //pageUrl = https://facebook/11/messages
    request.onload = function () {
      if (request.status === 200) {
        onSuccess(request.response);
      } else {
        onError("Page not found! :-)");
        
      }
    };
    request.send();
  });
  document.getElementById("div-page").innerHTML = await myPromise;
}

const pageLoader = (pageUrl) => {
  let myPromise = new Promise(function (onSuccess, onError) {
    let request = new XMLHttpRequest();
    request.open("GET", pageUrl); //pageUrl = https://facebook/11/messages
    request.onload = function () {
      if (request.status === 200) {
        onSuccess(request.response);
      } else {
        onError("Page not found! :-)");
      }
    };
    request.send();
  });

  myPromise.then(
    function (value) {
      myDisplayerPage(value);
    }, //myResolve
    function (error) {
      myDisplayerPage(error);
    }, //myReject
  );
};

async function myAsyncFunction() {
  return "hello";
}

function myPromiseFunction() {
  return Promise.resolve("hello");
}

myAsyncFunction().then(
  (value) => {
    console.log("HERE myasync function " + value);
  },
  (error) => {
    console.log("my async error " + error);
  },
);

myPromiseFunction().then(
  (value) => {
    console.log("My promise " + value);
  },
  (error) => {
    console.log("my promise error " + error);
  },
);

console.log(document.getElementsByClassName("find"));
const finds = document.getElementsByClassName("find");

for (const key in finds) {
  //finds[4] => taille du tableau
  if (finds[key] instanceof HTMLElement) {
    finds[key].innerHTML = "hello world";
  }
}

localStorage.setItem("username", "jhon doe");

console.log(localStorage.getItem("username"));
document.getElementById("username").innerHTML =
  localStorage.getItem("username");
