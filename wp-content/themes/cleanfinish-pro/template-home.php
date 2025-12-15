<?php
/**
 * Template Name: Home Page Template
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1>Professional Move-Out & Office Cleaning for Property Managers</h1>
        <p class="tagline">Fast, Thorough, and Reliable Cleaning Services That Keep Your Properties Rent-Ready</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Get a Free Quote</a>
            <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-secondary">View Our Services</a>
        </div>
    </div>
</section>

<!-- Why Property Managers Choose Us -->
<section class="content-section">
    <h2 class="section-title">Why Property Managers Choose CleanFinish</h2>
    <p class="section-subtitle">We understand the urgency and standards required in property management</p>

    <div class="features-list">
        <div class="feature-item">
            <div class="feature-icon">⚡</div>
            <div class="feature-content">
                <h4>Same-Day & Emergency Service</h4>
                <p>Tenant moved out unexpectedly? We can be there within hours to get your unit rent-ready fast.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">✓</div>
            <div class="feature-content">
                <h4>Move-Out Checklist Compliance</h4>
                <p>We follow your exact move-out cleaning requirements and checklists to ensure deposits are handled fairly.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">💼</div>
            <div class="feature-content">
                <h4>Commercial-Grade Equipment</h4>
                <p>Professional tools and eco-friendly cleaning solutions that deliver superior results every time.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">📋</div>
            <div class="feature-content">
                <h4>Detailed Reporting</h4>
                <p>Receive photo documentation and cleaning reports for your records and tenant communications.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">🔒</div>
            <div class="feature-content">
                <h4>Fully Insured & Bonded</h4>
                <p>Complete liability coverage protects your property and gives you peace of mind.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon">💰</div>
            <div class="feature-content">
                <h4>Volume Discounts Available</h4>
                <p>Manage multiple properties? Ask about our preferred partner programs and bulk pricing.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Core Services -->
<section class="content-section" style="background-color: #fff; padding: 3rem 20px; margin: 0;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 class="section-title">Our Core Services</h2>
        <p class="section-subtitle">Specialized cleaning solutions for property managers and building owners</p>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">🏠</div>
                <h3>Move-Out Cleaning</h3>
                <p>Complete apartment and house cleaning between tenants. We clean every surface, appliance, and corner to meet your move-out standards.</p>
                <ul style="text-align: left; margin-top: 1rem; color: #555;">
                    <li>Deep kitchen cleaning (appliances, cabinets, floors)</li>
                    <li>Bathroom sanitization</li>
                    <li>Window and blind cleaning</li>
                    <li>Carpet cleaning and stain removal</li>
                    <li>Wall washing and baseboard cleaning</li>
                </ul>
                <a href="<?php echo esc_url(home_url('/services/#moveout')); ?>" class="btn btn-primary" style="margin-top: 1rem;">Learn More</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🏢</div>
                <h3>Office & Commercial Cleaning</h3>
                <p>Keep your commercial properties professional and inviting. Regular or one-time deep cleaning for offices, retail spaces, and common areas.</p>
                <ul style="text-align: left; margin-top: 1rem; color: #555;">
                    <li>Daily, weekly, or monthly service</li>
                    <li>Break room and restroom maintenance</li>
                    <li>Floor care (carpet, tile, hardwood)</li>
                    <li>Lobby and common area cleaning</li>
                    <li>After-hours service available</li>
                </ul>
                <a href="<?php echo esc_url(home_url('/services/#office')); ?>" class="btn btn-primary" style="margin-top: 1rem;">Learn More</a>
            </div>

            <div class="service-card">
                <div class="service-icon">🚨</div>
                <h3>Emergency Cleaning</h3>
                <p>Property damage? Eviction cleanup? We handle urgent situations quickly and thoroughly to minimize your downtime.</p>
                <ul style="text-align: left; margin-top: 1rem; color: #555;">
                    <li>24/7 emergency response</li>
                    <li>Post-eviction cleaning</li>
                    <li>Hoarding situation cleanup</li>
                    <li>Damage restoration cleaning</li>
                    <li>Biohazard cleanup coordination</li>
                </ul>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary" style="margin-top: 1rem;">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="content-section">
    <h2 class="section-title">Simple Process, Exceptional Results</h2>
    <p class="section-subtitle">Getting your property cleaned is easy with CleanFinish</p>

    <div class="services-grid">
        <div class="service-card">
            <h3 style="color: #28a745; font-size: 2.5rem; margin-bottom: 0.5rem;">1</h3>
            <h4>Contact Us</h4>
            <p>Call, email, or use our online form. Tell us about your property and timeline. We provide an instant quote for standard units.</p>
        </div>

        <div class="service-card">
            <h3 style="color: #28a745; font-size: 2.5rem; margin-bottom: 0.5rem;">2</h3>
            <h4>Schedule Service</h4>
            <p>Choose your date and time. We work around your showing schedule and can coordinate with your maintenance team.</p>
        </div>

        <div class="service-card">
            <h3 style="color: #28a745; font-size: 2.5rem; margin-bottom: 0.5rem;">3</h3>
            <h4>We Clean</h4>
            <p>Our professional team arrives on time with all equipment and supplies. We follow your checklist and work efficiently.</p>
        </div>

        <div class="service-card">
            <h3 style="color: #28a745; font-size: 2.5rem; margin-bottom: 0.5rem;">4</h3>
            <h4>Final Walkthrough</h4>
            <p>We provide photo documentation and a completion report. Your property is ready to show or move-in immediately.</p>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="content-section" style="background-color: #fff; padding: 3rem 20px; margin: 0;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 class="section-title">What Property Managers Say</h2>
        <p class="section-subtitle">Trusted by property managers across the metro area</p>

        <div class="testimonial">
            <p class="testimonial-text">"CleanFinish has been a game-changer for our property management company. They turn around units in 24 hours and the quality is consistently excellent. Our vacancy time has dropped significantly since partnering with them."</p>
            <p class="testimonial-author">Sarah Mitchell</p>
            <p class="testimonial-role">Property Manager, Metro Residential Properties</p>
        </div>

        <div class="testimonial">
            <p class="testimonial-text">"We manage 200+ units and CleanFinish handles all our move-out cleaning. They're reliable, thorough, and their volume pricing makes them very competitive. The photo reports they provide are invaluable for our records."</p>
            <p class="testimonial-author">David Chen</p>
            <p class="testimonial-role">Regional Manager, Apex Property Management</p>
        </div>

        <div class="testimonial">
            <p class="testimonial-text">"When we have an emergency situation, CleanFinish responds immediately. They've handled some difficult post-eviction cleanups for us and always restore the property to rent-ready condition. Highly recommend."</p>
            <p class="testimonial-author">Jennifer Torres</p>
            <p class="testimonial-role">Building Manager, Downtown Commercial Plaza</p>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="hero-section" style="padding: 3rem 2rem;">
    <div class="hero-content">
        <h2 style="font-size: 2rem; margin-bottom: 1rem;">Ready to Partner with CleanFinish?</h2>
        <p style="font-size: 1.1rem; margin-bottom: 2rem;">Get a free quote today and discover why property managers trust us for all their cleaning needs.</p>
        <div class="cta-buttons">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Request a Quote</a>
            <a href="tel:5551234567" class="btn btn-secondary">Call (555) 123-4567</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
