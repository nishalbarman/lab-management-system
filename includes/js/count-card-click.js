function cardCount(id, username) {
  let api =
    "../core/api/count-card-click.php?file_id=" + id + "&user=" + username;
  fetch(api)
    .then((res) => res.json())
    .then((data) => {});
}
