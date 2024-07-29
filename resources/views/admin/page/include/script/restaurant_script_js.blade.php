<script type="text/javascript">
    $(function() {
        
        var urlPath = window.location.pathname;
        var pageType = urlPath.split('/').pop();

        var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
            backdrop: 'static',
            keyboard: false
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('restaurants.list') }}",
                data: function(d) {
                    d.pageType = pageType;
                }
            },
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
                    data: 'status',
                    name: 'status',
                    render: function(data) {
                        return data == 1 ? 'Open' : 'Close';
                    }
                },
                {
                    data: 'operating_start_hours',
                    name: 'operating_start_hours'
                },
                {
                    data: 'operating_end_hours',
                    name: 'operating_end_hours'
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

        $(document).on('click', ".deleteRestaurantRow", function (e) {
            e.preventDefault();

            var row = $(this).closest('tr');
            var deleteType = $(this).data('delete-type');
            var deleteID = $(this).data('restaurant-id');

            Swal.fire({
                title: "Are you sure?",
                text: getLabelMessage(deleteType, 'text'),
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: getLabelMessage(deleteType, 'button'),
                customClass: {
                    confirmButton: "btn btn-primary me-3",
                    cancelButton: "btn btn-label-secondary"
                },
                buttonsStyling: !1,
            }).then(function(t) {
                if (t.value) {
                    $.ajax({
                        url: "{{ route('restaurant.delete') }}",
                        method: 'DELETE',
                        data: {
                            _token : '{{ csrf_token() }}',
                            id : deleteID,
                            type : deleteType
                        },
                        success: function(response) {
                            if(response.status) {
                                Swal.fire({
                                    icon: "success",
                                    title: getLabelMessage(deleteType, 'title'),
                                    text: response.message,
                                    customClass: {
                                        confirmButton: "btn btn-success"
                                    }
                                }).then(function(t) {
                                    row.fadeOut(500, function() {
                                        table.row(row).remove().draw();
                                    });
                                });
                            }
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: "Error deleting data.",
                                customClass: {
                                    confirmButton: "btn btn-danger"
                                }
                            });
                        }
                    });
                }
            });
        });

        function getLabelMessage(type, messageType) {
            const messages = {
                restore : {
                    text: 'You want to restore this restaurant.',
                    button: 'Yes, Restore it!',
                    title: 'Restore'
                },
                permanent_delete : {
                    text: "You won't be able to restore this ! You want to remove this restaurant.",
                    button: 'Yes, delete it!',
                    title: 'Deleted'
                },
                temporary_delete : {
                    text: 'You want to remove this restaurant.',
                    button: 'Yes, delete it!',
                    title: 'Deleted'
                }
            };

            return messages[type][messageType];
        }
    });
</script>
