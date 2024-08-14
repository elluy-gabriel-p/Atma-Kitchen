<!DOCTYPE html>
<html lang="en">

<head>
    <title>Atma Kithen</title>
    @include('templateUser.head')
</head>

<body>

    <!-- header -->
    @include('templateUser.navbar')
    <!-- header end -->

    <!-- shopping cart -->
    @include('templateUser.shoppingCart')
    <!-- shopping cart end-->

    <!-- home -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide" style="background: url(images/slider1.jpg) no-repeat;">
                    <div class="content">
                        <h3>we bake the world a better place</h3>
                        <a href="#" class="btn"> get started </a>
                    </div>
                </div>

                <div class="swiper-slide slide" style="background: url(images/slider2.jpg) no-repeat;">
                    <div class="content">
                        <h3>we bake the world a better place</h3>
                        <a href="#" class="btn"> get started </a>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- home section ends -->

    <!-- banner -->

    <section class="banner">
        <img src="images/banner.png" alt="">
    </section>


    <!-- banner end-->

    <!-- about us -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="row">

            <div class="image">
                <img src="images/about.png" alt="">
            </div>

            <div class="content">
                <h3>good things come to those <span>who bake </span> for others</h3>
                <p>Memakan kue adalah sebuah perjalanan rasa yang memanjakan lidah, Setiap gigitan membawa ke dalam
                    dunia fantasi, Dimana rasa manis, gurih, dan lembut berdansa bersama.

                    Ketika kue menyentuh lidah, detik itu juga, Semesta seakan berhenti, dan waktu menjadi abadi, Rasa
                    coklat yang lembut, krim yang manis, Semuanya berpadu sempurna, menciptakan simfoni di mulut.

                    Setiap lapisan kue membawa cerita, Cerita tentang cinta, kasih sayang, dan kebahagiaan, Oh, betapa
                    indahnya kenikmatan memakan kue, Sebuah pengalaman yang selalu membuat kita ingin kembali lagi dan
                    lagi.</p>
                <p>cake is a special food for us to enjoy life and make our life sweeter!</p>
                <a href="#" class="btn">read more</a>
            </div>

        </div>

    </section>


    <!-- about us end-->

    <!-- gallery -->

    <section class="gallery" id="gallery">

        <h1 class="heading">our <span> gallery</span></h1>

        <div class="gallery-container">

            <a href="images/gallery1.jpg" class="box">
                <img src="images/gallery1.jpg" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery2.jpg" class="box">
                <img src="images/gallery2.jpg" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery3.jpg" class="box">
                <img src="images/gallery3.jpg" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery4.jpg" class="box">
                <img src="images/gallery4.jpg" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery5.jpg" class="box">
                <img src="images/gallery5.jpg" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>

            <a href="images/gallery6.jpg" class="box">
                <img src="images/gallery6.jpg" alt="">
                <div class="icons"><i class="fas fa-plus"></i></div>
            </a>

        </div>

    </section>

    <!-- gallery end -->

    <!-- weekly promotions -->

    <section class="promotion">

        <h1 class="heading">weekly <span>promotions</span></h1>

        <div class="box-container">

            <div class="box">
                <div class="content">
                    <h3>chocolate cake</h3>
                    <p>Bagai permata hitam yang berkilau, Dibungkus dalam balutan cinta dan kasih sayang, Membawa
                        kebahagiaan di setiap gigitan.</p>
                </div>

                <img src="images/promotion1.png" alt="">
            </div>

            <div class="box">
                <img src="images/promotion2.png" alt="">
                <div class="content">
                    <h3>nut cake</h3>
                    <p>Sebuah simfoni rasa yang tak terlupakan, Coklat lembutmu berpadu dengan kacang yang renyah,
                        Menciptakan harmoni dalam setiap gigitan.</p>
                </div>

            </div>

        </div>

    </section>

    <!-- weekly promotions ends -->

    <!-- parallax -->

    <section class="parallax" id="parallax">

        <h1 class="heading">range of <span>products</span></h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/parallax-1.png" alt="">
                </div>
                <div class="content">
                    <h3>bread</h3>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/parallax-2.png" alt="">
                </div>
                <div class="content">
                    <h3>cakes</h3>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/parallax-3.png" alt="">
                </div>
                <div class="content">
                    <h3>donuts</h3>
                </div>
            </div>

        </div>

    </section>

    <!-- parallax -->


    <!-- footer -->
    @include('templateUser.footer')
    <!-- footer ends -->

    @include('templateUser.script')
</body>

</html>
