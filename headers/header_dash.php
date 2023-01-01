<?php
include('includes/config/connection.php');
include("../core/base.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="../includes/css/headers.css" rel="stylesheet">
    <title></title>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
    </svg>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">

                    <!-- <image class="bi me-2" width="45" height="45" role="img" aria-label="Bootstrap"
                        src="assets/logo/hk.png" /> -->


                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="400" height="200"
                        style="border: dashed 2px #aaa">
                        <path fill="#"
                            d="M15.779296875,97.5595703125q-0.02734375-0.3623046875,0.0615234375-0.68359375t0.3349609375-0.533203125t0.833984375-0.2119140625q0.13671875,0,0.3349609375,0.02734375t0.396484375,0.0888671875t0.3212890625,0.1708984375t0.123046875,0.30078125q0,0.505859375,0.0341796875,1.3330078125t0.0888671875,1.72265625t0.1025390625,1.75t0.0888671875,1.3876953125q1.06640625-0.0546875,2.146484375-0.0546875t2.1328125-0.0546875l1.88671875-0.0546875l0-1.353515625q0-2.26953125-0.0888671875-4.5458984375t-0.3076171875-4.5458984375q0-0.1640625,0.13671875-0.2666015625t0.3212890625-0.1572265625t0.3828125-0.068359375t0.3076171875-0.013671875q0.314453125,0,0.6767578125,0.095703125t0.4169921875,0.41015625l0.08203125,0.587890625q0.341796875,2.4609375,0.46484375,4.8671875t0.177734375,4.8125q0.1640625,0.02734375,0.3486328125,0.0888671875t0.3759765625,0.1162109375q0.13671875,0.0546875,0.3896484375,0.1640625t0.2529296875,0.341796875q0,0.21875-0.19140625,0.341796875t-0.4306640625,0.1845703125t-0.46484375,0.0751953125t-0.2802734375,0.013671875q0.02734375,1.01171875,0.02734375,2.0166015625l0,2.0166015625l0,4.416015625l0,2.4609375q0,0.1640625-0.1572265625,0.2939453125t-0.3759765625,0.2119140625t-0.4580078125,0.109375t-0.4306640625,0.02734375t-0.451171875-0.02734375t-0.46484375-0.109375t-0.3623046875-0.205078125t-0.1572265625-0.30078125l0-0.587890625q0.0546875-2.59765625,0.123046875-5.1474609375t0.13671875-5.1201171875q-1.490234375,0.0546875-3.0283203125,0.068359375t-3.0556640625,0.068359375q0.1640625,1.927734375,0.3759765625,3.8486328125t0.4443359375,3.8486328125q0,0.1640625-0.1572265625,0.2939453125t-0.369140625,0.2119140625t-0.451171875,0.109375t-0.4306640625,0.02734375q-0.396484375,0-0.8681640625-0.13671875t-0.5263671875-0.505859375q-0.1640625-1.44921875-0.3076171875-3.19921875t-0.2529296875-3.5751953125t-0.1708984375-3.5751953125t-0.0615234375-3.171875q0-0.341796875-0.02734375-0.7041015625z M31.40173828125,105.400390625q0-2.3515625,0.1298828125-4.6484375t0.3212890625-4.6484375q0.0546875-0.615234375,0.068359375-1.189453125t0.1298828125-1.0048828125t0.41015625-0.68359375t0.9091796875-0.2529296875q0.396484375,0,0.8271484375,0.13671875t0.4306640625,0.642578125q0,1.900390625-0.1572265625,3.7392578125t-0.2119140625,3.6572265625q1.490234375-1.681640625,3.185546875-3.1376953125t3.595703125-2.8779296875q0.2734375-0.19140625,0.697265625-0.205078125q0.13671875,0,0.2392578125,0.013671875t0.2119140625,0.041015625q0.13671875,0.0546875,0.2802734375,0.1298828125t0.1435546875,0.2119140625q0,0.109375-0.123046875,0.19140625q-1.421875,1.1484375-2.8095703125,2.337890625t-2.6455078125,2.54296875q0.1640625,0.314453125,0.2802734375,0.587890625t0.2529296875,0.587890625q1.1484375,2.720703125,1.9619140625,5.5712890625t1.7294921875,5.6533203125q0.08203125,0.314453125,0.2392578125,0.6494140625t0.2939453125,0.669921875t0.2392578125,0.62890625t0.1025390625,0.4853515625q0,0.24609375-0.1572265625,0.3896484375t-0.3623046875,0.2255859375t-0.4443359375,0.109375t-0.4443359375,0.02734375q-0.478515625,0-0.8544921875-0.13671875t-0.5947265625-0.615234375q-1.01171875-3.2265625-1.9482421875-6.453125t-1.8935546875-6.5078125q-0.314453125,0.314453125-0.62890625,0.7861328125t-0.57421875,0.8681640625q0,2.05078125,0.095703125,4.07421875t0.328125,4.07421875q0.0546875,0.587890625,0.1845703125,1.17578125t0.1298828125,1.203125q0,0.451171875-0.46484375,0.62890625t-1.025390625,0.177734375q-0.615234375,0-0.9228515625-0.123046875t-0.4375-0.3212890625t-0.1572265625-0.4375t-0.08203125-0.4580078125q-0.314453125-2.16015625-0.396484375-4.2724609375t-0.08203125-4.2451171875z" />
                        <path fill="#" d="" />
                    </svg>

                    <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg> -->
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Dashboard</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Services</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Others
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">TXN Report Retrieve</a></li>
                            <li><a class="dropdown-item" href="#">Custom Upload</a></li>
                            <li><a class="dropdown-item" href="#">QR Creation</a></li>
                            <li><a class="dropdown-item" href="#">Download</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#" class="nav-link px-2 link-dark">Others</a></li> -->
                    <!-- <li><a href="#" class="nav-link px-2 link-dark">Settings</a></li> -->
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <script src="../includes/js/auth.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>