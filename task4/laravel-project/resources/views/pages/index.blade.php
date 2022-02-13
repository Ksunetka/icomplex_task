@extends('layouts.layout')

@section('title', 'Гостевая книга')

@section('content')

    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-fixed top-0 end-0 p-1">
            <div class="toast success-toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div id="success-message" class="toast-body"></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            <div class="toast delete-toast text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div id="delete-message" class="toast-body"></div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    @include('pages.form')

    <div class="text-end fw-bold">Всего сообщений:<span id="count-message" class="badge bg-secondary">{{ $count }}</span></div></br>

    <div id="message-list">
        @include('pages.card')
    </div>

    {{ $messages->render() }}

@endsection


