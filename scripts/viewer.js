const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());
const bookID = params.bookID;

let item,title,author,publisher,bookLink,bookImg;

const container = document.querySelector(".container");

console.log(bookID);

let searchData;

window.onload = function(){
    searchData = "https://www.googleapis.com/books/v1/volumes/"+ bookID;
    
    if(searchData ==="" || searchData === null) {      
    }
    else{
      $.ajax({
          url: `${searchData}`,
          dataType: "text",
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
}

function displayResults(res){

      item =  JSON.parse(res);
      title = item.volumeInfo.title;
      publisher = item.volumeInfo.publisher;
      bookLink =  item.volumeInfo.previewLink;

      date = item.volumeInfo.publishedDate;
      pages = item.volumeInfo.pageCount;
      mature = item.volumeInfo.maturityRating;
      language = item.volumeInfo.language;

      container.innerHTML +=formatOutput(title, author, publisher, bookLink,date,pages,mature,language);

  }
  function formatOutput(title, author, publisher, bookLink,date,pages,mature,language) {
    var htmlCard = `
   
    <div class="col2">
                <div class="book-info">Book Info</div>
                <table>
                    <tr>
                        <td class="book-attr">
                            Book Name
                        </td>
                        <td class="attr-val">
                            ${title}
                        </td>
                        <td class="book-attr">
                            Author
                        </td>
                        <td class="attr-val">
                            ${author}
                        </td>
                    </tr>
                    <tr>
                        <td class="book-attr">
                            Release Date
                        </td>
                        <td class="attr-val">
                            May 25th, 1996
                        </td>
                        <td class="book-attr">
                            Publisher
                        </td>
                        <td class="attr-val">
                            ${publisher}
                        </td>
                    </tr>
                    <tr>
                        <td class="book-attr">
                            Page Count
                        </td>
                        <td class="attr-val">
                            ${pages}
                        </td>
                        <td class="book-attr">
                            Maturity
                        </td>
                        <td class="attr-val">
                            ${mature}
                        </td>
                    </tr>
                    <tr>
                        <td class="book-attr">
                            Language
                        </td>
                        <td class="attr-val">
                            ${language}
                        </td>
 
                    </tr>
                </table>
                <a href="${bookLink}" class="card__link">Read Book</p>
                <br><br>
            </div>
     `
     return htmlCard;
   }