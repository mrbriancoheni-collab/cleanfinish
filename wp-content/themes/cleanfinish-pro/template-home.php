<?php
/**
 * Template Name: Home Page Template
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Professional Move-Out & Office Cleaning for Property Managers</h1>
            <p class="hero-subtitle">Fast, Thorough, and Reliable Cleaning Services That Keep Your Properties Rent-Ready</p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Get a Free Quote</a>
                <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn btn-secondary">View Our Services</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>10,000+</h3>
                <p>Units Cleaned</p>
            </div>
            <div class="stat-item">
                <h3>500+</h3>
                <p>Property Managers</p>
            </div>
            <div class="stat-item">
                <h3>24/7</h3>
                <p>Emergency Service</p>
            </div>
            <div class="stat-item">
                <h3>100%</h3>
                <p>Satisfaction Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <h2>Why Property Managers Choose CleanFinish</h2>
            <p>We understand the urgency and standards required in property management</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Same-Day & Emergency Service</h3>
                <p>Tenant moved out unexpectedly? We can be there within hours to get your unit rent-ready fast.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">✓</div>
                <h3>Move-Out Checklist Compliance</h3>
                <p>We follow your exact move-out cleaning requirements and checklists to ensure deposits are handled fairly.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💼</div>
                <h3>Commercial-Grade Equipment</h3>
                <p>Professional tools and eco-friendly cleaning solutions that deliver superior results every time.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3>Detailed Reporting</h3>
                <p>Receive photo documentation and cleaning reports for your records and tenant communications.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Fully Insured & Bonded</h3>
                <p>Complete liability coverage protects your properties and gives you peace of mind.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Volume Discounts Available</h3>
                <p>Manage multiple properties? Ask about our preferred partner programs and bulk pricing.</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Services -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>Our Core Services</h2>
            <p>Specialized cleaning solutions for property managers and building owners</p>
        </div>

        <div class="services-grid">
            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/moveout-cleaning.jpg"
                     alt="Move-Out Cleaning"
                     class="service-image"
                     onerror="this.src='https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800&h=600&fit=crop'">
                <div class="service-content">
                    <h3>Move-Out Cleaning</h3>
                    <p>Complete apartment and house cleaning between tenants. We clean every surface, appliance, and corner to meet your move-out standards.</p>
                    <ul class="service-features">
                        <li>Deep kitchen cleaning (appliances, cabinets, floors)</li>
                        <li>Bathroom sanitization</li>
                        <li>Window and blind cleaning</li>
                        <li>Carpet cleaning and stain removal</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/#moveout')); ?>" class="btn btn-primary">Learn More</a>
                </div>
            </div>

            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/office-cleaning.jpg"
                     alt="Office Cleaning"
                     class="service-image"
                     onerror="this.src='https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&h=600&fit=crop'">
                <div class="service-content">
                    <h3>Office & Commercial Cleaning</h3>
                    <p>Keep your commercial properties professional and inviting. Regular or one-time deep cleaning for offices, retail spaces, and common areas.</p>
                    <ul class="service-features">
                        <li>Daily, weekly, or monthly service</li>
                        <li>Break room and restroom maintenance</li>
                        <li>Floor care (carpet, tile, hardwood)</li>
                        <li>After-hours service available</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/services/#office')); ?>" class="btn btn-primary">Learn More</a>
                </div>
            </div>

            <div class="service-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/emergency-cleaning.jpg"
                     alt="Emergency Cleaning"
                     class="service-image"
                     onerror="this.src='https://images.unsplash.com/photo-1628177142898-93e36e4e3a50?w=800&h=600&fit=crop'">
                <div class="service-content">
                    <h3>Emergency Cleaning</h3>
                    <p>Property damage? Eviction cleanup? We handle urgent situations quickly and thoroughly to minimize your downtime.</p>
                    <ul class="service-features">
                        <li>24/7 emergency response</li>
                        <li>Post-eviction cleaning</li>
                        <li>Hoarding situation cleanup</li>
                        <li>Damage restoration cleaning</li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section section-light">
    <div class="container">
        <div class="section-header">
            <h2>Simple Process, Exceptional Results</h2>
            <p>Getting your property cleaned is easy with CleanFinish</p>
        </div>

        <div class="process-grid">
            <div class="process-step">
                <div class="step-number">1</div>
                <h3>Contact Us</h3>
                <p>Call, email, or use our online form. Tell us about your property and timeline. We provide an instant quote for standard units.</p>
            </div>

            <div class="process-step">
                <div class="step-number">2</div>
                <h3>Schedule Service</h3>
                <p>Choose your date and time. We work around your showing schedule and can coordinate with your maintenance team.</p>
            </div>

            <div class="process-step">
                <div class="step-number">3</div>
                <h3>We Clean</h3>
                <p>Our professional team arrives on time with all equipment and supplies. We follow your checklist and work efficiently.</p>
            </div>

            <div class="process-step">
                <div class="step-number">4</div>
                <h3>Final Walkthrough</h3>
                <p>We provide photo documentation and a completion report. Your property is ready to show or move-in immediately.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2>What Property Managers Say</h2>
            <p>Trusted by property managers across the metro area</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial">
                <div class="rating">★★★★★</div>
                <p class="testimonial-quote">"CleanFinish has been a game-changer for our property management company. They turn around units in 24 hours and the quality is consistently excellent. Our vacancy time has dropped significantly since partnering with them."</p>
                <div class="testimonial-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/client-1.jpg"
                         alt="Sarah Mitchell"
                         class="author-image"
                         onerror="this.src='https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&h=200&fit=crop'">
                    <div class="author-info">
                        <h4>Sarah Mitchell</h4>
                        <p>Property Manager, Metro Residential Properties</p>
                    </div>
                </div>
            </div>

            <div class="testimonial">
                <div class="rating">★★★★★</div>
                <p class="testimonial-quote">"We manage 200+ units and CleanFinish handles all our move-out cleaning. They're reliable, thorough, and their volume pricing makes them very competitive. The photo reports they provide are invaluable for our records."</p>
                <div class="testimonial-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/client-2.jpg"
                         alt="David Chen"
                         class="author-image"
                         onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop'">
                    <div class="author-info">
                        <h4>David Chen</h4>
                        <p>Regional Manager, Apex Property Management</p>
                    </div>
                </div>
            </div>

            <div class="testimonial">
                <div class="rating">★★★★★</div>
                <p class="testimonial-quote">"When we have an emergency situation, CleanFinish responds immediately. They've handled some difficult post-eviction cleanups for us and always restore the property to rent-ready condition. Highly recommend."</p>
                <div class="testimonial-author">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/client-3.jpg"
                         alt="Jennifer Torres"
                         class="author-image"
                         onerror="this.src='https://images.unsplash.com/photo-1580489944761-15a19d654956?w=200&h=200&fit=crop'">
                    <div class="author-info">
                        <h4>Jennifer Torres</h4>
                        <p>Building Manager, Downtown Commercial Plaza</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Partner with CleanFinish?</h2>
            <p>Get a free quote today and discover why property managers trust us for all their cleaning needs.</p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">Request a Quote</a>
                <a href="tel:2792648539" class="btn btn-secondary">Call (279) 264-8539</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
