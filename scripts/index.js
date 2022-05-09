let cards = document.querySelector(".cards");
let myOutput = document.querySelector("#output");
let item,title,author,publisher,bookLink,bookImg;

let bookUrl = "https://www.googleapis.com/books/v1/volumes?q=";
let placeHldr = "../images/LibraryLogo.png";
let searchData;

let newDiv = document.createElement("div");
newDiv.innerText="Search Results";
newDiv.classList.add("search-results-word");

document.querySelector("#searchForm").addEventListener("submit",function(e){
  e.preventDefault();
  cards.innerHTML ="";
  myOutput.removeChild(myOutput.childNodes[0]);
  myOutput.prepend(newDiv);

  searchData = document.querySelector("#search_query").value;
  
  if(searchData ==="" || searchData === null) {      
  }
  else{
    $.ajax({
        url: `${bookUrl + searchData}&maxResults=20`,
        dataType: "json",
        success: function(res){
          if(res.totalItem === 0){
            alert("No results found.");
          }
          else{
            displayResults(res);
          }
        },
        error: function(){
          alert("Something went wrong.");
        }
    })
  }
  //document.querySelector("#search_query").value="";
  
})

function displayResults(res){

  for(var i = 0 ; i < res.items.length;i++){

    item = res.items[i];
    title = item.volumeInfo.title;
    publisher = item.volumeInfo.publisher;
    bookLink =  item.volumeInfo.previewLink;
    bookID = item.id;
    

    bookImg = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail : placeHldr;
    
    cards.innerHTML +=formatOutput(bookImg, title,bookID);
    console.log(bookLink);
    console.log(bookID);
  }
}

function formatOutput(bookImg, title, bookID) {
 var htmlCard = `

  <div class="card">
  <img src="${bookImg}" class="card__image">
  <div class="card__content">
          ${title}
  </div>
  <div class="card__info">

      <a href="viewer.html?bookID=${bookID}" target="__blank" class="card__link">Details</a>
  </div>
  
</div>
  `
  return htmlCard;
}



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