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
<nav class="relative z-10 border-b border-white/10 bg-ultra-dark/80 backdrop-blur-xl">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-accent-primary to-accent-secondary bg-clip-text text-transparent">
                    Nexus
                </h1>
                <div class="hidden md:flex space-x-6">
                    <a href="<?php echo URLROOT ?>/" class="text-text-secondary hover:text-accent-primary transition px-2 py-4">Home</a>
                    <a href="<?php echo URLROOT ?>/PagesController/market" class="text-text-secondary hover:text-accent-primary transition px-2 py-4">Markets</a>
                    <a href="<?php echo URLROOT ?>/PagesController/Watchlist" class="text-text-secondary hover:text-accent-primary transition px-2 py-4">WatchList</a>
                    <a href="<?php echo URLROOT ?>/PagesController/my_wallet" class="text-text-secondary hover:text-accent-primary transition px-2 py-4">my Wallet</a>
                </div>
            </div>
            <?php if(!isset($_SESSION['user_id'])): ?>
                <div class="flex items-center space-x-4">
                    <a href="<?php echo URLROOT ?>/AuthController/login" class="px-4 py-2 text-text-primary hover:text-accent-primary transition">Log in</a>
                    <a href="<?php echo URLROOT ?>/AuthController/register" class="px-4 py-2 bg-accent-primary hover:bg-accent-secondary transition rounded-lg">Sign Up</a>
                </div>
            <?php else: ?>
                <div class="flex items-center space-x-4">
                    <a href="<?php echo URLROOT ?>/AuthController/logout" class="px-4 py-2 text-text-primary hover:text-accent-primary transition">Log out</a>
                </div>
            <?php endif; ?>
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
        <?php if (!empty($data['crypto'])): ?>
        <?php foreach ($data['crypto'] as $crypto): ?>
        <div class="group bg-card-dark rounded-2xl p-6 hover:shadow-xl hover:shadow-accent-primary/5 transition-all relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-accent-primary/10 to-accent-secondary/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>

            <!-- Delete Button Form -->
            <form action="<?php echo URLROOT ?>/WatchListController/removeCrypto" method="POST" class="absolute top-4 right-4 flex space-x-2">
                <input type="hidden" name="crypto_id" value="<?php echo $crypto->id_cryptomonnaie ?>">
                <input type="hidden" name="user_id" value="<?= $crypto->nexusid ?>">
                <button type="submit" class="bg-red-500/10 p-2 rounded-lg text-red-500 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-500/20">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>

            <!-- Sell Button -->
            <button
                    id="sellButton"
                    class="absolute top-4 right-16 bg-blue-500/10 p-2 rounded-lg text-blue-500 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-blue-500/20"
            >
                <i class="fas fa-dollar-sign"></i>
            </button>

            <div class="flex justify-between items-start mb-6">
                <div class="flex items-center space-x-4">
                    <div>
                        <h2 class="text-xl font-bold"><?= $crypto->crypto_name ?></h2>
                        <p class="text-text-secondary text-sm"><?= $crypto->symbol ?></p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold">$<?= $crypto->price ?></p>
                    <p class="text-emerald-500 text-sm flex items-center justify-end">
                        <i class="fas fa-caret-up mr-1"></i>3.24%
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-white/5 p-4 rounded-xl">
                    <p class="text-text-secondary text-sm mb-1">Market Cap</p>
                    <p class="font-semibold">$<?= $crypto->market_cap ?>T</p>
                </div>
                <div class="bg-white/5 p-4 rounded-xl">
                    <p class="text-text-secondary text-sm mb-1">Volume 24h</p>
                    <p class="font-semibold"><?= $crypto->volume_24h ?>B</p>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>

        <!-- Sell Modal -->
        <div id="sellModal" class="fixed inset-0 bg-black/50 items-center justify-center p-4 hidden">
            <div class="bg-card-dark rounded-xl p-6 w-full max-w-md mx-auto mt-20">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Sell Bitcoin</h3>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <form id="sellForm">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">
                            Amount to sell (BTC)
                        </label>
                        <input
                                type="number"
                                id="sellAmount"
                                class="w-full p-2 rounded-lg bg-white/5 border border-white/10 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                                placeholder="0.00"
                                step="0.00000001"
                                min="0"
                                required
                        >
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button
                                type="button"
                                id="cancelBtn"
                                class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10"
                        >
                            Cancel
                        </button>
                        <button
                                type="submit"
                                class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600"
                        >
                            Confirm Sell
                        </button>
                    </div>
                </form>
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
<script src="../public/js/main.js"></script>
</body>
</html>