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
                if(response.status) {
                    $(".approved_count").text(response.approved);
                    $(".declined_count").text(response.declined);
                    $(".pending_count").text(response.pending);
                    $(".users").text(response.user);
                }
            }
        });
    }
</script>