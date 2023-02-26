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
            <h5 class="card-header">Product Ekle</h5>
            <!-- Account -->

            <hr class="my-0" />
            <div class="card-body">
                <form method="POST" action="{{ route('add-product') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="food_name" class="form-label">Ürün İsmi</label>
                            <input class="form-control" type="text" id="food_name"
                                name="food_name"placeholder="Ürün İsmi" autofocus value="" />

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="food_price" class="form-label">Ürün Fiyat</label>
                            <input class="form-control" type="text" name="food_price" id="food_price"
                                placeholder="Ürün Fiyat" value="" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="menus_id" class="form-label">Menu Id</label>
                            <input class="form-control" type="text" id="menus_id" name="menus_id"
                                placeholder="Menu Id" value="" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="product_photo" class="form-label">Ürün Fotoğraf</label>
                            <input type="file" class="form-control" id="product_photo" name="product_photo" />
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
