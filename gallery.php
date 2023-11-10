<link rel="stylesheet" href="./css/gallery.css">
<?php  
include_once('./nav.php');
?>
  <div class="Portfolio">
    <h1>Gallery</h1>
  </div>
  <ul class="categories">
    <li><a  class="active" href="./gallery.php">All</a></li>
    <li><a href="./floor.php">Floor</a></li>
    <li><a href="./roof.php">Roof</a></li>
    <li><a href="./washrooms.php">Washrooms</a></li>
    <li><a href="./garden.php">Garden</a></li>
  </ul>
  <section class="Floor">
    <div class="floor-cont">
      <article>
        <a href="./floor.php"></a>
        <h2> Floors </h2>
      </article>
      <div class="slideshow-container">
        <div class="mySlides fade">
          <img src="./img/floor/floor7.jpg" style="width:100% ; height: 100%">
        </div>
        <div class="mySlides fade">
          <img src="./img/floor/floor1.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides fade">
          <img src="./img/floor/floor2.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides fade">
          <img src="./img/floor/floor3.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides fade">
          <img src="./img/floor/floor4.jpg" style="width:100% ; height:500px">
        </div>
        <div class="mySlides fade">
          <img src="./img/floor/floor5.jpg" style="width:100% ; height:500px">
        </div>
        <div class="mySlides fade">
          <img src="./img/floor/floor6.jpg" style="width:100% ; height:100%">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
    </div>
  </section>
  <section class="roof">
    <div class="roof-cont">
      <div class="slideshow-container">
        <div class="mySlides1 fade">
          <img src="./img/roof/roof26.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides1 fade">
          <img src="./img/roof/roof27.png" style="width:100% ; height:100%">
        </div>

        <div class="mySlides1 fade">
          <img src="./img/roof/roof28.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides1 fade">
          <img src="./img/roof/roof29.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides1 fade">
          <img src="./img/roof/roof30.jpg" style="width:100% ; height:500px">
        </div>
        <div class="mySlides1 fade">
          <img src="./img/roof/roof31.jpg" style="width:100% ; height:500px">
        </div>
        <div class="mySlides1 fade">
          <img src="./img/roof/roof7.jpg" style="width:100% ; height:100%">
        </div>

        <a class="prev" onclick="plusSlides1(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides1(1)">&#10095;</a>
      </div>
      <article>
        <a href="./roof.php"></a>
        <h2> Roof </h2>
      </article>
    </div>
  </section>
  <section class="bath">
    <div class="bath-cont">
      <article>
        <a href="./washrooms.php"></a>
        <h2> Washrooms </h2>
      </article>
      <div class="slideshow-container">
        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash1.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash2.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash3.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash4.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash8.jpg" style="width:100% ; height:500px">
        </div>
        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash6.jpg" style="width:100% ; height:500px">
        </div>
        <div class="mySlides2 fade">
          <img src="./img/washrooms/wash7.jpg" style="width:100% ; height:100%">
        </div>

        <a class="prev" onclick="plusSlides2(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides2(1)">&#10095;</a>
      </div>

    </div>
  </section>
  <section class="garden">
    <div class="garden-cont">
      <div class="slideshow-container">
        <div class="mySlides3 fade">
          <img src="./img/garden/garden1.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides3 fade">
          <img src="./img/garden/garden2.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides3 fade">
          <img src="./img/garden/garden3.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides3 fade">
          <img src="./img/garden/garden4.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides3 fade">
          <img src="./img/garden/garden5.jpg" style="width:100% ; height:100%">
        </div>

        <div class="mySlides3 fade">
          <img src="./img/garden/garden6.jpg" style="width:100% ; height:100%">
        </div>
        <div class="mySlides3 fade">
          <img src="./img/garden/garden7.jpg" style="width:100% ; height:100%">
        </div>

        <a class="prev" onclick="plusSlides3(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides3(1)">&#10095;</a>
      </div>
      <article>
        <a href="./garden.php"></a>
        <h2> Garden </h2>
      </article>
    </div>
  </section>
  <script src="./js/gallery.js"></script>
  <?php 
include_once('./footer.php');
?>