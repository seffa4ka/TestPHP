<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="/css/global.css" rel="stylesheet">
</head>
<body>
  <script src="/js/common.js"></script>
  <main>
    <?php
    foreach ($items as $item) {
    ?>
      <h1><?php echo $item->title ?></h1>
      <div><?php echo $item->text ?></div>
      <small><?php echo $item->date ?></small>
    <?php
    }
    ?>
  </main>
</body>
</html>
