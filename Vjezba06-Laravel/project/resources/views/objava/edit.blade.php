<x-app-layout>
    <div class="project-container single-project">
        <h1 class="text-3xl py-4">Edit objava:</h1>
        <form action="{{ route('project.update', $project) }}" method="POST" class="project">
            @csrf
            @method('PUT')
            <textarea name="name" rows="10" class="project-body" placeholder="placeholder">{{ $objava->tekst }}</textarea>
            <div class="project-buttons">
                <a href="{{ route('objava.index') }}" class="project-cancel-button">Cancel</a>
                <button class="project-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>