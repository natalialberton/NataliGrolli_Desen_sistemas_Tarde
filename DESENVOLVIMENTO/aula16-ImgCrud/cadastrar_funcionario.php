<?php

$tituloPagina = 'CADASTRO';
include ('menu.php');

?>

<main>
    <div class="main-content">
        <div class="titulo">
            <h1>Cadastro</h1>
            <h2>Funcionário</h2>
        </div>
        <!--FORMULÁRIO PARA CADASTRAR FUNCIONÁRIO-->
        <form class="forms-cadastro" action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">  
            <label class="forms-cadastro__label" for="nome">Nome: </label>
            <input class="forms-cadastro__input" type="text" name="nome" id="nome" required><br>

            <label class="forms-cadastro__label" for="telefone">Telefone: </label>
            <input class="forms-cadastro__input" type="tel" name="telefone" id="telefone" required><br>

            <label class="forms-cadastro__label" for="foto">Foto: </label>
            <input class="forms-cadastro__input" type="file" name="foto" id="foto" required><br>

            <button class="forms-cadastro__btn-cadastrar" type="submit">Cadastrar</button>
        </form>
    </div>
</main>
</body>
</html>