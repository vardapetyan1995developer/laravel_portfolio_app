<x-app-layout>
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <x-custom.heading>Telegraph Bots</x-custom.heading>

                    <div class="mb-2">
                        <a class="btn btn-info btn-sm shadow-none" href="{{ route('telegram.create-telegraph-bot') }}">Create New Bot</a>
                    </div>

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
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Token</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($telegraphBots as $key => $telegraphBot)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>
                                                <span title="Click to show" class="token-hidden" data-token="{{ $telegraphBot->token }}">
                                                    ***************
                                                </span>
                                            </td>
                                            <td>{{ $telegraphBot->name }}</td>
                                            <td>{{ $telegraphBot->created_at }}</td>
                                            <td>
                                                <a class="btn btn-secondary shadow-none btn-sm" href="{{ route('telegram.edit-telegraph-bot', $telegraphBot->id) }}">Edit</a>

                                                <form class="form-check-inline" action="{{ route('telegram.delete-telegraph-bot', ['id' => $telegraphBot->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger shadow-none btn-sm" type="submit">Delete</button>
                                                </form>
                                            </td>
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
                //Token hide/show
                toggle('***************');
            });

            const toggle = (symbols) => {
                const tokenArea = $('.token-hidden');

                if (tokenArea.text(symbols)) {
                    tokenArea.click(function() {
                        let $this = $(this);

                        if ($this.text() === symbols) {
                            $this.text($this.attr('data-token'));
                        } else {
                            $this.text(symbols);
                        }
                    });
                }
            }
        </script>
    @endpush
</x-app-layout>
