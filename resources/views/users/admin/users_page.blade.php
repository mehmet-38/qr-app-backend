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
                            <th>İsim</th>
                            <th>Soyisim</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->name }}</strong>
                                </td>
                                <td>{{ $user->surname }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td><span class="badge bg-label-primary me-1">
                                        @if ($user->role == 1)
                                            admin
                                        @elseif ($user->role == 2)
                                            restorant yöneticisi
                                        @elseif ($user->role == 3)
                                            kullanıcı
                                        @endif


                                    </span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item " id="editBtn"
                                                value="{{ $user->id }}"><i class="bx bx-edit-alt me-1"></i>
                                                Edit</button>
                                            <button class="dropdown-item" id="deleteBtn"
                                                onclick="deleteUser({{ $user->id }})"><i
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
    <form action="{{ route('delete-user') }} "method="POST" id="deleteForm">
        @csrf
        @method('delete')
        <input type="hidden" name="deleteId" id="deleteId">
    </form>
    <form action="{{ route('update-user') }}" method="POST">
        @csrf
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Kullanıcı Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="name" class="form-label">İsim</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="İsim" />
                                <input type="hidden" id="id" name="id" class="form-control" />
                            </div>
                            <div class="col mb-0">
                                <label for="surname" class="form-label">Soyisim</label>
                                <input type="text" id="surname" name="surname" class="form-control"
                                    placeholder="Soyisim" />
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Email" />
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col mb-2">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" id="role" name="role" class="form-control"
                                    placeholder="Role" />
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
                var user_id = $(this).val();
                $('#basicModal').modal('show')
                $.ajax({
                    type: 'GET',
                    url: "/edit-user/" + user_id,
                    success: function(response) {
                        $('#name').val(response.user.name);
                        $('#surname').val(response.user.surname);
                        $('#email').val(response.user.email);
                        $('#role').val(response.user.role);
                        $('#id').val(response.user.id);

                    }
                })
            })


        })

        function deleteUser(id) {
            if (confirm("Silme işlemini onaylayınız")) {
                $("[name=deleteId]").val(id);
                $("#deleteForm").submit();
            }
        }
    </script>
</body>

</html>
