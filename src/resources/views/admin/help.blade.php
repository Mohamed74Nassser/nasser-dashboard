@extends('nasser-dashboard::layouts.master')

@section('title', 'Help & Support')





@section('header-actions')
  <button class="btn btn-primary btn-sm me-2">
    <i class="bi bi-chat me-1"></i>Contact Support
  </button>
  <button class="btn btn-info btn-sm">
    <i class="bi bi-book me-1"></i>Documentation
  </button>
@endsection

@section('content')
@php
// Static help data
$faqs = collect([
    (object) [
        'question' => 'How do I add a new product?',
        'answer' => 'Navigate to Products > All Products and click the "Add New Product" button. Fill in the required information including product name, description, price, and category.',
        'category' => 'products'
    ],
    (object) [
        'question' => 'How can I manage user permissions?',
        'answer' => 'Go to Users section and click on the user you want to modify. You can change their role and permissions from the user details page.',
        'category' => 'users'
    ],
    (object) [
        'question' => 'How do I export data from the dashboard?',
        'answer' => 'Most sections have an export button. Look for the download icon in the top right corner of each section to export data in various formats.',
        'category' => 'general'
    ],
    (object) [
        'question' => 'How can I customize the dashboard appearance?',
        'answer' => 'Go to Settings > Appearance to change themes, colors, and layout options. You can also upload custom logos and favicons.',
        'category' => 'settings'
    ],
    (object) [
        'question' => 'How do I set up email notifications?',
        'answer' => 'Navigate to Settings > Notifications to configure email alerts for orders, products, and system events.',
        'category' => 'settings'
    ],
    (object) [
        'question' => 'How can I backup my data?',
        'answer' => 'Go to Settings > Backup & Restore to configure automatic backups or create manual backups of your data.',
        'category' => 'settings'
    ]
]);

$documentationSections = collect([
    (object) [
        'title' => 'Getting Started',
        'description' => 'Learn the basics of using the dashboard',
        'icon' => 'bi-rocket',
        'color' => 'primary',
        'topics' => ['Installation', 'First Login', 'Dashboard Overview', 'Navigation']
    ],
    (object) [
        'title' => 'Product Management',
        'description' => 'Manage your products and inventory',
        'icon' => 'bi-box',
        'color' => 'success',
        'topics' => ['Adding Products', 'Categories', 'Inventory', 'Pricing']
    ],
    (object) [
        'title' => 'Order Management',
        'description' => 'Handle orders and customer data',
        'icon' => 'bi-cart',
        'color' => 'info',
        'topics' => ['Viewing Orders', 'Order Status', 'Customer Info', 'Shipping']
    ],
    (object) [
        'title' => 'User Management',
        'description' => 'Manage users and permissions',
        'icon' => 'bi-people',
        'color' => 'warning',
        'topics' => ['Adding Users', 'Roles', 'Permissions', 'Security']
    ],
    (object) [
        'title' => 'Settings & Configuration',
        'description' => 'Customize your dashboard',
        'icon' => 'bi-gear',
        'color' => 'secondary',
        'topics' => ['General Settings', 'Appearance', 'Notifications', 'Backup']
    ],
    (object) [
        'title' => 'Analytics & Reports',
        'description' => 'View insights and generate reports',
        'icon' => 'bi-graph-up',
        'color' => 'danger',
        'topics' => ['Dashboard Analytics', 'Sales Reports', 'Export Data', 'Charts']
    ]
]);
@endphp

