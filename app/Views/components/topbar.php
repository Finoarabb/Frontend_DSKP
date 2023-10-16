<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light topbar mb-2 static-top">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline text-dark"><?= ucwords($me['nama']) ?></span>
                <img class="img-profile rounded-circle border" src="img/default.png">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" id="gantiPw">
                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-primary"></i> <span class="text-primary">Ganti Password</span>
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i> <span class="text-danger">Keluar</span>
                </a>
            </div>
        </li>
    </ul>

</nav>
<script>
    $(document).ready(function() {
        $('#gantiPw').click(function() {
            Swal.fire({
                position: 'top',
                title: 'Ganti Password',
                html: `<form>
    </div class="w-75">
    <input class="form-control mb-3" type="password" placeholder="Password Baru" id="password" name="password"/>
    <input class="form-control" type="password" placeholder="Konfirmasi Password" id="confirm_password" name="confirm_password"/>
    </div>
    </form>`,
                showCancelButton: true,
                icon: 'warning',
                confirmButtonText: 'Ganti Password'
            }).then((result) => {
                if (result.isConfirmed) {
                    let password = document.getElementById('password').value;
                    let confirm_password = document.getElementById('confirm_password').value;

                    if (password.length < 8) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Password harus memiliki setidaknya 8 karakter.'
                        });
                        return;
                    }

                    if (password !== confirm_password) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Password dan Konfirmasi Password harus cocok.'
                        });
                        return;
                    }

                    $.post({
                        url: base_url + '/gantiPassword/' + <?= $me['uid']; ?>,
                        data: {
                            password: password
                        },
                        dataType: 'json',
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Penggantian password sukses',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });
                }
            });
        })

    })
</script>
<!-- End of Topbar -->