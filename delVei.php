<?php

session_start(); 
ob_start();


include_once "conexao.php";

// Receber o ID do usuario
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//$id = 100;

if ($id) {
    try {
        // QUERY para recuperar as informacoes do usuario
        $query_usuario = "SELECT foto FROM veiculo WHERE id=:id LIMIT 1";
        $result_usuario = $conn2->prepare($query_usuario);
        $result_usuario->bindParam(':id', $id);
        $result_usuario->execute();

        // Acessa o IF quando encontrar o usuario no BD
        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $query_apagar_usuario = "DELETE FROM veiculo WHERE id=:id LIMIT 1";
            $apagar_usuario = $conn2->prepare($query_apagar_usuario);
            $apagar_usuario->bindParam(':id', $id);

            // Acessa o IF quando excluir o registro com sucesso
            if ($apagar_usuario->execute()) {
                // Ler as informcoes do usuario
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                extract($row_usuario);

                // Verificar se existe o nome da imagem salva no banco de dados
                if(!empty($foto_usuario)){
                    $diretorio = "imagens/$id";
                    $imagem = "imagens/$id/$foto_usuario";

                    // Apagar a imagem
                    if(file_exists($imagem)){
                        unlink($imagem);
                    }

                    // Apagar o diretorio
                    if(file_exists($diretorio)){
                        rmdir($diretorio);
                    }
                }
                $_SESSION['msg'] = "<p style='color: green;'>Usuário apagado com sucesso!</p>";
                header("Location: delist.php");
            } else {
                $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso!</p>";
                header("Location: delist.php");
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
            header("Location: delist.php");
        }
    } catch (Exception $erro) {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não apagado com sucesso!</p>";
        header("Location: delist.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: delist.php");
}
