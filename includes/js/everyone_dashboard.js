const search = document.querySelector("#search-input");
let email = window.localStorage.getItem("email");

let prevValue;
let value;
let users = [];

search.addEventListener("input", (e) => {
  value = e.target.value.toLowerCase();
  console.log(value);

  users.forEach((user) => {
    let t = user.title.toLowerCase();
    let s = user.keywords.toLowerCase();

    const isVisible = t.includes(value) || s.includes(value);

    isVisible
      ? user.element.classList.remove("hide")
      : user.element.classList.add("hide");
  });
});

getMenu();

// New menu template style
function getMenu() {
  const menuTemplate = document.querySelector("[data-menu-template]"); // The template we want to copy
  const menuCards = document.querySelector("[menu-cards]"); // The section in which we want to integrate
  fetch(BASE_URL + "/core/api/get-partial-cards.php")
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
      if (data.length === 0) {
        document.getElementById("no-data").style.display = "block";
        return;
      }
      users = data.map((user) => {
        const menu = menuTemplate.content.cloneNode(true).children[0];

        const title = menu.querySelector("[card-title]");
        const price = menu.querySelector("[card-price]");
        const cardbg = menu.querySelector("[data-card-bg]");
        const button = menu.querySelector("[card-btn-text]");
        const bottom = menu.querySelector("[card-bottom-white]");
        const cardReg = menu.querySelector("[card-count]");
        cardReg.setAttribute(
          "onclick",
          "cardCount(" +
            user.id +
            ", '" +
            email +
            "', '../templates/srvc-fill/" +
            user.url +
            ".php')"
        );

        let color =
          "linear-gradient(to bottom, " +
          user.color_f +
          ", " +
          user.color_s +
          ")";

        cardbg.style.backgroundImage = color;
        // console.log(color);
        title.textContent = user.cardname;
        price.textContent = "Rs. " + user.price + " /-";
        button.style.color = user.color_f;
        button.innerHTML =
          "<a style='text-decoration: none; color:" +
          user.color_f +
          " ;' href='../templates/" +
          user.url +
          "'>" +
          user.btn_name +
          "</a>";
        bottom.setAttribute(
          "onclick",
          "window.location = '../templates/" + user.url + ".php'"
        );

        // button.textContent = user.btn_name;
        // button.setAttribute("onclick", "redirectTemplate(" + +")");
        menuCards.appendChild(menu);
        return {
          title: user.cardname,
          cardbg: user.cardbg,
          keywords: user.keywords,
          element: menu,
        };
      });
    });
}

function buyFood(id) {
  let loggedin = "<?php echo $_SESSION['logged']?>";
  if (loggedin === "" && loggedin !== true) {
    alert("Need to be logged in to place an order.");
  } else {
    window.location = "../../templates/" + id + ".php";
  }
}
