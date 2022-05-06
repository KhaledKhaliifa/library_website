let cards = document.querySelector(".cards");

let item,title,author,publisher,bookLink,bookImg;
let item2,title2,author2,publisher2,bookLink2,bookImg2;

let bookUrl = "https://www.googleapis.com/books/v1/volumes?q=";
let placeHldr = "https://fakeimg.pl/320x500/";
let searchData;

document.querySelector("#searchForm").addEventListener("submit",function(e){
  e.preventDefault();
  cards.innerHTML = "";
  searchData = document.querySelector("#search_query").value;
  if(searchData ==="" || searchData === null) {      
  }
  else{
    $.ajax({
        url: bookUrl + searchData,
        dataType: "json",
        success: function(res){
          console.log(res);
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
  document.querySelector("#search_query").value="";
  
})

function displayResults(res){
  for(var i = 0 ; i < res.items.length;i++){

    item = res.items[i];
    title = item.volumeInfo.title;
    author = item.volumeInfo.author;
    publisher = item.volumeInfo.publisher;
    bookLink =  item.volumeInfo.previewLink;
    bookImg = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail : placeHldr;

    
    cards.innerHTML +=formatOutput(bookImg, title, author, publisher, bookLink);
    console.log(cards);
  }
}

function formatOutput(bookImg, title, author, publisher, bookLink) {
  // console.log(title + ""+ author +" "+ publisher +" "+ bookLink+" "+ bookImg)
/*   var viewUrl = 'book.html?isbn='+bookIsbn; //constructing link for bookviewer
 */  var htmlCard = `<div class="card">
  <img src="${bookImg}" class="card__image">
  <div class="card__content">
          ${title}
  </div>
  <div class="card__info">

      <a href="viewer.html" target="__blank" class="card__link">Details</a>
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