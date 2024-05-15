<x--app-layout>
    <div class="project-container single-project">
        <h1>Create new objava</h1>
        <form action="{{ route('objava.store', $project_id) }}" method="POST" class="project">
            @csrf
            <textarea name="tekst" rows="10" class="project-body" placeholder="placeholder tekst"></textarea>
            <div class="project-buttons">
                <a href="{{ route('project.index') }}" class="project-cancel-button">Cancel</a>
                <button class="project-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x--app-layout>