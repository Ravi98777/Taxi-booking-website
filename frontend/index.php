<?php include('../backend/backendsignup.php'); ?>
 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>India Taxi Booking</title>
  <link rel="stylesheet" href="style.css"> 
</head>

<body>
  <!-- Header -->
  <header>
    <h1>Taxi Booking</h1>
   <nav>
  <a href="#home">Home</a>
  <a href="#drivers">Our Moments</a>
  <a href="#contact">Contact</a>
  <a href="">Services</a>
  <a href="">Help</a>
 <button id="login" onclick="window.location.href='../backend/login.php'">Login</button>
  <button id="btn" onclick="scrollToSignIn()">Sign up</button>
</nav>

  </header> 

 
 <div class="back_image">
   <div class="flip_text">
      YOUR PERFECT 
      <div id="flip"> 
      <div><div>RIDE</div></div>
      <div><div>JOY</div></div>
      <div><div>HAPPINESS</div></div>   
    </div>   
      AWAITS YOU HERE
   </div>

    <div class="car_image">
      <img src="asset\pngimg.com - taxi_PNG67.png" alt="">
    </div>
 </div>
  <!-- this is new -->
   

  <!-- Booking Form along with the Images -->
  <div class="container">
    <div class="form-card">
      <h2>Book Your Taxi</h2>
      <form action="booking_data.php" method="post">
        <input type="tel" name="phone" placeholder="Phone Number" required>
        <input type="text" name="pickup" placeholder="Pickup Location" required>
        <input type="text" name="drop" placeholder="Drop Location" required>
        <input type="datetime-local" name="datetime" required>
        <button name="book">Book Now</button>
        <button class="btn" onclick="window.location.href='../backend/reservation.php'">
        Reserve Now
        </button> 
      </form>
    </div>
    
     

    <div class="image-grid">
      <img src="asset/tajmahal.webp" alt="Taj Mahal">
      <img src="asset/kerala blackwater.avif">
      <img src="asset/himalayas.avif" alt="Himalayas">
      <img src="asset/jaipur-palace.webp" alt="Jaipur Palace">
    </div>
  </div>

  <!-- Slideshow of our moments -->
  <section id="drivers">
    <h2 style="text-align:center; margin-top:40px;">Our Moments</h2>
    <div class="slideshow-container">
      <img class="slides fade" src="asset/outstation_taxi.webp" >
      <img class="slides fade" src="asset/img1.webp" >
      <img class="slides fade" src="asset/emp.webp" >
      <img class="slides fade" src="asset/dog.webp" >
      <img class="slides fade" src="asset/man.webp" >      
    </div>
  </section>

  <!-- sign_up user page ------------------------------------------------------------------------------------------------------------>
    <div class="container2"> 
      <div class="sign" id="sgn">
      <h2>Sign Up For New User</h2>
        <form method="post">
          <input type="text" name="name" placeholder="Your Name" required> 
          <input type="text" name="address" placeholder="Address"required> 
          <input type="tel" name="contact" placeholder="Contact NO." required> 
          <input type="email" name="email" placeholder="Email"> 
          <input type="password" name="password" placeholder="Password"> 
          <input type="password" name="cpassword" placeholder="confirm Password"> 
           <button name="sb">Register</button>
        </form>
      </div>
      </div>



      <div class="faqs">
        <h2>Cabs Booking FAQ</h2>
        <h3>What are the advantages of online taxi booking?</h3>
        <p> Online taxi booking not only helps you with best prices but also helps you with the convenience of paying through multiple payment options (like Debit Card, Credit Card, eWallets etc.). You can easily compare prices and choose various categories of cabs like Hatchback cars, Sedan and SUV.</p>
        <h3>What kind of cabs you can book from  this?</h3>
        <p>You can book following kinds of cabs from Goibibo: airport cabs and intercity cabs / outstation cabs. You can book outstation cabs for both one-way transfers & round-trip transfers.</p>
        <h3>How are the Kilometers calculated?</h3>
        <p>The 'Kilometers' are calculated based on the return trip distance between the boarding point and the destination.</p>
        <h3>Can I book a cab without a credit card or net banking option?</h3>
        <p>Yes, other payment options available are UPI (gpay, phonepay), wallets (Paytm, Amazon Pay), and debit cards.</p>
        <h3>What if I need to cancel my trip?</h3>
        <p>The cancellation policy is specific to each service provider and is listed against the quotes on the quotations page.</p>
        <h3>How are tolls & taxes calculated?</h3>
        <p>Tolls and interstate taxes are best estimates only. If these amounts are included in the fare, you'll be charged/reimbursed for any difference between the actuals and estimates, as applicable.</p>
        <h3>How can I book cheap cabs online?</h3>
        <p>Goibibo helps you with online cab booking at the best prices, comparatively much lower than the local vendors. Also you can use promo codes and offers on the Goibibo website & app on online cab booking to get extra discounts</p>
      </div>
  <!-- Footer -->
  <footer id="contact">
    <p>&copy; 2025 India Taxi Booking</p>
    <a href="https://facebook.com">Facebook</a> |
    <a href="https://linkedin.com">LinkedIn</a>  |
    <a href="https://gmail.com">Gmail</a>
  </footer>

  <!-- JavaScript for slideshow -->
  <script>
    let slideIndex = 0;
    showSlides();
    function showSlides() {
      let slides = document.getElementsByClassName("slides");
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      slides[slideIndex-1].style.display = "block";
      setTimeout(showSlides, 2500); // Change image every 3s
    }
const element = document.getElementById("btn");

element.addEventListener("click", function() {
  const sign = document.getElementsByClassName("container2")[0]; 
  sign.style.display = "flex"; // show the form
  scrollToSignIn(); // scroll after showing
});

function scrollToSignIn() {
  const target = document.getElementsByClassName("container2")[0]; 
  target.scrollIntoView({
    behavior: "smooth"
  });
}    
  </script>
 
 


</body>
</html>
