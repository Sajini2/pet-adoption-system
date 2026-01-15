<?php
// PHP code to handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pets_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle Contact Form Submission
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        if ($name && $email && $message) {
            $sql = "INSERT INTO contact (name, email, messages) VALUES ('$name', '$email', '$message')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Message sent successfully!');</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        }
    }

    // Handle Vet Services Form Submission
    if (isset($_POST['vet_submit'])) {
        $name = $conn->real_escape_string($_POST['vet_name'] ?? '');
        $email = $conn->real_escape_string($_POST['vet_email'] ?? '');
        $date = $_POST['vet_date'] ?? '';
        $time = $_POST['vet_time'] ?? '';
        $service = $conn->real_escape_string($_POST['vet_service'] ?? '');

        if ($name && $email && $date && $time && $service) {
            $sql = "INSERT INTO vet_services (name, email, appointment_date, appointment_time, service_type) 
                     VALUES ('$name', '$email', '$date', '$time', '$service')";
            $conn->query($sql);
            echo "<script>alert('Vet appointment booked successfully!');</script>";
        } else {
            echo "<script>alert('Please fill all vet service fields');</script>";
        }
    }

    // Handle User Registration
    if (isset($_POST['register_submit'])) {
        $full_name = $conn->real_escape_string($_POST['full_name'] ?? '');
        $email = $conn->real_escape_string($_POST['reg_email'] ?? '');
        $password = $_POST['reg_password'] ?? '';

        if ($full_name && $email && $password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (full_name, email, password) 
                     VALUES ('$full_name', '$email', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                // Show success message
                echo "<script>alert('Registration successful!');</script>";
            } else {
                // Show error message
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        }
    }

    // Handle Registration to login table
    if (isset($_POST['register_submit'])) {
        $email = $conn->real_escape_string($_POST['reg_email'] ?? '');
        $password = $_POST['reg_password'] ?? '';

        if ($email && $password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO login (email, password) VALUES ('$email', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful!');</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Please fill all registration fields');</script>";
        }
    }

    // Handle Pet Adoption Form Submission
    if (isset($_POST['adopt_submit'])) {
        $pet_name = $conn->real_escape_string($_POST['pet_name'] ?? '');
        $user_name = $conn->real_escape_string($_POST['user_name'] ?? '');
        $user_email = $conn->real_escape_string($_POST['user_email'] ?? '');
        $user_phone = $conn->real_escape_string($_POST['user_phone'] ?? '');

        if ($pet_name && $user_name && $user_email) {
            $sql = "INSERT INTO adoptions (pet_name, user_name, user_email, user_phone) VALUES ('$pet_name', '$user_name', '$user_email', '$user_phone')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Your adoption application has been submitted successfully!');</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Please fill all required fields in the adoption form.');</script>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Connect</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
</head>
<body>

  <!-- Navbar -->
  <header>
    <a href="#" class="logo">
      <img src="pet logo.jpg" alt="Logo">
      <span>Pet Connect</span>
    </a>

    <!-- Menu icon for mobile -->
    <i class='bx bx-menu' id="menu-icon"></i>

    <!-- Navigation Links -->
    <ul class="navbar">
      <li><a href="#home" class="active">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#pets">Pets</a></li>
      <li><a href="#customers">Reviews</a></li>
      <li><a href="#vet">Vet Services</a></li> <!-- Added -->
      <li><a href="#help">Help</a></li> <!-- Added -->
      <li><a href="#login">Login</a></li> <!-- Added -->
      <li><a href="#contact">Contact</a></li>
    </ul>
    <!-- Right side icons -->
    <div class="nav-icons">
      <i class='bx bx-search'></i>
      <i class='bx bx-menu'></i>
    </div>
  </header>

  <!-- Search Bar (hidden by default) -->
  <div class="search-bar" id="search-bar">
    <input type="text" placeholder="Search pets...">
    <i class='bx bx-x' id="close-search"></i>
  </div>

  <!-- Hero -->
  <section class="hero" id="home">
    <div class="hero-content">
      <h1>Adopt Love 🐾</h1>
      <p>Find your new furry friend today. Every pet deserves a forever home.</p>
      <a href="#pets" class="btn">Adopt Now</a>
    </div>
  </section>

  <!-- About -->
  <section class="about" id="about">
    <h2>About Us</h2>
    <p>
      Pet Connect is a platform created with love for homeless and helpless dogs and cats.
      We believe every pet deserves a safe and caring home. Our mission is to connect animal shelters with kind families who are ready to adopt.
      By simplifying the adoption process and reducing paperwork, we make it easier for you to welcome a furry friend into your life. With just a few clicks, you can find your perfect companion and give them the home they truly deserve.
    </p>
  </section>

  <!-- Pets -->
  <section class="pets" id="pets">
    <h2>Meet Our Pets</h2>
    <div class="pet-container">
      <div class="pet-card">
        <img src="Strt 02.jpg" alt="Dog Bella">
        <h3>Bella</h3>
        <p>Friendly puppy, 6 months,Bella has completed her primary vaccinations.</p>
        <button class="btn adopt-btn" data-pet-name="Bella">Adopt</button>
      </div>
      <div class="pet-card">
        <img src="strt 12.webp" alt="Cat Luna">
        <h3>Luna</h3>
        <p>Playful kitty, 1 year , Luna has completed her primary vaccinations.</p>
        <button class="btn adopt-btn" data-pet-name="Luna">Adopt</button>
      </div>
      <div class="pet-card">
        <img src="strt 07.webp" alt="Dog Max">
        <h3>Max</h3>
        <p>Energetic puppy, 3 months , Max has completed his primary vaccinations.</p>
        <button class="btn adopt-btn" data-pet-name="Max">Adopt</button>
      </div>
      <div class="pet-card">
        <img src="strt 11.jpg" alt="Cat Milo">
        <h3>Milo</h3>
        <p>Sweet kitty, 1 year , Milo has completed her primary vaccinations.</p>
        <button class="btn adopt-btn" data-pet-name="Milo">Adopt</button>
      </div>
    </div>
  </section>

  <!-- Customers -->
  <section class="customers" id="customers">
    <h2>Happy Families</h2>
    <div class="customer-container">
      <div class="customer-card">
        <img src="strt 002.jpg" alt="Customer">
        <p>"Adopting from Pet Connect was smooth and heartwarming. Bella has changed our lives!"</p>
        <h4>- Sarah & Family</h4>
      </div>
      <div class="customer-card">
        <img src="strt 001.jpg" alt="Customer">
        <p>"Max is our new best friend. This platform is amazing for connecting with shelters!"</p>
        <h4>- David</h4>
      </div>
    </div>
  </section>

  <!--vet-->
  <section class="vet" id="vet">
    <h2>Vet Services</h2>
    <p>Book an appointment with our partnered veterinarians.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" name="vet_name" placeholder="Your Name" required>
      <input type="email" name="vet_email" placeholder="Your Email" required>
      <input type="date" name="vet_date" required>
      <input type="time" name="vet_time" required>
      <select name="vet_service" required>
        <option value="">Select Service</option>
        <option value="checkup">Checkup</option>
        <option value="vaccination">Vaccination</option>
        <option value="surgery">Surgery</option>
      </select>
      <button type="submit" class="btn" name="vet_submit">Book Appointment</button>
    </form>
  </section>

  <!--help section-->
  <section class="help" id="help">
    <h2>How You Can Help</h2>
    <p>Support our mission to help homeless pets:</p>
    <div class="help-cards">
      <div class="help-card">
        <h3>Volunteer</h3>
        <p>Join our team and help care for pets in shelters.</p>
      </div>
      <div class="help-card">
        <h3>Donate</h3>
        <p>Your donations help us provide food, medicine, and shelter.</p>
      </div>
      <div class="help-card">
        <h3>Foster</h3>
        <p>Give temporary homes to pets in need until adoption.</p>
      </div>
    </div>
  </section>

  <!--login-->
  <section class="login" id="login">
    <h2>Login / Register</h2>
    <form method="post" action="">
      <input type="email" name="reg_email" placeholder="Email" required>
      <input type="password" name="reg_password" placeholder="Password" required>
      <button type="submit" class="btn" name="register_submit">Register</button>
    </form>
    <p>Don't have an account? <a href="#register">Register here</a></p>
    <form id="register-form" method="post" action="">
      <input type="text" name="full_name" placeholder="Full Name" required>
      <input type="email" name="reg_email" placeholder="Email" required>
      <input type="password" name="reg_password" placeholder="Password" required>
      <button type="submit" class="btn" name="register_submit">Register</button>
    </form>
  </section>


  <!-- Contact -->
  <section class="contact" id="contact">
    <h2>Contact Us</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="submit" class="btn">Send Message</button>
    </form>
  </section>


  <!-- Footer -->
  <footer>
    <p>© 2025 Pet Connect | Built with ❤️ for pets</p>
  </footer>

  <!-- The Modal (pop-up frame) -->
  <div id="adoption-modal" class="modal">
    <div class="modal-content">
      <span class="close-button">&times;</span>
      <h2 id="modal-title">Adopt a Pet</h2>
      <form id="adoption-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" id="pet-name-input" name="pet_name">
        <label for="user_name">Your Name:</label>
        <input type="text" id="user_name" name="user_name" required>

        <label for="user_email">Your Email:</label>
        <input type="email" id="user_email" name="user_email" required>

        <label for="user_phone">Your Phone Number (Optional):</label>
        <input type="tel" id="user_phone" name="user_phone">

        <button type="submit" name="adopt_submit">Submit Application</button>
      </form>
    </div>
  </div>

  <style>
    /* CSS for the modal */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000; /* Increased z-index */
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.6); /* Slightly darker overlay */
      padding-top: 50px;
    }

    .modal-content {
      background-color: #fff;
      margin: 5% auto;
      padding: 20px 30px;
      border-radius: 12px;
      border: 1px solid #888;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    @keyframes animatetop {
      from {top: -300px; opacity: 0}
      to {top: 0; opacity: 1}
    }

    .close-button {
      color: #aaa;
      float: right;
      font-size: 36px;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .close-button:hover,
    .close-button:focus {
      color: #ff6347; /* A more vibrant color on hover */
      text-decoration: none;
      cursor: pointer;
    }

    .modal-content h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .modal-content form {
      display: flex;
      flex-direction: column;
    }

    .modal-content label, .modal-content input, .modal-content button {
      margin-bottom: 15px;
    }

    .modal-content input[type="text"],
    .modal-content input[type="email"],
    .modal-content input[type="tel"] {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .modal-content button[type="submit"] {
      background-color: #333;
      color: white;
      padding: 15px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .modal-content button[type="submit"]:hover {
      background-color: #ff6347;
    }
  </style>

  <script src="script.js"></script>
  <script>
    // Get the modal
    const modal = document.getElementById("adoption-modal");

    // Get the close button
    const closeButton = document.querySelector(".close-button");

    // Get all the "Adopt" buttons
    const adoptButtons = document.querySelectorAll(".adopt-btn");

    // Get the pet name input inside the modal
    const petNameInput = document.getElementById("pet-name-input");
    const modalTitle = document.getElementById("modal-title");

    // When a user clicks on an "Adopt" button, open the modal
    adoptButtons.forEach(button => {
      button.addEventListener('click', function() {
        const petName = this.getAttribute("data-pet-name");
        
        // Set the hidden input value
        petNameInput.value = petName;
        
        // Update the modal title
        modalTitle.textContent = `Adopt ${petName}`;
        
        // Display the modal
        modal.style.display = "block";
      });
    });

    // When the user clicks on the close button, close the modal
    closeButton.addEventListener('click', function() {
      modal.style.display = "none";
    });

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
  </script>
</body>
</html>