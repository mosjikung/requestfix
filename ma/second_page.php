<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Request Fix</title>
  </head>
  <body>
    <html>
    <head>
    
      <script type="text/javascript" src="list.js "></script>
      <link rel="stylesheet" href="style.css">

        <div class="wrapper">
          <div class="container">
            <h1>เลือกใช้บริการฝ่าย</h1>
            

                <form method="get" action="third_page.php">
                <button type="submit">IT</button>
                </form>
                <form method="get" action="third_page_ma.php">
                <button type="submit">maintenance</button>
                </form>
              
           
              <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>

        </ul> 

          </div>
        </div>
        <?php
        print_r($_POST);
        ?>
       
    </head>
    </html>


  </body>
</html>
