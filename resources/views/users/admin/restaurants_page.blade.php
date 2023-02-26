<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Restoran İsmi</th>
                            <th>Qr Link</th>
                            <th>Menü Id</th>
                            <th>Fotograf</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($restaurants as $rest)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $rest->rest_name }}</strong>
                                </td>
                                <td>{{ $rest->qr_link }}</td>
                                <td>
                                    {{ $rest->menus_id }}
                                </td>
                                <td>
                                    <img src="http://localhost/{{ $rest->rest_photo }}" style="width: 120px">

                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item " id="editBtn"
                                                value="{{ $rest->rest_id }}"><i class="bx bx-edit-alt me-1"></i>
                                                Edit</button>
                                            <button class="dropdown-item" id="deleteBtn"
                                                onclick="deleteRest({{ $rest->rest_id }})"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <form action="{{ route('delete-rest') }} "method="POST" id="deleteForm">
        @csrf
        @method('delete')
        <input type="hidden" name="deleteRestId" id="deleteRestId">
    </form>
    <form action="{{ route('update-rest') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Restoran Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <input type="hidden" id="rest_id" name="rest_id" class="form-control">
                                <label for="rest_name" class="form-label">Restoran İsmi</label>
                                <input type="text" id="rest_name" name="rest_name" class="form-control"
                                    placeholder="Restoran İsmi" />


                            </div>
                            <div class="col mb-0">
                                <label for="rest_qr" class="form-label">Restoran QR Link</label>
                                <input type="text" id="rest_qr" name="rest_qr" class="form-control"
                                    placeholder="Restoran QR " />
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col mb-2">
                                <label for="menu_id" class="form-label">Menu Id</label>
                                <input type="text" id="menu_id" name="menu_id" class="form-control"
                                    placeholder="Menu Id" />
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col mb-2">
                                <label for="rest_photo" class="form-label">Restoran Fotoğraf</label>
                                <input type="file" id="rest_photo" name="rest_photo" class="form-control" />
                                <img src="" alt="" id="photo">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#editBtn', function() {
                var rest_id = $(this).val();
                $('#basicModal').modal('show')

                $.ajax({
                    type: 'GET',
                    url: "/edit-rest/" + rest_id,
                    success: function(response) {
                        $('#rest_id').val(response.rest.rest_id);
                        $('#rest_name').val(response.rest.rest_name);
                        $('#rest_qr').val(response.rest.qr_link);
                        $('#menu_id').val(response.rest.menus_id);
                        $('#rest_photo').val(response.rest.rest_photo);

                    }
                })
            })


        })

        function deleteRest(id) {
            if (confirm("Silme işlemini onaylayınız")) {
                $("[name=deleteRestId]").val(id);
                $("#deleteForm").submit();
            }
        }
    </script>
</body>

</html>
