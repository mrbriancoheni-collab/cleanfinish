<?php
/**
 * Template Name: Contact Template
 *
 * @package CleanFinish Pro
 */

get_header();
?>

<!-- Contact Hero -->
<section class="hero-section">
    <div class="hero-content">
        <h1>Contact CleanFinish</h1>
        <p class="tagline">Get a Free Quote or Schedule Service Today</p>
    </div>
</section>

<!-- Contact Information -->
<section class="content-section">
    <h2 class="section-title">Get in Touch</h2>
    <p class="section-subtitle">We're here to help with all your property cleaning needs</p>

    <div class="contact-info">
        <div class="contact-item">
            <h4>📞 Phone</h4>
            <p><a href="tel:5551234567" style="font-size: 1.2rem; font-weight: 600;">(555) 123-4567</a></p>
            <p style="color: #666; font-size: 0.9rem;">Mon-Sun: 7:00 AM - 9:00 PM</p>
        </div>

        <div class="contact-item">
            <h4>📧 Email</h4>
            <p><a href="mailto:info@cleanfinish.com" style="font-size: 1.2rem; font-weight: 600;">info@cleanfinish.com</a></p>
            <p style="color: #666; font-size: 0.9rem;">We respond within 2 hours</p>
        </div>

        <div class="contact-item">
            <h4>🚨 Emergency Service</h4>
            <p><a href="tel:5551234999" style="font-size: 1.2rem; font-weight: 600;">(555) 123-4999</a></p>
            <p style="color: #666; font-size: 0.9rem;">24/7 Emergency Line</p>
        </div>

        <div class="contact-item">
            <h4>📍 Service Area</h4>
            <p style="font-size: 1.2rem; font-weight: 600;">Metro Area</p>
            <p style="color: #666; font-size: 0.9rem;">Serving all surrounding counties</p>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="content-section" style="background-color: #f8f9fa; padding: 3rem 20px; margin: 0;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <h2 class="section-title">Request a Free Quote</h2>
        <p class="section-subtitle">Fill out the form below and we'll get back to you within 2 hours</p>

        <div class="contact-form">
            <form id="contact-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                <input type="hidden" name="action" value="contact_form_submission">

                <div class="form-group">
                    <label for="contact-type">I am a: *</label>
                    <select id="contact-type" name="contact_type" required>
                        <option value="">Select...</option>
                        <option value="property-manager">Property Manager</option>
                        <option value="building-owner">Building Owner</option>
                        <option value="building-manager">Building Manager</option>
                        <option value="landlord">Independent Landlord</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="first-name">First Name: *</label>
                        <input type="text" id="first-name" name="first_name" required>
                    </div>

                    <div class="form-group">
                        <label for="last-name">Last Name: *</label>
                        <input type="text" id="last-name" name="last_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="company">Company/Property Name:</label>
                    <input type="text" id="company" name="company">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="email">Email Address: *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number: *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="service-type">Service Needed: *</label>
                    <select id="service-type" name="service_type" required>
                        <option value="">Select a service...</option>
                        <option value="moveout-cleaning">Move-Out Cleaning</option>
                        <option value="office-cleaning">Office Cleaning</option>
                        <option value="emergency-cleaning">Emergency Cleaning</option>
                        <option value="post-eviction">Post-Eviction Cleanup</option>
                        <option value="recurring-service">Recurring Service</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div class="form-group">
                        <label for="property-type">Property Type:</label>
                        <select id="property-type" name="property_type">
                            <option value="">Select...</option>
                            <option value="apartment">Apartment</option>
                            <option value="house">House</option>
                            <option value="condo">Condo</option>
                            <option value="office">Office</option>
                            <option value="retail">Retail Space</option>
                            <option value="mixed-use">Mixed-Use Building</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="size">Size (sq ft or bedrooms):</label>
                        <input type="text" id="size" name="size" placeholder="e.g., 2BR or 1200 sq ft">
                    </div>
                </div>

                <div class="form-group">
                    <label for="urgency">When do you need service? *</label>
                    <select id="urgency" name="urgency" required>
                        <option value="">Select...</option>
                        <option value="emergency">Emergency (same day)</option>
                        <option value="urgent">Urgent (within 48 hours)</option>
                        <option value="this-week">This week</option>
                        <option value="next-week">Next week</option>
                        <option value="flexible">Flexible timing</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="units">Number of Properties/Units:</label>
                    <input type="number" id="units" name="units" min="1" placeholder="1">
                </div>

                <div class="form-group">
                    <label for="message">Additional Details:</label>
                    <textarea id="message" name="message" placeholder="Tell us about your cleaning needs, special requirements, or any questions you have..."></textarea>
                </div>

                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 0.5rem; font-weight: normal;">
                        <input type="checkbox" name="volume_discount" value="yes">
                        I manage multiple properties and am interested in volume discounts
                    </label>
                </div>

                <div style="background: #f8f9fa; padding: 1rem; border-radius: 5px; margin-bottom: 1rem; font-size: 0.9rem; color: #555;">
                    <strong>What happens next?</strong>
                    <ul style="margin-top: 0.5rem; margin-left: 1.5rem;">
                        <li>We'll review your request and respond within 2 hours</li>
                        <li>For standard units, we provide instant pricing</li>
                        <li>For complex jobs, we'll schedule a brief phone consultation</li>
                        <li>Emergency requests receive immediate attention</li>
                    </ul>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; font-size: 1.1rem;">Get Free Quote</button>
            </form>
        </div>
    </div>
