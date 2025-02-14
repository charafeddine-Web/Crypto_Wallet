
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Crypto - Home</title>
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
<!-- Hero Section -->
<div class="relative overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-accent-primary/20 to-accent-secondary/20"></div>
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

    <!-- Hero Content -->
    <div class="relative container mx-auto px-4 pt-20 pb-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    Trade Crypto with Confidence
                </h1>
                <p class="text-xl text-text-secondary mb-8">
                    Experience seamless trading with advanced tools, real-time data, and institutional-grade security.
                </p>
                <div class="flex flex-wrap gap-4">
                    <button class="px-6 py-3 bg-gradient-to-r from-accent-primary to-accent-secondary hover:opacity-90 transition rounded-lg font-medium">
                        Start Trading
                    </button>
                    <button class="px-6 py-3 bg-white/10 hover:bg-white/20 transition rounded-lg font-medium">
                        View Markets
                    </button>
                </div>
                <div class="mt-12 flex items-center space-x-8">
                    <div>
                        <p class="text-3xl font-bold">$2.5B+</p>
                        <p class="text-text-secondary">24h Volume</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">2M+</p>
                        <p class="text-text-secondary">Users</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold">100+</p>
                        <p class="text-text-secondary">Countries</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img src="./public/img/d7de335c43f6a70379f4f193df3cc9f9.png" alt="Trading Platform" class="animate-float">
                <!-- Floating Elements -->
                <div class="absolute -top-6 -left-6 bg-card-dark p-4 rounded-lg border border-white/10 shadow-xl animate-fade-in">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-success/10 rounded-full flex items-center justify-center">
                            <i class="fab fa-bitcoin text-success text-xl"></i>
                        </div>
                        <div>
                            <p class="font-medium">Bitcoin</p>
                            <p class="text-success">+5.67%</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-6 -right-6 bg-card-dark p-4 rounded-lg border border-white/10 shadow-xl animate-fade-in">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-accent-primary/10 rounded-full flex items-center justify-center">
                            <i class="fab fa-ethereum text-accent-primary text-xl"></i>
                        </div>
                        <div>
                            <p class="font-medium">Ethereum</p>
                            <p class="text-success">+3.24%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose Nexus</h2>
            <p class="text-text-secondary text-lg max-w-2xl mx-auto">
                Experience the next generation of crypto trading with our cutting-edge platform
            </p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Security -->
            <div class="bg-card-dark p-6 rounded-xl border border-white/5 hover:border-accent-primary/50 transition-all duration-300">
                <div class="w-12 h-12 bg-accent-primary/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-accent-primary text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Bank-Grade Security</h3>
                <p class="text-text-secondary">
                    Your assets are protected by state-of-the-art security systems and insurance coverage.
                </p>
            </div>

            <!-- Trading Tools -->
            <div class="bg-card-dark p-6 rounded-xl border border-white/5 hover:border-success/50 transition-all duration-300">
                <div class="w-12 h-12 bg-success/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-chart-line text-success text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Advanced Trading</h3>
                <p class="text-text-secondary">
                    Professional-grade charts, real-time data, and advanced order types at your fingertips.
                </p>
            </div>

            <!-- Support -->
            <div class="bg-card-dark p-6 rounded-xl border border-white/5 hover:border-warning/50 transition-all duration-300">
                <div class="w-12 h-12 bg-warning/10 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-headset text-warning text-xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">24/7 Support</h3>
                <p class="text-text-secondary">
                    Our dedicated team is always available to help you with any questions or concerns.
                </p>
            </div>
        </div>
    </div>
</div>
<?php
function formatNumber($number) {
    if ($number >= 1000000000) {
        return number_format($number / 1000000000, 1) . 'B';
    } elseif ($number >= 1000000) {
        return number_format($number / 1000000, 1) . 'M';
    } else {
        return number_format($number, 1);
    }
}
?>


<!-- Market Overview -->
<div class="py-20 bg-card-dark/50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Popular Markets</h2>
            <button class="text-accent-primary hover:text-accent-secondary transition">View All Markets</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-text-secondary">
                    <th class="text-left py-4">Asset</th>
                    <th class="text-right py-4">Price</th>
                    <th class="text-right py-4">24h Change</th>
                    <th class="text-right py-4">Market Cap</th>
                    <th class="text-right py-4">Volume</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['data'] as $coin): ?>
                <tr class="border-t border-white/5 hover:bg-card-dark/50 transition-all duration-200">
                    <td class="py-4">
                        <div class="flex items-center space-x-3">
                            <span class="font-medium"><?php echo $coin['name'] ?></span>
                            <span class="text-text-secondary"><?php echo $coin['symbol'] ?></span>
                        </div>
                    </td>
                    <td class="text-right py-4">$<?php echo number_format($coin['quote']['USD']['price'], 2) ?></td>
                    <td class="text-right py-4 text-success"><?php echo number_format($coin['quote']['USD']['percent_change_24h'], 2) ?>%</td>
                    <td class="text-right py-4">$<?php echo formatNumber($coin['quote']['USD']['market_cap']) ?></td>
                    <td class="text-right py-4">$ <?php echo formatNumber($coin['total_supply']) ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="py-20">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-br from-accent-primary to-accent-secondary rounded-2xl p-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Start Trading Today</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
                Join millions of traders and investors who have discovered the power of crypto trading
            </p>
            <button class="px-8 py-4 bg-white text-accent-primary hover:bg-white/90 transition rounded-lg font-medium">
                Create Free Account
            </button>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="border-t border-white/10 py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-2xl font-bold bg-gradient-to-r from-accent-primary to-accent-secondary bg-clip-text text-transparent mb-4">
                    Nexus
                </h3>
                <p class="text-text-secondary">
                    Your trusted platform for cryptocurrency trading and investment.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4">Products</h4>
                <ul class="space-y-2 text-text-secondary">
                    <li><a href="#" class="hover:text-text-primary transition">Exchange</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Trading</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Wallet</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Cards</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Company</h4>
                <ul class="space-y-2 text-text-secondary">
                    <li><a href="#" class="hover:text-text-primary transition">About</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Careers</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Press</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Support</h4>
                <ul class="space-y-2 text-text-secondary">
                    <li><a href="#" class="hover:text-text-primary transition">Help Center</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">API Docs</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Terms</a></li>
                    <li><a href="#" class="hover:text-text-primary transition">Privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10 mt-8 pt-8 text-center">
            <p class="text-text-secondary">
                &copy; 2023 Nexus. All rights reserved.
            </p>
            <div class="flex justify-center space-x-4 mt-4">
                <a href="#" class="text-text-secondary hover:text-text-primary transition">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-text-secondary hover:text-text-primary transition">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="text-text-secondary hover:text-text-primary transition">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="text-text-secondary hover:text-text-primary transition">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function () {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function (msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    }
    else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
</script>
</body>
</html>