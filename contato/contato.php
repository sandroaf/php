<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Formulário de Contato PHP</title>
</head>
<body>
    <header>
        <h1>CONTATO</h1>
    </header>
    <main>
        <aside>
            <div id="informacoes">
                <p>Envie sua mensagem
                <br>
                <strong>Sandro Alencar Fernandes</strong>
                <br>
                <a href="mailto:sandroaf@unidavi.edu.br">sandroaf@unidavi.edu.br</a>
            </div>
            <div id="mapa">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3547.7580097611585!2d-49.65361062596598!3d-27.22674640639543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dfb8fe10c9a4bf%3A0xbf41ba3b54188bb5!2s%C3%81rea%20Local!5e0!3m2!1spt-BR!2sbr!4v1693849259773!5m2!1spt-BR!2sbr" width="450" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </aside>
        <article>
            <form action="envio.php" method="post">
                <label for="iNome">NOME:</label><br>
                <input id="iNome" type="text" name="nome" placeholder="Seu nome"><br>
                <label for="iFone">TELEFONE:</label><br>
                <input id="iFone" type="tel" name="fone" placeholder="Número de telefone"><br>
                <label for="iEmail">E-MAIL:</label><br>
                <input id="iEmail" type="email" name="email" placeholder="e-mail válido"><br>
                <label for="iAssunto">ASSUNTO:</label><br>
                <input id="iAssuntto" name="assunto" placeholder="Assunto da mensagem"><br>
                <label for="iMensagem">MENSAGEM:</label><br>
                <textarea id="iMensagem" name="mensagem" cols="50" rows="5" placeholder="Qual sua mensagem?"></textarea><br><br>
                <button id="bEnviar" name="enviar" type="submit">ENVIAR</button>
            </form>
        </article>
    </main>
</body>
</html>