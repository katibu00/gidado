@extends('layout.app')
@section('PageTitle', 'Contacts')
@section('content')


    <div class="main-container">
        <div class="container">
            <div class="card mb-4">
                <div class="card-header border-0 bg-none">
                    <div class="row">
                        <div class="col align-self-center">
                            <h6 class="mb-0">Beneficiaries</h6>
                        </div>
                        <div class="col-auto align-self-center">
                            <button class="btn btn-default btn-sm rounded" data-toggle="modal" data-target="#contactModal">
                                + Add New Beneficiary
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">

                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="all font-weight-medium">ID</th>
                                <th class="min-tablet font-weight-medium">Contact</th>
                                <th class="font-weight-medium text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($contacts) === 0)
                                <tr>
                                    <td colspan="5" class="text-center">No contacts available</td>
                                </tr>
                            @else
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <div class="media">
                                                <figure class="mb-0 avatar avatar-40 mr-2 bg-default rounded-circle">
                                                    {{ $contact->network }}
                                                </figure>
                                                <div class="media-body">
                                                    <p class="mb-0">{{ $contact->name }}</p>
                                                    <p class="text-secondary small">{{ $contact->number }},
                                                        {{ $contact->network }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent dropdown-toggle" type="button"
                                                    id="actionDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <span class="fas fa-ellipsis-v"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <a href="#" class="dropdown-item edit-contact"
                                                        data-id="{{ $contact->id }}" data-name="{{ $contact->name }}"
                                                        data-number="{{ $contact->number }}"
                                                        data-network="{{ $contact->network }}">Edit</a>
                                                    <a href="#" class="dropdown-item delete-contact"
                                                        data-id="{{ $contact->id }}"
                                                        data-name="{{ $contact->name }}">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Add/Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="contactForm">
                    <div class="modal-body">
                        <ul id="error_list"></ul>

                        <div class="form-group float-label active">
                            <input type="text" class="form-control" id="name" name="name">
                            <label class="form-control-label">Name</label>
                        </div>
                        <div class="form-group float-label active">
                            <input type="number" class="form-control" id="number" name="number">
                            <label class="form-control-label">Number</label>
                        </div>

                        <div class="form-group float-label active">
                            <select class="form-control" id="network" name="network">
                                <option value=""></option>
                                <option value="MTN">MTN</option>
                                <option value="AIRTEL">AIRTEL</option>
                                <option value="GLO">GLO</option>
                                <option value="9MOBILE">9MOBILE</option>
                            </select>
                            <label class="form-control-label">Network</label>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveContactBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Contact Modal -->
    <div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="editContactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editContactModalLabel">Edit Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editContactForm">
                    <div class="modal-body">
                        <ul id="update_error_list"></ul>
                        <input type="hidden" id="contactId" name="contactId">
                        <div class="form-group float-label active">
                            <input type="text" class="form-control" id="edit_name" name="edit_name">
                            <label class="form-control-label">Name</label>
                        </div>
                        <div class="form-group float-label active">
                            <input type="number" class="form-control" id="edit_number" name="edit_number">
                            <label class="form-control-label">Number</label>
                        </div>

                        <div class="form-group float-label active">
                            <select class="form-control" id="edit_network" name="edit_network">
                                <option value=""></option>
                                <option value="MTN">MTN</option>
                                <option value="AIRTEL">AIRTEL</option>
                                <option value="GLO">GLO</option>
                                <option value="9MOBILE">9MOBILE</option>
                            </select>
                            <label class="form-control-label">Network</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="updateContactBtn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {

            //create
            $(document).on('submit', '#contactForm', function(e) {
                e.preventDefault();

                let formData = new FormData($('#contactForm')[0]);

                spinner =
                    '<div class="spinner-border" style="height: 15px; width: 15px;" role="status"></div> &nbsp; Please Wait...'
                $('#saveContactBtn').html(spinner);
                $('#saveContactBtn').attr("disabled", true);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('contacts.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        if (response.status == 200) {
                            $('.table').load(location.href + ' .table');
                            $('#contactModal').modal('hide');
                            $('#contactForm')[0].reset();
                            Command: toastr["success"](response.message)
                            $('#saveContactBtn').text("Submit");
                            $('#saveContactBtn').attr("disabled", false);
                        }
                        if (response.status == 400) {
                            $("#error_list").html("");
                            $("#error_list").addClass("alert alert-danger");
                            $.each(response.errors, function(key, err) {
                                $("#error_list").append("<li>" + err + "</li>");
                            });

                            $("#saveContactBtn").text("Submit");
                            $("#saveContactBtn").attr("disabled", false);
                        }
                    }
                });

            });

            //delete item
            $(document).on('click', '.delete-contact', function(e) {
                e.preventDefault();

                let id = $(this).data('id');
                let name = $(this).data('name');

                swal({
                        title: "Delete " + name + "?",
                        text: "Once deleted, you will not be able to recover it!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });


                            $.ajax({
                                url: "{{ route('contacts.destroy') }}",
                                method: 'POST',
                                data: {
                                    id: id,
                                },

                                success: function(res) {

                                    if (res.status == 200) {
                                        swal('Deleted', res.message, "success");
                                        $('.table').load(location.href + ' .table');
                                    }
                                    if (res.status == 400) {
                                        swal('Cannot Delete', res.message, "error");
                                    }

                                }
                            });

                        }
                    });

            });

            //edit item
            $(document).on('click', '.edit-contact', function() {
                let name = $(this).data('name');
                let id = $(this).data('id');
                let number = $(this).data('number');
                let network = $(this).data('network');
                $(`#edit_network option[value=${network}]`).prop('selected', true);
                $('#edit_name').val(name);
                $('#edit_number').val(number);
                $('#contactId').val(id);
                $('#editContactModal').modal('show');
            });

            //update data
            $(document).on('click', '#updateContactBtn', function(e) {
                e.preventDefault();

                name = $('#edit_name').val();
                id = $('#contactId').val();
                name = $('#edit_name').val();
                network = $('#edit_network').val();
                number = $('#edit_number').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                spinner =
                    '<div class="spinner-border" style="height: 15px; width: 15px;" role="status"></div> &nbsp; Updating. . .';
                $("#updateContactBtn").html(spinner);
                $("#updateContactBtn").attr("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('contacts.update') }}",
                    data: {
                        'name': name,
                        'id': id,
                        'network': network,
                        'number': number,
                    },
                    dataType: "json",
                    success: function(res) {

                        if (res.status == 400) {
                            $("#update_error_list").html("");
                            $("#update_error_list").addClass("alert alert-danger");
                            $.each(res.errors, function(key, err) {
                                $("#update_error_list").append("<li>" + err + "</li>");
                            });

                            $("#updateContactBtn").text("Update");
                            $("#updateContactBtn").attr("disabled", false);

                        }

                        if (res.status == 200) {

                            $('#update_error_list').html("");
                            $('#update_error_list').removeClass('alert alert-danger');
                            $('#editContactModal').modal('hide');
                            $('#updateContactBtn').text("Update");
                            $('#updateContactBtn').attr("disabled", false);
                            $('.table').load(location.href + ' .table');

                            Command: toastr["success"](res.message);
                            toastr.options = {
                                closeButton: false,
                                debug: false,
                                newestOnTop: false,
                                progressBar: false,
                                positionClass: "toast-top-right",
                                preventDuplicates: false,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                            };
                            $("#updateContactBtn").text("Update");
                            $("#updateContactBtn").attr("disabled", false);


                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        if (xhr.status === 419) {
                            Command: toastr["error"](
                                "Session expired. please login again."
                            );
                            toastr.options = {
                                closeButton: false,
                                debug: false,
                                newestOnTop: false,
                                progressBar: false,
                                positionClass: "toast-top-right",
                                preventDuplicates: false,
                                onclick: null,
                                showDuration: "300",
                                hideDuration: "1000",
                                timeOut: "5000",
                                extendedTimeOut: "1000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                            };

                            setTimeout(() => {
                                window.location.replace('{{ route('login') }}');
                            }, 2000);
                        }
                    },
                });
            });



        });
    </script>
@endsection
