

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/image/coins.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/market.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/watchlist.css">
    <script src="https://kit.fontawesome.com/6e1faf1eda.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/image/favicon.svg" type="image/svg+xml">
    <link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/6e1faf1eda.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/image/favicon.svg" type="image/svg+xml">
    <link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

</head>
<body>
<style>
    .bg-active {
        background-color: #2d3e50;
        /* Change this to your desired active background color */
    }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.js" integrity="sha512-6m6AtgVSg7JzStQBuIpqoVuGPVSAK5Sp/ti6ySu6AjRDa1pX8mIl1TwP9QmKXU+4Mhq/73SzOk6mbNvyj9MPzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Navigation -->
<nav class="relative z-10 border-b border-white/10 bg-ultra-dark/80 backdrop-blur-xl text-white">
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
<article>
    <h1 class="text-center text-3xl">choose your transaction</h1>
    <div class=" flex items-center justify-around w-[50vw] mx-auto w-52">

        <button id="buy-button" class="buy-button mx-auto mt-8 bg-blue-500 text-white font-bold py-2 px-4 rounded">
            BUY
        </button>

        <button id="sell-button" class="sell-button mx-auto mt-8 bg-blue-500 text-white font-bold py-2 px-4 rounded">
            SELL
        </button>
        <button id="send-button" class="sell-button mx-auto mt-8 bg-blue-500 text-white  font-bold py-2 px-4 rounded">
            SEND
        </button>

    </div>



    <div id="buy" class="mt-4">
        <form action="<?php echo URLROOT; ?>/TransactionController/add_transac" method="post" class="w-[70vw]  mx-auto shadow-lg shadow-indigo-500/50 rounded px-8 pt-6 pb-8 mb-4">
            <h1 class=" block text-center uppercase tracking-wide text-white  font-bold mb-2">Cryptocurrency Converter Calculator</h1>
            <div class=" md:w-2/3 px-3 mx-auto mb-6 md:mb-0 flex items-center justify-around">

                <div class="w-full ">
                    <label class="block uppercase tracking-wide text-white text-lg font-bold mb-2" for="grid-state">
                        choose your coin
                    </label>
                    <div class="relative">
                        <select name="coin" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">

                            <?php foreach ($data['data'] as $crypto) : ?>
                                
                                <option value="<?= $crypto['quote']['USD']['price'] . '/' . $crypto['name'] . '/' . $crypto['id']; ?>"><?= $crypto['name'] . '(' . $crypto['symbol'] . ')'; ?> </option>


                            <?php endforeach; ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <svg class="m-8 w-fit h-28 w-28" xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff" d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                </svg>
                <div class="w-full ">
                    <label class="block uppercase tracking-wide text-gray-700 text-lg font-bold mb-2" for="grid-state">
                        Enter the dollar amount</label>
                    <div class="relative h-full">
                        <input class=" block  appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="amount" id="amount" type="" placeholder="00.00">
                        </input>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>




            <div id="calculated-amount" class="text-center text-white font-bold"></div>
            <div class="mx-auto w-fit">
                <button class="mx-auto  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    BUY
                </button>
            </div>
            <input name="cryptoamount" class="hidden" id="crypto_amount">
            <input name="cryptoid" class="hidden " id="crypto_id">
        </form>
    </div>
    <div class="hidden mt-2" id="sell">
        <form action="<?php echo URLROOT; ?>/TransactionController/sell_transac" method="post" class="  mx-auto shadow-lg shadow-indigo-500/50 rounded px-8 pt-6 pb-8 mb-4">
            <h1 class=" block text-center uppercase tracking-wide text-white  font-bold mb-2">Coin amount</h1>
            <div class="w-[35vw] mx-auto flex items-center  ">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="coin_amount" type="" placeholder="00.00">
            </div>
            <div class=" md:w-2/3 px-3 mx-auto mb-6 md:mb-0 flex items-center justify-around">

                <div class="w-full">
                    <label class="block uppercase tracking-wide text-white text-lg font-bold mb-2" for="grid-state">
                        choose your coin
                    </label>
                    <form action="">
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="coins">

                                <?php foreach ($data['data'] as $crypto) : ?>

                                    <option value="<?= $crypto['quote']['USD']['price'] . '/' . $crypto['name'] . '/' . $crypto['id']; ?>"><?= $crypto['name'] . '(' . $crypto['symbol'] . ')'; ?> </option>


                                <?php endforeach; ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                </div>
                <svg class="m-8 w-fit h-28 w-28" xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff" d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                </svg>
                <div class="w-full h-full">
                    <label class="block uppercase tracking-wide text-white text-lg font-bold mb-2" for="grid-state">
                        choose your coin
                    </label>
                    <div class="relative h-full">
                        <input name="coin_amount"  class=" block  appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="amout_dollar" readonly>
                        </input>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
            <h1 class=" block text-center uppercase tracking-wide text-white  font-bold mb-2">Enter the dollar amount</h1>
            <div class="mx-auto w-fit">
                <button class="mx-auto mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    SELL
                </button>
            </div>
            <input name="cryptoamount" class="hidden" id="crypto_amount">
            <input name="cryptoid" class="hidden " id="crypto_id2">
        </form>
    </div>
    <div class="hidden mt-2" id="send">
        <form action="<?php echo URLROOT; ?>/TransactionController/send_transac" method="post" class=" w-[70vw]  mx-auto shadow-lg shadow-indigo-500/50 rounded px-8 pt-6 pb-8 mb-4">
        <h1 class=" block text-center uppercase tracking-wide text-white  font-bold mb-2"> ENTER EMAIL RECEIVER OR NEXUS ID </h1>
            <div class="w-[35vw] mx-auto flex items-center  ">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email_exist" type="text" name="email" placeholder="ENTER THE EMAIL OR THE NEXUX_id">
            </div>
            
            <div id="search_result" class="text-center text-white font-bold"></div>
            <h1 class=" block text-center uppercase tracking-wide text-white  font-bold mb-2"> ENTER COIN AMOUNT</h1>

            <div class="w-[35vw] mx-auto flex items-center  ">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="coin_amount2" type="" name="coin_amount" placeholder="00.00">
            </div>
            <div class=" md:w-2/3 px-3 mx-auto mb-6 md:mb-0 flex items-center justify-around">

                <div class="w-full">
                    <label class="block uppercase tracking-wide text-white text-lg font-bold mb-2" for="grid-state">
                        choose your coin
                    </label>
                    <form action="">
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="coins_send">

                                <?php foreach ($data['data'] as $crypto) : ?>

                                    <option value="<?= $crypto['quote']['USD']['price'] . '/' . $crypto['name'] . '/' . $crypto['id']; ?>"><?= $crypto['name'] . '(' . $crypto['symbol'] . ')'; ?> </option>


                                <?php endforeach; ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                </div>
                <svg class="m-8 w-fit h-28 w-28" xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff" d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                </svg>
                <div class="w-full h-full">
                    <label class="block uppercase tracking-wide text-white text-lg font-bold mb-2" for="grid-state">
                        choose your coin
                    </label>
                    <div class="relative h-full">
                        <input class=" block  appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="amout_dollar_send" readonly>
                        </input>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
            <h1 class=" block text-center uppercase tracking-wide text-white  font-bold mb-2">Enter the dollar amount</h1>
            <div class="mx-auto w-fit">
                <button class="mx-auto mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    SELL
                </button>
            </div>
            <input name="cryptoamount" class="hidden" id="crypto_amount">
            <input name="cryptoid" class="hidden " id="crypto_id3">
        </form>
    </div>
