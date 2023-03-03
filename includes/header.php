<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>
<div class="d-flex">
    <div class="d-flex col-2 flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" >
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="/" class="nav-link text-white <?= $_SERVER['REQUEST_URI'] === '/' ? 'active' : '' ?> ">
                    Vilaoyatlar
                </a>
            </li>
            <li>
                <a href="/district" class="nav-link text-white  <?= $_SERVER['REQUEST_URI'] === '/district' ? 'active' : '' ?>">
                    Tumanlar
                </a>
            </li>
            <li>
                <a href="/organization" class="nav-link text-white <?= $_SERVER['REQUEST_URI'] === '/organization' ? 'active' : '' ?> ">
                    Organizasiyalar
                </a>
            </li>
            <li>
                <a href="/store" class="nav-link text-white <?= $_SERVER['REQUEST_URI'] === '/store' ? 'active' : '' ?> ">
                    Sklad
                </a>
            </li>
        </ul>
    </div>
