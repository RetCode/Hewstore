<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Authorization</title>
</head>
<style>
    .authorization-block
    {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        width: 100%;
        min-height: 100vh;
    }

    .authorization_title p
    {
        font-size: 20px;
    }

    .authorization_inputs-block
    {
        display: flex;
        flex-direction: column;

        padding: 20px;
        
        border-radius: 10px;
    }

    .authorization_inputs-block input
    {
        margin-bottom: 15px;

        width: 270px;
        height: 35px;
        border-radius: 5px;

        border: transparent;
        outline: transparent;

        padding: 0 10px;
    }

    .button-block
    {
        display: flex;
        justify-content: center;
    }

    .button-block button
    {
        width: 120px;
        border-radius: 5px;

        font-size: 18px;
        font-weight: 500;

        border: transparent;
    }
</style>
<body>
    <div class="authorization-block">
        <div class="authorization_title">
            <p>Войти в Админ Панель</p>
        </div>
        <div class="authorization_inputs-block bg-dark">
            <input type="text" placeholder="Login">
            <input type="text" placeholder="Password">
            <div class="button-block">
                <button class="btn btn-primary">Войти</button>
            </div>
        </div>
        
    </div>
</body>
</html>