</article>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    /************************ */
    $(document).ready(function() {


        $('.buy-button, .sell-button, .send-button').click(function() {
            // Remove 'bg-active' class from all buttons
            $('.buy-button, .sell-button, .send-button').removeClass('bg-active');

            // Add 'bg-active' class to the clicked button
            $(this).addClass('bg-active');
        });

        /******************************** */
        $("#sell").hide();
        $("#send").hide();
        $("#buy").hide();

        // Click event for the "BUY" button
        $("#buy-button").click(function() {
            $(this).addClass('active');
            $('#sell-button').removeClass('active');
            $('#send-button').removeClass('active');
            $("#buy").show();
            $("#sell").hide();
            $("#send").hide();
        });

        // Click event for the "SELL" button
        $("#sell-button").click(function() {
            $(this).addClass('active');
            $('#buy-button').removeClass('active');
            $('#send-button').removeClass('active');
            $("#buy").hide();
            $("#send").hide();
            $("#sell").show();
        });

        $("#send-button").click(function() {
            $(this).addClass('active');
            $('#buy-button').removeClass('active');
            $('#sell-button').removeClass('active');
            $("#buy").hide();
            $("#send").show();
            $("#sell").hide();
        });

        /****************FOR BUY***************** */
        var selectElement = document.getElementById('grid-state');

        // Event listener for the change event of the select element
        selectElement.addEventListener('change', function() {
            // Get the selected option
            var selectedOption = this.options[this.selectedIndex];

            // Get the values from the selected option
            var value = selectedOption.value.split('/');
            var cryptoRate = parseFloat(value[0]);



            // Trigger the input event to recalculate the cryptocurrency amount
            $("#amount").trigger('input');
        });




        $("#amount").on('input', function() {
            // Get the user's input
            var userAmount = parseFloat($(this).val());

            // Get the selected cryptocurrency rate
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var value = selectedOption.value.split('/');
            var cryptoRate = parseFloat(value[0]);

            // Calculate the equivalent amount of cryptocurrency
            var cryptoAmount = userAmount / cryptoRate;
            if (isNaN(cryptoAmount)) {
                $("#calculated-amount").text("Please insert a valid amount");
                $("#crypto_amount").val(""); // Clear the hidden input value
                $("#crypto_id").val(""); // Clear the hidden input value
            } else {
                $("#calculated-amount").text(`You can buy ${cryptoAmount.toFixed(8)} of the selected cryptocurrency`);
                $("#crypto_amount").val(cryptoAmount.toFixed(8));
                $("#crypto_id").val(value[2]);
            }


        });


        /****************FOR SELL***************** */
        var selectedcointosell = document.getElementById('coins');

        selectedcointosell.addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            console.log(value);

            var value = selectedOption.value.split('/');
            console.log(value);
            var cryptoRate = parseFloat(value[0]);

            $("#coin_amount").trigger('input');
        });



        $("#coin_amount").on('input', function() {

            var coin_amount = parseFloat($(this).val());
            var selectedOption = selectElement.options[selectedcointosell.selectedIndex];
            var value = selectedOption.value.split('/');

            var amout_dollar = coin_amount * value[0];
            if(isNaN(amout_dollar)){
                $("#amout_dollar").val("INSERT THE COIN AMOUNT FIRST")
            }else{

            $("#amout_dollar").val(amout_dollar);
        }
            $("#crypto_id2").val(value[2]);
        });
        /************* for send**************** */
        var selectedcoin = document.getElementById('coins_send');

