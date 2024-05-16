<x--app-layout>
    <div class="project-container single-project">
        <h1>Create new project</h1>
        <form action="{{ route('project.store') }}" method="POST" class="project">
            @csrf
            <textarea name="name" rows="10" class="project-body" placeholder="Type in your project name"></textarea>
            <input type="text" pattern="[0-9]+(\.[0-9]+)?" name="price" class="project-price"
                placeholder="Enter the price" title="Please enter a valid decimal number">
            <div class="project-buttons">
                <a href="{{ route('project.index') }}" class="project-cancel-button">Cancel</a>
                <button class="project-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x--app-layout>
