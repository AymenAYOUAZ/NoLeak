<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>QCM</title>
</head>
<body>

<h1>QCM</h1>

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