document.querySelector("#searchForm").addEventListener("submit",function(e){
    e.preventDefault();
    document.querySelector("#output").innerHTML ="";
    fetch("http://openlibrary.org/search.json?q="+document.querySelector("#search_query").value)
    .then(a=>a.json())
    .then(response => {
        for(let i = 0 ;i < 10; i++){
            document.querySelector("#output").innerHTML += "<h2>" + response.docs[i].title+ "</h2>" + response.docs[i].author_name[0]+"<br><img src = 'http://covers.openlibrary.org/b/isbn/"+response.docs[i].isbn[0]+"-M.jpg'><br>";
        }
    })
})

////////////////////////////////////////////////////////////////////////
window.onscroll = function() {myFunction()};
// Get the navbar
var searchbar = document.querySelector(".searchFormClass");
// Get the offset position of the navbar
var sticky = searchbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    searchbar.classList.add("sticky");

  } else {
    searchbar.classList.remove("sticky");
  }
}
////////////////////////////////////////////////////////////////////////
