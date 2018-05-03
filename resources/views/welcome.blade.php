<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>翼教育教学系统V1.0 API</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <h1>Yucheng API V1.0.</h1>
        <ol>
            <li>班级
                <ul>
                    <li>
                        <a href="{{ route('grades.index') }}" target="_blank">列表</a>
                        {{ route('grades.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('grades.create') }}" target="_blank">新增</a>
                        {{ route('grades.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('grades.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('grades.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('grades.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('grades.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>课程
                <ul>
                    <li>
                        <a href="{{ route('courses.index') }}" target="_blank">列表</a>
                        {{ route('courses.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('courses.create') }}" target="_blank">新增</a>
                        {{ route('courses.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('courses.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('courses.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('courses.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('courses.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>课时
                <ul>
                    <li>
                        <a href="{{ route('teachings.index') }}" target="_blank">列表</a>
                        {{ route('teachings.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('teachings.create') }}" target="_blank">新增</a>
                        {{ route('teachings.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('teachings.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('teachings.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('teachings.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('teachings.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>分馆
                <ul>
                    <li>
                        <a href="{{ route('branches.index') }}" target="_blank">列表</a>
                        {{ route('branches.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('branches.create') }}" target="_blank">新增</a>
                        {{ route('branches.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('branches.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('branches.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('branches.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('branches.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>教练
                <ul>
                    <li>
                        <a href="{{ route('trainers.index') }}" target="_blank">列表</a>
                        {{ route('trainers.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('trainers.create') }}" target="_blank">新增</a>
                        {{ route('trainers.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('trainers.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('trainers.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('trainers.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('trainers.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>登录
                <ul>
                    <li>
                        <a href="{{ route('users.index') }}" target="_blank">列表</a>
                        {{ route('users.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('users.create') }}" target="_blank">新增</a>
                        {{ route('users.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('users.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('users.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('users.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('users.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
        </ol>
        <!-- div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div-->
    </body>
</html>
