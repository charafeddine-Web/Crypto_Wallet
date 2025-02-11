<!DOCTYPE html>
<html lang="en">
<!-- Previous head content remains the same -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Crypto - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ultra-dark': '#0A0F1C',
                        'card-dark': '#151C2F',
                        'accent-primary': '#6366F1',
                        'accent-secondary': '#8B5CF6',
                        'text-primary': '#E2E8F0',
                        'text-secondary': '#64748B'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-ultra-dark text-text-primary min-h-screen font-sans">
<!-- Navigation Bar -->
<nav class="fixed w-full bg-card-dark/80 backdrop-blur-xl border-b border-white/10 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Previous nav content -->
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-accent-primary to-accent-secondary bg-clip-text text-transparent">
                    Nexus
                </h1>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-text-primary hover:text-accent-primary transition">Dashboard</a>
                    <a href="#" class="text-text-secondary hover:text-accent-primary transition">Portfolio</a>
                    <a href="#" class="text-text-secondary hover:text-accent-primary transition">Exchange</a>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <!-- Notification Button and Panel -->
                <div class="relative group">
                    <button class="p-2 hover:bg-white/10 rounded-full transition">
                        <i class="fas fa-bell text-text-secondary"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Notification Panel -->
                    <div class="absolute right-0 mt-2 w-80 bg-card-dark rounded-xl shadow-2xl border border-white/10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <div class="p-4 border-b border-white/10">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold">Notifications</h3>
                                <span class="text-xs text-text-secondary">Mark all as read</span>
                            </div>
                        </div>

                        <div class="max-h-96 overflow-y-auto">
                            <!-- Unread Notification -->
                            <div class="p-4 hover:bg-white/5 transition cursor-pointer border-l-2 border-accent-primary bg-white/5">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-accent-primary/10 p-2 rounded-lg">
                                        <i class="fas fa-arrow-up text-accent-primary"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium">Bitcoin price alert</p>
                                        <p class="text-xs text-text-secondary mt-1">BTC exceeded $50,000</p>
                                        <p class="text-xs text-text-secondary mt-2">2 min ago</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Read Notification -->
                            <div class="p-4 hover:bg-white/5 transition cursor-pointer">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-green-500/10 p-2 rounded-lg">
                                        <i class="fas fa-check text-green-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm text-text-secondary">Transaction completed</p>
                                        <p class="text-xs text-text-secondary mt-1">Successfully bought 0.5 ETH</p>
                                        <p class="text-xs text-text-secondary mt-2">1 hour ago</p>
                                    </div>
                                </div>
                            </div>

                            <!-- System Notification -->
                            <div class="p-4 hover:bg-white/5 transition cursor-pointer">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-yellow-500/10 p-2 rounded-lg">
                                        <i class="fas fa-shield-alt text-yellow-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm text-text-secondary">Security alert</p>
                                        <p class="text-xs text-text-secondary mt-1">New login detected from Chrome</p>
                                        <p class="text-xs text-text-secondary mt-2">2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 border-t border-white/10">
                            <button class="w-full text-center text-sm text-accent-primary hover:text-accent-secondary transition">
                                View all notifications
                            </button>
                        </div>
                    </div>
                </div>

                <!-- User Profile -->
                <div class="flex items-center space-x-3 p-1.5 bg-white/5 rounded-full">
                    <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full border-2 border-accent-primary">
                    <span class="text-sm mr-2 hidden md:block">Alex Smith</span>
                    <button class="p-1.5 hover:bg-white/10 rounded-full transition">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="pt-20 container mx-auto px-4 max-w-7xl">
    <!-- Header Section -->
    <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
        <div class="mb-4 md:mb-0">
            <h1 class="text-4xl font-extrabold mb-2">
                    <span class="bg-gradient-to-r from-accent-primary to-accent-secondary bg-clip-text text-transparent">
                        Watchlist
                    </span>
            </h1>
            <p class="text-text-secondary">Track your favorite cryptocurrencies in real-time</p>
        </div>
        <div class="flex space-x-4">
            <button class="bg-white/5 hover:bg-white/10 text-text-primary px-4 py-2.5 rounded-xl transition-all flex items-center space-x-2">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </button>
            <button class="bg-gradient-to-r from-accent-primary to-accent-secondary text-white px-6 py-2.5 rounded-xl transition-all flex items-center space-x-2 hover:shadow-lg hover:shadow-accent-primary/20">
                <i class="fas fa-plus"></i>
                <span>Add Crypto</span>
            </button>
        </div>
    </header>

    <!-- Crypto Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Crypto Card -->
        <div class="group bg-card-dark rounded-2xl p-6 hover:shadow-xl hover:shadow-accent-primary/5 transition-all relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-accent-primary/10 to-accent-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <form action="<?php echo URLROOT ?>/WatchListController/removeCrypto" method="POST">
                <input type="hidden" name="crypto_id" value="<?php echo 8 ?>">
                <input type="hidden" name="user_id" value="<?php echo 8 ?>">
                <button type="submit" class="absolute top-4 right-4 bg-red-500/10 p-2 rounded-lg text-red-500 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-500/20">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            <div class="flex justify-between items-start mb-6">
                <div class="flex items-center space-x-4">
                    <div class="bg-white/5 p-2 rounded-xl">
                        <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin" class="w-10 h-10">
                    </div>
                    <div>
                        <h2 class="text-xl font-bold">Bitcoin</h2>
                        <p class="text-text-secondary text-sm">BTC</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold">$52,345.67</p>
                    <p class="text-emerald-500 text-sm flex items-center justify-end">
                        <i class="fas fa-caret-up mr-1"></i>3.24%
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white/5 p-4 rounded-xl">
                    <p class="text-text-secondary text-sm mb-1">Market Cap</p>
                    <p class="font-semibold">$1.02T</p>
                </div>
                <div class="bg-white/5 p-4 rounded-xl">
                    <p class="text-text-secondary text-sm mb-1">Volume 24h</p>
                    <p class="font-semibold">$25.3B</p>
                </div>
            </div>
        </div>

        <!-- Add New Card -->
        <div class="bg-card-dark rounded-2xl p-6 border-2 border-dashed border-white/10 hover:border-accent-primary/50 transition-colors flex items-center justify-center cursor-pointer group">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-4 mx-auto group-hover:bg-accent-primary/10 transition-colors">
                    <i class="fas fa-plus text-2xl text-text-secondary group-hover:text-accent-primary transition-colors"></i>
                </div>
                <p class="text-text-secondary group-hover:text-accent-primary transition-colors">Add Cryptocurrency</p>
            </div>
        </div>
    </div>

    <!-- Market Overview -->
    <section class="bg-card-dark rounded-2xl p-8">
        <h2 class="text-2xl font-bold mb-6">Market Overview</h2>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-text-secondary border-b border-white/10">
                    <th class="text-left pb-4 pl-4">#</th>
                    <th class="text-left pb-4">Name</th>
                    <th class="text-right pb-4">Price</th>
                    <th class="text-right pb-4">24h Change</th>
                    <th class="text-right pb-4 pr-4">Market Cap</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="py-4 pl-4">1</td>
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="bg-white/5 p-1 rounded-lg">
                                <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" class="w-6 h-6" alt="BTC">
                            </div>
                            <div>
                                <p class="font-medium">Bitcoin</p>
                                <p class="text-text-secondary text-sm">BTC</p>
                            </div>
                        </div>
                    </td>
                    <td class="text-right">$52,345.67</td>
                    <td class="text-right text-emerald-500">+3.24%</td>
                    <td class="text-right pr-4">$1.02T</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

</body>
</html>