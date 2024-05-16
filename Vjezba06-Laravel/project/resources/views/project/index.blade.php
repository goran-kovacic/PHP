<x-app-layout>
    <div class="project-container">
        <a href="{{ route('project.create') }}" class="new-project-btn">
            New project
        </a>

        <a href="{{ route('uploads.create') }}" class="new-project-btn">
            Upload file
        </a>
        <div class="projects">
            @foreach ($projects as $project)
                <div class="project">
                    <div class="project-body">
                        <br>
                        {{ $project->name }} <br>
                        {{-- {{ $project->created_at->toDateString() }} <br> --}}

                    </div>
                    <div class="project-buttons">
                        <a href="{{ route('project.show', $project) }}" class="project-edit-button">View</a>
                        <a href="{{ route('project.edit', $project) }}" class="project-edit-button">Edit</a>
                        <form action="{{ route('project.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="project-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="p-6">
            {{ $projects->links() }}
        </div>
    </div>
</x-app-layout>
