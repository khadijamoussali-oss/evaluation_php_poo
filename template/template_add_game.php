<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= $title ?? "" ?></title>
</head>
<body>
    <h1>Ajouter un jeu</h1>

   <form action="" method="post">
    <input type="text" name="title" placeholder="Saisir le titre du jeu">
    <input type="text" name="type" placeholder="Saisir le type du jeu">
    <input type="date" name="publish_at">

    <select name="id_console">
        <?php foreach ($data['consoles'] ?? [] as $console): ?>
            <option value="<?= htmlspecialchars($console['id'], ENT_QUOTES, 'UTF-8') ?>">
                <?= htmlspecialchars($console['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach ?>
    </select>

    <input type="submit" value="Ajouter" name="submit">
    </form> 

        <p><?= htmlspecialchars($data['error'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>

        <p><?= htmlspecialchars($data['valid'] ?? '', ENT_QUOTES, 'UTF-8') ?></p>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>