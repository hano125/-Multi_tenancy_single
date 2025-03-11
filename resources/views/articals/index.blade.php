<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->tanent->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Create New Article</p>
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                        data-target="#createArticleModal">
                        Create
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="createArticleModal" tabindex="-1" role="dialog"
                        aria-labelledby="createArticleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createArticleModalLabel">Create New Article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('articals.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="body">Content</label>
                                            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanent_id">Team</label>
                                            {{-- <select class="form-control" id="tanent_id" name="tanent_id" required>
                                                @foreach ($tanents as $tanent)
                                                    <option value="{{ $tanent->id }}">{{ $tanent->name }}</option>
                                                @endforeach
                                            </select> --}}
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Team</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row, replace with dynamic content -->
                                @if ($articals->count() > 0)
                                    @foreach ($articals as $artical)
                                        <tr>
                                            <td>{{ $artical->id }}</td>
                                            <td>{{ $artical->title }}</td>
                                            <td>{{ $artical->body }}</td>
                                            <td>{{ $artical->tanent->name }}</td>

                                        </tr>
                                    @endforeach

                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
