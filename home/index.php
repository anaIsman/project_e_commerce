<!DOCTYPE html>
<html lang="fr">

<?php include_once('../components/head.php')
?>


<body>

  <div class="hero_area">
    <?php require_once('../components/menu.php') ?>

    <section class=" slider_section position-relative">
      <div class="number-box">
        <hr>
        <div class="social_box">
          <a href="">
            <img src="../assets/front-img/fb.png" alt="">
          </a>
          <a href="">
            <img src="../assets/front-img/twitter.png" alt="">
          </a>
          <a href="">
            <img src="../assets/front-img/insta.png" alt="">
          </a>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="detail-box">
                    <div class="indicator_number">
                      01
                    </div>
                    <h2>
                      brand
                    </h2>
                    <h1>
                      of fashion
                    </h1>
                    <div>
                      <a href="">
                        Buy Now
                      </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                  <div class="detail-box">
                    <div class="indicator_number">
                      02
                    </div>
                    <h2>
                      brand
                    </h2>
                    <h1>
                      of fashion
                    </h1>
                    <div>
                      <a href="">
                        Buy Now
                      </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                  <div class="detail-box">
                    <div class="indicator_number">
                      03
                    </div>
                    <h2>
                      brand
                    </h2>
                    <h1>
                      of fashion
                    </h1>
                    <div>
                      <a href="">
                        Buy Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="sr-only">Next</span>
              </a>
            </div>

          </div>
        </div>
      </div>
    </section>
    <section class="category_section ">
      <div class="container">
        <div class="category_container">
          <div class="box">
            <a href="" class="active">
              <div class="img-box">
                <img src="../assets/front-img/fashion.png" alt="" class="img-1">
                <img src="../assets/front-img/fashion-yellow.png" alt="" class="img-2">
              </div>
              <h6>
                New Fashion
              </h6>
            </a>
          </div>
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="../assets/front-img/clothing.png" alt="" class="img-1">
                <img src="../assets/front-img/clothing-yellow.png" alt="" class="img-2">
              </div>
              <h6>
                Clothing
              </h6>
            </a>
          </div>
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="../assets/front-img/watch.png" alt="" class="img-1">
                <img src="../assets/front-img/watch-yellow.png" alt="" class="img-2">
              </div>
              <h6>
                Watches
              </h6>
            </a>
          </div>
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="../assets/front-img/accessory.png" alt="" class="img-1">
                <img src="../assets/front-img/accessory-yellow.png" alt="" class="img-2">
              </div>
              <h6>
                Accessories
              </h6>
            </a>
          </div>
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="../assets/front-img/jacket.png" alt="" class="img-1">
                <img src="../assets/front-img/jacket-yellow.png" alt="" class="img-2">
              </div>
              <h6>
                Sweaters & Jackets
              </h6>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- end category section -->

    <!-- shop section -->

    <section class="shop_section layout_padding-top layout_padding2-bottom">
      <div class="container-fluid">
        <div class="custom_heading">
          <h4>
            01
          </h4>
          <hr>
          <h3>
            Shop The Latest
          </h3>
        </div>
        <div class="shop_content">
          <div class="shop_heading">
            <h4>
              Man Fashions
            </h4>
            <a href="">
              See More
            </a>
          </div>
          <div class="shop_container" id="shop_container">


          </div>
        </div>

      </div>
    </section>
    <?php include_once('../components/footer.php')
    ?>

  </div>


</body>
<?php include_once('../components/footer_script.php')
?>

</html>