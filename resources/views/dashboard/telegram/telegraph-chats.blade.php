<x-app-layout>
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <x-custom.heading>Telegraph Chats</x-custom.heading>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Chat Id</th>
                                        <th>Name</th>
                                        <th>Telegraph Bot</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Chat Id</th>
                                        <th>Name</th>
                                        <th>Telegraph Bot</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($telegraphChats as $key => $telegraphChat)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>
                                                <span title="Click to show" class="chat-id-hidden" data-chat-id="{{ $telegraphChat->chat_id }}">
                                                    *************
                                                </span>
                                            </td>
                                            <td>{{ $telegraphChat->name }}</td>
                                            <td>{{ $telegraphChat->telegraphBot->name }}</td>
                                            <td>{{ $telegraphChat->created_at }}</td>
                                            <td>
                                                <form class="form-check-inline" action="{{ route('telegram.delete-telegraph-chat', ['id' => $telegraphChat->id]) }}" method="post">
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
                //Chat id hide/show
                toggle('*************');
            });

            const toggle = (symbols) => {
                const chatIdArea = $('.chat-id-hidden');

                if (chatIdArea.text(symbols)) {
                    chatIdArea.click(function() {
                        let $this = $(this);

                        if ($this.text() === symbols) {
                            $this.text($this.attr('data-chat-id'));
                        } else {
                            $this.text(symbols);
                        }
                    });
                }
            }
        </script>
    @endpush
</x-app-layout>
