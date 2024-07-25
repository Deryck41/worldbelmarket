const a = new URLSearchParams(document.location.search.replace("?", ""));

fetch("/view-detail.php", {
  method: "POST",
  body: JSON.stringify({ id: a.get("id"), style: "view-detail" }),
})
  .then((response) => response.text())
  .then((data) => {
    document.querySelector(".content").innerHTML = data;
  });
