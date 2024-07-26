<script type="text/javascript">
    
    $(document).ready(function () {
        getDashboardList()
    });

    function getDashboardList() {
        $.ajax({
            type: "GET",
            url: "{{ route('dashboard.list') }}",
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    }
</script>