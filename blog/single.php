<?php include("path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');

if (isset($_GET['id'])) {
  $post = selectOne('posts', ['id' => $_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styling -->
  <link rel="stylesheet" href="assets/css/style.css">

  <title><?php echo $post['title']; ?> | AwaInspires</title>
</head>

<body>
  <!-- Facebook Page Plugin SDK -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://www.facebook.com/formedia/blog">
  </script>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <!-- Page Wrapper -->
  <div class="page-wrapper">

    <!-- Content -->
    <div class="content clearfix">

      <!-- Main Content Wrapper -->
      <div class="main-content-wrapper">
        <div class="main-content single">
          <h1 class="post-title"><?php echo $post['title']; ?></h1>

          <div class="post-content">
            <?php echo html_entity_decode($post['body']); ?>
          </div>

        </div>
      </div>
      <!-- // Main Content -->

      <!-- Sidebar -->
      <div class="sidebar single">

        <div style="position:relative; top:9px; left:2px;height:50px;border-radius:8px; width:225px">
 
               
            <a href="#" class="btn1 add-to-fav" data-article-id="<?php echo $post['id']; ?>">Add to Favourites</a>
      
    
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-fav').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var articleId = this.getAttribute('data-article-id');
                    
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'favourites.php?id=' + article_id, true);
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            alert(xhr.responseText);
                        } else {
                            alert('Request failed. Returned status of ' + xhr.status);
                        }
                    };
                    xhr.send();
                });
            });
        });
    </script>

        <div class="section popular">
          <h2 class="section-title">Popular</h2>

          <?php foreach ($posts as $p): ?>
            <div class="post clearfix">
              <img src="<?php echo BASE_URL . '/assets/images/' . $p['image']; ?>" alt="">
              <a href="" class="title">
                <h4><?php echo $p['title'] ?></h4>
              </a>
            </div>
          <?php endforeach; ?>
          

        </div>

        <div class="section topics">
          <h2 class="section-title">Topics</h2>
          <ul>
            <?php foreach ($topics as $topic): ?>
              <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name'] ?>"><?php echo $topic['name']; ?></a></li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
      <!-- // Sidebar -->

    </div>
    <!-- // Content -->

  </div>
  <!-- // Page Wrapper -->

  <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Slick Carousel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/scripts.js"></script>

</body>

</html>