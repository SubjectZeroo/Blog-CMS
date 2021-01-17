
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});



$(document).ready(function() {

  ClassicEditor
        .create( document.querySelector( '#editorCreate' ) )
        .catch( error => {
            console.error( error );
        } );
});

$(document).ready(function() {

  ClassicEditor
        .create( document.querySelector( '#editorEdit' ) )
        .catch( error => {
            console.error( error );
        } );
});

function handleModals() {

  var modalTriggers = document.querySelectorAll(".modal-trigger");
  for (i = 0; i < modalTriggers.length; i++) {

    modalTriggers[i].addEventListener("click", function () {
      var target = this.dataset.modal;
      console.log(target);
      var targetContent = document.querySelector(
        '.modal[data-modal="' + target + '"]'
      );
      targetContent.classList.add("is-active");
    });
  }
  var modelClose = document.querySelectorAll(".modal-background,.delete");
  for (i = 0; i < modelClose.length; i++) {
    modelClose[i].addEventListener("click", function () {
      var parentModal = this.closest(".modal");
      parentModal.classList.remove("is-active");
    });
  }
}
handleModals();
