<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        footer {
            padding: 40px 0;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
        }
        footer a {
            color: #6c757d;
            text-decoration: none;
        }
        footer a:hover {
            color: #343a40;
            text-decoration: underline;
        }
        .footer-logo {
            margin: 0 15px;
        }
        .footer-logo img {
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .footer-logo img:hover {
            transform: scale(1.1);
        }
        .developed-by {
            font-weight: bold;
        }
        @media (max-width: 768px) {
            .text-left, .text-right {
                text-align: center !important;
            }
            .mx-auto {
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <footer class="pt-5 my-5 text-body-secondary border-top">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="nav col-md-3 justify-content-start">
                Todos os direitos reservados. &copy; 2024
            </div>

            <div class="col-md-3 text-center mx-auto footer-logo">
                <a href="https://sig.iffarroupilha.edu.br/sigaa/public/curso/portal.jsf?id=76320&lc=pt_BR">
                    <img src="src/View/img/logoo-ads.png" alt="Logo ADS" width="120" height="120">
                </a>
                <a href="https://www.iffarroupilha.edu.br/sao-vicente-do-sul">
                    <img src="src/View/img/logo-iffar-svs.png" alt="Logo IFFar" width="100" height="120">
                </a>
            </div>

            <div class="nav col-md-3 justify-content-end">
                Desenvolvido por Iury Raminelli - ADS18
            </div>
        </div>
    </footer>

    <script src="<?=HOME?>src/View/js/comandos.js"></script>
</body>
</html>