selectedcoin.addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    console.log(selectedOption.value);

    var value = selectedOption.value.split('/');
    var cryptoRate = parseFloat(value[0]);

    $("#coin_amount2").trigger('input');
});



$("#coin_amount2").on('input', function() {

    var coin_amount = parseFloat($(this).val());
    var selectedOption = selectElement.options[selectedcoin.selectedIndex];
    var value = selectedOption.value.split('/');

    var amout_dollar = coin_amount * value[0];
 if(isNaN(amout_dollar)){
    $("#amout_dollar_send").val(" enter the coin amount first");
 }else{ $("#amout_dollar_send").val(amout_dollar);}
   
    $("#crypto_id3").val(value[2]);
});

        
        $("#email_exist").keyup(function() {
            var input = $(this).val();
          
            if (input != "") {
                // alert(input);
                const fetchUrl = '<?php echo URLROOT . '/users/check_email_or_nexusID'; ?>';
                $.ajax({
                    url: fetchUrl,
                    method: "POST",
                    data: {

                        input: input
                    },
                    // dataType: 'json',
                    success: function(notfound) {
                        // console.log(notfound)
                        if(notfound) {
                        $("#search_result").html(notfound);
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching tasks:', status, error);
                    }
                });
              
                $("#search_result").show()

            } else {
            
                $("#search_result").hide()

            };

        });
    });
    /****************************************** */
</script>

</body>

