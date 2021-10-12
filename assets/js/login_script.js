(function(){
 
 const listenOnDiv = function (div) {
    const input = div.querySelector("input");
    const onBlur = function () {
       
    };
    
    div.addEventListener("click", () => input.focus());
    input.addEventListener("focus", function(){
      div.classList.remove("passive");
      div.classList.add("active");
    });
    input.addEventListener("change", onBlur);
    input.addEventListener("blur", onBlur);
 };
 /* Code Starts here */
 const inputInitialise = function () {
    const borders = document.querySelector(".borders"); 
    Array.from(document.querySelectorAll("div.input")).forEach(
      function(div){
          const cloneBorder = borders.cloneNode(true);
          const firstChild = div.querySelector(".content");
          cloneBorder.classList.remove("template");
          div.insertBefore(cloneBorder, firstChild);
          listenOnDiv(div);
        div.classList.add("activated");
      }
    );
 };


  
 
 
 window.addEventListener("DOMContentLoaded", function(){
    inputInitialise();
   

 });
  
}());