<x-app-layout>
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <x-custom.heading>Telegraph Bots</x-custom.heading>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Token</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Token</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($telegraphBots as $key => $telegraphBot)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>
                                                <span class="token-hidden" data-token="{{ $telegraphBot->token }}">
                                                    ***************
                                                </span>
                                            </td>
                                            <td>{{ $telegraphBot->name }}</td>
                                            <td>{{ $telegraphBot->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

    @push('dashboard-scripts')
        <script>
            $(document).ready(function () {
                $(document).on('click', '.token-hidden', function () {
                    let $this = $(this);

                    if ($this.text() === '***************') {
                        $this.text($this.attr('data-token'));
                    } else {
                        $this.text('***************');
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
