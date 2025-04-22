<form>
    <div>
        <label for="">Имя</label>
        <input wire:model.defer='form.name' type="text" id="name" placeholder="Введите имя">
        @error('form.name')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="">Email</label>
        <input wire:model.defer='form.email' type="text" id="email" placeholder="Введите email">
        @error('form.email')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="">Telegram</label>
        <input wire:model.defer='form.telegram' type="text" id="telegram"
            placeholder="Вставьте ссылку на профиль telegram">
        @error('form.telegram')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="">Комментарий</label>
        <textarea wire:model.defer='form.message' id="message" cols="30" rows="10"></textarea>
        @error('form.message')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <button>Отправить</button>
</form>
