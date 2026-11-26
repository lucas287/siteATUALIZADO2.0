<?php
session_start(); include_once("conexao.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: exibirFuncionario.php'); exit; }
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) { $_SESSION['msg']='Funcionário inválido.'; header('Location: exibirFuncionario.php'); exit; }
$stmt=$conn->prepare("DELETE FROM funcionario WHERE id=?"); $stmt->bind_param("i",$id);
if ($stmt->execute() && $stmt->affected_rows > 0) { $_SESSION['msg']='Funcionário excluído com sucesso.'; }
else { $_SESSION['msg']='Não foi possível excluir. O funcionário pode não existir.'; }
header('Location: exibirFuncionario.php'); exit;
