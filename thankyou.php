<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - QuickPOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .thankyou-container {
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
        }
        
        .success-icon {
            font-size: 4rem;
            color: #00d4ff;
            margin-bottom: 2rem;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .thankyou-container h1 {
            font-family: 'Syne', sans-serif;
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #fff, #00d4ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .thankyou-container p {
            font-size: 1.2rem;
            opacity: 0.8;
            max-width: 600px;
            margin-bottom: 3rem;
            line-height: 1.6;
        }
        
        .btn-back {
            background: var(--accent);
            color: var(--bg);
            padding: 0.8rem 2rem;
            border-radius: 6px;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 212, 255, 0.3);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">⚡ QuickPOS</div>
            <nav>
                <a href="index.php#features">Features</a>
                <a href="index.php#pricing">Pricing</a>
                <a href="index.php#contact">Contact</a>
                <a href="index.php#contact" class="btn-primary">Get Started</a>
            </nav>
            <button class="hamburger">☰</button>
        </div>
    </header>

    <!-- Thank You Content -->
    <main class="thankyou-container">
        <div class="success-icon">✅</div>
        <h1>Message Sent!</h1>
        <p>Thank you for reaching out to QuickPOS. We've received your message and our team will get back to you shortly. We're excited to help you transform your business with our lightning-fast POS system.</p>
        <a href="index.php" class="btn-back">← Back to Home</a>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="logo">⚡ QuickPOS</div>
                <div class="social-links">
                    <a href="https://twitter.com/quickpos" target="_blank">Twitter</a>
                    <a href="https://linkedin.com/company/quickpos" target="_blank">LinkedIn</a>
                    <a href="https://github.com/quickpos" target="_blank">GitHub</a>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> QuickPOS. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
