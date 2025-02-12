<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Trading Platform</title>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>-->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>
<body class="bg-gray-100 min-h-screen p-8">
<div class="max-w-4xl mx-auto">
    <!-- Wallet Balance -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Your Wallet</h2>
        <div class="flex items-center">
            <span class="text-green-600 text-xl">$</span>
            <span class="text-3xl font-bold text-gray-900 ml-1">1000</span>
        </div>
    </div>
<!---->
<!--    --><?php //var_dump($data["Crypto"]); ?>

    <!-- Crypto List -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <!-- Bitcoin Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Bitcoin</h3>
                <span class="text-sm text-gray-500">BTC</span>
            </div>
            <div class="mb-4">
                <p class="text-2xl font-bold text-gray-900">$45,000</p>
                <p class="text-sm text-gray-600">Amount: 0.05 BTC</p>
            </div>
            <form method="POST" action="<?php echo URLROOT ?>/CryptoController/buyCrypto">
                <input type="hidden" name="crypto" value="45000">
                <input type="hidden" name="crypto_name" value="btc">
                <input type="number" name="amount"
                       class="w-full mb-3 p-2 border border-gray-300 rounded-lg"
                       placeholder="Amount to buy"
                       step="0.0001"
                       min="0"
                       required>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                    Buy BTC
                </button>
            </form>
        </div>

        <!-- Ethereum Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Ethereum</h3>
                <span class="text-sm text-gray-500">ETH</span>
            </div>
            <div class="mb-4">
                <p class="text-2xl font-bold text-gray-900">$2,500</p>
                <p class="text-sm text-gray-600">Amount: 5 ETH</p>
            </div>
            <form method="POST" action="<?php URLROOT ?>/CryptoController/buyCrypto">
                <input type="hidden" name="crypto" value="eth">
                <input type="number" name="amount"
                       class="w-full mb-3 p-2 border border-gray-300 rounded-lg"
                       placeholder="Amount to buy"
                       step="0.001"
                       min="0"
                       required>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                    Buy ETH
                </button>
            </form>
        </div>

        <!-- Dogecoin Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Dogecoin</h3>
                <span class="text-sm text-gray-500">DOGE</span>
            </div>
            <div class="mb-4">
                <p class="text-2xl font-bold text-gray-900">$0.15</p>
                <p class="text-sm text-gray-600">Amount: 10 DOGE</p>
            </div>
            <form method="POST" action="<?php URLROOT ?>/CryptoController/buyCrypto">
                <input type="hidden" name="crypto" value="doge">
                <input type="number" name="amount"
                       class="w-full mb-3 p-2 border border-gray-300 rounded-lg"
                       placeholder="Amount to buy"
                       step="1"
                       min="0"
                       required>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                    Buy DOGE
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>