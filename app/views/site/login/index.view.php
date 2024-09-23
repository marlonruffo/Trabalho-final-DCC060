<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa fácil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/login.css">

</head>
<body>
    <Section class="login">
        <div class="login-container">
                <h2>Login</h2>
        
                <form action="/views" method="post">
                    <div class="form-group">
                        <label class="label1" for="login">CPF:</label>
                        <input type="text" id="username" name="login" required placeholder="Digite seu CPF">
                    </div>
                    <div class="form-group">
                        <label class="label1" for="password">Senha:</label>
                        <input type="password" id="password" name="password" required placeholder="Digite sua senha">
                        <?php 
                        if(isset($_POST['confirm'])){
                            echo $erro;
                        } 
                        ?> 
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Entrar" name="confirm">
                    </div>
                </form>
            </div>
        
        
        
        </Section>
        
</body>
</html>