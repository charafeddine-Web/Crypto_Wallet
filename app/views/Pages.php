 <ul id="coin-list">
        <?php foreach ($data['data']['data'] as $coin): ?>
            <li>
                <strong><?php echo htmlspecialchars($coin['name']); ?></strong>:
                <br/>
                <strong>slug:<?php echo htmlspecialchars($coin['slug']); ?></strong>:
                <br/>
                <strong>symbol:<?php echo htmlspecialchars($coin['symbol']); ?></strong>:
                <br/>
                <strong>max_supply:<?php echo $coin['max_supply']; ?></strong>:
                <br/>
                <strong>prix :</strong><?php echo '$' . number_format($coin['quote']['USD']['price'], 2); ?>
            </li>
        <?php endforeach; ?>
 </ul>
