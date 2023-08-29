@extends('layout.app')
@section('PageTitle', 'Home')
@section('content')


<div class="container mt-3 mb-4 text-center">
    <h2 class="text-white">&#8358; {{ number_format(auth()->user()->wallet->balance,0) }}</h2>
    <p class="text-white mb-4">Wallet Balance</p>
</div>

<div class="main-container">
    <!-- page content start -->


    <div class="container mb-4 text-center">
        <div class="card bg-default-secondary shadow-default">
            <div class="card-body">
                <!-- Swiper -->
                <div class="swiper-container addsendcarousel text-center">
                    <div class="swiper-wrapper mb-4">
                        <a href="{{ route('add_money') }}" class="swiper-slide text-white">
                            <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">add</span></div>
                            <p><small>Add Money</small></p>
                        </a>
                        <a href="#" class="swiper-slide text-white">
                            <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">call_made</span></div>
                            <p><small>Refer</small></p>
                        </a>
                        <a href="{{ route('transactions.index') }}" class="swiper-slide text-white">
                            <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">call_received</span></div>
                            <p><small>History</small></p>
                        </a>
                        <a href="{{ route('contacts.index') }}" class="swiper-slide text-white">
                            <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">swap_horiz</span></div>
                            <p><small>Contacts</small></p>
                        </a>
                        <a href="#" class="swiper-slide text-white">
                            <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">class</span></div>
                            <p><small>Data</small></p>
                        </a>
                        <a href="#" class="swiper-slide text-white">
                            <div class="icon icon-50 rounded-circle mb-2 bg-white-light"><span class="material-icons">receipt</span></div>
                            <p><small>Airtime</small></p>
                        </a>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container mb-4">
        <div class="card">
            <div class="card-body text-center ">
                <div class="row justify-content-equal no-gutters">
                    <div class="col-4 col-md-2 mb-3">
                        <a href="#">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">qr_code_2</span></div>
                        <p class="text-secondary"><small>Add Funds</small></p></a>
                    </div>
                    <div class="col-4 col-md-2 mb-3">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">swap_horiz</span></div>
                        <p class="text-secondary"><small>Transfer</small></p>
                    </div>
                    <div class="col-4 col-md-2 mb-3">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">sim_card</span></div>
                        <p class="text-secondary"><small>Reacharge</small></p>
                    </div>
                    <div class="col-4 col-md-2 mb-3">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">account_circle</span></div>
                        <p class="text-secondary"><small>Send</small></p>
                    </div>
                    <div class="col-4 col-md-2 mb-3">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">receipt</span></div>
                        <p class="text-secondary"><small>Bill</small></p>
                    </div>
                    <div class="col-4 col-md-2 mb-3">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">wb_incandescent</span></div>
                        <p class="text-secondary"><small>Electricity</small></p>
                    </div>
                </div>
                <button class="btn btn-sm btn-outline-secondary rounded" id="more-expand-btn">Show more <span class="ml-2 small material-icons">expand_more</span></button>
                <div class="row justify-content-equal no-gutters" id="more-expand">
                    <div class="col-4 col-md-2">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">beach_access</span></div>
                        <p class="text-secondary"><small>Insurance</small></p>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">drive_eta</span></div>
                        <p class="text-secondary"><small>Car</small></p>
                    </div>
                    <div class="col-4 col-md-2">
                        <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">flight</span></div>
                        <p class="text-secondary"><small>Flight</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="subtitle mb-0">
                    <div class="avatar avatar-40 bg-default-light text-default rounded mr-2"><span class="material-icons vm">lock</span></div>
                    Buy Data
                </h6>
            </div>
            <form>
            <div class="card-body">
              
                <div class="form-group float-label active">
                    <select class="form-control" id="network">
                        <option value=""></option>
                        <option value="MTN">MTN</option>
                        <option value="AIRTEL">AIRTEL</option>
                        <option value="GLO">GLO</option>
                        <option value="9MOBILE">9MOBILE</option>
                     </select>
                     <label class="form-control-label">Network</label>
                 </div>

                <div class="form-group float-label active">
                    <select class="form-control" id="contact" name="contact">
                        <option value=""></option>
                     </select>
                     <label class="form-control-label">Number</label>
                 </div>

                <div class="form-group float-label active" id="phoneField" style="display: none;">
                    <input type="text" class="form-control" id="number">
                    <label class="form-control-label">Phone Number</label>
                </div>

                <div class="form-group float-label active">
                    <select class="form-control" id="amount" name="amount">
                        <option value=""></option>
                     </select>
                     <label class="form-control-label">Amount</label>
                 </div>

                 <div class="form-group float-label active">
                    <input type="text" class="form-control" id="price" disabled>
                    <label class="form-control-label">Price</label>
                </div>
               
               
            </div>
            <div class="card-footer">
                <button class="btn btn-block btn-default rounded" type="submit" >Buy Data</button>
            </div>
            <form>
        </div>
    </div>


   