<div class="content-wrapper">


    <section class="content">
        <div class="container-fluid">
            <!-- Quick Help Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $faqs->count() }}</h3>
                            <p>FAQ Articles</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-question-circle"></i>
                        </div>
                        <a href="#faqSection" class="small-box-footer">
                            Browse FAQs <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $documentationSections->count() }}</h3>
                            <p>Documentation Sections</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-book"></i>
                        </div>
                        <a href="#docsSection" class="small-box-footer">
                            View Docs <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>24/7</h3>
                            <p>Support Available</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Get Help <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>5min</h3>
                            <p>Average Response</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Contact Us <i class="bi bi-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="row">
                <!-- Documentation Sections -->
                <div class="col-lg-8">
                    <div class="card" id="docsSection">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-book me-2"></i>
                                Documentation
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($documentationSections as $section)
                                    <div class="col-md-6 mb-4">
                                        <div class="card border h-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="bg-{{ $section->color }} text-white rounded-circle p-3 me-3">
                                                        <i class="bi {{ $section->icon }} fs-4"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="mb-0">{{ $section->title }}</h5>
                                                        <small class="text-muted">{{ $section->description }}</small>
                                                    </div>
                                                </div>
                                                <ul class="list-unstyled">
                                                    @foreach($section->topics as $topic)
                                                        <li class="mb-2">
                                                            <a href="#" class="text-decoration-none">
                                                                <i class="bi bi-chevron-right text-{{ $section->color }} me-2"></i>
                                                                {{ $topic }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button class="btn btn-outline-{{ $section->color }} btn-sm w-100">
                                                    <i class="bi bi-arrow-right me-2"></i>
                                                    Read More
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="card" id="faqSection">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-question-circle me-2"></i>
                                Frequently Asked Questions
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="faqAccordion">
                                @foreach($faqs as $index => $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faq{{ $index }}">
                                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" 
                                                    type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#collapse{{ $index }}">
                                                <i class="bi bi-question-circle text-primary me-2"></i>
                                                {{ $faq->question }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" 
                                             data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                <p class="mb-0">{{ $faq->answer }}</p>
                                                <div class="mt-2">
                                                    <span class="badge bg-secondary">{{ ucfirst($faq->category) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Support Options -->
                <div class="col-lg-4">
                    <!-- Contact Support -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-headset me-2"></i>
                                Contact Support
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-3">
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-envelope text-primary fs-1 mb-2"></i>
                                    <h6>Email Support</h6>
                                    <p class="text-muted small mb-2">Get help via email</p>
                                    <a href="mailto:support@nasser-dashboard.com" class="btn btn-primary btn-sm">
                                        support@nasser-dashboard.com
                                    </a>
                                </div>
                                
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-chat-dots text-success fs-1 mb-2"></i>
                                    <h6>Live Chat</h6>
                                    <p class="text-muted small mb-2">Chat with our support team</p>
                                    <button class="btn btn-success btn-sm">
                                        Start Chat
                                    </button>
                                </div>
                                
                                <div class="text-center p-3 bg-light rounded">
                                    <i class="bi bi-telephone text-info fs-1 mb-2"></i>
                                    <h6>Phone Support</h6>
                                    <p class="text-muted small mb-2">Call us directly</p>
                                    <a href="tel:+1234567890" class="btn btn-info btn-sm">
                                        +1 (234) 567-890
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-link-45deg me-2"></i>
                                Quick Links
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="bi bi-play-circle me-2"></i>
                                    Video Tutorials
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="bi bi-download me-2"></i>
                                    Download User Guide
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="bi bi-youtube me-2"></i>
                                    YouTube Channel
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="bi bi-people me-2"></i>
                                    Community Forum
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="bi bi-bug me-2"></i>
                                    Report a Bug
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <i class="bi bi-lightbulb me-2"></i>
                                    Feature Request
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-activity me-2"></i>
                                System Status
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Dashboard</span>
                                <span class="badge bg-success">Operational</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>API Services</span>
                                <span class="badge bg-success">Operational</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Database</span>
                                <span class="badge bg-success">Operational</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Email Service</span>
                                <span class="badge bg-success">Operational</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>Backup System</span>
                                <span class="badge bg-success">Operational</span>
                            </div>
                            <hr>
                            <small class="text-muted">
                                Last updated: {{ now()->format('M d, Y H:i') }}
                            </small>
                        </div>
                    </div>

                    <!-- Support Hours -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="bi bi-clock me-2"></i>
                                Support Hours
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6">
                                    <h6 class="text-success">Monday - Friday</h6>
                                    <p class="text-muted small">9:00 AM - 6:00 PM</p>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-info">Saturday</h6>
                                    <p class="text-muted small">10:00 AM - 4:00 PM</p>
                                </div>
                                <div class="col-12">
                                    <h6 class="text-warning">Emergency Support</h6>
                                    <p class="text-muted small">24/7 Available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Contact Support Modal -->
<div class="modal fade" id="contactModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-envelope me-2"></i>
                    Contact Support
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contactName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="contactName" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="contactEmail" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contactSubject" class="form-label">Subject</label>
                        <select class="form-control" id="contactSubject" required>
                            <option value="">Select a subject</option>
                            <option value="technical">Technical Issue</option>
                            <option value="billing">Billing Question</option>
                            <option value="feature">Feature Request</option>
                            <option value="bug">Bug Report</option>
                            <option value="general">General Inquiry</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contactPriority" class="form-label">Priority</label>
                        <select class="form-control" id="contactPriority" required>
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                            <option value="urgent">Urgent</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contactMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="contactMessage" rows="5" 
                                  placeholder="Please describe your issue or question in detail..." required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="contactAttachments">
                            <label class="form-check-label" for="contactAttachments">
                                I have screenshots or files to attach
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">
                    <i class="bi bi-send me-2"></i>
                    Send Message
                </button>
            </div>
        </div>
    </div>
</div>

@endsection 