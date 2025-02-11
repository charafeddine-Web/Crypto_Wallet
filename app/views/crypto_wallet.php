<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">

<!--success message-->
<?php if(isset($_SESSION['success'])): ?>
<div id="topModal" class="fixed top-0 left-0 w-full bg-green-400 shadow-md p-4 flex items-center justify-between">
    <span class="text-lg font-semibold text-white-800"><?php echo $_SESSION['success'] ?></span>
    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-800">&times;</button>
</div>
<?php unset($_SESSION['success']) ?>
<?php endif; ?>

<!-- Send Modal -->
<div id="sendModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-slate-800 rounded-xl p-6 w-full max-w-md">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Send USDT</h3>
            <button onclick="toggleModal('sendModal')" class="text-gray-400 hover:text-white">
                <i data-lucide="x" class="w-6 h-6 cursor-pointer">x</i>
            </button>
        </div>
        <form action="<?php echo URLROOT ?>/CryptoController/SendUSDT" class="space-y-4" method="post">
            <div>
                <label class="block text-sm font-medium mb-2">Recipient Email</label>
                <input type="email" name="receive_name" class="w-full bg-slate-700 rounded-lg px-4 py-2 text-white" placeholder="Enter recipient's email">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Amount (USDT)</label>
                <input name="sendAmount" type="number" class="w-full bg-slate-700 rounded-lg px-4 py-2 text-white" placeholder="0.00">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 rounded-lg font-medium">
                Send USDT
            </button>
        </form>
        </div>
    </div>

<!--deposit modal-->
<div id="depositModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-slate-800 rounded-xl p-6 w-full max-w-md">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold">Deposit</h3>
            <button onclick="toggleModal('depositModal')" class="text-gray-400 hover:text-white">
                <i data-lucide="x" class="w-6 h-6 cursor-pointer">x</i>
            </button>
        </div>
        <form action="<?php echo URLROOT ?>/CryptoController/depositUSDT" class="space-y-4" method="post">
            <div>
                <label class="block text-sm font-medium mb-2">Amount (USDT)</label>
                <input name="depositAmount" type="number" class="w-full bg-slate-700 rounded-lg px-4 py-2 text-white" placeholder="0.00">
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 rounded-lg font-medium">
                Deposit
            </button>
        </form>
    </div>
</div>

<div class="container mx-auto px-4 py-8">
    <!-- Balance Card -->
    <div class="bg-slate-800 rounded-xl p-6 mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Wallet Balance</h2>
            <div class="flex gap-2">
                <button onclick="toggleModal('sendModal')" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg text-sm">
                    Send
                </button>
                <button onclick="toggleModal('depositModal')" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg text-sm">
                    Deposit
                </button>
            </div>
        </div>
        <div class="flex items-baseline gap-2">
            <span class="text-4xl font-bold">2,459.84</span>
            <span class="text-xl text-gray-400">USDT</span>
        </div>
    </div>

    <!-- Recent Purchases -->
    <div class="bg-slate-800 rounded-xl p-6">
        <h2 class="text-xl font-semibold mb-6">Your Coins</h2>

        <div class="space-y-4">
            <!-- Bitcoin -->
            <div class="flex items-center justify-between p-4 bg-slate-700 rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center">
                        <i data-lucide="bitcoin" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-medium">Bitcoin</h3>
                        <p class="text-sm text-gray-400">0.0234 BTC</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right mr-4">
                        <p class="font-medium">$892.43</p>
                        <p class="text-sm text-green-400">+2.4%</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-sm">Buy</button>
                        <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">Sell</button>
                    </div>
                </div>
            </div>

            <!-- Ethereum -->
            <div class="flex items-center justify-between p-4 bg-slate-700 rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                        <i data-lucide="waves" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-medium">Ethereum</h3>
                        <p class="text-sm text-gray-400">1.45 ETH</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right mr-4">
                        <p class="font-medium">$1,243.21</p>
                        <p class="text-sm text-red-400">-1.2%</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-sm">Buy</button>
                        <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">Sell</button>
                    </div>
                </div>
            </div>

            <!-- Solana -->
            <div class="flex items-center justify-between p-4 bg-slate-700 rounded-lg">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                        <i data-lucide="disc" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="font-medium">Solana</h3>
                        <p class="text-sm text-gray-400">12.5 SOL</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-right mr-4">
                        <p class="font-medium">$324.20</p>
                        <p class="text-sm text-green-400">+5.7%</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-sm">Buy</button>
                        <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-sm">Sell</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Lucide icons
    lucide.createIcons();

    // Modal toggle function
    function toggleModal(modalname) {
        const modal = document.getElementById(modalname);
        modal.classList.toggle('hidden');
    }

    function openModal() {
        document.getElementById("topModal").style.display = "flex";
    }
    function closeModal() {
        document.getElementById("topModal").style.display = "none";
    }
</script>
</body>
</html>