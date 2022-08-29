<?=$this->extend('layouts/authentication') ?>

<?= $this->section('styles') ?>
    <style>
        .authentication-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .authentication-wrapper {
            background: #fff;
            border-radius: 12px;
            padding: 2rem;
        }
    </style>
<?= $this->endSection() ?>

<?=$this->section('content') ?>

<div class="d-flex justify-content-center align-items-center vh-100 authentication-container">
    <div class="authentication-wrapper">
        <h3 class="text-center mb-3">Majoo Teknologi Indonesia</h3>
        <form action="#">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-3" onclick="handlePageChange()">Masuk</button>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection() ?>


<?= $this->section('scripts') ?>
    <script>
        function handlePageChange() {
            return window.location.href = '/admin?skip=true';
        }
    </script>
<?= $this->endSection() ?>