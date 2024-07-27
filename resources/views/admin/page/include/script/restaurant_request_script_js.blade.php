<script type="text/javascript">
    $(function() {

        var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
            backdrop: 'static',
            keyboard: false
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('restaurant-request.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'logo',
                    name: 'logo',
                    render: function(data) {
                        return '<img src="/storage/' + data + '" height="50px" width="50px" >';
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'location',
                    name: 'location'
                },
                {
                    data: 'restaurant_code',
                    name: 'restaurant_code'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('select[name="DataTables_Table_0_length"]').addClass('form-select');
        $('.dataTables_filter input').addClass('form-control');

        $(document).on('click', '.requestStatusBtn', function(event) {
            event.preventDefault();

            var restaurant_id = $(this).data('restaurant-id');
            var restaurant_status = $(this).data('request-status');

            var $this = $(this);
            var $buttons = $('.requestStatusBtn');
            var $row = $this.closest('tr');

            Swal.fire({
                title: "Are you sure?",
                text: `You are about to ${restaurant_status == 1 ? 'approve' : 'decline'} this restaurant !`,
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: `Yes, ${restaurant_status == 1 ? 'approve' : 'decline'} it !`,
                customClass: {
                    confirmButton: "btn btn-primary me-3",
                    cancelButton: "btn btn-label-secondary"
                },
                buttonsStyling: !1,
            }).then(function(t) {
                if (t.value) {
                    $buttons.prop('disabled', true);
                    $.ajax({
                        url: "{{ route('restaurant.approved-declined') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            restaurant_id: restaurant_id,
                            request_status: restaurant_status
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: `${restaurant_status == 1 ? 'Approved !' : 'Declined !'}`,
                                text: `The restaurant has been ${restaurant_status == 1 ? 'approved' : 'declined'} successfully`,
                                customClass: {
                                    confirmButton: "btn btn-success"
                                }
                            }).then(function(t) {
                                $buttons.prop('disabled', false);
                                $row.fadeOut(500, function() {
                                    table.row($row).remove().draw();
                                });
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: `There was an error while ${restaurant_status == 1 ? 'approving' : 'declining'} the restaurant`,
                                customClass: {
                                    confirmButton: "btn btn-danger"
                                }
                            }).then(function() {
                                $buttons.prop('disabled', false);
                            });
                        }
                    });
                }
            });
        });

        $(document).on('click', '.restaurantDetail', function (event) {
            event.preventDefault();
            myModal.show();
    
            var id = $(this).data('id');
            var url = "{{ route('restaurant-detail', ':id') }}";
            url = url.replace(':id', id);
    
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    if(response.status) {
                        
                        const statusMap = { 1: 'Approved', 2: 'Pending', 0: 'Declined'};
                        const requestStatus = statusMap[response.detail.request_status] || "-";
    
                        $("#name").text(response.detail.name ? response.detail.name : "-");
                        $("#address").text(response.detail.location ? response.detail.location : "-");
                        $("#email").text(response.detail.email ? response.detail.email : "-");
                        $("#code").text(response.detail.restaurant_code ? response.detail.restaurant_code : "-");
                        $("#start_hour").text(response.detail.operating_start_hours ? response.detail.operating_start_hours : "-");
                        $("#end_hour").text(response.detail.operating_end_hours ? response.detail.operating_end_hours : "-");
                        $("#status").text(requestStatus);
                        $("#logo").attr("src", response.detail.logo ? '/storage/'+response.detail.logo : 'images/logo.png');
                    }
                }
            });
        });
    });
</script>
