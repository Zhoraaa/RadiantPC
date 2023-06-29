<div id="first-content-on-page" class="product-info inner-shadow brad20 p20 flex g20 jc-sa wrap">
  <div id="poster">
    <img src="../img/products/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
  </div>
  <div class="flex column g20">
    <h1><?= $product['name'] ?></h1>
    <div id="summary-info" class="flex column g10">
      <div> <span>Компания-производитель: </span> <span class="ctrl-r"><?= $product['company'] ?></span> </div>
      <div> <span>Тип: </span> <span class="ctrl-r"><?= $product['type'] ?></span> </div>
      <div> <span>Дата релиза: </span> <span><?php echo date("d.m.Y", strtotime($product['create_date'])); ?></span> </div>
      <?php
      $query = "SELECT COUNT(*) AS `count` FROM instances WHERE instances.`status` = 1 AND instances.product = " . $product['id'];
      $check = selectFrom($query, "ONE");
      ?>
      <div> <span>Доступно: </span> <span class="ctrl-r"><?= $check['count'] ?></span> </div>
    </div>
    <div class="btns">
      <?php 
      $query = "SELECT `id` FROM instances WHERE instances.`status` = 1 AND instances.`product` = '" . $_GET['id'] . "' LIMIT 1";
      $edit = selectFrom($query, "ONE");
      ?>
      <a href="/admin.php?edit=instance&id=<?= $edit['id'] ?>" class="radius accent">Редактировать экземпляр</a>
      <a href="../catalogue.php" class="pad10 radius accent">Назад</a>
    </div>
  </div>
</div>