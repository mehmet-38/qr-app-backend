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
                <form method="POST" action="{{ route('add-rest') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="rest_name" class="form-label">Restoran İsmi</label>
                            <input class="form-control" type="text" id="rest_name"
                                name="rest_name"placeholder="Restoran İsmi" autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="rest_qr" class="form-label">Restoran QR Linki</label>
                            <input class="form-control" type="text" name="rest_qr" id="rest_qr"
                                placeholder="Restoran QR Link" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="menu_id" class="form-label">Restoran Menu Id</label>
                            <input class="form-control" type="text" id="menu_id" name="menu_id"
                                placeholder="Menu Id" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="menu_id" class="form-label">Restoran Menu Id</label>
                            <input class="form-control" type="text" id="menu_id" name="menu_id"
                                placeholder="Menu Id" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="rest_photo" class="form-label">Restoran Fotoğraf</label>
                            <input type="file" class="form-control" id="rest_photo" name="rest_photo" />
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
