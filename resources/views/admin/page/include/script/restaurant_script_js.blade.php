<script type="text/javascript">
    $(function() {
        
        var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
            backdrop: 'static',
            keyboard: false
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('restaurants.list') }}",
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
    });
</script>
