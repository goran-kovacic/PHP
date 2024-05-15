<x-app-layout>
    <div class="project-container">
        <div class="project-header">
            <h1 class="text-3xl py-4">Objave: {{ $project->name }}</h1>
            <a href="{{ route('objava.create', $project) }}" class="project-edit-button">Add Objava</a>
            <a href="{{ route('project.show', $project) }}" class="project-edit-button">Back to Project</a>
        </div>
        <div class="project">
            <div class="project-body">
                <ul>
                    @foreach($objava as $objav)
                        <li>{{ $objav->tekst }}</li>
                    @endforeach

                    
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>