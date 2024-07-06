@extends('layout-1')
@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a class="text-dark" href="/admin">Home</a></li>
          {{-- <li class="breadcrumb-item active">Starter Page</li> --}}
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('content')
<h1 class="text-center --gray-color fw-thin">Laravel Admin</h1>
<div class="d-flex justify-content-center mt-3">
  <div>
    <a class="text-decoration-none --fs-12 --gray-color mr-4" href="">GITHUB</a>
    <a class="text-decoration-none --fs-12 --gray-color mr-4" href="">DOCUMENTATION</a>
    <a class="text-decoration-none --fs-12 --gray-color" href="">DEMO</a>
  </div>
</div>
<div class="row w-100 mt-3 --fs-12 px-2 pb-5">
  <div class="--card col-12 col-lg-4 p-2">
    <div class="bg-white">
      <div class="--card-title d-flex justify-content-between align-items-center p-1">
        <p class="fs-6 m-0">Environment</p>
        <div class="--gray-color ">
          <i class="fa-solid fa-minus"></i>
          <i class="fa-solid fa-xmark ml-2"></i>
        </div>
      </div>
      <div class="--striped p-2">
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">PHP version</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">PHP/8.2.16</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Laravel version</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">10.31.0</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">CGI</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">fpm-fcgi</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Uname</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0"> Linux iZj6c34iaw7zziev9l8p1iZ 6.1.0-17-amd64 #1 SMP PREEMPT_DYNAMIC Debian 6.1.69-1
              (2023-12-30) x86_64
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Server</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">nginx/1.25.5</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Server</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">nginx/1.25.5</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Session driver</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">redis</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Session driver</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">file</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Queue driver</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">sync</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Locale</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">zh_CN</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">Env</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">local</p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 p-2">
            <p class="m-0">URL</p>
          </div>
          <div class="col-8 p-2">
            <p class="m-0">https://frugo-supershopi.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="--card col-12 col-lg-4 p-2">
    <div class="bg-white">
      <div class="--card-title d-flex justify-content-between align-items-center p-1">
        <p class="fs-6 m-0">Available Extensions</p>
        <div class="--gray-color ">
          <i class="fa-solid fa-minus"></i>
          <i class="fa-solid fa-xmark ml-2"></i>
        </div>
      </div>
      <div class="p-2">
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-gears"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/helpers</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-database"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/log-viewer</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-copy"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/backup</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-toggle-on"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/config</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-sliders"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/api-tester</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-file"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/media-manager</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-clock"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/scheduling</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-bug"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/reporter</p>
        </div>
        <div class="--extension d-flex justify-content-start align-items-center m-0 p-2 border-bottom">
          <div>
            <i class="fa-solid fa-flask"></i>
          </div>
          <p class="--color-second font-weight-bold ml-3 mb-0">laravel-admin-ext/redis-manager</p>
        </div>
        <div class="d-flex justify-content-center align-items-center p-2">
          <a class="text-decoration-none --color-second" href="">View All Extensions</a>
        </div>
      </div>
    </div>

  </div>
  <div class="--card col-12 col-lg-4 p-2">
    <div class="bg-white">
      <div class="--card-title d-flex justify-content-between align-items-center p-1">
        <p class="fs-6 m-0">Dependencies</p>
        <div class="--gray-color ">
          <i class="fa-solid fa-minus"></i>
          <i class="fa-solid fa-xmark ml-2"></i>
        </div>
      </div>
      <div class="--striped --scroll p-2">
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">php</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^8.1</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">aws/aws-sdk-php</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span
                class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^3.283</span></p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">dianwoung/large-file-upload</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span
                class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^0.0.3</span></p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">encore/laravel-admin</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^1.8</span>
            </p>
          </div>
        </div>

        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">guzzlehttp/guzzle</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^7.8</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">jenssegers/mongodb</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^4.0</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">laravel-lang/common</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^4.1</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">laravel/framework</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span
                class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^10.10</span></p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">laravel/sanctum</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^3.3</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">laravel/tinker</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^2.8</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">league/flysystem-aws-s3-v3</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span
                class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^3.21</span></p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">peinhu/aetherupload-laravel</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^2.0</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">predis/predis</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^2.2</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">symfony/http-client</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^6.3</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">symfony/mailgun-mailer</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^6.3</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">symfony/postmark-mailer</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">^6.3</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">tymon/jwt-auth</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"> <span
                class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1te">^2.0</span></p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">ext-redis</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">*</span>
            </p>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-4 col-lg-6 p-2">
            <p class="m-0">ext-zip</p>
          </div>
          <div class="col-8 col-lg-6 p-2">
            <p class="m-0"><span class="--bg-second py-1 px-2 text-white --fs-10 font-weight-bold rounded-1">*</span>
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection