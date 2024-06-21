<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: userrol.view.php');
    exit();
}

require 'functions.php';


$id_usuario = htmlentities($_POST['id_usuario'], ENT_QUOTES, 'UTF-8');

if (isset($_POST['insertar'])) {
    try {
        // Iniciar la transacción
        $conn->beginTransaction();

        // Verificar que el usuario existe en la tabla users
        $stmt_user = $conn->prepare("SELECT COUNT(*) FROM users WHERE id = ?");
        $stmt_user->execute([$id_usuario]);

        if ($stmt_user->fetchColumn() == 0) {
            throw new Exception('Usuario no encontrado.');
        }

        // Eliminar permisos actuales del usuario
        $stmt_delete = $conn->prepare("DELETE FROM permiso_usuarios WHERE id_user = ?");
        $stmt_delete->execute([$id_usuario]);

        // Insertar nuevos permisos
        $stmt_insert = $conn->prepare("INSERT INTO permiso_usuarios (estado, id_grado, id_user) VALUES (1, ?, ?)");
        if (!empty($_POST['cursos'])) {
            foreach ($_POST['cursos'] as $curso_id) {
                $stmt_insert->execute([$curso_id, $id_usuario]);
            }
        }

        // Confirmar la transacción
        $conn->commit();
        header('Location: usuarios.view.php?rolinfo=1');
        exit();
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        if ($conn->inTransaction()) {
            $conn->rollBack();
        }
        // Redirigir con un mensaje de error
        header('Location: userrol.php?id='.$id_usuario.'?err=1&msg=' . urlencode($e->getMessage()));
        exit();
    }
}
?>
