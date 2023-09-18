<x-layouts.base>
    @if(auth()->guest())
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Welcome friend!</div>
                <div class="card-body">
                    Welcome to my test project! This project was created with the primary goal of demonstrating my skills and expertise as a developer. As part of a job application, I wanted to showcase my ability to work with web technologies, APIs, and various development tools.
                </div>
            </div>
        </div>
    @else
        <x-weather-widget/>
    @endif
</x-layouts.base>
