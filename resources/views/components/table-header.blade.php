<div class="table-responsive text-nowrap">
    <table class="table table-bordered table-responsive data-table datatables-basic border-top dataTable dtr-column">
        <thead>
            <tr>
                @foreach($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>