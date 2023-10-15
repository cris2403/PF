<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Game On | Index</title>
</head>
<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <a href="index.php">
				<img class="logo" src="images/LogoA.png" alt="Logo">
			</a>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-links">
            <a href="#" target="_blank">Catálogo</a>
            <a href="#" target="_blank">Carrinho</a>
            <a href="#" target="_blank">Login</a>
        </div>
    </div>

    <br>
    <br>
    <br>

    <h2 class="carousel_title">Destaques</h2>
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img class="carousel_image" src="images/dishonored.jpg">
        </div>

        <div class="mySlides fade">
            <img class="carousel_image" src="images/prey.jpg">
        </div>

        <div class="mySlides fade">
            <img class="carousel_image" src="images/war.jpeg">
        </div>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <script>
    let slideIndex = 0;
    showSlides();
    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 4000);
    }
    </script>

    
</body>
</html>