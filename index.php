<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - The Fastest POS for Modern Business</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Sticky Header -->
    <header>
        <div class="container">
            <div class="logo">⚡ QuickPOS</div>
            <nav>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#contact">Contact</a>
                <a href="#contact" class="btn-primary">Get Started</a>
            </nav>
            <button class="hamburger">☰</button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>The Fastest POS for Modern Business</h1>
            <p>Streamline your operations, boost sales, and delight customers with our lightning-fast point of sale system designed for today's fast-paced business environment.</p>
            <a href="#contact" class="btn-primary btn-large">Start Your Free Trial</a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="fade-in">Powerful Features for Your Business</h2>
            <div class="feature-grid">
                <div class="feature-card fade-in">
                    <span>⚡</span>
                    <h3>Lightning Fast</h3>
                    <p>Process transactions in milliseconds with our optimized engine. No more waiting, just instant checkout experiences that keep customers happy.</p>
                </div>
                <div class="feature-card fade-in">
                    <span>📊</span>
                    <h3>Real-Time Analytics</h3>
                    <p>Get instant insights into sales trends, customer behavior, and inventory levels with our comprehensive dashboard and reporting tools.</p>
                </div>
                <div class="feature-card fade-in">
                    <span>🔒</span>
                    <h3>Secure Payments</h3>
                    <p>PCI-compliant payment processing with end-to-end encryption. Protect your customers' data and your business with enterprise-grade security.</p>
                </div>
                <div class="feature-card fade-in">
                    <span>☁️</span>
                    <h3>Cloud Sync</h3>
                    <p>Access your business data from anywhere. Automatic cloud backup ensures your data is safe and synchronized across all your devices and locations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing">
        <div class="container">
            <h2 class="fade-in">Simple, Transparent Pricing</h2>
            <div class="pricing-grid">
                <div class="plan fade-in">
                    <h3>Basic</h3>
                    <div class="price">$9<span>/month</span></div>
                    <ul>
                        <li>Up to 100 transactions/month</li>
                        <li>Basic reporting dashboard</li>
                        <li>Email support</li>
                    </ul>
                    <a href="#contact" class="btn-outline">Get Started</a>
                </div>
                <div class="plan featured fade-in">
                    <h3>Pro</h3>
                    <div class="price">$29<span>/month</span></div>
                    <ul>
                        <li>Unlimited transactions</li>
                        <li>Advanced analytics & insights</li>
                        <li>Priority 24/7 support</li>
                    </ul>
                    <a href="#contact" class="btn-primary">Get Started</a>
                </div>
                <div class="plan fade-in">
                    <h3>Enterprise</h3>
                    <div class="price">$99<span>/month</span></div>
                    <ul>
                        <li>Multi-location support</li>
                        <li>Custom integrations</li>
                        <li>Dedicated account manager</li>
                    </ul>
                    <a href="#contact" class="btn-outline">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="fade-in">Get in Touch</h2>
            <p class="fade-in">Ready to transform your business? Let's talk about how QuickPOS can help you grow.</p>
            
            <?php if (isset($_GET['error'])): ?>
                <div class="error-msg">
                    <?php if ($_GET['error'] === 'empty'): ?>
                        All fields are required. Please fill out the complete form.
                    <?php elseif ($_GET['error'] === 'email'): ?>
                        Please enter a valid email address.
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form action="process_form.php" method="POST" class="fade-in">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required
                           value="<?php echo htmlspecialchars($_GET['name'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required
                           value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="Tell us about your business needs" rows="5" required><?php echo htmlspecialchars($_GET['message'] ?? ''); ?></textarea>
                </div>
                <button type="submit" class="btn-primary btn-large">Send Message</button>
            </form>
        </div>
    </section>

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
