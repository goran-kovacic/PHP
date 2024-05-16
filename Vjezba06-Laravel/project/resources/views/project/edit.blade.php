<x-app-layout>
    <div class="project-container single-project">
        <h1 class="text-3xl py-4">Edit your project</h1>
        <form action="{{ route('project.update', $project) }}" method="POST" class="project">
            @csrf
            @method('PUT')
            @error('oib')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            <textarea name="name" rows="10" class="project-body" placeholder="Enter your project here">{{ $project->name }}</textarea>
            <span>Price: </span>
            <input type="text" pattern="[0-9]+(\.[0-9]+)?" name="price" class="project-price"
                placeholder={{ $project->price }}></input>
            <span>OIB: </span>
            <input type="number" name="oib" class="project-oib" placeholder="Enter your OIB"
                value="{{ $project->oib }}">
            <div class="project-buttons">
                <a href="{{ route('project.index') }}" class="project-cancel-button">Cancel</a>
                <button class="project-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
