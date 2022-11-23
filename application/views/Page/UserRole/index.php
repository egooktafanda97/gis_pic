<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-8">
        <div class="card">

            <div class="card-header">
                <h5>User</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="#" class="needs-validation" id="login" novalidate="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="Nama" type="text" class="form-control" name="Nama" tabindex="1" required autofocus>
                        <div style="display: flex;justify-content: flex-start;">
                            <small style="font-size: .5; color: red;" id="msg-nama">
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                        <div style="display: flex;justify-content: flex-start;">
                            <small style="font-size: .5; color: red;" id="msg-username">
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control" name="email" tabindex="1" placeholder="yourmail@mail.com" required autofocus>
                        <div style="display: flex;justify-content: flex-start;">
                            <small style="font-size: .5; color: red;" id="msg-username">
                            </small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Pilih...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>