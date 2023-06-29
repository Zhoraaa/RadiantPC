window.addEventListener("DOMContentLoaded", () => {
  const elems = document.querySelectorAll(".ajax");

  const ajax = new XMLHttpRequest();
  ajax.addEventListener("load", function () {
    if (this.readyState === 4 && this.status === 200) {
      const output = document.getElementById("output") ?? (() => {
        const section = document.createElement("section");
        document.body.prepend(section);
        return section;
      })();
      output.id = "output";
      output.innerHTML = this.responseText;
    }
  });

  function loadHTML(evt) {
    evt.preventDefault();
    const link = this.getAttribute("href");
    ajax.open("GET", link, true);
    ajax.send();
    localStorage.setItem("ajax-used-to", link);
  }

  elems.forEach((elem) => elem.addEventListener("click", loadHTML));

  const needAJAX = localStorage.getItem("ajax-used-to");
  if (needAJAX) {
    ajax.open("GET", needAJAX, true);
    ajax.send();
  }

  document.addEventListener("click", (event) => {
    if (event.target.closest(".delAjax") && event.target.closest("#output")) {
      const parentBlock = event.target.closest("#output");
      parentBlock.classList.add("go-out");
      setTimeout(() => {
        parentBlock.remove();
        localStorage.clear();
      }, 300);
    }
  });
});