<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="alert alert-primary visually-hidden" id="kayitAlert" role="alert">
            Kayıt Basarılı
        </div>
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->

            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="{{ route('add-users') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">İsim</label>
                            <input class="form-control" type="text" id="name" name="name"placeholder="İsim"
                                autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="surname" class="form-label">Soyisim</label>
                            <input class="form-control" type="text" name="surname" id="surname"
                                placeholder="Soyisim" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email"
                                placeholder="deneme@example.com" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="role">Kullanıcı Rolü</label>
                            <input type="text" id="role" name="role" class="form-control" placeholder="1" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="role">Restorant Id</label>
                            <input type="text" id="rest" name="rest" class="form-control"
                                placeholder="Restorant Id" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="role">Menü</label>
                            <input type="text" id="menu" name="menu" class="form-control"
                                placeholder="Menü İsmi" />
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
    <script></script>
</body>

</html>
