<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CryptoQueen - Your Trusted Crypto Exchange</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script> -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        .crypto-green {
    background-color: #33996e;
        }
        .text-crypto-green {
    color: #33996e;
}
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-crypto-green text-xl font-bold">CryptoQueen</span>
                </div>
                <div class="flex space-x-8">
                    <a href="#" class="text-black hover:text-crypto-green">Home</a>
                    <a href="#" class="text-black hover:text-crypto-green">Watchlist</a>
                    <a href="#" class="text-black hover:text-crypto-green">Wallet</a>
                    <a href="#" class="text-black hover:text-crypto-green">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <!-- <section class="py-20 crypto-green">
        <img src="Crypto.png" alt="Hero Background" class="w-full h-[300px] object-cover opacity-50"/>
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-6">Your Safe and Trusted Crypto Exchange</h1>
                <p class="text-xl text-white mb-8">Trade with confidence on the world's leading crypto exchange</p>
                <button class="bg-white text-crypto-green font-bold py-3 px-8 rounded-lg hover:bg-gray-100">
                    Start Trading
                </button>
            </div>
        </div>
    </section> -->

    <section class="relative h-screen">
        <img src="Crypto.png" alt="Hero Background" class="w-full h-full object-cover"/>
        <div class="absolute inset-0 flex items-center justify-start p-6">
            <div class="text-center">
                <h1 class="text-6xl font-bold mb-4">Welcome to</h1>
                <span class="text-6xl font-bold text-crypto-green">CryptoQueen</span>
                <p class="text-xl mb-8 p-6">Your trusted companion in the cryptocurrency journey</p>
                <button class="bg-crypto-green hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg">Get Started</button>
            </div>
        </div>
    </section>

    <!-- Market Overview -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-crypto-green mb-8">Market Overview</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Market cards will go here -->
                <div class="border rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold">BTC/USDT</span>
                        <span class="text-green-500">+2.45%</span>
                    </div>
                    <!-- Placeholder for chart -->
                    <div class="h-32 bg-gray-100 rounded mt-4"></div>
                </div>
                <div class="border rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold">BTC/USDT</span>
                        <span class="text-green-500">+2.45%</span>
                    </div>
                    <!-- Placeholder for chart -->
                    <div class="h-32 bg-gray-100 rounded mt-4"></div>
                </div>
                <div class="border rounded-lg p-6 hover:shadow-lg transition">
                    <div class="flex justify-between items-center">
                        <span class="text-xl font-bold">BTC/USDT</span>
                        <span class="text-green-500">+2.45%</span>
                    </div>
                    <!-- Placeholder for chart -->
                    <div class="h-32 bg-gray-100 rounded mt-4"></div>
                </div>
                <!-- Repeat similar cards -->
            </div>
        </div>
    </section>

    <!-- Products & Services -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-crypto-green mb-8">Explore CryptoQueen Products & Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 crypto-green rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold mb-2">Spot Trading</h3>
                    <p class="text-gray-600">Trade crypto with advanced tools and features</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 crypto-green rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold mb-2">Spot Trading</h3>
                    <p class="text-gray-600">Trade crypto with advanced tools and features</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 crypto-green rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold mb-2">Spot Trading</h3>
                    <p class="text-gray-600">Trade crypto with advanced tools and features</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 crypto-green rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold mb-2">Spot Trading</h3>
                    <p class="text-gray-600">Trade crypto with advanced tools and features</p>
                </div>
                <!-- Repeat similar cards for other services -->
            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-crypto-green mb-8">Latest Crypto News</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="border rounded-lg overflow-hidden">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bitcoin Reaches New Heights</h3>
                        <p class="text-gray-600">Latest updates on cryptocurrency market trends...</p>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bitcoin Reaches New Heights</h3>
                        <p class="text-gray-600">Latest updates on cryptocurrency market trends...</p>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Bitcoin Reaches New Heights</h3>
                        <p class="text-gray-600">Latest updates on cryptocurrency market trends...</p>
                    </div>
                </div>
                <!-- Repeat similar cards for other news -->
            </div>
        </div>
    </section>

    <!-- User Reviews -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-crypto-green mb-8">What Our Users Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 mr-4"></div>
                        <div>
                            <h4 class="font-bold">John Doe</h4>
                            <div class="flex text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Best crypto exchange I've ever used. Amazing features and support!"</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 mr-4"></div>
                        <div>
                            <h4 class="font-bold">John Doe</h4>
                            <div class="flex text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Best crypto exchange I've ever used. Amazing features and support!"</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 mr-4"></div>
                        <div>
                            <h4 class="font-bold">John Doe</h4>
                            <div class="flex text-yellow-400">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Best crypto exchange I've ever used. Amazing features and support!"</p>
                </div>
                <!-- Repeat similar cards for other reviews -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 crypto-green">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-white mb-8">CryptoQueen by Your Side</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-crypto-green mb-4">24/7 Support</h3>
                    <p class="text-gray-600">Our team is always here to help you</p>
                </div>
                <div class="bg-white p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-crypto-green mb-4">Community</h3>
                    <p class="text-gray-600">Join our active crypto community</p>
                </div>
                <div class="bg-white p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-crypto-green mb-4">Resources</h3>
                    <p class="text-gray-600">Guides, tutorials, and market analysis</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">CryptoQueen</h3>
                    <p class="text-gray-400">Your trusted crypto exchange platform</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Products</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Spot Trading</li>
                        <li>Margin Trading</li>
                        <li>Futures</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Support</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Help Center</li>
                        <li>FAQ</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <!-- Social media icons would go here -->
                        <div class="w-8 h-8 bg-gray-700 rounded-full"></div>
                        <div class="w-8 h-8 bg-gray-700 rounded-full"></div>
                        <div class="w-8 h-8 bg-gray-700 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>