<?php require 'includes/header.php'; ?>

<div class="qcm-container">

    <div class="qcm-card">

        <div class="qcm-header">

            <h1>QCM NoLeak</h1>

            <p>
                Répondez aux questions suivantes.
            </p>

        </div>

<form action="" method="POST">

    <?php foreach ($questions as $index => $question): ?>

        <div style="margin-bottom: 30px;">

            <h3>
                Question <?= $index + 1 ?> :
                <?= htmlspecialchars($question['question']) ?>
            </h3>

            <?php for ($i = 1; $i <= 4; $i++): ?>

                <label>
                    <input
                        type="radio"
                        name="reponses[<?= $question['id'] ?>]"
                        value="<?= $i ?>"
                        required
                    >

                    <?= htmlspecialchars($question['reponse' . $i]) ?>
                </label>

                <br>

            <?php endfor; ?>

        </div>

    <?php endforeach; ?>

    <button type="submit" name="corriger">
        Valider le QCM
    </button>

</form>

</body>
</html>