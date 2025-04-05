<x-app-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <x-custom.heading>Create New Telegraph Bot</x-custom.heading>

                <form action="{{ route('telegram.store-telegraph-bot') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="token">Token</label>
                        <input class="form-control shadow-none" id="token" type="password" name="token" placeholder="1458755585:ERT_hZALxXHehERTYie8YbhLSDoK7v9rsQ" value="{{ old('token') }}" autocomplete="off" />
                        @error('token')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label class="form-label" for="botName">Bot Name</label>
                        <input class="form-control shadow-none" id="botName" type="text" name="name" placeholder="ExampleBot" value="{{ old('name') }}" autocomplete="off">

                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info btn-sm shadow-none">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('dashboard-scripts')
        <script>

        </script>
    @endpush
</x-app-layout>
