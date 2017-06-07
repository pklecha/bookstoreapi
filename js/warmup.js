/**
 * Created by pawelklecha on 07/06/2017.
 */
function warmUp() {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4) {
            if ((ajax.status >= 200 && ajax.status < 300) || ajax.status === 304) {
                var currentDate = document.querySelector(".current-date");
                var currentTime = document.querySelector(".current-time");
                var response = JSON.parse(ajax.response);
                currentDate.innerHTML = response.date;
                currentTime.innerHTML = response.time;
                console.log(response)
            } else {
                console.log("Error " + ajax.status)
            }
        }
    };

    ajax.open('get', 'http://date.jsontest.com', true);
    ajax.send(null);
}

function warmUp2() {
    var ajax = new XMLHttpRequest();
    var dumpster = document.querySelector(".warmup2");
    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4) {
            if ((ajax.status >= 200 && ajax.status < 300) || ajax.status === 304) {
                var data = JSON.parse(ajax.responseText);
                var list = document.createElement("ul");
                list.classList.add("list-group");
                for (el in data) {
                    var listItem = document.createElement("li");
                    listItem.classList.add("list-group-item");
                    listItem.innerHTML = el;
                    listItem.style.color = data[el];
                    list.appendChild(listItem);
                }
                dumpster.appendChild(list);
                console.log(data);

            } else {
                console.log("Could not retrieve data: " + ajax.status);
            }
        }
    };

    ajax.open('get', 'warmup2.php', true);
    ajax.setRequestHeader('X_REQUESTED_WITH', 'xmlhttprequest');
    ajax.send(null);

}