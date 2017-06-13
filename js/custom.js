/**
 * Created by pawelklecha on 07/06/2017.
 */

document.addEventListener('DOMContentLoaded', function () {

   generateHeaders();

   document.querySelector("#add-book").addEventListener("submit", addBook);

});

function generateHeaders() {

    var loadAll = new XMLHttpRequest();
    loadAll.onreadystatechange = function () {
        if (loadAll.readyState === 4) {
            if (loadAll.status >= 200 && loadAll.status < 300) {
                var contentArea = document.querySelector(".main-content");
                var books = JSON.parse(loadAll.responseText);
                for (var i in books) {
                    var bookArea = document.createElement("div");
                    bookArea.classList.add("panel", "panel-default");
                    var bookAreaTitleBlock = document.createElement("div");
                    bookAreaTitleBlock.classList.add("panel-heading");
                    bookArea.appendChild(bookAreaTitleBlock);
                    var bookAreaTitle = document.createElement("h3");
                    bookAreaTitle.classList.add("panel-title");
                    bookAreaTitleBlock.appendChild(bookAreaTitle);
                    var bookAreaTitleLink = document.createElement("a");
                    bookAreaTitleLink.classList.add("book-title");
                    bookAreaTitleLink.dataset.bookId = i;
                    bookAreaTitleLink.innerHTML = books[i];
                    bookAreaTitleLink.setAttribute("href", "api/books.php?id=" + i);
                    bookAreaTitle.appendChild(bookAreaTitleLink);
                    var detailsArea = document.createElement("div");
                    detailsArea.classList.add("panel-body", "hidden");
                    bookArea.appendChild(detailsArea);
                    contentArea.appendChild(bookArea);
                }
                detailsListeners();
            }
        }
    };
    loadAll.open('get', 'api/books.php', true);
    loadAll.setRequestHeader('THIS_IS_AJAAAAAX', 'xmlhttprequest');
    loadAll.send(null);

}

function detailsListeners() {
    var bookDetailsLink = document.querySelectorAll(".book-title");
    Array.prototype.forEach.call(bookDetailsLink, function (el) {
        el.addEventListener("click", function (e) {
            e.preventDefault();
            if (!el.parentNode.parentNode.parentNode.querySelector(".panel-body p")) {
                var bookDetails = new XMLHttpRequest();
                bookDetails.onreadystatechange = function () {
                    if (bookDetails.readyState === 4) {
                        if (bookDetails.status >= 200 && bookDetails.status < 300) {
                            var detailsArea = el.parentElement.parentElement.parentElement.querySelector(".panel-body");
                            var details = JSON.parse(bookDetails.responseText);
                            var bookId = document.createElement("p");
                            bookId.innerHTML = "<strong>Id:</strong> " + details['id'];
                            var bookTitle = document.createElement("p");
                            bookTitle.innerHTML = "<strong>Title:</strong>" + details['title'];
                            var bookAuthor = document.createElement("p");
                            bookAuthor.innerHTML = "<strong>Author:</strong> " + details['author'];
                            var bookDescription = document.createElement("p");
                            bookDescription.innerHTML = "<strong>Description:</strong> " + details['description'];
                            var bookISBN = document.createElement("p");
                            bookISBN.innerHTML = "<strong>ISBN:</strong> " + details['isbn'];
                            detailsArea.appendChild(bookId);
                            detailsArea.appendChild(bookTitle);
                            detailsArea.appendChild(bookAuthor);
                            detailsArea.appendChild(bookDescription);
                            detailsArea.appendChild(bookISBN);
                            detailsArea.classList.remove("hidden");
                            var editBtn = document.createElement("a");
                            editBtn.classList.add("btn", "btn-primary", "btn-details", "editBtn");
                            editBtn.dataset.toggle = "modal";
                            editBtn.dataset.target = "#addEditModal";
                            editBtn.innerHTML = "Edit";
                            var delBtn = document.createElement("a");
                            delBtn.classList.add("btn", "btn-danger", "btn-details", "delBtn");
                            delBtn.dataset.toggle = "modal";
                            delBtn.dataset.target = "#delModal";
                            delBtn.innerHTML = "Delete";
                            detailsArea.appendChild(editBtn);
                            detailsArea.appendChild(delBtn);

                        }
                    }
                };
                bookDetails.open('get', 'api/books.php?id=' + el.dataset.bookId, true);
                bookDetails.setRequestHeader('THIS_IS_AJAAAAAX', 'xmlhttprequest');
                bookDetails.send(null);
            } else {
                var details = el.parentNode.parentNode.parentNode.querySelectorAll("p");
                Array.prototype.forEach.call(details,function (el) {
                    el.parentNode.removeChild(el);
                });
                el.parentNode.parentNode.parentNode.querySelector(".panel-body").classList.add("hidden");
            }

        })
    })
}

function editBook() {
    console.log("Event triggered")
}

function addBook(e) {
    e.preventDefault();
    var bookTitle = document.getElementById("add-title").value;
    var bookAuthor = document.getElementById("add-author").value;
    var bookIsbn = document.getElementById("add-isbn").value;
    var bookDescription = document.getElementById("add-description").value;

    var messageBox = document.getElementById("message-box");
    messageBox.classList.remove("alert-danger");
    messageBox.classList.remove("alert-success");
    messageBox.classList.add("hidden");

    var addNewBook = new XMLHttpRequest();

    addNewBook.onreadystatechange = function () {
       if (addNewBook.readyState === 4) {
           if (addNewBook.status >= 200 && addNewBook.status < 300) {
               if (addNewBook.responseText == "Success") {
                   document.querySelector(".main-content").innerHTML = "";
                   bookTitle = "";
                   bookAuthor = "";
                   bookIsbn = "";
                   bookDescription = "";
                   messageBox.classList.remove("hidden");
                   messageBox.classList.add("alert-success");
                   messageBox.innerHTML = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>New book has been added";
                   $('#addModal').modal('hide');
                   generateHeaders();
               } else {
                   messageBox.classList.remove("hidden");
                   messageBox.classList.add("alert-danger");
                   messageBox.innerHTML = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
                   $('#addModal').modal('hide');
                   var errorMessage = JSON.parse(addNewBook.responseText);
                   var errorMessageView = document.createElement("ul");
                   for (var i in errorMessage) {
                       var li = document.createElement("li");
                       li.innerHTML = errorMessage[i];
                       errorMessageView.appendChild(li);
                   }
                   messageBox.appendChild(errorMessageView);
                   console.log(addNewBook.responseText);
               }
           }
       }
    };

    var params = "add-title=" + bookTitle + "&add-author=" + bookAuthor + "&add-isbn=" + bookIsbn + "&add-description=" + bookDescription;

    addNewBook.open('post', 'api/books.php', true);
    addNewBook.setRequestHeader('THIS_IS_AJAAAAAX', 'xmlhttprequest');
    addNewBook.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    addNewBook.send(params);

}