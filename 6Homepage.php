
<?php
include('dbconnection.php');
$response = '';

if (isset($_POST['name']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $image = $_FILES['image'];

    // Set the target directory where images will be stored
    $target_dir = "uploads/";
    
    // Ensure the uploads folder exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Generate a unique name for the image to avoid filename collisions
    $target_file = $target_dir . basename($image["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $unique_name = $target_dir . uniqid() . "." . $imageFileType;

    // Check if the uploaded file is a real image
    $check = getimagesize($image["tmp_name"]);
    if ($check === false) {
        $response = "File is not an image.";
    } else {
        // Allow only specific image file types (optional)
        $allowed_file_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_file_types)) {
            $response = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($image["tmp_name"], $unique_name)) {
                // Prepare the URL to store in the database
                $image_url = "http://localhost/phpmyadmin/index.php?route=/table/change&db=vaidya&table=images/" . $unique_name;

                // Prepare and bind the SQL statement to insert data into the database
                $stmt = $conn->prepare("INSERT INTO images (name, image_data) VALUES (?, ?)");
                $stmt->bind_param("ss", $name, $image_url);

                // Execute the query and handle the result
                if ($stmt->execute()) {
                    $response = "Image uploaded successfully! URL: " . $image_url;
                } else {
                    $response = "Error: Could not save data to the database.";
                }

                $stmt->close();
            } else {
                $response = "Sorry, there was an error uploading your file.";
            }
        }
    }
} else {
  //  $response = "Error: Name or image file is not set.";
}

echo $response;
?>




<style>
    .emergency-scan-container {
      background-color: #BAFFF2;
      display: flex;
      gap: 23px;
      overflow: hidden;
      flex-wrap: wrap;
      padding: 10px 0 16px 15px;
    }
  
    .navigation-sidebar {
      border-radius: 42px;
      background-color: #089BAB;
      display: flex;
      flex-direction: column;
      color: #FFF;
      padding: 50px 10px 289px;
      font: 32px Poppins, sans-serif;
    }
  
    .nav-item {
      text-align: center;
      margin-top: 102px;
    }
  
    .nav-item-home {
      border-radius: 98px;
      background-color: #FFF;
      color: #000;
      padding: 66px 11px;
    }
  
    .nav-item-profile {
      align-self: center;
      margin-top: 36px;
    }
  
    .main-content {
      align-self: start;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-family: Righteous, sans-serif;
      flex-grow: 1;
      flex-basis: 0;
      width: fit-content;
    }
  
    .header-container {
      align-self: stretch;
      display: flex;
      gap: 20px;
      font-size: 48px;
      color: #051A37;
      flex-wrap: wrap;
      justify-content: space-between;
    }
  
    .logo-text {
      align-self: start;
      margin-top: 34px;
    }
  
    .logo-image {
      aspect-ratio: 1.13;
      object-fit: contain;
      object-position: center;
      width: 213px;
      max-width: 100%;
    }
  
    .scan-image {
      aspect-ratio: 1.12;
      object-fit: contain;
      object-position: center;
      width: 481px;
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
      margin-top: 46px;
      max-width: 100%;
    }
  
    .scan-instruction {
      color: #6A80AA;
      text-shadow: 0 4px 29px rgba(0, 0, 0, 0.25);
      font-size: 40px;
      text-align: center;
      margin-top: 31px;
    }
  
    @media (max-width: 991px) {
      .navigation-sidebar {
        padding-bottom: 100px;
      }
  
      .nav-item-home {
        white-space: initial;
        margin: 0 8px 0 9px;
      }
  
      .nav-item {
        margin-top: 40px;
      }
  
      .main-content {
        max-width: 100%;
      }
  
      .header-container {
        max-width: 100%;
        font-size: 40px;
        white-space: initial;
      }
  
      .logo-text {
        font-size: 40px;
      }
  
      .scan-image {
        margin-top: 40px;
      }
  
      .scan-instruction {
        max-width: 100%;
      }
    }
  </style>
  <script>
    document.getElementById('imageUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });
  </script>
  <section class="emergency-scan-container">
    <script src="https://cdn.botpress.cloud/webchat/v2.1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/9b386b04-4490-4bcc-b2d8-78805d36d09c/webchat/v2.1/config.js"></script>
    <nav class="navigation-sidebar">
      <div class="nav-item nav-item-home" tabindex="0" role="button">Home</div>
      <div class="nav-item nav-item-profile" tabindex="0" role="button"><a href="7Profile.html">PROFILE</a></div>
      <div class="nav-item nav-item-profile" tabindex="0" role="button"><a href="8Scan.html">SCAN </BR>UPDATE</a></div>
      <div class="nav-item nav-item-profile" tabindex="0" role="button"><a href="9Med.html">MEDICAL </BR> UPDATE</a></div>

    </nav>
    <main class="main-content">
      <header class="header-container">
        <h1 class="logo-text">VAIDYASUTRA</h1>
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/dc49c59ffcc969b641f9fe474e76bf21f58b97a6b82ce5db2106fe1ed846e60e?placeholderIfAbsent=true&apiKey=f58a2b2b5bf2488ead47f03c304dfa45" class="logo-image" alt="Vaidyasutra logo" />
      </header>
      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/9074478df7f44d7b27d8cde65b9af9a1f993f2b270e6ca7311de175ea585542b?placeholderIfAbsent=true&apiKey=f58a2b2b5bf2488ead47f03c304dfa45" class="scan-image" alt="QR code for emergency identification" />
      <h1>Upload Image</h1>
    <form id="uploadForm" enctype="multipart/form-data" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="image">Select an Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="button" onclick="uploadImage()">Upload</button>
    </form>

    <p id="response"></p>
    <img id="uploadedImage" src="" alt="Uploaded Image" style="display:none; width:300px;"/>

    <script>
        function uploadImage() {
            const form = document.getElementById('uploadForm');
            const formData = new FormData(form);

            fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                const responseElement = document.getElementById('response');
                const uploadedImage = document.getElementById('uploadedImage');

                // If the response contains a URL, display the image
                if (data.includes("URL:")) {
                    const imageUrl = data.split("URL:")[1].trim();
                    responseElement.innerText = data;
                    uploadedImage.src = imageUrl;
                    uploadedImage.style.display = 'block';
                } else {
                   // responseElement.innerText = data;
                }
            })
            .catch(error => {
                document.getElementById('response').innerText = "An error occurred: " + error;
            });
        }
    </script>

      <p class="scan-instruction">
        SCAN FOR <br /> EMERGENCY IDENTIFICATION
      </p>
    </main>
  </section>