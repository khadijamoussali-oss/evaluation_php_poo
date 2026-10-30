<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <h1>Liste des jeux</h1>

    <?php foreach ($data['games'] ?? [] as $game): ?>
    <article>
        <h2><?= htmlspecialchars($game['title'], ENT_QUOTES, 'UTF-8') ?></h2>
        <p>Type : <?= htmlspecialchars($game['type'], ENT_QUOTES, 'UTF-8') ?></p>
        <p>Date de publication : <?= htmlspecialchars($game['publish_at'], ENT_QUOTES, 'UTF-8') ?></p>
        <p>Console : <?= htmlspecialchars($game['name'], ENT_QUOTES, 'UTF-8') ?></p>
    </article>
    <?php endforeach ?>
    
</body>
</html>