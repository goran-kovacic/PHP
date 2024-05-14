<x-app-layout>
    <div class="project-container single-project">
        <div class="project-header">
            <h1 class="text-3xl py-4">Created at: {{ $project->created_at }}</h1>
            {{-- <h1 class="text-3xl py-4">Updated at: {{ $project->updated_at }}</h1> --}}
            <div class="project-buttons">
                <a href="{{ route('project.edit', $project) }}" class="project-edit-button">Edit</a>
                <form action="{{ route('project.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="project-delete-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="project">
            <div class="project-body">
                {{ $project->name }}
            </div>
        </div>
    </div>
</x-app-layout>
