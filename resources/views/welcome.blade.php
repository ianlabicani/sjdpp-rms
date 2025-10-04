@extends('shell')

@section('content')

    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-12 w-12 rounded-full object-cover">
                    <span class="text-xl font-bold text-gray-800">SJDPP Church</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 font-medium transition">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 font-medium transition">About</a>
                    <a href="#services" class="text-gray-700 hover:text-blue-600 font-medium transition">Services</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 font-medium transition">Contact</a>
                </div>
                <div class="flex space-x-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative h-screen flex items-center justify-center text-white">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/church.jpg') }}');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="relative z-10 text-center px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 animate-fade-in">Welcome to SJDPP Church</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">A community of faith, hope, and love. Join us in worship and fellowship.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#about" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition transform hover:scale-105">Learn More</a>
                <a href="#contact" class="bg-white text-gray-800 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition transform hover:scale-105">Get in Touch</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">About Us</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('images/church.jpg') }}" alt="Church Building" class="rounded-lg shadow-xl w-full h-96 object-cover">
                </div>
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Our Mission & Vision</h3>
                    <p class="text-gray-600 text-lg mb-4 leading-relaxed">
                        SJDPP Church is dedicated to spreading the word of God and building a community rooted in faith, compassion, and service. We strive to create a welcoming environment where everyone can grow spiritually and find their purpose.
                    </p>
                    <p class="text-gray-600 text-lg mb-6 leading-relaxed">
                        Through worship, education, and outreach programs, we aim to make a positive impact in our community and beyond.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h4 class="text-2xl font-bold text-blue-600 mb-2">500+</h4>
                            <p class="text-gray-600">Members</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h4 class="text-2xl font-bold text-blue-600 mb-2">25+</h4>
                            <p class="text-gray-600">Years of Service</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Join us in our weekly services and special events. Everyone is welcome!</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Sunday Worship -->
                <div class="bg-gradient-to-br from-blue-50 to-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-book-bible text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Sunday Worship</h3>
                    <p class="text-gray-600 mb-4">Join us every Sunday at 9:00 AM and 11:00 AM for inspiring worship services.</p>
                    <p class="text-blue-600 font-semibold">Every Sunday • 9:00 AM & 11:00 AM</p>
                </div>

                <!-- Bible Study -->
                <div class="bg-gradient-to-br from-green-50 to-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-users text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Bible Study</h3>
                    <p class="text-gray-600 mb-4">Deepen your faith through interactive Bible study sessions every Wednesday.</p>
                    <p class="text-green-600 font-semibold">Every Wednesday • 7:00 PM</p>
                </div>

                <!-- Prayer Meeting -->
                <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-hands-praying text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Prayer Meeting</h3>
                    <p class="text-gray-600 mb-4">Join us in prayer and fellowship every Friday evening for spiritual renewal.</p>
                    <p class="text-purple-600 font-semibold">Every Friday • 6:30 PM</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Get in Touch</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-4"></div>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">We'd love to hear from you. Reach out to us for any inquiries or prayer requests.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Contact Information -->
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Address</h4>
                            <p class="text-gray-600">123 Church Street<br>Your City, State 12345</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Phone</h4>
                            <p class="text-gray-600">+1 (234) 567-8900</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Email</h4>
                            <p class="text-gray-600">info@sjdppchurch.com</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-orange-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Office Hours</h4>
                            <p class="text-gray-600">Monday - Friday: 9:00 AM - 5:00 PM<br>Saturday - Sunday: Closed</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="John Doe" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="john@example.com" required>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="How can we help you?" required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition" placeholder="Your message here..." required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <!-- About Column -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Church Logo" class="h-10 w-10 rounded-full object-cover">
                        <h3 class="text-xl font-bold">SJDPP Church</h3>
                    </div>
                    <p class="text-gray-400">Building a community of faith, hope, and love since 1998.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition">Services</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Our Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Sunday Worship</li>
                        <li>Bible Study</li>
                        <li>Prayer Meetings</li>
                        <li>Youth Ministry</li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-lg font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition">
                            <i class="fab fa-youtube text-white"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} SJDPP Church. All rights reserved. Built with faith and dedication.</p>
            </div>
        </div>
    </footer>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navHeight = 64; // Height of fixed navbar
                    const targetPosition = target.offsetTop - navHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>

@endsection
