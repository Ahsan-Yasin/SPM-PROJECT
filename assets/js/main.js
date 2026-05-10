// Smooth scroll for anchor links
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for all anchor links starting with #
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    anchorLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Header scroll effect
    const header = document.querySelector('header');
    const scrollThreshold = 80;

    function handleHeaderScroll() {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    // Initial check and scroll event listener
    handleHeaderScroll();
    window.addEventListener('scroll', handleHeaderScroll);

    // Fade-in animation on scroll
    const fadeElements = document.querySelectorAll('.fade-in');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    // Observe all fade-in elements
    fadeElements.forEach(element => {
        observer.observe(element);
    });

    // Mobile navigation toggle
    const hamburgerButton = document.querySelector('.hamburger');
    const navElement = document.querySelector('nav');

    if (hamburgerButton && navElement) {
        hamburgerButton.addEventListener('click', function() {
            navElement.classList.toggle('nav-open');
            
            // Toggle hamburger icon
            if (navElement.classList.contains('nav-open')) {
                hamburgerButton.textContent = '✕';
            } else {
                hamburgerButton.textContent = '☰';
            }
        });

        // Close mobile nav when clicking on a link
        const navLinks = navElement.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navElement.classList.remove('nav-open');
                hamburgerButton.textContent = '☰';
            });
        });

        // Close mobile nav when clicking outside
        document.addEventListener('click', function(e) {
            if (!header.contains(e.target) && navElement.classList.contains('nav-open')) {
                navElement.classList.remove('nav-open');
                hamburgerButton.textContent = '☰';
            }
        });
    }

    // Add active state to navigation based on scroll position
    const sections = document.querySelectorAll('section[id]');
    const navLinksArray = document.querySelectorAll('nav a[href^="#"]');

    function updateActiveNavLink() {
        const scrollPosition = window.scrollY + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                navLinksArray.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', updateActiveNavLink);
    updateActiveNavLink(); // Initial call

    // Enhanced form interactions
    const formInputs = document.querySelectorAll('.contact input, .contact textarea');
    formInputs.forEach(input => {
        // Add focus effect
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });

        // Check if input has value on load
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });

    // Add loading state to form submission
    const contactForm = document.querySelector('.contact form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            submitButton.textContent = 'Sending...';
            submitButton.disabled = true;

            // Re-enable after a short delay (in case form doesn't redirect immediately)
            setTimeout(() => {
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }, 5000);
        });
    }

    // Add parallax effect to hero section
    const heroSection = document.querySelector('.hero');
    if (heroSection) {
        window.addEventListener('scroll', function() {
            const scrolled = window.scrollY;
            const parallaxSpeed = 0.5;
            
            if (scrolled < window.innerHeight) {
                heroSection.style.transform = `translateY(${scrolled * parallaxSpeed}px)`;
            }
        });
    }

    // Add hover effect to cards
    const cards = document.querySelectorAll('.feature-card, .plan');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });

        card.addEventListener('mouseleave', function() {
            if (!this.classList.contains('featured')) {
                this.style.transform = 'translateY(0)';
            } else {
                this.style.transform = 'scale(1.05)';
            }
        });
    });

    // Performance optimization: Debounce scroll events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Apply debouncing to scroll handlers
    const debouncedHeaderScroll = debounce(handleHeaderScroll, 10);
    const debouncedActiveNav = debounce(updateActiveNavLink, 10);

    window.removeEventListener('scroll', handleHeaderScroll);
    window.removeEventListener('scroll', updateActiveNavLink);
    window.addEventListener('scroll', debouncedHeaderScroll);
    window.addEventListener('scroll', debouncedActiveNav);
});
