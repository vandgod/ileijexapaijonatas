<?php
// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Filtra e protege os dados recebidos do formulário
    $nome = htmlspecialchars($_POST['nome']);       // Nome digitado no formulário
    $email = htmlspecialchars($_POST['email']);     // Contato (e-mail ou WhatsApp)
    $mensagem = htmlspecialchars($_POST['mensagem']); // Texto da mensagem enviada

    // Define o e-mail para o qual será enviado
    $para = "Jonatasijexa@gmail.com"; // ⛔ Altere aqui para seu e-mail real

    // Assunto da mensagem de e-mail
    $assunto = "Mensagem do formulário de contato - YLÊ IJEXA OXUM MIWÁ";

    // Corpo do e-mail com os dados preenchidos
    $corpo = "Nova mensagem recebida pelo site:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "Contato: $email\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos do e-mail
    $headers = "From: $email\r\n";          // Define quem está enviando
    $headers .= "Reply-To: $email\r\n";     // Define para onde responder

    // Função que envia o e-mail
    if (mail($para, $assunto, $corpo, $headers)) {
        // Caso o e-mail seja enviado com sucesso
        echo "<script>alert('Mensagem enviada com sucesso! Axé!'); window.location.href='index.html';</script>";
    } else {
        // Caso ocorra algum erro no envio
        echo "<script>alert('Erro ao enviar. Tente novamente mais tarde.'); window.history.back();</script>";
    }

} else {
    // Caso o script seja acessado sem envio do formulário
    echo "Acesso inválido.";
}
?>
