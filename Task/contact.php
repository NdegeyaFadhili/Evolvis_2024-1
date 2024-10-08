<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Personal Portfolio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.html">Home</a>
        <a href="about.html">About Me</a>
        <a href="contact.html" class="active">Contact</a>
    </div>

    <div class="content">
        <h1>Contact</h1>
        <p>This section contains contact information.</p>
    </div>

    <div class="container">
        <div class="image">
            <img src="11.jpg" alt="Description of the image">
        </div>

        <div class="contact-me">
            <h2>Contact Me</h2>
            <p><strong>Email:</strong> <a href="mailto:JesseDanneck@gmail.com">JesseDanneck@gmail.com</a></p>
            <p><strong>Phone:</strong> 0788 228 994</p>
            <p><strong>Address:</strong> 123 Main Street, Kigali</p>

            <form id="contactForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
                <br>
                <textarea id="message" name="message" rows="4" cols="50" placeholder="Your message" required></textarea>
                <br>
                <input type="submit" value="Send">
            </form>
            <p class="confirmation">Thank you for your message !!</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contactForm');
            const messageField = document.getElementById('message');
            const confirmation = document.querySelector('.confirmation');

            form.addEventListener('submit', function (event) {
                if (messageField.value.trim() === '') {
                    event.preventDefault();
                    alert('Please enter a message before sending.');
                } else {
                    confirmation.style.display = 'block';
                    messageField.value = '';
                }
            });

            messageField.addEventListener('focus', function () {
                messageField.placeholder = 'Write your message here...';
            });

            messageField.addEventListener('blur', function () {
                messageField.placeholder = 'Your message';
            });
        });
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars(trim($_POST['name']));
        $message = htmlspecialchars(trim($_POST['message']));

        if (!empty($name) && !empty($message)) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('Please fill in all fields.');</script>";
        }
    }
    ?>
</body>
</html>
