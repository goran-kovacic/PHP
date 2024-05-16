<x-app-layout>
    <div class="project-container single-project">
        <div class="project-header">
            <h1 class="text-3xl py-4">Created at: {{ $project->created_at->toDateString() }}</h1>
            <div class="project-buttons">
                <a href="{{ route('objava.create', $project) }}" class="project-edit-button">Add Objava</a>
                <a href="{{ route('objava.index', $project) }}" class="project-edit-button">View Objave</a>
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
                <span>Name: </span> {{ $project->name }}
            </div>

            <div class="project">
                <div class="project-body">
                    <span>Price: </span>{{ $project->price }}
                </div>
            </div>
        </div>
</x-app-layout>
