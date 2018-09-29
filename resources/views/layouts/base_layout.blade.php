<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CIA | Christ Is the Answer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <style>
        .el-header {
            background-color: #f7f7f7;
            color: #f7f7f7;
            line-height: 60px;
            padding: 0 !important;
        }
        .el-footer{
            background-color: #B3C0D1;
            color: #333;
            text-align: center;
            line-height: 60px;
            height: 30px;
        }
        .el-aside {
            background-color: #ffffff;
            color: #333;
            text-align: left;
            line-height: 200px;
        }

        .el-main {

            color: #333;
        }

        body > .el-container {
            margin-bottom: 40px;
        }

        .el-container:nth-child(5) .el-aside,
        .el-container:nth-child(6) .el-aside {
            line-height: 260px;
        }

        .el-container:nth-child(7) .el-aside {
            line-height: 320px;
        }
    </style>
    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>
<div class="flex-center position-ref full-height">


    <div id="app">
        <el-container style="height: 100vh; border: 1px solid #eee">
            <el-header>
                <nav-bar></nav-bar>
            </el-header>
            <el-container>
                <el-aside width="200px">
                    <side-bar></side-bar>
                </el-aside>
                <el-container>
                    <el-main>
                        <router-view></router-view>
                    </el-main>
                </el-container>
            </el-container>
        </el-container>
    </div>


    <script src="/js/app.js"></script>

</div>
</body>
</html>
