<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ortoacessível - Gerenciamento de Pedidos de Produtos Ortopédicos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo_white.png') }}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        .masthead {
            height: auto;
            min-height: 500px;
            background-color: #e6e6e6;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact textarea,
        #contact button[type="submit"] {
            font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
        }

        #contact {
            background: #F9F9F9;
            padding: 25px;
            margin: 150px 0;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        #contact h3 {
            display: block;
            font-size: 30px;
            font-weight: 300;
            margin-bottom: 10px;
        }

        #contact h4 {
            margin: 5px 0 15px;
            display: block;
            font-size: 13px;
            font-weight: 400;
        }

        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact input[type="tel"],
        #contact input[type="url"],
        #contact select,
        #contact textarea {
            width: 100%;
            border: 1px solid #ccc;
            background: #FFF;
            margin: 0 0 5px;
            padding: 10px;
        }

        #contact input[type="text"]:hover,
        #contact select:hover,
        #contact input[type="email"]:hover,
        #contact input[type="tel"]:hover,
        #contact input[type="url"]:hover,
        #contact textarea:hover {
            -webkit-transition: border-color 0.3s ease-in-out;
            -moz-transition: border-color 0.3s ease-in-out;
            transition: border-color 0.3s ease-in-out;
            border: 1px solid #aaa;
        }

        #contact textarea {
            height: 100px;
            max-width: 100%;
            resize: none;
        }

        .btnRegister {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #9d1ec7;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        .btnRegister:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"] {
            cursor: pointer;
            width: 100%;
            border: none;
            background: #9d1ec7;
            color: #FFF;
            margin: 0 0 5px;
            padding: 10px;
            font-size: 15px;
        }

        #contact button[type="submit"]:hover {
            background: #43A047;
            -webkit-transition: background 0.3s ease-in-out;
            -moz-transition: background 0.3s ease-in-out;
            transition: background-color 0.3s ease-in-out;
        }

        #contact button[type="submit"]:active {
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        #contact input:focus,
        #contact textarea:focus {
            outline: 0;
            border: 1px solid #aaa;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        :-moz-placeholder {
            color: #888;
        }

        ::-moz-placeholder {
            color: #888;
        }

        :-ms-input-placeholder {
            color: #888;
        }

        .btn:hover {
            background-color: #43A047 !important;
            color: #fff !important;
        }

        .counter-box {
    display: block;
    background: #f6f6f6;
    padding: 40px 20px 37px;
    text-align: center
}

.counter-box p {
    margin: 5px 0 0;
    padding: 0;
    color: #909090;
    font-size: 18px;
    font-weight: 500
}

.counter-box i {
    font-size: 60px;
    margin: 0 0 15px;
    color: #d2d2d2
}

.counter {
    display: block;
    font-size: 32px;
    font-weight: 700;
    color: #666;
    line-height: 28px;
}

.counter-box.colored {
    background: #79309B;
}

.counter-box.colored p,
.counter-box.colored i,
.counter-box.colored .counter {
    color: #fff
}
    </style>


</head>

