@foreach($messages as $message)
        <div class="card mb-3" id="card-message-{{ $message->id }}">
            <div class="card-header">
                Сообщение:
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $message->name }}</h5>
                <p class="card-text">{{ $message->message }}</p>
                <p class="card-text"><small class="text-muted">{{ $message->created_at }}</small></p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="delete-message btn btn-danger" data-id="delete-message-{{ $message->id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
@endforeach




