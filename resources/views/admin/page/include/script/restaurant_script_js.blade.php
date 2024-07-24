<script type="text/javascript">
    $(function() {

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
    });
</script>
