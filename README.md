# ⚡ QuickPOS
![CI](https://github.com/YOUR_USERNAME/quickpos-landing/actions/workflows/ci.yml/badge.svg)

A modern, lightning-fast Point of Sale (POS) system landing page built with PHP. QuickPOS is designed to streamline business operations with real-time analytics, secure payments, and cloud synchronization.

## Tech Stack

- **PHP 8.2+** - Backend and form processing
- **PHPUnit 10** - Unit testing framework
- **PHPStan 1** - Static analysis tool
- **GitHub Actions** - CI/CD pipeline
- **Vanilla JavaScript** - Frontend interactions
- **CSS3** - Modern responsive design with animations

## Project Structure

```
quickpos-landing/
├── index.php              # Main landing page
├── process_form.php        # Contact form processing
├── thankyou.php          # Thank you page
├── assets/
│   ├── css/
│   │   └── style.css     # Main stylesheet
│   └── js/
│       └── main.js       # Frontend JavaScript
├── src/
│   └── FormValidator.php  # Form validation class
├── tests/
│   ├── ContactFormTest.php # Form validation tests
│   └── PageLoadTest.php   # File existence tests
├── .github/
│   └── workflows/
│       └── ci.yml        # GitHub Actions pipeline
├── composer.json          # PHP dependencies
└── README.md             # This file
```

## Local Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/quickpos-landing.git
   cd quickpos-landing
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Start the development server**
   ```bash
   php -S localhost:8000
   ```

4. **Open your browser**
   Navigate to `http://localhost:8000`

## Running Tests

### Run all tests with detailed output:
```bash
vendor/bin/phpunit --testdox tests/
```

### Run tests using composer script:
```bash
composer test
```

### Run static analysis:
```bash
composer analyse
```

## CI/CD Pipeline

The project includes a comprehensive GitHub Actions workflow with 4 parallel jobs:

### 1. Code Quality Job
- PHP syntax validation
- PHPStan static analysis (Level 5)
- Runs on every push and pull request

### 2. Automated Tests Job
- PHPUnit test execution
- Test result artifacts upload
- Runs in parallel with code quality

### 3. Commit Validation Job
- Validates commit message format
- Requires `[KAN-XXX]` Jira ticket ID format
- Only runs on push events

### 4. Build Summary Job
- Depends on code quality and tests
- Uploads build artifacts
- Provides success confirmation

## Git Workflow

### Branching Strategy
- **main** - Production-ready code
- **feature/KAN-XXX-name** - New features
- **bugfix/KAN-XXX-name** - Bug fixes

### Commit Format (Strict)
All commits must follow the Jira ticket format:
```
✅ [KAN-101] Add header section with navigation
✅ [KAN-301] Fix email validation bug
❌ Add header section          ← Pipeline FAILS
❌ KAN101 header update        ← Pipeline FAILS
```

### Pull Request Process
1. Create feature branch from main
2. Make changes with proper commit format
3. Push to remote branch
4. Create Pull Request to main
5. Wait for CI pipeline to pass
6. Merge after approval

## Features

### Landing Page Sections
- **Sticky Header** - Navigation with smooth scroll
- **Hero Section** - Eye-catching headline and CTA
- **Features** - 4 key product features with icons
- **Pricing** - 3-tier pricing plans with highlighted Pro plan
- **Contact Form** - Validated contact form with error handling
- **Footer** - Social links and copyright information

### Technical Features
- **Responsive Design** - Mobile-first approach
- **Dark Theme** - Modern navy blue with electric blue accents
- **Animations** - Smooth scroll, fade-in effects, hover states
- **Form Validation** - Server-side PHP validation with error display
- **Accessibility** - Semantic HTML5 structure
- **Performance** - Optimized CSS and JavaScript

## Team

- **Project Manager & QA**: [Name 1]
- **Tech Lead**: [Name 2]

## License

© <?php echo date('Y'); ?> QuickPOS. All rights reserved.
