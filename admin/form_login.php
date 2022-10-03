<?php
if (!defined('STDIN')) {
    echo "Acesso não autorizado!";
}else{
    include "topo.php";

    if (isset($_GET['nomeUsuario'])) {
        $nomeUsuario = $_GET['nomeUsuario'];
    }else {
        $nomeUsuario = "";
    }
    
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }else {
        $msg = "";
    }
    ?>
    
    <h3 class="mb-3">Login</h3>
    
    <div class="mb-2"><?=$msg?></div>
    
    <form method="POST" action="login.php">
        
        <div class="mb-3">
            <label for="InputEmail1" class="form-label">Nome do usuário</label>
            <input type="email" class="form-control" value="<?=$nomeUsuario?>" id="InputEmail1" name="email" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="InputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" id="InputPassword1" required>
        </div>
        <button type="submit" class="btn btn-primary">Entar</button>
    </form>
    
    <?php
    include "rodape.php";
}
