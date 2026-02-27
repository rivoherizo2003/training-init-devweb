document.getElementById("btn1").addEventListener("click", function(){
    console.log("here");
    const divContent =document.getElementById("content");
     divContent.innerHTML = "Manahoana";
     divContent.style.color = "red";
     document.getElementById("content1").innerHTML = "Aty aloha";
});

document.getElementById("btn2").addEventListener("click", function(){
    console.log("here2");
    document.getElementById("content").innerHTML = "Veloma";
});