window.addEventListener("DOMContentLoaded", function (event) {
  let deleters = this.document.querySelectorAll(".delAlert");

  function delParent(deleter) {
    var parent = deleter.parentElement;
    deleter.addEventListener("click", function () {
      parent.classList.add("go-out");
      setTimeout(() => {
        parent.remove();
      }, 300);
    });
  }

  this.setInterval(() => {
    if (deleters) {
      deleters.forEach((deleter) => {
        delParent(deleter);
      });
    }
  }, 100);
});
