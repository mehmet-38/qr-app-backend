<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <h5 class="card-header">Menü Bilgileri</h5>
        <!-- Account -->

        <hr class="my-0" />
        <div class="card-body">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                @foreach ($menu as $item)
                    <div class="row">
                        <div class="mb-3 col-md-6">

                            <label for="rest_name" class="form-label">Menü İsmi</label></br>
                            <p class="text-uppercase fs-3 fw-bold">{{ $item->menu_name }}</p>
                        </div>

                        <!--
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Ekle</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>-->
                @endforeach
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ürün İsmi</th>
                            <th>Fiyat</th>
                            <th>Fotograf</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $val)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $val->food_name }}</strong>
                                </td>
                                <td>{{ $val->food_price }}</td>
                                <td>
                                    <img src="http://localhost/{{ $val->product_photo }}" style="width: 120px">

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        </form>
    </div>
    <!-- /Account -->
</div>
</div>
<script></script>
