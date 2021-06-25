<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,600,700,800,900" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="https://cdn.btekno.id/samarinda/img/logo.png">
    <link rel="stylesheet" href="https://cdn.btekno.id/samarinda/css/login.min.css">
</head>
<body>
    <div class="page">
        <div class="background"><div class="img-bottom"></div></div>
        <div class="container">
            <div class="left">
                <img class="logo-broker" src="https://cdn.btekno.id/samarinda/img/logo.png"/>
                <div class="login-left">
                    <h4>{{ env('EP_SINGKATAN') }}</h4>
                    <p>Website Resmi {{ env('EP_INSTANSI') }}.</p>
                </div>
                <div class="eula">
                    <b>{{ strtoupper(env('EP_PEMERINTAH')) }}</b><br/>
                    2020 © Supported by <a href="https://btekno.id" target="_blank" class="hover:text-blue-400 font-bold">BTEKNO</a>
                </div>
            </div>
            <div class="right">
                <div class="form">
                    <img class="logo" src="http://sso.samarindakota.go.id/img/favicon-web.png"/>
                    <div class="login">
                        Hai, Administator!<br/>
                        <small>Kelola website melalui laman ini</small>
                    </div>
                    {!! Form::open(['id' => 'sign-form', 'autocomplete' => 'off']) !!}
                        <div class="form-control {!! $errors->first('username', 'hasError') !!}">
                            <label for="username">Nama Pengguna</label>
                            {!! Form::text('username', null, ['class' => 'input', 'autocomplete' => 'off', 'placeholder' => 'Nama Pengguna']) !!}
                            {!! $errors->first('username', '<span class="input_error">:message</span>') !!}
                        </div>
                        <div class="form-control {!! $errors->first('password', 'hasError') !!}">
                            <label for="password">Password</label>
                            {!! Form::password('password', ['class' => 'input', 'autocomplete' => 'off', 'placeholder' => 'Masukkan Password']) !!}
                            {!! $errors->first('password', '<span class="input_error">:message</span>') !!}
                        </div>
                        <div class="ingat">
                            <div class="float-left">
                                {!! Form::checkbox('remember', 1, null, ['id' => 'remember']) !!} 
                                <label for="remember">Ingkatkan Saya</label>
                            </div>
                        </div> 
                        <button type="submit" class="button-block">LOGIN</button>
                        {!! Form::hidden('redirect', request()->has('redirect')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @if(notify()->ready())
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
        <script type="text/javascript">
            swal({
                title: 'Perhatian!',
                type: '{!! notify()->type() !!}',
                html: '{!! notify()->message() !!}'
            });
        </script>
    @endif
</body>
</html>