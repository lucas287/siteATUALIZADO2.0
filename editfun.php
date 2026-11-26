<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { $_SESSION['msg'] = 'Funcionário inválido.'; header('Location: exibirFuncionario.php'); exit; }
$stmt = $conn->prepare("SELECT id, nome, cpf, email FROM funcionario WHERE id = ?");
$stmt->bind_param("i", $id); $stmt->execute(); $func = $stmt->get_result()->fetch_assoc();
if (!$func) { $_SESSION['msg'] = 'Funcionário não encontrado.'; header('Location: exibirFuncionario.php'); exit; }
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Editar funcionário | Voinich Motors</title>
<style>
*{box-sizing:border-box}body{margin:0;min-height:100vh;padding:24px;background:radial-gradient(ellipse at top,#281015,#0b0b0d 55%);color:#f5f5f5;font-family:Inter,Segoe UI,Arial,sans-serif}.wrap{width:min(560px,100%);margin:35px auto;background:#17171c;border:1px solid #34343b;border-radius:18px;padding:clamp(22px,5vw,36px);box-shadow:0 18px 55px #0008}.brand{font-weight:900;letter-spacing:1.5px;text-decoration:none;color:white}.brand span,.eyebrow{color:#ed1722}.eyebrow{margin-top:28px;font-size:11px;font-weight:800;letter-spacing:2px;text-transform:uppercase}h1{margin:8px 0 5px;font-size:30px}.muted{color:#a5a5ad;margin:0 0 24px}.field{display:block;margin:15px 0}.field span{display:block;font-size:13px;color:#c9c9ce;margin-bottom:7px}.field input{width:100%;padding:14px;border:1px solid #3b3b43;border-radius:10px;background:#0d0d10;color:white;font-size:15px;outline:none}.field input:focus{border-color:#e50914}.hint{font-size:12px;color:#92929b;margin-top:6px}.buttons{display:flex;gap:10px;margin-top:25px;flex-wrap:wrap}.btn{display:inline-flex;justify-content:center;align-items:center;padding:13px 18px;border-radius:10px;border:0;text-decoration:none;font-weight:800;cursor:pointer}.save{background:#e50914;color:white}.back{background:#2b2b31;color:white}
</style></head><body><main class="wrap"><a class="brand" href="devs.php">VOINICH <span>MOTORS</span></a><div class="eyebrow">Gestão da equipe</div><h1>Editar funcionário</h1><p class="muted">Atualize os dados do colaborador abaixo.</p>
<?php if(isset($_SESSION['msg'])): ?><p class="muted"><?php echo e($_SESSION['msg']); unset($_SESSION['msg']); ?></p><?php endif; ?>
<form method="POST" action="editarFun.php"><input type="hidden" name="id" value="<?php echo (int)$func['id']; ?>">
<label class="field"><span>Nome completo</span><input name="nome" type="text" required maxlength="150" value="<?php echo e($func['nome']); ?>"></label>
<label class="field"><span>CPF</span><input name="cpf" type="text" required maxlength="20" value="<?php echo e($func['cpf']); ?>"></label>
<label class="field"><span>E-mail</span><input name="email" type="email" required maxlength="150" value="<?php echo e($func['email']); ?>"></label>
<label class="field"><span>Nova senha (opcional)</span><input name="senha" type="password" minlength="6" autocomplete="new-password" placeholder="Deixe em branco para manter a atual"><div class="hint">Por segurança, a senha atual não é exibida.</div></label>
<div class="buttons"><button class="btn save" type="submit">Salvar alterações</button><a class="btn back" href="exibirFuncionario.php">Cancelar</a></div></form></main></body></html>