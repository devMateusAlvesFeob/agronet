<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>AgroNet</title>
  </head>
  <body>
    <div class="card-container">
      <div class="row">
        <div class="card" onclick="window.location.href='menu.php';">
          <img
            class="icones"
            src="images/cadeado.png"
            alt="imagem de cadeado"
          />
          <h3>Administrador</h3>
          <p>[ACESSO RESTRITO]</p>
        </div>

        <div class="card" onclick="window.location.href='inserir.php';">
          <img
            class="icones"
            src="images/estoque.png"
            alt="imagem de estoque"
          />
          <h3>Incluir novo produto</h3>
          <p>[LIBERADO]</p>
        </div>
      </div>

      <div class="row">
        <div class="card" onclick="window.location.href='tabela1.php';">
          <img class="icones" src="images/precos.png" alt="preco" />
          <h3>Tabela online</h3>
          <p>[LIBERADO]</p>
        </div>

        <div class="card" onclick="window.location.href='suporte.php';">
          <img
            class="icones"
            src="images/suporte.png"
            alt="imagem de estoque"
          />
          <h3>Suporte Online</h3>
          <p>Fale conosco</p>
        </div>
      </div>
    </div>
  </body>
</html>
