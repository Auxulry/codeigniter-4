<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CodeIgniter Admin</title>
    <link rel="stylesheet" href="/css/admin/main.css">
    <link rel="stylesheet" href="/css/admin/navbar.css">

    <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
    <link href="/css/select2.min.css" rel="stylesheet" />
    <script src="/js/select2.min.js"></script>
    <?= $this->renderSection('styles') ?>
  </head>
  <body>
    <div id="wrapper">
        <?= $this->include('layouts/partials/admin/sidebar') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <?= $this->include('layouts/partials/admin/header') ?>
            <main class="main">
                <?= $this->renderSection('content') ?>
            </main>
            <?= $this->include('layouts/partials/footer') ?>
        </div>
    </div>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?= $this->renderSection('scripts') ?>
  </body>
</html>