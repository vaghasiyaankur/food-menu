<script type="text/javascript">
    $(function() {

        var urlPath = window.location.pathname;
        var restaurantId = urlPath.split('/').pop();

        var myModal = new bootstrap.Modal(document.getElementById('backDropModal'), {
            backdrop: 'static',
            keyboard: false
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users.list') }}",
                data: {
                    restaurant_id: restaurantId
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
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

        $(document).on('click', '.addUser', function(e) {
            e.preventDefault();
            resetUserForm(1);
            $("#restaurant_id").val(restaurantId);

            var fields = ['name', 'email', 'mobile_number', 'password', 'password_confirmation', 'role',
                'lock_pin'
            ];
            fields.forEach(field => {
                $(`#${field}_error`).text("")
            });

            $("#backDropModalTitle").text("Add User");
            $(".userSubmit").text("Save");
        });

        $(document).on('submit', '#userForm', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            var actionURL = $(this).attr('action');
            var formMethod = $(this).attr('method');

            $.ajax({
                type: formMethod,
                url: actionURL,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status) {
                        myModal.hide();
                        table.draw();
                        $("#backDropModalTitle").text("Add User");
                        $(".userSubmit").text("Save");
                        getSuccessMessage(response.success);
                    }
                },
                error: function(xhr) {
                    var fields = ['name', 'email', 'mobile_number', 'password', 'password_confirmation', 'role', 'lock_pin' ];
                    $.each(fields, function(index, field) {
                        var errorMessage = xhr.responseJSON[field] ? xhr.responseJSON[field][0] : "";
                        $(`#${field}_error`).text(errorMessage);
                    });
                    setTimeout(() => {
                        $.each(fields, function(index, field) {
                            $(`#${field}_error`).text("");
                        });
                    }, 5000);
                }
            });
        });

        $(document).on('click', '.editUser', function(e) {
            e.preventDefault();

            var fields = ['name', 'email', 'mobile_number', 'password', 'password_confirmation', 'role', 'lock_pin'];
            fields.forEach(field => {
                $(`#${field}_error`).text("")
            });

            var id = $(this).data('id');
            var url = "{{ route('user.edit', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                dataType: "JSON",
                success: function(response) {
                    if (response.status) {
                        myModal.show();
                        $(".userSubmit").text("Update");
                        $("#backDropModalTitle").text("Edit User");

                        var formDetail = $("#userForm");
                        var elements = formDetail.find("input, select");

                        elements.each(function() {
                            var element = $(this);
                            var elementId = element.attr("id");
                            if (response.user.hasOwnProperty(elementId)) {
                                if (element.attr("type") === "checkbox" && elementId === "lock_enable") {
                                    element.prop('checked', response.user[elementId] == 1);
                                } else {
                                    element.val(response.user[elementId]);
                                }
                            }
                        });
                    }
                },
                error: function(error) {
                    console.error('Fetch User Detail Error : ', error);
                }
            });
        });

        $(document).on('click', '.deleteUser', function(event) {
            event.preventDefault();

            var row = $(this).closest('tr');
            var rowData = table.row(row).data();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                customClass: {
                    confirmButton: "btn btn-primary me-3",
                    cancelButton: "btn btn-label-secondary"
                },
                buttonsStyling: !1,
            }).then(function(t) {
                if (t.value) {
                    $.ajax({
                        url: "{{ route('user.delete') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            user_id: rowData.id,
                            restaurant_id: rowData.restaurant_id
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text: "Changes Save Successfully.",
                                customClass: {
                                    confirmButton: "btn btn-success"
                                }
                            }).then(function(t) {
                                row.fadeOut(500, function() {
                                    table.row(row).remove().draw();
                                });
                            });
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

        function getSuccessMessage(message) {
            if (message) resetUserForm(0);
            var toastHTML = `
                <div id="ajax-toast" class="bs-toast toast toast-ex animate__animated my-2 fade bg-primary animate__bounceInRight show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2500">
                    <div class="toast-header">
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        <span id="ajax-toast-message">${message}</span>
                    </div>
                </div>
            `;

            $('body').append(toastHTML);
            $('#ajax-toast').toast({ delay: 2500 }).toast('show');
        }

        function resetUserForm(type) {
            if (type == 0) {
                $("#restaurant_id").val("");
            }
            $("#id").val("");
            $("#name").val("");
            $("#email").val("");
            $("#password").val("");
            $("#password_confirmation").val("");
            $("#mobile_number").val("");
            $("#role").val("");
            $("#lock_pin").val("");
            $('#lock_enable').prop('checked', false);
        }
    });
</script>
