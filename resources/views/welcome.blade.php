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
            <li>Account(账号)
                <ul>
                    <li>
                        <a href="{{ route('accounts.index') }}" target="_blank">列表</a>
                        {{ route('accounts.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('accounts.create') }}" target="_blank">新增</a>
                        {{ route('accounts.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('accounts.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('accounts.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('accounts.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('accounts.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Apply(加盟申请)
                <ul>
                    <li>
                        <a href="{{ route('apply.index') }}" target="_blank">列表</a>
                        {{ route('apply.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('apply.create') }}" target="_blank">新增</a>
                        {{ route('apply.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('apply.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('apply.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('apply.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('apply.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Banner:头图
                <ul>
                    <li>
                        <a href="{{ route('banner.index') }}" target="_blank">列表</a>
                        {{ route('apply.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('banner.create') }}" target="_blank">新增</a>
                        {{ route('apply.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('banner.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('apply.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('banner.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('apply.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Branches:分馆
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
            
            <li>Categories:分类
                <ul>
                    <li>
                        <a href="{{ route('categories.index') }}" target="_blank">列表</a>
                        {{ route('categories.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('categories.create') }}" target="_blank">新增</a>
                        {{ route('categories.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('categories.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('categories.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('categories.show', ['id' => 10000]) }}" target="_blank">详情</a>
                        {{ route('categories.show', ['id' => 10000]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Courses:课程
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
            
            <li>Coursewares:课件
                <ul>
                    <li>
                        <a href="{{ route('coursewares.index') }}" target="_blank">列表</a>
                        {{ route('coursewares.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('coursewares.create') }}" target="_blank">新增</a>
                        {{ route('coursewares.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('coursewares.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('coursewares.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('coursewares.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('coursewares.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Grades:班级
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
            
            <li>Member:团队成员
                <ul>
                    <li>
                        <a href="{{ route('members.index') }}" target="_blank">列表</a>
                        {{ route('members.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('members.create') }}" target="_blank">新增</a>
                        {{ route('members.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('members.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('members.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('members.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('members.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>News:资讯
                <ul>
                    <li>
                        <a href="{{ route('news.index') }}" target="_blank">列表</a>
                        {{ route('news.index') }}
                        (GET)
                    </li>
                    <li>
                        <a href="{{ route('news.create') }}" target="_blank">新增</a>
                        {{ route('news.store') }}
                        (POST)
                    </li>
                    <li>
                        <a href="{{ route('news.edit', ['id' => 1]) }}" target="_blank">修改</a>
                        {{ route('news.update', ['id' => 1]) }}
                        (PUT)
                    </li>
                    <li>
                        <a href="{{ route('news.show', ['id' => 1]) }}" target="_blank">详情</a>
                        {{ route('news.show', ['id' => 1]) }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Position:Banner显示位
                <ul>
                    <li>
                        <a href="{{ route('position.index') }}" target="_blank">列表</a>
                        {{ route('position.index') }}
                        (GET)
                    </li>
                </ul>
            </li>
            
            <li>Teachings:课时
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
            
            <li>Trainers:教练
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
            
            <li>Users:用户
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
    </body>
</html>
