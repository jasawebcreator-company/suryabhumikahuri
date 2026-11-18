</div>

<?php include "footer_component.php" ?>
<?php include "footer_metadata.php" ?>

<script>
  document.querySelectorAll('.child-toggle').forEach(function (toggle) {
    toggle.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();

      const submenu = this.parentElement.querySelector('.child-menus');

      if (submenu) {
        submenu.classList.toggle('show-child-menus');
      }
    });
  });
</script>

<?= $func->xview_footer() ?>

</body>

</html>