</div>

   


@endsection
@section('js')
   

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#contact').on('change', function() {
                var phoneField = $('#phoneField');
                if ($(this).val() === 'new') {
                    phoneField.show();
                } else {
                    phoneField.hide();
                }
            });
            $('#amount').on('change', function() {

                var planPrice = $(this).find('option:selected').data('plan_price');
                $('#price').val(planPrice);

            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/js-loading-overlay@1.1.0/dist/js-loading-overlay.min.js"></script>
    @if ($popUp)
        <script>
            $(document).ready(function() {
                Swal.fire({
                    icon: 'info',
                    title: 'Notification',
                    html: '{{ $popUp->body }}',
                    confirmButtonText: 'Close',
                    allowOutsideClick: false,
                });
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {

            $('#network').on('change', function() {
                var networkId = $(this).val();
                var amountField = $('#amount');
                var contactsField = $('#contact');

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                amountField.html('<option value="">Loading...</option>');
                contactsField.html('<option value="">Loading...</option>');

                if (networkId) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    $.ajax({
                        url: '/fetch-data-plans',
                        method: 'POST',
                        data: {
                            networkId: networkId
                        },
                        success: function(response) {
                            amountField.empty();
                            contactsField.empty();
                            var dataPlans = response.dataPlans;
                            var contacts = response.contacts;
                            var dataPlansHTML = '';
                            dataPlansHTML += '<option value=""></option>'
                            $.each(dataPlans, function(index, dataPlan) {
                                dataPlansHTML += '<option value="' + dataPlan.plan_id +
                                    '" data-plan_price="' + dataPlan.selling_price +
                                    '" data-plan_amount="' + dataPlan.amount +
                                    '">' + dataPlan.amount + '</option>';
                            });
                            amountField.html(dataPlansHTML);
                            var contactHTML = '';
                            contactHTML +=
                                '<option value=""></option><option value="new">New Number</option>'
                            $.each(contacts, function(index, contact) {
                                contactHTML += '<option value="' + contact.number +
                                    '" data-contact_number="' + contact.number + '">' +
                                    contact.name + ' (' + contact.network + ' - ' +
                                    contact.number + ')</option>';
                            });
                            contactsField.html(contactHTML);
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });


            //////////



            $('form').on('submit', function(e) {
                e.preventDefault();

                var network = $('#network').val();
                var contact = $('#contact').val();
                var number = $('#number').val();
                var amount = $('#amount').val();
                var price = $('#price').val();
                var selectedContactNumber = $('#contact option:selected').data('contact_number');
                var selectedPlanPrice = $('#amount option:selected').data('plan_price');
                var selectedPlanAmount = $('#amount option:selected').data('plan_amount');

                if (!network) {
                    Swal.fire('Error', 'Please select a network', 'error');
                    return;
                }
                if (!contact) {
                    Swal.fire('Error', 'Please select a recipient', 'error');
                    return;
                }

                if (contact === 'new' && number === '') {
                    Swal.fire('Error', 'Please fill in the recipient phone number', 'error');
                    return;
                }
                if (!amount) {
                    Swal.fire('Error', 'Please select an amount', 'error');
                    return;
                }

                // Create an object with the form data
                var formData = {
                    network: network,
                    contact: contact,
                    number: number,
                    amount: amount,
                    price: price,
                    selectedContactNumber: selectedContactNumber,
                    selectedPlanPrice: selectedPlanPrice
                };

                // Show the confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You are about to buy '+selectedPlanAmount+` for \u20a6`+price,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        JsLoadingOverlay.show();

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/buy-data-plans',
                            method: 'POST',
                            data: formData,
                            success: function(res) {
                               
                                // Example: Swal.fire('Success', 'Action completed successfully', 'success');
                                if(res.status === 200)
                                {
                                    Swal.fire('Success', res.message, 'success');
                                    JsLoadingOverlay.hide();
                                }
                                if(res.status === 400)
                                {
                                    Swal.fire('error', res.message, 'error');
                                    JsLoadingOverlay.hide();
                                }

                            },
                            error: function(xhr, status, error) {
                                // Handle the error response if needed
                                // Example: Swal.fire('Error', 'An error occurred', 'error');
                            }
                        }).always(function() {
                            // JsLoadingOverlay.hide();
                        });
                    }
                });
            });




        });
    </script>
@endsection
