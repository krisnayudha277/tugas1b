<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url(img/ba.jpg);
                background-size: cover;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
/*
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }*/
            .tabel{
                 align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 220px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
               SISTEM KEANGGOTAAN
                </div>
                <div class="tabel">
                    <table border="2px">
                        <tr>
                            <td width="200px">Nama</td>
                            <td width="200px">NIM</td>
                            <td width="50px">Status</td>
                            <td width="100px">Divisi</td>
                            <td width="200px">Foto</td>
                        </tr>
                          <tr>
                            <td>Krisna Yudha Alfianto</td>
                            <td>183140714111052</td>
                            <td>Aktif</td>
                            <td>Humas</td>
                            <td><img src="<?php echo e(('img/Krisna.jpg')); ?>" width="75px" height="100px" ></td>
                        </tr>
                        <tr>
                            <td>Adhyaksa Ammar Ramadhan</td>
                            <td>183140714111032</td>
                            <td>Aktif</td>
                            <td>KESMA</td>
                            <td><img src="<?php echo e(('img/ammar.png')); ?>" width="75px" height="100px" ></td>
                        </tr>
                    </table>
                </div>
                
            </div>

        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\tugas1b\resources\views/welcome.blade.php ENDPATH**/ ?>