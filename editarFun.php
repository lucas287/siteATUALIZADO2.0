<?php
session_start(); include_once("conexao.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: exibirFuncionario.php'); exit; }
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nome = trim($_POST['nome'] ?? ''); $cpf = trim($_POST['cpf'] ?? ''); $email = trim($_POST['email'] ?? ''); $senha = $_POST['senha'] ?? '';
if (!$id || $nome === '' || $cpf === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $_SESSION['msg']='Confira os dados informados e tente novamente.'; header('Location: exibirFuncionario.php'); exit; }
if ($senha !== '' && strlen($senha) < 6) { $_SESSION['msg']='A nova senha precisa ter pelo menos 6 caracteres.'; header('Location: editfun.php?id='.$id); exit; }
if ($senha !== '') { $stmt=$conn->prepare("UPDATE funcionario SET nome=?, cpf=?, email=?, senha=? WHERE id=?"); $stmt->bind_param("ssssi",$nome,$cpf,$email,$senha,$id); }
else { $stmt=$conn->prepare("UPDATE funcionario SET nome=?, cpf=?, email=? WHERE id=?"); $stmt->bind_param("sssi",$nome,$cpf,$email,$id); }
if ($stmt->execute()) { $_SESSION['msg']='Dados do funcionário atualizados.'; }
else { $_SESSION['msg']='Erro ao atualizar. Verifique se o CPF ou e-mail já está em uso.'; }
header('Location: exibirFuncionario.php'); exit;
