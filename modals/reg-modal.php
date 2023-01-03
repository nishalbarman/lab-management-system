<!-- Add User Modal -->

<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="padding: 20px">
                    <div class="main">

                        <form action="../csr-admin/server-side/reg-server.php" class="registration" method="post"
                            enctype="multipart/form-data" id="addUser">
                            <div class="mb-3">
                                <label class="pure-material-textfield-outlined">
                                    <input type="text" class="form-control" aria-label="Full name"
                                        aria-describedby="inputGroup-sizing-lg" placeholder="Name" name="name">
                                </label>

                                <label class="pure-material-textfield-outlined">
                                    <input type="text" class="form-control" aria-label="Email Id"
                                        aria-describedby="inputGroup-sizing-lg" placeholder="example@email.com"
                                        name="email">

                                </label>
                            </div>


                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">+91</span>
                                <input type="number" class="form-control" placeholder="Phone" aria-label="Phone Number"
                                    aria-describedby="basic-addon1" name="phone">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Profile Picture</label>
                                <input name="image" class="form-control" type="file" id="formFile" accept="image/*">
                            </div>

                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Role
                                </label>
                                <select name="role" class="form-select" id="inputGroupSelect01">
                                    <option selected>Choose...</option>
                                    <option value="2">User</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Technician</option>
                                </select>
                            </div>

                            <label class="pure-material-textfield-outlined">
                                <input type="password" class="form-control" aria-label="Password"
                                    aria-describedby="inputGroup-sizing-lg" id="inputPassword" placeholder="Password"
                                    name="password">
                            </label>

                            <label class="pure-material-textfield-outlined">
                                <input type="password" class="form-control" aria-label="Password"
                                    aria-describedby="inputGroup-sizing-lg" id="inputPassword"
                                    placeholder="Confirm Password" name="cpassword">
                            </label>
                            <center>
                                <br>
                                <div class="mb-3">

                                    <input id="button" name="submit" type="submit" style="width: 70%"
                                        class="btn btn-outline-success btn-lg" value="SignUp">
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../includes/js/auth.js"></script>