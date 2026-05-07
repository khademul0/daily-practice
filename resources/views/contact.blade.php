<x-layout title="Contact">
    <!-- Form Section -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card shadow p-4">
                    <form method="POST" action="/contact">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" rows="4" placeholder="Write your message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>