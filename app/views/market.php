<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Crypto - Markets</title>
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
                        'text-secondary': '#64748B',
                        'success': '#10B981',
                        'warning': '#F59E0B',
                        'danger': '#EF4444'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-ultra-dark text-text-primary min-h-screen font-sans">
<!-- Navigation -->
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

<!-- Market Section -->
<div class="py-12 bg-ultra-dark">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-text-primary">Top Cryptocurrencies</h2>
            <div class="flex space-x-4">
                <button class="px-4 py-2 bg-card-dark hover:bg-white/10 transition rounded-lg text-text-primary">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <button class="px-4 py-2 bg-card-dark hover:bg-white/10 transition rounded-lg text-text-primary">
                    <i class="fas fa-star mr-2"></i>Watchlist
                </button>
            </div>
        </div>

        <!-- Market Table -->
        <div class="bg-card-dark rounded-xl border border-white/5 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                    <tr class="text-text-secondary border-b border-white/5">
                        <th class="text-left p-4">Rank</th>
                        <th class="text-left p-4">Name</th>
                        <th class="text-left p-4">Price</th>
                        <th class="text-left p-4">24h Change</th>
                        <th class="text-left p-4">Market Cap</th>
                        <th class="text-left p-4">Volume (24h)</th>
                        <th class="text-left p-4">Circulating Supply</th>
                        <th class="text-left p-4">Watchlist</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['cryptos'] as $crypto) : ?>

                            <tr>
                                <td><form action="<?php echo URLROOT ?>/WatchListController/AddToDataBase" method="POST"></td>
                            <td class="text-left p-4"><?= htmlspecialchars($crypto['cmc_rank']); ?></td>
                                <td class="text-left p-4"><?= htmlspecialchars($crypto['name']); ?> (<?= htmlspecialchars($crypto['symbol']); ?>)</td>
                                <td><input type="hidden" name="name" value="<?= htmlspecialchars($crypto['name']); ?>"></td>
                                <td><input type="hidden" name="symbol" value="<?= htmlspecialchars($crypto['symbol']); ?>"></td>
                                <td><input type="hidden" name="slog" value="<?= htmlspecialchars($crypto['symbol']); ?>"></td>
                                <td class="text-left p-4">$<?= number_format($crypto['quote']['USD']['price'], 2); ?></td>
                                <td><input type="hidden" name="max_supply" value="<?= number_format($crypto['quote']['USD']['price'], 2); ?>"></td>
                                <td><input type="hidden" name="prix" value="<?= number_format($crypto['quote']['USD']['price'], 2); ?>"></td>
                                <td class="text-left p-4">$<?= number_format($crypto['quote']['USD']['market_cap'], 0, '.', ','); ?></td>
                                <td><input type="hidden" name="marketcap" value="<?= number_format($crypto['quote']['USD']['market_cap'], 0, '.', ','); ?>"></td>
                                <td class="text-left p-4 font-bold"
                                    style="color: <?= $crypto['quote']['USD']['percent_change_24h'] >= 0 ? 'green' : 'red'; ?>;">
                                    <?= number_format($crypto['quote']['USD']['percent_change_24h'], 2); ?>%

                                </td>
                                <td><input type="hidden" name="volume24h" value="<?=  number_format($crypto['quote']['USD']['percent_change_24h'], 2); ?>"></td>
                                <td class="text-left p-4">$<?= number_format($crypto['quote']['USD']['market_cap'], 0, '.', ','); ?></td>
                                <td><input type="hidden" name="circulatingsupply" value="<?= number_format($crypto['quote']['USD']['market_cap'], 0, '.', ','); ?>"></td>
                                <td
                                        class="text-left p-4">$<?= number_format($crypto['quote']['USD']['volume_24h'], 0, '.', ','); ?></td>
                                <td><input type="hidden" name="total_supply" value="<?= number_format($crypto['quote']['USD']['volume_24h'], 0, '.', ','); ?>"></td>
                                <td class="text-center p-4 cursor-pointer"><button type="submit"><i class="fas fa-star mr-2  hover:text-yellow-500"></i></button></td>
                                <td></form></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center mt-6">
            <div class="text-text-secondary">
                Showing 1-10 of 100 cryptocurrencies
            </div>
            <div class="flex space-x-2">
                <button class="px-4 py-2 bg-card-dark hover:bg-white/10 transition rounded-lg text-text-primary">Previous</button>
                <button class="px-4 py-2 bg-accent-primary hover:bg-accent-secondary transition rounded-lg text-text-primary">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="border-t border-white/10 py-12 mt-12">
    <div class="container mx-auto px-4 text-center text-text-secondary">
        <p>&copy; 2024 Nexus. All rights reserved.</p>
    </div>
</footer>
</body>
</html>