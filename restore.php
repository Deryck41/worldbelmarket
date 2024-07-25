<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сброс пароля</title>
    <style>
        .wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            gap: 20px;

        }

        button {
            padding: 10px;
            background-color: coral;
            border: 1px solid coral;
            border-radius: 4px;
            cursor: pointer;
            color: #ffffff;
            font-weight: 700;
            font-size: 18px;
            transition: 0.3s linear;

        }

        input {
            padding: 5px 15px !important;
            border: 1px solid rgb(146, 146, 146);
            outline: none;
            transition: 0.3s linear;
            border-radius: 4px;
        }

        input:focus {
            transition: 0.3s linear;
            border: 1px solid coral;
            box-shadow: 0 0 4px 0px rgba(252, 92, 0, 0.575);
        }

        .code{
            display: none;
        }
    </style>
</head>

<body>
    <form class="wrapper" action="newpassword.php" method="post">
        <label for="password">Введите новый пароль</label>
        <input id="password" type="password" name="password">
        <div class="input-wrapper row" style="flex-direction: row; align-items: center; margin: 0">
            <input type="checkbox" id="signUpUserShowPassword" class="toggle-password-visibility">
            <label style="margin: 0;" for="signUpUserShowPassword">Показать
                пароль</label>
        </div>
        <input class="code" type="text" name="code">
        <button>Продолжить</button>
    </form>
    <script type="module">
        import { AddBebounceValidate } from "/asted_themes/marketplace/js/input.js";

        const passwordInput = {
            password : {
                element: document.querySelector('input[name="password"]'),
                filter: "password",
                warning:"Пароль должен состоять из минимум 8 символов и максимум из 30 символов"
            }
        }
        AddBebounceValidate(passwordInput);
    </script>
    <script>
        document
            .querySelectorAll(".toggle-password-visibility")
            .forEach((visibilityToggler) => {
                visibilityToggler.addEventListener("change", () => {
                    visibilityToggler.parentNode.parentNode
                        .querySelector('input[id="password"]')
                        .setAttribute("type", visibilityToggler.checked ? "text" : "password");
                });
            });
        function findGetParameter(parameterName) {
            var result = null,
                tmp = [];
            location.search
                .substr(1)
                .split("&")
                .forEach(function (item) {
                    tmp = item.split("=");
                    if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                });
            return result;
        }

        document.querySelector('.code').value = findGetParameter('code');

    </script>
</body>

</html>