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
                url: "{{ route('branch.list') }}",
                data: {
                    restaurant_id: restaurantId
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'branch_name',
                    name: 'branch_name'
                },
                {
                    data: 'owner_name',
                    name: 'owner_name'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'state',
                    name: 'state'
                },
                {
                    data: 'country',
                    name: 'country'
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

        $('#logo').change(function(event) {
            event.preventDefault();

            var reader = new FileReader();
            var file = event.target.files[0];

            if (file) {
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#imagePreview').hide();
            }
        });

        $(document).on('click', '.addBranch', function(e) {
            e.preventDefault();
            var $imagePreview = $("#imagePreview");
            if ($imagePreview.show()) $imagePreview.hide();
            $("#id").val("");
            $('#branchForm')[0].reset();
            $("#restaurant_id").val(restaurantId);

            $("#backDropModalTitle").text("Add Branch");
            $(".branchSubmit").text("Save");

            var fields = ['logo', 'branch_name', 'owner_name', 'address', 'city', 'zip_code', 'state',
                'country', 'mobile_number', 'email'
            ];
            fields.forEach(field => {
                $(`#${field}_error`).text("")
            });
        });

        $(document).on('submit', '#branchForm', function(e) {
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

                        e.target.reset();
                        table.draw();

                        $('#imagePreview').attr('src', "").hide();
                        $("#id").val("");

                        $("#backDropModalTitle").text("Add Branch");
                        $(".branchSubmit").text("Save");
                        getSuccessMessage(response.success);
                    }
                },
                error: function(xhr) {
                    var fields = ['logo', 'branch_name', 'owner_name', 'address', 'city',
                        'zip_code', 'state', 'country', 'mobile_number', 'email'
                    ];

                    $.each(fields, function(index, field) {
                        var errorMessage = xhr.responseJSON[field] ? xhr
                            .responseJSON[field][0] : "";
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

        $(document).on('click', '.editBranch', function(e) {
            e.preventDefault();

            var fields = ['logo', 'branch_name', 'owner_name', 'address', 'city', 'zip_code', 'state',
                'country', 'mobile_number', 'email'
            ];
            fields.forEach(field => {
                $(`#${field}_error`).text("")
            });

            var branchEditId = $(this).data('id');
            var url = "{{ route('branch.edit', ':id') }}";
            url = url.replace(':id', branchEditId);

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function(response) {
                    if (response.status) {
                        myModal.show();
                        $("#backDropModalTitle").text("Edit Branch");
                        $(".branchSubmit").text("Update");

                        var $branchForm = $("#branchForm");
                        var $elements = $branchForm.find("input, textarea, img");

                        $elements.each(function() {
                            var $element = $(this);
                            var elementId = $element.attr("id");

                            if (response.branch.hasOwnProperty(elementId)) {
                                if ($element.is("textarea")) {
                                    $element.text(response.branch[elementId]);
                                } else if ($element.attr("type") == 'file') {
                                    return;
                                } else {
                                    $element.val(response.branch[elementId]);
                                }
                            }
                        });

                        if (response.branch.logo) {
                            var $imagePreview = $("#imagePreview");
                            $imagePreview.attr("src", '/storage/' + response.branch.logo);
                            $imagePreview.show();
                        }
                    }
                }
            });
        });

        $(document).on('click', '.deleteBranch', function(e) {
            e.preventDefault();
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
                        url: "{{ route('branch.delete') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            branch_id: rowData.id,
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
            $('#ajax-toast').toast({
                delay: 2500
            }).toast('show');

        }
    });
</script>
