<?php
if (isset($_SESSION['result'])) {
?>
  <div id="alert">
    <span>
      <?= $_SESSION['result'] ?>
    </span>
    <span class="delAlert">×</span>
  </div>
  <script src="./js/delAlert.js"></script>
<?php
unset($_SESSION['result']);
}
