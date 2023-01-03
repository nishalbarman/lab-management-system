function cardCount(id, username, url) {
  let api =
    BASE_URL +
    "/core/api/count-card-click.php?file_id=" +
    id +
    "&user=" +
    username;
  fetch(api)
    .then((res) => res.json())
    .then((data) => {
      console.log(data);
    });
  window.location = url;
}
