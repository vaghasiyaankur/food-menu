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
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'logo', name: 'logo', render: function(data) { return '<img src="/storage/' + data + '" height="50px" width="50px" >'; }},
                { data: 'name', name: 'name' },
                { data: 'location', name: 'location' },
                { data: 'restaurant_code', name: 'restaurant_code' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('select[name="DataTables_Table_0_length"]').addClass('form-select');
        $('.dataTables_filter input').addClass('form-control');

        $(document).on('click', '.requestStatusBtn', function(event) {
            event.preventDefault();

            var $this = $(this);
            var restaurant_id = $this.data('restaurant-id');
            var restaurant_status = $this.data('request-status');
            var $buttons = $('.requestStatusBtn');
            var $row = $this.closest('tr');
            var isApprove = restaurant_status == 1;

            function showSwal(type, message, title) {
                Swal.fire({
                    icon: type,
                    title: title,
                    text: message,
                    customClass: { confirmButton: `btn btn-${type === 'success' ? 'success' : 'danger'}` }
                }).then(function() {
                    $buttons.prop('disabled', false);
                    if (type === 'success') {
                        $row.fadeOut(500, function() {
                            table.row($row).remove().draw();
                        });
                    }
                });
            }

            Swal.fire({
                title: "Are you sure?",
                text: `You are about to ${isApprove ? 'approve' : 'decline'} this restaurant!`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: `Yes, ${isApprove ? 'approve' : 'decline'} it!`,
                customClass: {
                    confirmButton: "btn btn-primary me-3",
                    cancelButton: "btn btn-label-secondary"
                },
                buttonsStyling: false,
            }).then(function(t) {
                if (t.value) {
                    if (!isApprove) {
                        
                        $('#declineModal').modal('show');
                        $('#confirmDecline').off('click').on('click', function() {
                            
                            var declinedReason = $("#declined_reason").val();
                            if(declinedReason == "") {
                                $("#declined_reason_error").text("Please Enter Declined Restaurant Reason.");
                                setTimeout(() => {
                                    $("#declined_reason_error").text("");
                                }, 3000);
                                return;
                            }

                            $buttons.prop('disabled', true);
                            $(".confirmDeclined").text("Please Wait...");
                            
                            $.post("{{ route('restaurant.approved-declined') }}", {
                                _token: '{{ csrf_token() }}',
                                restaurant_id: restaurant_id,
                                request_status: restaurant_status,
                                declined_reason: declinedReason
                            }).done(function() {
                                $('#declineModal').modal('hide');
                                $("#declined_reason").val("");
                                $(".confirmDeclined").text("Confirm Declined");
                                showSwal('success', 'The restaurant has been declined successfully', 'Declined');
                            }).fail(function() {
                                $("#declined_reason").val("");
                                $(".confirmDeclined").text("Confirm Declined");
                                showSwal('error', 'There was an error while declining the restaurant', 'Error!');
                            });
                        });
                    } else {
                        
                        $buttons.prop('disabled', true);
                        $.post("{{ route('restaurant.approved-declined') }}", {
                            _token: '{{ csrf_token() }}',
                            restaurant_id: restaurant_id,
                            request_status: restaurant_status
                        }).done(function() {
                            showSwal('success', 'The restaurant has been approved successfully', 'Approved');
                        }).fail(function() {
                            showSwal('error', 'There was an error while approving the restaurant', 'Error!');
                        });
                    }
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
