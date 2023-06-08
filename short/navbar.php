<?php
$imagePath = "image/SamanthaJM-removebg-preview.png";
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo $imagePath; ?>" alt="Logo" width="140" height="50">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'sales.php') {
                        echo 'active';
                    } ?>" href="sales.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'read.php') {
                        echo 'active';
                    } ?>" href="read.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'brand.php') {
                        echo 'active';
                    } ?>" href="brand.php">Brands</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'inventory_report.php') {
                        echo 'active';
                    } ?>" href="inventory_report.php">Reports</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if (basename($_SERVER['PHP_SELF']) == 'accountmanager.php') {
                        echo 'active';
                    } ?>"
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Account
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="accountmanager.php">Manage Account</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="login1.php">Logout</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </div>
    </div>
</nav>