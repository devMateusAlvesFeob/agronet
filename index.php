<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
  </head>
  <body>
    <form class="form1" id="loginForm" onsubmit="verificarLogin(event)">
      <div class="conteiner-menor">
        <img
          class="logo1"
          src="images/Imagem_do_WhatsApp_de_2024-10-26_à_s__19.49.44_76b676f7-removebg-preview(1).png"
          alt="logo"
          width="100px"
          height="100px"
        />
      </div>
      <h1 class="titulo-form">AgroNet</h1>
      <h3 class="sub-titulo-form">Bem Vindo!</h3>
      <label for="usuario">Usuário:</label>
      <input
        type="text"
        id="usuario"
        placeholder="Digite seu usuário"
        required
      /><br />
      <label for="senha">Senha:</label>
      <input
        type="password"
        id="senha"
        placeholder="Digite sua senha"
        required
      />
      <button class="btn" type="submit">Entrar</button><br />
      <a class="hyperlinks" href="menu.html">Esqueci a senha</a>
      <a class="hyperlinks" href="https://www.google.com">Primeiro acesso</a>
    </form>
    <footer>
      <p>&copy; 2024 PI Unifeob GRUPO 29. Todos os direitos reservados.</p>
    </footer>

    <script>
      function verificarLogin(event) {
        event.preventDefault(); // Evita o envio do formulário

        // Obtém os valores dos campos de entrada
        const usuario = document.getElementById("usuario").value;
        const senha = document.getElementById("senha").value;

        // Verifica se o usuário e a senha estão corretos
        if (usuario === "administrador" && senha === "12345678") {
          alert("Login bem-sucedido!");
          // Redireciona para a página do menu ou outra página
          window.location.href = "menu.html"; // Altere para a página desejada
        } else {
          alert("Usuário ou senha incorretos. Tente novamente.");
        }
      }
    </script>
  </body>
</html>
