<script type="text/javascript">
    
    $(document).ready(function () {
        getDashboardList();
    });

    function initializeDataTable(tableId, data, columns) {
        $(tableId).DataTable({
            paging: false,
            info: false,
            searching: false,
            order: [[1, 'desc']],
            data: data,
            columns: columns
        });
    }

    function getDashboardList() {
        $.ajax({
            type: "GET",
            url: "{{ route('dashboard.list') }}",
            dataType: "json",
            success: function (response) {
                if(response.status) {

                    const commonColumns = [
                        { 
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            data: 'logo',
                            render: function(data) {
                                return '<img src="/storage/' + data + '" height="50px" width="50px">';
                            }
                        }
                    ];

                    initializeDataTable('#pending_request_table', response.pending_restaurants, [
                        ...commonColumns, { data: 'name' }, { data: 'email' }, { data: 'restaurant_code' }
                    ]);

                    initializeDataTable('#approved_table', response.approved_restaurants, [
                        ...commonColumns, { data: 'name' }, { data: 'location' }, { data: 'restaurant_code' }
                    ]);

                    initializeDataTable('#declined_table', response.declined_restaurants, [
                        ...commonColumns, { data: 'name' }, { data: 'location' }, { data: 'restaurant_code' }
                    ]);

                    $(".approved_count").text(response.approved);
                    $(".declined_count").text(response.declined);
                    $(".pending_count").text(response.pending);
                    $(".users").text(response.user);

                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error : ', status, error);
            }
        });
    }
</script>