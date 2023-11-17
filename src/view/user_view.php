<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Externo. -->
    <link rel="stylesheet" href="../view/styles.css">
    <title>Revisão de Php</title>
</head>

<body>
    <?php if (isset($user)): ?>
        <p>ID:
            <?php echo $user->getId(); ?>
        </p>
        <p>Nome Completo:
            <?php echo $user->getName(); ?>
        </p>
        <p>E-mail:
            <?php echo $user->getEmail(); ?>
        </p>
    <?php else: ?>
        <p>Usuário não encontrado.</p>
    <?php endif; ?>
</body>

</html>