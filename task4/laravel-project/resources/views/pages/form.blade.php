<form action="{{ route('save.message') }}" method="POST" id="add-message-form">
    @csrf
    <div class="mb-3">
        <label for="name">Имя:</label>
        <input class="form-control" placeholder="Введите имя" name="name" type="text" id="name">
        <span class="text-danger error-text name_error"></span>
    </div>
    <div class="mb-3">
        <label for="message">Сообщение:</label>
        <textarea class="form-control" rows="5" placeholder="Введите текст сообщения" name="message" type="message" id="message"></textarea>
        <span class="text-danger error-text message_error"></span>
    </div>
    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Добавить</button>
    </div>
</form>