</section>

<!-- Quick Contact Options -->
<section class="content-section">
    <h2 class="section-title">Prefer to Call or Email?</h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; max-width: 900px; margin: 2rem auto;">
        <div style="background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center;">
            <h3 style="color: #2c5f8d; margin-bottom: 1rem;">For Immediate Service</h3>
            <p style="color: #666; margin-bottom: 1rem;">Call us directly for fastest response</p>
            <a href="tel:5551234567" class="btn btn-primary">(555) 123-4567</a>
        </div>

        <div style="background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center;">
            <h3 style="color: #2c5f8d; margin-bottom: 1rem;">Email Us</h3>
            <p style="color: #666; margin-bottom: 1rem;">Send detailed information about your needs</p>
            <a href="mailto:info@cleanfinish.com" class="btn btn-primary">Send Email</a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="content-section" style="background-color: #fff; padding: 3rem 20px; margin: 0;">
    <div style="max-width: 900px; margin: 0 auto;">
        <h2 class="section-title">Common Questions</h2>

        <div style="margin-top: 2rem;">
            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #28a745;">
                <h4 style="color: #2c5f8d; margin-bottom: 0.5rem;">How quickly can you start?</h4>
                <p style="color: #555;">We offer same-day service for emergencies and can typically schedule standard cleanings within 24-48 hours.</p>
            </div>

            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #28a745;">
                <h4 style="color: #2c5f8d; margin-bottom: 0.5rem;">Do you provide cleaning supplies?</h4>
                <p style="color: #555;">Yes, we bring all professional-grade equipment and eco-friendly cleaning supplies. No need to provide anything.</p>
            </div>

            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #28a745;">
                <h4 style="color: #2c5f8d; margin-bottom: 0.5rem;">How do you handle keys and property access?</h4>
                <p style="color: #555;">We have secure key management protocols and can coordinate with your on-site staff or lockbox systems. All team members are background-checked and bonded.</p>
            </div>

            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; margin-bottom: 1rem; border-left: 4px solid #28a745;">
                <h4 style="color: #2c5f8d; margin-bottom: 0.5rem;">What if I'm not satisfied with the cleaning?</h4>
                <p style="color: #555;">We offer a 100% satisfaction guarantee. If you're not happy with any aspect of our service, we'll re-clean at no additional charge.</p>
            </div>

            <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px; border-left: 4px solid #28a745;">
                <h4 style="color: #2c5f8d; margin-bottom: 0.5rem;">Do you offer volume discounts?</h4>
                <p style="color: #555;">Yes! We offer competitive pricing for property management companies with multiple units. Contact us to discuss a customized partnership plan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Office Hours -->
<section class="content-section">
    <h2 class="section-title">Office Hours</h2>

    <div style="max-width: 600px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <div style="display: grid; grid-template-columns: auto 1fr; gap: 1rem; align-items: center;">
            <strong style="color: #2c5f8d;">Monday - Friday:</strong>
            <span>7:00 AM - 9:00 PM</span>

            <strong style="color: #2c5f8d;">Saturday:</strong>
            <span>8:00 AM - 8:00 PM</span>

            <strong style="color: #2c5f8d;">Sunday:</strong>
            <span>9:00 AM - 6:00 PM</span>

            <strong style="color: #2c5f8d;">Emergency Service:</strong>
            <span>24/7 Available</span>
        </div>

        <div style="background: #f8f9fa; padding: 1rem; border-radius: 5px; margin-top: 1.5rem; text-align: center;">
            <p style="color: #555; font-weight: 600;">Cleaning services available 7 days a week, including evenings and weekends</p>
        </div>
    </div>
</section>

<?php get_footer(); ?>
