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

        <div class="card mb-4">
            <h5 class="card-header">Kupon Ekle</h5>
            <!-- Account -->

            <hr class="my-0" />
            <div class="card-body">
                <form method="POST" action="{{ route('add-coupon') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="food_name" class="form-label">Kullanıcı</label>
                            <select name="users" id="users" class="form-select ">
                                @foreach ($users as $item)
                                    <option>{{ $item->name }}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="food_price" class="form-label">Aktiflik</label>
                            <input class="form-control" type="text" name="active" id="active"
                                placeholder="Aktiflik" value="" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="menus_id" class="form-label">kupon Kod</label>
                            <input class="form-control" type="text" id="coupon_code" name="coupon_code"
                                placeholder="FIRSAT20" value="" />
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
