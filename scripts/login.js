const reg = document.querySelector(".form-btn");
localStorage.setItem("test",1);
reg.addEventListener("click",function(e){

    e.preventDefault();
    location.href="../html/index.html";
})