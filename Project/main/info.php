<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css%20en%20java/styling.scss">
    <title>Garage Ertan</title>

</head>
<body>

<div class="topnav">
    <a class="active" href="../index.php">Home</a>
    <a href="info.php"><strong>Over ons</strong></a>
    <a href="contact.php">contact</a>
    <a href="../login/index.php">login</a>
    <a href="../afspraken/AfspraakRegistration.php">afspraken</a>
</div>

<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="image/garage1.jpg" style="width:100%" alt="">
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="image/gargageErtan.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="image/automonteur.jpg" style="width:100%" alt="">
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>
<br>
<h2 class="text5">wie zijn wij</h2>
<br>
<p class="text6">Garage Ertan is een bedrijf dat in delfshaven zit. het is een bedrijf die auto's een apk geven of auto's die
een reperatie nodig hebben het bedrijf werkt zo wel voor particuliere klanten en ook voor zakelijke klanten.
Het bedrijf werkt ook voor schade bedrijven daar krijgen ze ook de meeste opdrachten van. Garage Ertan is ook
bevoegd om stagairs opteleiden zo hebben zij een aantal stagairs werken in hun werkplaats maar zij hebbn ook heel
erg veel stagair hun diploma laten halen omdat ze bij hun als stagair moechten werken al met al er zij hele goede
resultaen geboekt.</p>
<br>
<h2 class="text7">Openingstijden</h2>
    <div class="text8">
        <ul>
            <li><strong>Openingstijden</strong></li>
            <li>Maandag: 9:00 t/m 18:00</li>
            <li>dinsdagdag: 9:00 t/m 18:00</li>
            <li>Woensdag: 9:00 t/m 18:00</li>
            <li>Donderdag: 9:00 t/m 18:00</li>
            <li>vrijdag: 9:00 t/m 17:00</li>
            <li>zaterdag: <strong>Gesloten</strong></li>
            <li>zondagdag:<strong>Gesloten</strong></li>
        </ul>
    </div>>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
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
        setTimeout(showSlides, 5000); // Change image every 2 seconds
    }
</script>

</body>
</html>
