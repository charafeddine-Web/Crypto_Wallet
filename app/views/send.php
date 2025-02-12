
<!-- send form  -->
<form action="<?= URLROOT; ?>/send" method="post" class="p-6 bg-gray-800 rounded-lg">
    <label class="block text-white">Envoyer à (NexusID ou Email) :</label>
    <input type="text" name="receiver" required class="w-full p-2 bg-gray-900 text-white rounded mt-1" placeholder="Ex: user@example.com">

    <label class="block text-white mt-4">Crypto :</label>
    <select name="crypto_id" id="crypto_id">
        <?php foreach ($data['cryptos'] as $crypto): ?>
            <option value="<?= $crypto['id_cryptomonnaie']; ?>"><?= htmlspecialchars($crypto['symbol']); ?></option>
        <?php endforeach; ?>
    </select>


    <label class="block text-white mt-4">Montant :</label>
    <input type="number" step="0.00000001" name="amount" required class="w-full p-2 bg-gray-900 text-white rounded mt-1">

    <button type="submit" class="w-full mt-4 bg-green-500 text-white py-2 rounded">
        Envoyer
    </button>
</form>
<?php if (!empty($data['error'])): ?>
    <p class="text-red-500"><?= htmlspecialchars($data['error']); ?></p>
<?php endif; ?>

<?php if (!empty($data['success'])): ?>
    <p class="text-green-500"><?= htmlspecialchars($data['success']); ?></p>
<?php endif; ?>


<!-- history user transactions -->
<table class="w-full">
    <thead>
        <tr>
            <th>Destinataire</th>
            <th>Crypto</th>
            <th>Montant</th>
            <th>Statut</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['transaction'] as $transaction) : ?>
            <tr>
                <td><?= htmlspecialchars($transaction['receiver_id']); ?></td>
                <td><?= htmlspecialchars($transaction['crypto_symbol']); ?></td>
                <td><?= number_format($transaction['amount'], 8); ?></td>
                <td><?= ucfirst($transaction['status']); ?></td>
                <td><?= $transaction['created_at']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

