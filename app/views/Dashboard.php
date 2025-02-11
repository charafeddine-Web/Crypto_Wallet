<!DOCTYPE html>
<html lang="fr">
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-ultra-dark text-gray-100 min-h-screen font-sans">
<!-- Navigation -->
<nav class="fixed w-full bg-card-dark/80 backdrop-blur-xl border-b border-white/10 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-8">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-accent-primary to-accent-secondary bg-clip-text text-transparent">
                    Nexus
                </h1>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-white hover:text-accent-primary transition">Dashboard</a>
                    <a href="#" class="text-gray-400 hover:text-accent-primary transition">Portfolio</a>
                    <a href="#" class="text-gray-400 hover:text-accent-primary transition">Exchange</a>
                    <a href="#" class="text-gray-400 hover:text-accent-primary transition">Transferts</a>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <!-- Balance -->
                <div class="hidden md:flex items-center space-x-2 bg-white/5 px-4 py-2 rounded-xl">
                    <i class="fas fa-wallet text-accent-primary"></i>
                    <span>1,234.56 USDT</span>
                </div>

                <!-- Notifications -->
                <div class="relative group">
                    <button class="p-2 hover:bg-white/10 rounded-full transition">
                        <i class="fas fa-bell text-gray-400"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Notification Panel -->
                    <div class="absolute right-0 mt-2 w-80 bg-card-dark rounded-xl shadow-2xl border border-white/10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                        <div class="p-4 border-b border-white/10">
                            <h3 class="font-semibold">Notifications</h3>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            <div class="p-4 hover:bg-white/5 transition border-l-2 border-accent-primary">
                                <p class="text-sm">Transaction réussie</p>
                                <p class="text-xs text-gray-400 mt-1">Vous avez reçu 0.5 ETH</p>
                                <p class="text-xs text-gray-500 mt-1">Il y a 2 min</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Profile -->
                <div class="flex items-center space-x-3 p-1.5 bg-white/5 rounded-full">
                    <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full">
                    <span class="text-sm mr-2 hidden md:block">Alex Smith</span>
                    <button class="p-1.5 hover:bg-white/10 rounded-full transition">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="pt-20 container mx-auto px-4">
    <!-- Portfolio Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-card-dark p-6 rounded-xl">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-400 text-sm">Portfolio Total</p>
                    <p class="text-2xl font-bold">$12,345.67</p>
                </div>
                <div class="bg-emerald-500/10 p-2 rounded-lg">
                    <i class="fas fa-chart-line text-emerald-500"></i>
                </div>
            </div>
            <div class="flex items-center text-emerald-500">
                <i class="fas fa-caret-up mr-1"></i>
                <span>+15.3%</span>
            </div>
        </div>

        <div class="bg-card-dark p-6 rounded-xl">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-400 text-sm">USDT Balance</p>
                    <p class="text-2xl font-bold">1,234.56</p>
                </div>
                <div class="bg-blue-500/10 p-2 rounded-lg">
                    <i class="fas fa-wallet text-blue-500"></i>
                </div>
            </div>
            <button class="text-sm text-accent-primary hover:text-accent-secondary transition">
                Recharger <i class="fas fa-plus ml-1"></i>
            </button>
        </div>

        <div class="bg-card-dark p-6 rounded-xl">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-400 text-sm">Transactions 24h</p>
                    <p class="text-2xl font-bold">23</p>
                </div>
                <div class="bg-purple-500/10 p-2 rounded-lg">
                    <i class="fas fa-exchange-alt text-purple-500"></i>
                </div>
            </div>
            <div class="text-gray-400 text-sm">
                Volume: $5,678.90
            </div>
        </div>

        <div class="bg-card-dark p-6 rounded-xl">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-gray-400 text-sm">Watchlist</p>
                    <p class="text-2xl font-bold">12</p>
                </div>
                <div class="bg-amber-500/10 p-2 rounded-lg">
                    <i class="fas fa-star text-amber-500"></i>
                </div>
            </div>
            <button class="text-sm text-accent-primary hover:text-accent-secondary transition">
                Gérer <i class="fas fa-arrow-right ml-1"></i>
            </button>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <button class="bg-card-dark p-6 rounded-xl hover:bg-white/5 transition group">
            <div class="flex items-center space-x-4">
                <div class="bg-accent-primary/10 p-3 rounded-xl group-hover:bg-accent-primary/20 transition">
                    <i class="fas fa-exchange-alt text-accent-primary"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-semibold">Échanger</h3>
                    <p class="text-sm text-gray-400">Achat/Vente de crypto</p>
                </div>
            </div>
        </button>

        <button class="bg-card-dark p-6 rounded-xl hover:bg-white/5 transition group">
            <div class="flex items-center space-x-4">
                <div class="bg-accent-secondary/10 p-3 rounded-xl group-hover:bg-accent-secondary/20 transition">
                    <i class="fas fa-paper-plane text-accent-secondary"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-semibold">Envoyer</h3>
                    <p class="text-sm text-gray-400">Transfert via NexusID</p>
                </div>
            </div>
        </button>

        <button class="bg-card-dark p-6 rounded-xl hover:bg-white/5 transition group">
            <div class="flex items-center space-x-4">
                <div class="bg-emerald-500/10 p-3 rounded-xl group-hover:bg-emerald-500/20 transition">
                    <i class="fas fa-plus text-emerald-500"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-semibold">Ajouter</h3>
                    <p class="text-sm text-gray-400">Nouvelle crypto</p>
                </div>
            </div>
        </button>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-card-dark rounded-xl p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Transactions Récentes</h2>
            <button class="text-accent-primary hover:text-accent-secondary transition">
                Voir tout <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                <div class="flex items-center space-x-4">
                    <div class="bg-emerald-500/10 p-2 rounded-lg">
                        <i class="fas fa-arrow-down text-emerald-500"></i>
                    </div>
                    <div>
                        <p class="font-medium">Reçu</p>
                        <p class="text-sm text-gray-400">De: nx_789xyz</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-medium">+0.5 ETH</p>
                    <p class="text-sm text-gray-400">Il y a 2h</p>
                </div>
            </div>

            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                <div class="flex items-center space-x-4">
                    <div class="bg-red-500/10 p-2 rounded-lg">
                        <i class="fas fa-arrow-up text-red-500"></i>
                    </div>
                    <div>
                        <p class="font-medium">Envoyé</p>
                        <p class="text-sm text-gray-400">À: nx_456abc</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-medium">-0.1 BTC</p>
                    <p class="text-sm text-gray-400">Il y a 5h</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>