<body style="padding-top: 70px; background-color: #e6e6e6">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow fixed-top"
        style="z-index: 9999; background-color: rgba(159, 65, 199);">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #fff;">Ortoacessível</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Início
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#solicitar-produto">Solicitar Produto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sou-orgao">Sou Órgão</a>
                    </li>

                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a class="nav-link btn" style="border-radius: 25px; color: #fff; background-color: #79309B;"
                            href="{{ url('/home') }}">Painel Administrativo</a>
                    </li>
                    @else
                    <li class="nav-item">

                        <a class="nav-item btn " style="border-radius: 25px; color: #fff; background-color: #79309B;"
                            href="{{ route('login') }}">Login</a>
                    </li>

                    @endauth

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead" id="solicitar-produto">
        <div class="container-fluid h-100 ">
            <div class="row  align-items-center">
                <div class="col-sm text-center">
                    <img id="logo_intro" src="{{ asset('images/logo_transparent.png') }}" class="img-fluid"
                        style="width: 100px; heigth: 120px;" />
                    <h1 class="font-weight-dark">Ortoacessível</h1>
                    <p class="lead">O lugar ideal para solicitar seu produto ortopédico diretamente em órgãos
                        competentes, de forma rápida e extremamente fácil.</p>
                    <button class="btn btn-lg" style="background-color:#9d1ec7; color: #fff; width: 50%;">Saiba
                        mais</button>
                </div>

                <div class="col-sm text-center">

                    <form id="contact" action="/store-interesse-website" method="POST">
                        @csrf

                        <h3>Registrar interesse</h3>
                        <h4>Seus dados serão enviados diretamente para o órgão escolhido</h4>
                        @if ($message = Session::get('success_interesse'))
                        <div class="alert alert-success" style=" ">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select id="input_orgao" class="form-control" name="orgao" required>
                                        <option selected disabled value="">Escolha um órgão...</option>
                                        @foreach($orgaos as $o)
                                        <option value="{{ $o->id }}">{{ $o->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nome1" class="form-control" placeholder="Nome *"
                                        required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telefone1" class="form-control" placeholder="Telefone *"
                                        required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="interesse" class="form-control"
                                        placeholder="Produto de Interesse *" required />
                                </div>

                                <input type="submit" class="btnRegister" value="Registrar" />
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid my-4" id="sobre">

        <div class="card card-image" style="background-color: rgba(159, 65, 199, 0.8)">
            <div class="text-white text-center py-3 px-3 my-3">
                <div>
                    <h2 class="card-title h1-responsive pt-3 mb-4 font-bold"><strong>Sobre Nós</strong></h2>
                    <hr class="mx-5" style="background-color: #79309B;" />
                    <p class="mx-5 mb-5" style="font-size: 20px;">O Ortoacessível é uma plataforma onde diversos órgãos
                        competentes, tais como
                        secretarias de saúde, gerenciam seus pedidos de produtos ortopédicos. Tendo em vista a
                        dificuldade financeira
                        que muitas pessoas possuem ao adquirir um produto desta categoria, a plataforma permite que você
                        registre seu
                        objeto de interesse diretamente nos órgãos competentes de sua proximidade.
                    </p>
                    <a href="#solicitar-produto" class="btn btn-outline btn-lg shadow-lg btn-solicitar-produto"
                        style="border-radius: 50px; background-color: #79309B; color: #fff; width: 30%;">Solicitar
                        Produto</a>
                    <a href="#sou-orgao" class="btn btn-outline btn-lg shadow-lg btn-solicitar-produto"
                        style="border-radius: 50px; background-color: #79309B; color: #fff; width: 30%;">Sou Órgão</a>
                </div>
            </div>
        </div>

    </div>


    <div class="container">
            <div class="row">
                <div class="four col-md-4">
                    <div class="counter-box colored"> <i class="fa fa-thumbs-o-up"></i> <span class="counter">{{$count_emprestimos}}</span>
                        <p>Empréstimos Cadastrados</p>
                    </div>
                </div>
                <div class="four col-md-4">
                    <div class="counter-box"> <i class="fa fa-group"></i> <span class="counter">{{$count_produtos}}</span>
                        <p>Produtos Cadastrados</p>
                    </div>
                </div>
                <div class="four col-md-4">
                    <div class="counter-box"> <i class="fa fa-shopping-cart"></i> <span class="counter">{{$count_pessoas}}</span>
                        <p>Beneficiados Cadastrados</p>
                    </div>
                </div>
            
            </div>
           
        </div>



    <!-- Full Page Image Header with Vertically Centered Content -->
    <header class="masthead" id="sou-orgao">
        <div class="container-fluid h-100 ">
            <div class="row  align-items-center">
                <div class="col-sm text-center">
                    <form id="contact" action="/store-solicitacao" method="POST">
                        @csrf

                        <h3>Solicitar Acesso</h3>
                        <h4>Seus dados serão enviados diretamente aos administradores do sistema.</h4>
                        @if ($message = Session::get('succcess_solitacao'))
                        <div class="alert alert-success" style=" ">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="row register-form">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="nome2" id="name2" placeholder="Nome *" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email2" id="email2" placeholder="E-mail *"
                                        class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="telefone2" id="telefone2" placeholder="Telefone *"
                                        class="form-control telefone2" required>
                                </div>
                                <div class="form-group">
                                    <textarea rows="6" name="mensagem2" id="message2" class="form-control"
                                        placeholder="A sua mensagem" required></textarea>
                                </div>

                                <input type="submit" class="btnRegister" value="Registrar" />
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-sm text-center">

                    <img id="logo_intro" src="{{ asset('images/grafico-verde.png') }}" class="img-fluid"
                        style="width: 150px; heigth: 170px;" />
                    <h1 class="font-weight-dark">Gerencie seus pedidos</h1>
                    <p class="lead">Tenha todas informações sobre seus parceiros, produtos, pessoas e empréstimos sobre
                        controle,
                        de qualquer lugar e em qualquer dispositivo conectado a internet.</p>
                    <button class="btn btn-lg"
                        style="background-color:#9d1ec7; color: #fff; width: 50%;">Vantagens</button>


                </div>
            </div>
        </div>
        
    </header>


    <!-- Footer -->
    <footer class="page-footer font-small blue" style="margin-top: 10px;">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="background-color: #9F41C7; color: #fff;">© 2018 Copyright Ortoacessível
            
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->


    <script>
    $(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 4000,
easing: 'swing',
step: function (now) {
    $(this).text(Math.ceil(now));
}
});
});

});  
    </script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>