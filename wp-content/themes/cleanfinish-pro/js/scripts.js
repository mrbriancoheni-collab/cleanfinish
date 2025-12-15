/**
 * CleanFinish Pro Theme Scripts
 *
 * @package CleanFinish Pro
 */

(function($) {
    'use strict';

    // Mobile Menu Toggle
    function initMobileMenu() {
        // Add mobile menu toggle button if needed
        if (window.innerWidth < 768) {
            // Mobile menu functionality can be added here
        }
    }

    // Smooth Scroll for Anchor Links
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
                && location.hostname === this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                }
            }
        });
    }

    // Form Validation
    function initFormValidation() {
        $('#contact-form').on('submit', function(e) {
            var isValid = true;
            var errorMessage = '';

            // Validate required fields
            $(this).find('[required]').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).css('border-color', '#dc3545');
                } else {
                    $(this).css('border-color', '#ddd');
                }
            });

            // Validate email format
            var emailField = $('#email');
            if (emailField.val()) {
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailField.val())) {
                    isValid = false;
                    emailField.css('border-color', '#dc3545');
                    errorMessage = 'Please enter a valid email address.';
                }
            }

            // Validate phone format (basic)
            var phoneField = $('#phone');
            if (phoneField.val()) {
                var phonePattern = /^[\d\s\-\(\)]+$/;
                if (!phonePattern.test(phoneField.val())) {
                    isValid = false;
                    phoneField.css('border-color', '#dc3545');
                    errorMessage = 'Please enter a valid phone number.';
                }
            }

            if (!isValid) {
                e.preventDefault();
                if (errorMessage) {
                    alert(errorMessage);
                } else {
                    alert('Please fill in all required fields.');
                }
                return false;
            }
        });

        // Remove error styling on input
        $('input, select, textarea').on('focus', function() {
            $(this).css('border-color', '#ddd');
        });
    }

    // Sticky Header
    function initStickyHeader() {
        var header = $('.site-header');
        var headerOffset = header.offset().top;

        $(window).scroll(function() {
            if ($(window).scrollTop() > headerOffset) {
                header.addClass('sticky');
            } else {
                header.removeClass('sticky');
            }
        });
    }

    // Back to Top Button
    function initBackToTop() {
        // Create back to top button
        $('body').append('<button id="back-to-top" title="Back to Top" style="display:none; position:fixed; bottom:30px; right:30px; z-index:999; padding:15px 20px; background:#28a745; color:#fff; border:none; border-radius:50%; cursor:pointer; font-size:18px;">↑</button>');

        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        $('#back-to-top').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    }

    // Service Card Animations
    function initCardAnimations() {
        // Add fade-in animation for service cards on scroll
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.service-card, .blog-post, .feature-item').forEach(function(element) {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(element);
            });
        }
    }

    // Initialize all functions on document ready
    $(document).ready(function() {
        initMobileMenu();
        initSmoothScroll();
        initFormValidation();
        initStickyHeader();
        initBackToTop();
        initCardAnimations();

        // Log to console that scripts are loaded
        console.log('CleanFinish Pro theme scripts loaded successfully');
    });

    // Handle window resize
    $(window).resize(function() {
        initMobileMenu();
    });

})(jQuery);
