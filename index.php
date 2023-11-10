<link rel="stylesheet" href="./css/home.css">
<?php
include_once('./nav.php');
include './classes/recent__project.php';
$projects = new Recent_project();
$project = $projects->project();
?>
<div class="background-img"></div>
<section class="carousel">
  <img class="img-1 show" src="./images/1st-Banner.png" alt="1st-pic">
  <img class="img-2" src="./images/2nd-Banner-scaled.jpg" alt="2nd-pic">
  <img class="img-3" src="./images/3rd-Banner-scaled.jpg" alt="3rd-pic">
  <article class="content-1 show">
    <h1>Advanced Builders<br><span> & Contractors</span></h1>
  </article>
  <article class="content-2">
    <h1>Home of <br><span>your dreams.</span></h1>
  </article>
  <article class="content-3">
    <h1>satisfy your<br><span>tastes</span></h1>

  </article>
  <div class="media-icons">
    <a href="https://www.facebook.com/profile.php?id=100064381440771" target="_blank"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.instagram.com/tawakolgroup/" target="_blank"><i class="fab fa-instagram"></i></a>
  </div>
</section>

<section class="hidden your-vision">
  <header>
    <h1> Our Vision <span>
        <div class="🧱"></div> Bring Your Dream Home to Life.
      </span> </h1>
  </header>
  <p>Tawakol Group's goal is to simplify the contracting process and make it accessible to everyone
    By providing helpful guides and tips on the renovation process.
    As giving diffrent styles,and designs .
    And connecting clients with contractors for construction projects of any size.We want to make it easy for clients to find
    to find the right contractor/Interior Designer and for contractors to showcase their skills and grow their businesses.
  </p>
  <p> We simply love what we do, we take pride in making our clients happy, and we let our reviews speak for
    themselves.</p>
</section>

<section class="hidden about-us">
  <header>
    <h1> Our Story & Process</h1>
  </header>
  <p> Tawakol Group website is meant to
    Bring Your Dream Home to Life.
    <br>
    Tawakol group established in 2023
  </p>


  <a href="#"> Read More <i class="fa-solid fa-arrow-right"></i> </a>
</section>

<section class="hidden service">
  <header>
    <h1> Services </h1>
  </header>
  <p> Transform your vision into reality with our top-rated
    team that prioritizes quality, safety, and efficiency,
    tailored to your specific needs and preferences. </p>
  <div class="cards">
    <div class="hidden card"> <i class="fa-solid fa-house"></i>
      <h3> Finshing </h3>
      <p> Get the perfect Contracting process for your project with our expert
        contractors , ensuring flawless result every time.</p> <a href=""></a>
    </div>
    <div class="hidden card"> <i class="fa-solid fa-fill-drip"></i>
      <h3> Renovation </h3>
      <p> Our Contractors will Revive and refresh your space ,
        breathing new life into any room and maximizing its potential. </p> <a href=""></a>
    </div>
    <div class="hidden card">
      <i class="fa-solid fa-house"></i>
      <h3> Interior designer </h3>
      <p> Transform your space with our inspired interior
        designers,combining style and functionality for a truly personalized look.</p> <a href=""></a>
    </div>
  </div>
</section>

<section class=" recent__projects">
  <header>
    <h1>Recent Projects</h1>
  </header>
  <div class="hidden projects__container">
    <?php
    if ($project->rowCount() > 0) {
      while ($row = $project->fetch()) {
    ?>
        <div class="project__img">
          <?php echo '<img src="./uploadImg/' . $row['theme1'] . '"> '; ?>
          <a href="./worker.php?id=<?php echo $row['worker_ID']; ?>">
            <img class="profile" src="<?php echo './uploadImg/' . $row['profile_img']; ?>" alt="<?php echo $row['worker_fname']; ?>">
            Worker name: <?php echo $row['worker_fname']; ?>
          </a>
        </div>
    <?php }
      $project = null;
      $row = null;
    } else {
      echo 'error';
      $project = null;
      $row = null;
    }

    ?>
  </div>
</section>

<section class="faq">
  <header>
    <h1>FAQ</h1>
  </header>

  <div class="hidden question-container">
    <div class="question-box">
      <h3>What is Tawakol Group?</h3>
      <div class="answer">
        <p>Tawakol Group simplifies finding reliable contractors, interior designers, and suppliers
          while inspiring homeowners with contemporary themes and trendy styles for innovative home design ideas.</p>
      </div>
    </div>
    <div class="question-box">
      <h3>Is Tawkol group Free to use ?</h3>
      <div class="answer">
        <p>Tawakol Group offers a free registration process for both clients and contractors/interior designers.
          However, our company earns a 5%commission from the total project cost as compensation for our services.</p>
      </div>
    </div>
    <div class="question-box">
      <h3>What services does Tawakol Group offer?</h3>
      <div class="answer">
        <p>Tawakol Group provides all-inclusive services for home finishing needs, including a gallery of the
          latest design trends, a
          curated list of reliable contractors and workers, and trusted suppliers, In Egypt all in one convenient Website.</p>
      </div>
    </div>
    <div class="question-box">
      <h3>How Much it cost to renovate the home?</h3>
      <div class="answer">
        <p>The cost of renovating a home varies depending on factors such as the home's size, extent of renovations,
          materials used, and location.
          For a personalized cost estimate, please contact Tawakol Group..</p>
      </div>
    </div>
  </div>
</section>
<script src="./js/home.js" defer></script>

<?php
include_once('./footer.php');
?>