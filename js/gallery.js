      var slideIndex = 1;
      showSlides(slideIndex);
      
      function plusSlides(n) {
        showSlides(slideIndex += n);
      }
      
      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
      }
      var slideIndex = 1;
      showSlides1(slideIndex);
      
      function plusSlides1(n) {
        showSlides1(slideIndex += n);
      }
      
      function showSlides1(n) {
        var i;
        var slides1 = document.getElementsByClassName("mySlides1");
        if (n > slides1.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides1.length}
        for (i = 0; i < slides1.length; i++) {
            slides1[i].style.display = "none";
        }
        slides1[slideIndex-1].style.display = "block";
      }
      var slideIndex = 1;
      showSlides2(slideIndex);
      
      function plusSlides2(n) {
        showSlides2(slideIndex += n);
      }
      
      function showSlides2(n) {
        var i;
        var slides2 = document.getElementsByClassName("mySlides2");
        if (n > slides2.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides2.length}
        for (i = 0; i < slides2.length; i++) {
            slides2[i].style.display = "none";
        }
        slides2[slideIndex-1].style.display = "block";
      }
      var slideIndex = 1;
      showSlides3(slideIndex);
      
      function plusSlides3(n) {
        showSlides3(slideIndex += n);
      }
      
      function showSlides3(n) {
        var i;
        var slides3 = document.getElementsByClassName("mySlides3");
        if (n > slides3.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides3.length}
        for (i = 0; i < slides3.length; i++) {
            slides3[i].style.display = "none";
        }
        slides3[slideIndex-1].style.display = "block";
      }